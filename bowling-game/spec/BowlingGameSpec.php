<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingGameSpec extends ObjectBehavior
{
    /** @test */
    function it_scores_a_gutter_game_as_zero()
    {
        $this->rollTimes(20, 0);
        $this->score()->shouldBe(0);
    }
    
    /** @test */
    function it_scores_the_sum_of_all_pins_for_a_game()
    {
        $this->rollTimes(20, 1);
        $this->score()->shouldBe(20);
    }

    /** @test */
    function it_scores_a_spare()
    {
        $this->rollSpare();
        $this->roll(5);

        $this->rollTimes(17, 0);

        $this->score()->shouldBe(20);
    }
    
    /** @test */
    function it_scores_a_strike()
    {
        $this->rollStrike();
        $this->roll(7);
        $this->roll(2);
        $this->rollTimes(17, 0);

        $this->score()->shouldBe(28);
    }

    /** @test */
    function it_scores_a_perfect_game()
    {
        $this->rollTimes(12, 10);

        $this->score()->shouldBe(300);
    }

    /** @test */
    function it_throws_exception_with_invalid_pins_number()
    {
        $this->shouldThrow('InvalidArgumentException')->duringRoll(-1);
    }

    /**
     * @param $times
     * @param $pin
     */
    private function rollTimes($times, $pin)
    {
        foreach (range(1, $times) as $index)
        {
            $this->roll($pin);
        }
    }

    private function rollSpare()
    {
        $this->roll(2);
        $this->roll(8);
    }

    private function rollStrike()
    {
        $this->roll(10);
    }
}
