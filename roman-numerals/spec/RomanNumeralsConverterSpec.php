<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RomanNumeralsConverterSpec extends ObjectBehavior
{
    /** @test */
    function it_calculates_roman_numerals_for_1()
    {
        $this->toRoman(1)->shouldReturn("I");
    }

    /** @test */
    function it_converts_2_to_roman()
    {
        $this->toRoman(2)->shouldReturn("II");
    }

    /** @test */
    function it_converts_3_to_roman()
    {
        $this->toRoman(3)->shouldReturn("III");
    }

    /** @test */
    function it_converts_4_to_roman()
    {
        $this->toRoman(4)->shouldReturn("IV");
    }

    /** @test */
    function it_converts_5_to_roman()
    {
        $this->toRoman(5)->shouldReturn("V");
    }

    /** @test */
    function it_converts_6_to_roman()
    {
        $this->toRoman(6)->shouldReturn("VI");
    }

    /** @test */
    function it_converts_7_to_roman()
    {
        $this->toRoman(7)->shouldReturn("VII");
    }

    /** @test */
    function it_converts_8_to_roman()
    {
        $this->toRoman(8)->shouldReturn("VIII");
    }

    /** @test */
    function it_converts_9_to_roman()
    {
        $this->toRoman(9)->shouldReturn("IX");
    }

    /** @test */
    function it_converts_10_to_roman()
    {
        $this->toRoman(10)->shouldReturn("X");
    }

    /** @test */
    function it_converts_15_to_roman()
    {
        $this->toRoman(15)->shouldReturn("XV");
    }
    
    /** @test */
    function it_converts_20_to_roman()
    {
        $this->toRoman(20)->shouldReturn("XX");
    }
    
    /** @test */
    function it_converts_50_to_roman()
    {
        $this->toRoman(50)->shouldReturn("L");
    }

    /** @test */
    function it_converts_51_to_roman()
    {
        $this->toRoman(51)->shouldReturn("LI");
    }
    
    /** @test */
    function it_converts_100_to_roman()
    {
        $this->toRoman(100)->shouldReturn("C");
    }
    
    /** @test */
    function it_converts_1000_to_roman()
    {
        $this->toRoman(1000)->shouldReturn("M");
    }
    
    /** @test */
    function it_converts_1999_to_roman()
    {
        $this->toRoman(1999)->shouldReturn("MCMXCIX");
    }

    /** @test */
    function it_converts_1994_to_roman()
    {
        $this->toRoman(1994)->shouldReturn("MCMXCIV");
    }

    /** @test */
    function it_throws_exception_when_the_given_input_is_invalid()
    {
        $this->shouldThrow("InvalidArgumentException")->duringToRoman(0);
    }
}
