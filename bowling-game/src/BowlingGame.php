<?php

class BowlingGame
{
    const FRAMES_PER_GAME = 10;

    /**
     * @var array
     */
    private $rolls = [];

    /**
     * @param int $pins
     * @throws InvalidArgumentException
     */
    public function roll($pins)
    {
        if ( ! is_numeric($pins) || $pins < 0)
        {
            throw new InvalidArgumentException;
        }
        $this->rolls[] = $pins;
    }

    /**
     * Calculates the score of the match
     *
     * @return int
     */
    public function score()
    {
        $score = 0;
        $roll = 0;

        for ($frame = 1; $frame <= self::FRAMES_PER_GAME; $frame++)
        {
            if ($this->isStrike($roll))
            {
                $score += 10 + $this->getStrikeBonus($roll);
                $roll += 1;
            }
            elseif ($this->isSpare($roll))
            {
                $score += 10 + $this->getSpareBonus($roll);
                $roll += 2;
            } else {
                $score += $this->getDefaultFrameScore($roll);
                $roll += 2;
            }
        }

        return $score;
    }

    /**
     * @param int $roll
     * @return int
     */
    private function getDefaultFrameScore($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    /**
     * @param int $roll
     * @return bool
     */
    private function isSpare($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1] == self::FRAMES_PER_GAME;
    }

    /**
     * @param $roll
     * @return mixed
     */
    private function getSpareBonus($roll)
    {
        return $this->rolls[$roll + 2];
    }

    /**
     * @param $roll
     * @return bool
     */
    private function isStrike($roll)
    {
        return $this->rolls[$roll] == 10;
    }

    /**
     * @param $roll
     * @return mixed
     */
    private function getStrikeBonus($roll)
    {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }
}
