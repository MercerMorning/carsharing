<?php

namespace App;

trait AddGps
{

    /**
     * @var bool
     * Статус услуги Gps (включена или выключена)
     */
    protected $onGps = false;

    /**
     * Метод включения услуги Gps
     */
    public function onGps()
    {
        $this->onGps = true;
    }

    /**
     * Выключение услуги Gps
     */
    protected function offGps()
    {
        if ($this->onDriver == true) {
            $this->price -= self::GPS_PRICE_FOR_HOUR;
        }
        $this->onGps = false;
    }
}
