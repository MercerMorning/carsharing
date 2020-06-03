<?php

namespace App;

/**
 * Класс с основными свойствами и методами, которые имеются во всех тарифах
 */
abstract class Rate implements RateInt
{
    /**
     * Стоимость услуги "Дополнительный водитель"
     */
    const COST_OF_DRIVER = 100;

    /**
     * Стоимость услуги gps за час
     */
    const GPS_PRICE_FOR_HOUR = 15;

    /**
     * Пройденное расстояние во время использования тарифа
     */
    protected $distance;

    /**
     * Пройденное время во время использования тарифа
     */
    protected $time;

    /**
     * Общая цена за использование тарифа и дополнительных услуг
     */
    protected $price;

    /**
     * Rate constructor.
     * пройденное расстояние
     * @param $transmittedDistance
     * пройденное время
     * @param $transmittedTime
     * Установка пройденного расстояния и времени
     */

    public function __construct($transmittedDistance, $transmittedTime)
    {
        $this->distance = $transmittedDistance;
        $this->time = $transmittedTime;
    }

    /**
     * Получение общей цены
     */
    public function getPrice()
    {
        if ($this->onDriver) {
            $this->price += self::COST_OF_DRIVER;
        }

        if ($this->time >= 60 && $this->onGps) {
            $this->price += self::GPS_PRICE_FOR_HOUR * $this->roundPrice($this->time);
        }
    }

    /**
     * Округление до часа
     */
    protected function roundPrice($price)
    {
        if (is_double($price / 60)) {
            return ceil($price / 60);
        }
        return $price / 60;
    }
}
