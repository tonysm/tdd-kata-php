<?php

class StringWrapper
{
    /**
     * it wraps a given text with line breaks respecting the given
     * max length
     *
     * @param string $text
     * @param int $maxLength
     * @return string
     */
    public function wrap($text, $maxLength)
    {
        if ( ! $text || $this->fitsInTheMaxLength($text, $maxLength))
            return (string) $text;

        $breakpoint = $this->getBreakpoint($text, $maxLength);

        return mb_substr($text, 0, $breakpoint) . "\n" . $this->wrap(trim(mb_substr($text, $breakpoint)), $maxLength);
    }

    /**
     * @param string $text
     * @param int $maxLength
     * @return int
     */
    private function getBreakpoint($text, $maxLength)
    {
        $breakpoint = $this->getLastOccurrenceOfSpaceBeforeLineBreak($text, $maxLength);

        return $breakpoint ?: $maxLength;
    }

    /**
     * @param $text
     * @param $maxLength
     * @return int
     */
    private function getLastOccurrenceOfSpaceBeforeLineBreak($text, $maxLength)
    {
        return strrpos(mb_substr($text, 0, $maxLength), " ");
    }

    /**
     * @param string $text
     * @param int $maxLength
     * @return bool
     */
    private function fitsInTheMaxLength($text, $maxLength)
    {
        return mb_strlen($text) <= $maxLength;
    }
}
