<?php

namespace App;

/**
 * Class HourRate
 * @package App
 * Класс почасовго тарифа
 */
class HourRate extends Rate
{
    use AddGps;
    use AddDriver;

    /**
     * Цена за использование тарифа в течение часа
     */
    const RATE_PRICE_FOR_HOUR = 200;

    /**
     * HourRate constructor.
     * @param $transmittedTime
     * Установка пройденного времени
     */
    public function __construct($transmittedTime)
    {
        $this->time = $transmittedTime;
    }

    /**
     * Получение общей цены
     */
    public function getPrice()
    {
        parent::getPrice();

        $this->price += $this->roundPrice($this->time) * self::RATE_PRICE_FOR_HOUR;
        return $this->price;
    }
}
