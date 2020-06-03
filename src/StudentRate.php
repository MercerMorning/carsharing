<?php
namespace App;

class StudentRate extends Rate
{
    use AddGps;
    use AddDriver;
    const GPS_PRICE_FOR_HOUR = 15;
    public $countDistance = 4;
    public $countMinutes = 1;
    public function getPrice()
    {
        parent::getPrice();
        if ($this->onDriver) {
            $this->price += 100;
        }
        if ($this->time >= 60) {
            if ($this->onGps) {
                $this->price += self::GPS_PRICE_FOR_HOUR * $this->roundPrice($this->time);
            }
        }
    }
}
