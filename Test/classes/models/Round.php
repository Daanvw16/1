<?php

class Round
{
    private int $number;
    private array $games = [];

    function __construct(int $number)
    {
        $this->number = $number;
    }

    public function addGame(Game $game)
    {
        $this->games[] = $game;
    }
}