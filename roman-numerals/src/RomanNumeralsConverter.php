<?php

class RomanNumeralsConverter
{
    /**
     * @var array
     */
    private static $lookUp = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    /**
     * @param int $number
     * @throws InvalidArgumentException
     * @return string
     */
    public function toRoman($number)
    {
        $this->guardInputNumber($number);

        $conversion = "";

        foreach (static::$lookUp as $candidate => $roman)
        {
            for (; $number >= $candidate; $number -= $candidate)
            {
                $conversion .= $roman;
            }
        }

        return $conversion;
    }

    /**
     * @param $number
     * @throws InvalidArgumentException
     */
    private function guardInputNumber($number)
    {
        if ( ! $number || ! is_numeric($number))
            throw new InvalidArgumentException;
    }
}
