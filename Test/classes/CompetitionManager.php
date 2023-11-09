<?php
require_once('TeamManager.php');

class CompetitionManager
{
    private mysqli $database;

    function __construct(mysqli $mysqlConnection)
    {
        $this->database = $mysqlConnection;
    }

    function getAllCompetitions() : array
    {
        $sql = 'SELECT competition.*,(SELECT COUNT(*) FROM `competition_team` 
                WHERE competition_id = competition.id) AS number_of_teams, team.name AS team_name
                FROM competition
                LEFT JOIN team ON team.id = competition.team_id_winner';
        $query = $this->database->prepare($sql);

        if ($query->execute()) {
            $result = $query->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    function getCompetition(int $id) : ?array
    {
        $sql = 'SELECT *, (SELECT COUNT(*) FROM `competition_team` 
                WHERE competition_id = competition.id) AS number_of_teams 
                FROM competition WHERE id = ? ';
        $query = $this->database->prepare($sql);
        $query->bind_param('i', $id);

        if ($query->execute()) {
            $result = $query->get_result();
            return $result->fetch_array(MYSQLI_ASSOC);
        }

        return NULL;
    }

    function delete(int $id) : bool
    {
        $sql = 'DELETE FROM competition WHERE id = ?';
        $query = $this->database->prepare($sql);
        $query->bind_param('i', $id);
        return $query->execute();
    }

    function create(string $name) : bool
    {
        $sql = 'INSERT INTO competition (name) VALUES (?) ';
        $query = $this->database->prepare($sql);
        $query->bind_param('s', $name);
        return $query->execute();
    }

    function update(int $id, string $name, ?array $teams = null) : bool
    {
        $sql = 'UPDATE competition SET name = ? WHERE id = ?';
        $query = $this->database->prepare($sql);
        $query->bind_param('si', $name, $id);
        $result = $query->execute();

        if ($teams != null)
        {
            $sql = 'DELETE FROM competition_team WHERE competition_id = ?';
            $query = $this->database->prepare($sql);
            $query->bind_param('i', $id);
            $query->execute();

            foreach ($teams as $teamId)
            {
                $sql = 'INSERT INTO competition_team (competition_id, team_id) VALUES (?, ?)';
                $query = $this->database->prepare($sql);
                $query->bind_param('ii', $id, $teamId);
                $query->execute();
            }
        }

        return $result;
    }

    function teamsInCompetitions(int $competitionId) : array
    {
        $sql = 'SELECT * FROM `competition_team` WHERE competition_id = ?';
        $query = $this->database->prepare($sql);
        $query->bind_param('i', $competitionId);
        $teams = [];
        if ($query->execute()) {
            $result = $query->get_result();
            $teams = $result->fetch_all(MYSQLI_ASSOC);
            $teamManager = new TeamManager($this->database);
            foreach ($teams as $index => $team)
            {
                $teams[$index] = $teamManager->getTeam($team['team_id']);
            }
        }
        return $teams;
    }

    function getGamesFor(int $competitionId, int $round) : array {
        $sql = 'SELECT  game.*, 
                        t1.name AS team_home_name,
                        t2.name AS team_away_name, 
                        t1.city AS team_home_city, 
                        t2.city AS team_away_city,
                        t3.name AS team_winner_name,
                        (SELECT COUNT(*) FROM game_scores WHERE game_id = game.id AND team_id = game.team_id_home) AS `score_home`,  
                        (SELECT COUNT(*) FROM game_scores WHERE game_id = game.id AND team_id = game.team_id_away) AS `score_away`  
                FROM 
                        `game` 
                LEFT JOIN 
                        team AS t1 ON t1.id = game.team_id_home
                LEFT JOIN 
                        team AS t2 ON t2.id = game.team_id_away
                LEFT JOIN 
                        team AS t3 ON t3.id = game.team_id_winner
                WHERE 
                    competition_id = ?
                AND round = ?';
        $query = $this->database->prepare($sql);
        $query->bind_param('ii', $competitionId, $round);
        $games = [];
        if ($query->execute()) {
            $result = $query->get_result();
            $games = $result->fetch_all(MYSQLI_ASSOC);
        }

        return $games;
    }

    function getGame(int $gameId) : ?array {
        $sql = 'SELECT *,
                (SELECT COUNT(*) FROM game_scores WHERE game_id = game.id AND team_id = game.team_id_home) AS `score_home`,  
                (SELECT COUNT(*) FROM game_scores WHERE game_id = game.id AND team_id = game.team_id_away) AS `score_away`  
                FROM `game` 
                WHERE id = ?';
        $query = $this->database->prepare($sql);
        $query->bind_param('i', $gameId);

        if ($query->execute()) {
            $result = $query->get_result();
            return $result->fetch_array(MYSQLI_ASSOC);
        }

        return NULL;
    }

    function creatingSchemeAvailable(int $competitionId) : bool {
        $teams = $this->teamsInCompetitions($competitionId);
        $games = $this->getGamesFor($competitionId, 0);
        return count($teams) % 2 == 0 && count($games) == 0;
    }

    function createScheme(string $competitionId) {
        $teams = $this->teamsInCompetitions($competitionId);

        if (!$this->creatingSchemeAvailable($competitionId)) {
            die('Schema kan niet worden aangemaakt met oneven aantal teams');
        }

        for ($i = 0; $i < count($teams); $i++) {
            if ($i % 2 != 0) { continue; }

            $teamHome = $teams[$i];
            $teamAway = $teams[$i+1];

            $this->createGame($competitionId, 0, $teamHome['id'], $teamAway['id']);
        }
    }

    function createGame(int $competitionId, int $round, int $teamHomeId, int $teamAwayId) : bool {
        $sql = 'INSERT INTO game (competition_id, round, team_id_home, team_id_away) VALUES (?, ?, ?, ?)';
        $query = $this->database->prepare($sql);
        $query->bind_param('iiii', $competitionId, $round, $teamHomeId, $teamAwayId);
        return $query->execute();
    }

    function setWinnerForGame(int $gameId, int $winnerId) : bool {
        $sql = 'UPDATE game SET team_id_winner = ? WHERE id = ?';
        $query = $this->database->prepare($sql);
        $query->bind_param('ii', $winnerId, $gameId);
        return $query->execute();
    }

    function createGoal(int $gameId, int $teamId, int $minute) : bool {
        $sql = 'INSERT INTO game_scores (game_id, team_id, minute) VALUES (?, ?, ?)';
        $query = $this->database->prepare($sql);
        $query->bind_param('iii', $gameId, $teamId, $minute);
        return $query->execute();
    }

    function roundCompleted(int $competitionId, int $round) : bool {
        $sql = 'SELECT COUNT(*) AS number_of_games_left FROM game WHERE competition_id = ? AND round = ? AND team_id_winner IS NULL';
        $query = $this->database->prepare($sql);
        $query->bind_param('ii', $competitionId, $round);

        if ($query->execute()) {
            $result = $query->get_result();
            $data = $result->fetch_array(MYSQLI_ASSOC);
            return $data['number_of_games_left'] == 0;
        }

        return false;
    }

    function winningTeamsForRound(int $competitionId, int $round) : array {
        $sql = 'SELECT team_id_winner AS team_id FROM game WHERE competition_id = ? AND round = ?';
        $query = $this->database->prepare($sql);
        $query->bind_param('ii', $competitionId, $round);
        $team_ids = [];
        if ($query->execute()) {
            $result = $query->get_result();
            $team_ids = $result->fetch_all(MYSQLI_ASSOC);
        }

        return $team_ids;
    }

    function currentRoundsForCompetition(int $competitionId) : int {
        $sql = 'SELECT MAX(round)+1 AS rounds FROM game WHERE competition_id = ?';
        $query = $this->database->prepare($sql);
        $query->bind_param('i', $competitionId);

        if ($query->execute()) {
            $result = $query->get_result();
            $data = $result->fetch_array(MYSQLI_ASSOC);
            return $data['rounds'];
        } else {
            return 0;
        }
    }
    function setWinnerForCompetition (int $competitionId, int $teamId) : bool{
        $sql = 'UPDATE competition SET team_id_winner = ? WHERE id = ?';
        $query = $this->database->prepare($sql);
        $query->bind_param('ii', $teamId, $competitionId);
        return $query->execute();
    }
}
