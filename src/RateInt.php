<?php

namespace App;

/**
 * Интерфейс с обязательным методом для всех тарифов
 */
interface RateInt
{
    public function getPrice();
}
