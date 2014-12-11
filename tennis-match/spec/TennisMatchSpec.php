<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TennisMatchSpec extends ObjectBehavior
{
    /**
     * @var \Player
     */
    private $playerOne;
    /**
     * @var \Player
     */
    private $playerTwo;
    function let()
    {
        $this->playerOne = new \Player("John Doe", 0);
        $this->playerTwo = new \Player("Jane Doe", 0);
        $this->beConstructedWith($this->playerOne, $this->playerTwo);
    }
    function it_scores_0_0()
    {
        $this->score()->shouldBe("Love - Love");
    }

    function it_scores_1_0()
    {
        $this->playerOne->points = 1;
        $this->score()->shouldBe("Fifteen - Love");
    }

    function it_scores_2_0()
    {
        $this->playerOne->points = 2;
        $this->score()->shouldBe("Thirty - Love");
    }

    function it_scores_3_0()
    {
        $this->playerOne->points = 3;
        $this->score()->shouldBe("Forty - Love");
    }

    function it_scores_4_0()
    {
        $this->playerOne->points = 4;
        $this->score()->shouldBe("Win for John Doe");
    }

    function it_scores_0_4()
    {
        $this->playerTwo->points = 4;
        $this->score()->shouldBe("Win for Jane Doe");
    }

    function it_scores_4_3()
    {
        $this->playerOne->points = 4;
        $this->playerTwo->points = 3;
        $this->score()->shouldBe("Advantage John Doe");
    }

    function it_scores_3_4()
    {
        $this->playerOne->points = 3;
        $this->playerTwo->points = 4;
        $this->score()->shouldBe("Advantage Jane Doe");
    }

    function it_scores_4_4()
    {
        $this->playerOne->points = 4;
        $this->playerTwo->points = 4;
        $this->score()->shouldBe("Deuce");
    }
}
