<?php

class StringCalculator
{
    /**
     * @param string $numbers
     * @throws InvalidArgumentException
     * @return int
     */
    public function add($numbers)
    {
        $delimiters = $this->getDelimiters();

        $numbers = preg_split($delimiters, $numbers);

        return array_sum($numbers);
    }

    /**
     * @return string
     */
    private function getDelimiters()
    {
        return "(,|\n)";
    }
}
