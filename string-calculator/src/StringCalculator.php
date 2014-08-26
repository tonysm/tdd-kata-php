<?php

class StringCalculator
{
    /**
     * @var string
     * @static
     */
    private static $negativesPattern = "/(-[0-9]+)/";

    /**
     * @var string
     * @static
     */
    private static $defaultDelimiterPattern = "(,|\n)";

    /**
     * @var string
     * @static
     */
    private static $changeDelimiterPattern = "/^(?:([^0-9])\n).*/";

    /**
     * @param string $numbers
     * @throws InvalidArgumentException
     * @return int
     */
    public function add($numbers)
    {
        $delimiters = $this->getDelimiters($numbers);

        if ( ! $this->isDefaultDelimiter($delimiters))
            $numbers = $this->removeDelimiterFromString($numbers);

        $numbers = $this->changeDelimitersToDefault($numbers, $delimiters);

        $this->guardAgainstNegativeNumbers($numbers);

        $numbers = $this->splitStringInNumbers($numbers);

        return array_sum($numbers);
    }

    /**
     * @param string $numbers
     * @return string
     */
    private function getDelimiters($numbers)
    {
        if ($this->changedTheDelimiter($numbers))
            return $this->getDelimitersFromInput($numbers);

        return static::$defaultDelimiterPattern;
    }

    /**
     * @param string $numbers
     * @return array
     */
    private function splitStringInNumbers($numbers)
    {
        return preg_split(self::$defaultDelimiterPattern, $numbers);
    }

    /**
     * @param string $numbers
     * @return bool
     */
    private function changedTheDelimiter($numbers)
    {
        return !! preg_match(static::$changeDelimiterPattern, $numbers);
    }

    /**
     * @param string $numbers
     * @return string
     */
    private function getDelimitersFromInput($numbers)
    {
        $matches = null;

        preg_match(static::$changeDelimiterPattern, $numbers, $matches);

        return "/" . $matches[1] . "/";
    }

    /**
     * @param $numbers
     * @return mixed
     */
    private function removeDelimiterFromString($numbers)
    {
        return preg_replace("/^.\n/", "", $numbers);
    }

    /**
     * @param $delimiters
     * @return bool
     */
    private function isDefaultDelimiter($delimiters)
    {
        return $delimiters == static::$defaultDelimiterPattern;
    }

    /**
     * @param $numbers
     * @throws InvalidArgumentException
     */
    private function guardAgainstNegativeNumbers($numbers)
    {
        if (preg_match(self::$negativesPattern, $numbers))
        {
            $negatives = $this->getNegativesFromString($numbers);
            throw new InvalidArgumentException("Negatives not allowed: {$negatives}");
        }
    }

    /**
     * @param $numbers
     * @return string
     */
    private function getNegativesFromString($numbers)
    {
        $matches = null;
        preg_match_all(self::$negativesPattern, $numbers, $matches);
        $negatives = implode(",", $matches[0]);
        return $negatives;
    }

    private function changeDelimitersToDefault($numbers, $delimiters)
    {
        return preg_replace($delimiters, ",", $numbers);
    }
}
