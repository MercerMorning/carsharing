<?php

namespace App;

/**
 * Class StudentRate
 * @package App
 * Класс студенческого тарифа
 */
class StudentRate extends Rate
{
    use AddGps;
    use AddDriver;

    /**
     * Цена за пройденное расстояние во время использования тарифа
     */
    const PRICE_FOR_DISTANCE = 4;

    /**
     * Цена за использование тарифа в течение минуты
     */
    const PRICE_FOR_MINUTES = 1;

    /**
     * Получение общей цены
     */
    public function getPrice()
    {
        parent::getPrice();

        $this->price += $this->distance * self::PRICE_FOR_DISTANCE + $this->time * self::PRICE_FOR_MINUTES;
        return $this->price;
    }
}
