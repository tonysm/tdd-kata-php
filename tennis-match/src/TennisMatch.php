<?php

class TennisMatch
{
    /**
     * @var Player
     */
    private $playerOne;

    /**
     * @var Player
     */
    private $playerTwo;

    /**
     * @var array
     */
    private $lookUp = [
        0 => "Love",
        1 => "Fifteen",
        2 => "Thirty",
        3 => "Forty"
    ];

    /**
     * @param Player $playerOne
     * @param Player $playerTwo
     */
    function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function score()
    {
        if ($this->hasWinner())
            return "Win for " . $this->leader()->name;

        if ($this->hasAdvantage())
            return "Advantage " . $this->leader()->name;

        if ($this->inDeuce())
            return "Deuce";

        return $this->generalScore();
    }

    /**
     * @return bool
     */
    private function hasWinner()
    {
        return $this->hasEnoughPointsToEnd()
            && $this->isLeadingByAtLeastTwo();
    }

    /**
     * @return Player
     */
    private function leader()
    {
        return $this->playerOne->points > $this->playerTwo->points
            ? $this->playerOne
            : $this->playerTwo;
    }

    /**
     * @return bool
     */
    private function hasAdvantage()
    {
        return $this->hasEnoughPointsToEnd()
            && $this->isLeadingByOne();
    }

    /**
     * @return bool
     */
    private function hasEnoughPointsToEnd()
    {
        return max($this->playerOne->points, $this->playerTwo->points) >= 4;
    }

    /**
     * @return bool
     */
    private function isLeadingByAtLeastTwo()
    {
        return abs($this->playerOne->points - $this->playerTwo->points) >= 2;
    }

    /**
     * @return bool
     */
    private function inDeuce()
    {
        return $this->playerOne->points + $this->playerTwo->points >= 6 && $this->isTied();
    }

    /**
     * @return bool
     */
    private function isTied()
    {
        return $this->playerOne->points == $this->playerTwo->points;
    }

    /**
     * @return bool
     */
    private function isLeadingByOne()
    {
        return abs($this->playerOne->points - $this->playerTwo->points) == 1;
    }

    /**
     * @return string
     */
    private function generalScore()
    {
        return sprintf(
            "%s - %s",
            $this->lookUp[$this->playerOne->points],
            $this->lookUp[$this->playerTwo->points]
        );
    }
}
