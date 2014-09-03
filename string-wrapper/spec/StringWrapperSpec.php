<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringWrapperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('StringWrapper');
    }

    /** @test */
    function it_returns_a_string_when_invalid_input_is_given()
    {
        $this->wrap(null, 1)->shouldBe("");
    }

    /** @test */
    function it_returns_the_string_when_it_fits_the_max_length()
    {
        $this->wrap("x", 1)->shouldBe("x");
    }

    /** @test */
    function it_adds_line_breaks_to_the_string_when_it_fits()
    {
        $this->wrap("xx", 1)->shouldBe("x\nx");
        $this->wrap("xxx", 1)->shouldBe("x\nx\nx");
        $this->wrap("xxxxxxxx", 2)->shouldBe("xx\nxx\nxx\nxx");
    }

    /** @test */
    function it_removes_the_space_when_the_next_character_after_the_line_break_is_a_space()
    {
        $this->wrap("x x", 1)->shouldBe("x\nx");
        $this->wrap("xc xc xc xc", 2)->shouldBe("xc\nxc\nxc\nxc");
    }

    /** @test */
    function it_removes_the_space_when_the_character_before_the_line_break_is_a_space()
    {
        $this->wrap("x xc", 3)->shouldBe("x\nxc");
    }

    /** @test */
    function it_wraps_big_strings_to_insert_line_breaks()
    {
        $this->wrap("Lorem ipsum dolor, Lorem ipsúm dolor", 6)->shouldBe("Lorem\nipsum\ndolor,\nLorem\nipsúm\ndolor");
    }
}
