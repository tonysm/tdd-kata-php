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
        $this->add("2")->shouldBe(2);
        $this->add("3")->shouldBe(3);
    }

    /** @test */
    function it_returns_the_sum_of_multiple_numbers()
    {
        $this->add("1,2")->shouldBe(3);
        $this->add("1,2,1,2")->shouldBe(6);
    }

    /** @test */
    function it_allows_line_break_as_delimiter()
    {
        $this->add("1\n2,3")->shouldBe(6);
        $this->add("1\n2,2,3\n4")->shouldBe(12);
    }

    /** @test */
    function it_allows_user_to_change_the_delimiter()
    {
        $this->add(";\n1;2;3")->shouldBe(6);
    }

    /** @test */
    function it_throws_exception_when_negatives_are_given()
    {
        $this->shouldThrow("InvalidArgumentException")->duringAdd("-1");
    }

    /** @test */
    function it_shows_the_negatives_numbers_in_the_exception()
    {
        $exception = new \InvalidArgumentException("Negatives not allowed: -1,-2");
        $this->shouldThrow($exception)->duringAdd("-1,-2,3");
    }

    /** @test */
    function it_can_change_the_delimiter_to_minus()
    {
        $this->add("-\n1-2")->shouldBe(3);
    }
}
