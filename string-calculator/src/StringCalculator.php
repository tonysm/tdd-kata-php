<?php

class StringCalculator
{
    /**
     * @param string $numbers
     * @return int
     */
    public function add($numbers)
    {
        return array_sum(explode(",", $numbers));
    }
}
