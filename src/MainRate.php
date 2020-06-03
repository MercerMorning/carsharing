<?php

namespace App;

/**
 * Class MaincRate
 */
class MainRate extends Rate
{
    use AddGps;
    use AddDriver;

    /**
     *
     */
    const GPS_PRICE_FOR_HOUR = 15;

    /**
     *
     */
    protected $countDistance = 10;

    /**
     *
     */
    protected $countMinutes = 3;

    /**
     *
     */
    public function getPrice()
    {
        parent::getPrice();

        if ($this->onDriver) {
            $this->price += 100;
        }

        if ($this->time >= 60 && $this->onGps) {
            $this->price += self::GPS_PRICE_FOR_HOUR * $this->roundPrice($this->time);
        }
    }
}