<?php

class Competition
{
    private array $teams;
    private array $rounds;

    function __construct(array $teams)
    {
        $result = $this->gamesPerRound(6, 1);

        $nextGame = $this->nextGame(6, 1);

        var_dump($nextGame);
        exit;



        $teams[] = [
            'id' => 999,
            'name' => 'Name',
            'deleted' => 0
        ];

        // 1. Shuffle teams
        shuffle($teams);

        $groups = array_chunk($teams, 2);

        $round = new Round(1);

        foreach ($groups as $group) {
            if (count($group) == 2) {
                $game = new Game($group[0], $group[1]);
                $round->addGame($game);
                echo $group[0]['name'] . ' - ' . $group[1]['name'] . '<br>';
            } else {
                // Probleem
                echo $group[0]['name'] . ' - ? <br>';
            }
        }

        //

        exit;
        var_dump($teams);
    }

    // N = Initial Team Count
    // R = Zero-Based Round #
    // Games = (N / (2 ^ R)) / 2
    public function gamesPerRound(int $totalTeams, int $currentRound) : float {
        $result = ($totalTeams / pow(2, $currentRound)) / 2.0;

        // Happens if you exceed the maximum possible rounds given number of teams
        if ($result < 1.0)
            throw new Exception('InvalidOperationException');

        return $result;
    }

    // G = current game.
    // T = total teams
    // Next round game = (T / 2) + RoundedUp(G / 2)
    // i. e.: G = 2, T = 8
    // Next round game = (8 / 2) + RoundedUp(2 / 2) = 5
    public function nextGame(int $totalTeams, int $currentGame) : int {
        return ($totalTeams / 2) + (int)ceil((float)$currentGame / 2);
    }
}