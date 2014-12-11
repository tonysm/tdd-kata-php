<?php

class Player
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $points;

    /**
     * @param string $name
     * @param int $points
     */
    function __construct($name, $points)
    {
        $this->name = $name;
        $this->points = $points;
    }

} 