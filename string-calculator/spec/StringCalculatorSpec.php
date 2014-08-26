<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('StringCalculator');
    }

    /** @test */
    function it_returns_0_for_empty_string()
    {
        $this->add("")->shouldBe(0);
    }

    /** @test */
    function it_returns_the_number_when_one_number_is_given()
    {
        $this->add("1")->shouldBe(1);
    }

    /** @test */
    function it_returns_the_sum_of_two_numbers()
    {
        $this->add("1,2")->shouldBe(3);
    }
}
