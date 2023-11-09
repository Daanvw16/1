<?php

class Game
{
    private $team1;
    private $team2;

    function __construct(array $team1, array $team2)
    {
        $this->team1 = $team1;
        $this->team2 = $team2;
    }
}