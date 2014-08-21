<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrimeFactorsSpec extends ObjectBehavior
{
    /** @test */
    function it_computes_prime_factors_of_1()
    {
        $this->generate(1)->shouldReturn([]);
    }

    /** @test */
    function it_computes_prime_factors_of_2()
    {
        $this->generate(2)->shouldReturn([2]);
    }

    /** @test */
    function it_computes_prime_factors_of_3()
    {
        $this->generate(3)->shouldReturn([3]);
    }

    /** @test */
    function it_computes_prime_factors_of_4()
    {
        $this->generate(4)->shouldReturn([2, 2]);
    }

    /** @test */
    function it_computes_prime_factors_of_5()
    {
        $this->generate(5)->shouldReturn([5]);
    }

    /** @test */
    function it_computes_prime_factors_of_6()
    {
        $this->generate(6)->shouldReturn([2, 3]);
    }
    
    /** @test */
    function it_computes_prime_factors_of_9()
    {
        $this->generate(9)->shouldReturn([3, 3]);
    }

    /** @test */
    function it_computes_prime_factors_of_100()
    {
        $this->generate(100)->shouldReturn([2, 2, 5, 5]);
    }
}
