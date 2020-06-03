<?php

namespace App;

/**
 *
 */
abstract class Rate implements RateInt
{

    /**
     *
     */
    protected $distance;

    /**
     *
     */
    protected $time;

    /**
     *
     */
    protected $price;

    /**
     * Rate constructor.
     * @param $transmittedDistance
     * @param $transmittedTime
     */
    public function __construct($transmittedDistance, $transmittedTime)
    {
        $this->distance = $transmittedDistance;
        $this->time = $transmittedTime;
    }

    /**
     *
     */
    public function getPrice()
    {
        $this->price += $this->distance * $this->countDistance + $this->time * $this->countMinutes;
    }

    /**
     *
     */
    protected function roundPrice($price)
    {
        if (is_double($price / 60)) {
            return ceil($price / 60);
        }
        return $price / 60;
    }
}
