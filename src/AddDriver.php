<?php

namespace App;

trait AddDriver
{

    /**
     * @var bool
     * Состояние услуги "Дополнительный водитель"(включена или выключена)
     */
    protected $onDriver = false;

    /**
     * Включение услуги "Дополнительный водитель"
     */
    public function onDriver()
    {
        $this->onDriver = true;
    }

    /**
     * Выключение услуги "Дополнительный водитель"
     */
    protected function offDriver()
    {
        if ($this->onDriver == true) {
            $this->price -= self::COST_OF_DRIVER;
        }
        $this->onDriver = false;
    }
}
