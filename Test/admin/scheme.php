<?php
require_once('../classes/Authentication.php');
require_once('../classes/Database.php');
require_once('../classes/CompetitionManager.php');

if (! Authentication::isLoggedIn()) {
    echo 'Je bent niet ingelogd. <a href="../index.php">Nu inloggen</a>.';
    exit;
}

if (empty($_GET['competition'])){
    header('location: competities.php');
    exit();
}

$database = new Database();
$message = '';

$competitionManager = new CompetitionManager($database->connection);
$teamManager = new TeamManager($database->connection);

$rounds = $competitionManager->currentRoundsForCompetition($_GET['competition']);

if (!empty($_GET['stop_game'])) {
    // Stop game staat in URL dus user wil game stoppen
    $game = $competitionManager->getGame($_GET['stop_game']);

    if ($game['score_home'] != $game['score_away']) {
        $winner_id = $game['score_home'] > $game['score_away'] ? $game['team_id_home'] : $game['team_id_away'];
        $competitionManager->setWinnerForGame($game['id'], $winner_id);

        // Alle games gespeeld?
        if ($competitionManager->roundCompleted($_GET['competition'], $game['round'])) {
            // Haal alle teams op die zijn gewonnen in deze ronde
            $winningTeams = $competitionManager->winningTeamsForRound($_GET['competition'], $game['round']);
            if (count($winningTeams) == 1) {
                // Competitie afgelopen
                // Sla winnaar op in competitie-tabel
                $competitionManager->setWinnerForCompetition($_GET['competition'], $winningTeams[0]['team_id']);
            } else if (count($winningTeams) > 1) {
                // Nieuwe ronde moet worden gespeeld
                // Maak nieuwe games aan met gewonnen teams
                for($i = 0; $i < count($winningTeams); $i++) {
                    if ($i % 2 != 0) { continue; }
                    $teamHome = $winningTeams[$i]['team_id'];
                    $teamAway = $winningTeams[$i+1]['team_id'];
                    $competitionManager->createGame($_GET['competition'], $game['round']+1, $teamHome, $teamAway);
                }
            }
        }

        header('location: scheme.php?competition=' . $game['competition_id']);
        exit();
    } else {
        $message = 'Wedstrijd met gelijkspel kan niet worden gestopt';
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php if(!empty($message)): ?>
<strong style="color:red"><?= $message ?></strong>
<?php endif ?>

<?php for($i = 0; $i < $rounds; $i++): ?>
    <?php $games = $competitionManager->getGamesFor($_GET['competition'], $i); ?>
    <h3 style="margin-bottom: 0.5rem; border-bottom: 1px solid gray">Ronde #<?= $i+1 ?></h3>
    <table style="margin-bottom: 1rem;">
        <tr>
            <th>
                #
            </th>
            <th>
                Thuis
            </th>
            <th>
                Uit
            </th>
            <th>
                Locatie
            </th>
            <th>
                Score
            </th>
            <th>
                Winnaar
            </th>
            <th>
                Wedstrijd afgelopen
            </th>
            <th>
                Doelpunten invoeren
            </th>
        </tr>
        <?php foreach ($games as $game): ?>
            <tr>
                <td>
                    <?= $game['id'] ?>
                </td>
                <td>
                    <?= $game['team_home_name'] ?> <span style="font-style: italic; opacity: 0.6">(<?= $game['team_home_city'] ?>)</span>
                </td>
                <td>
                    <?= $game['team_away_name'] ?> <span style="font-style: italic; opacity: 0.6">(<?= $game['team_away_city'] ?>)</span>
                </td>
                <td>
                    <?= $game['team_home_city'] ?>
                </td>
                <td>
                    <?= $game['score_home'] ?>:<?= $game['score_away'] ?>
                </td>
                <td>
                    <?php if(!empty($game['team_id_winner'])): ?>
                        <?= $game['team_winner_name'] ?>
                    <?php else: ?>
                        -
                    <?php endif ?>
                </td>
                <td>
                    <?php if(empty($game['team_id_winner'])): ?>
                        <a href="scheme.php?competition=<?= $game['competition_id'] ?>&stop_game=<?= $game['id'] ?>">Wedstrijd stoppen</a>
                    <?php else: ?>
                        -
                    <?php endif ?>
                </td>
                <td>
                    <?php if(empty($game['team_id_winner'])): ?>
                        <a href="doelpunt-invoeren.php?game=<?= $game['id'] ?>">Doelpunten invoeren</a>
                    <?php else: ?>
                        -
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endfor; ?>

<a href="index.php">Overzicht</a>

</body>
</html>

