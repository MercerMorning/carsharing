<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class HourRateTest extends TestCase
{
    const ORDER_COUNT_MINUTES = 242;

    /**
     * Тариф без дополнительных услуг
     */
    public function testNonService()
    {
        $rate = new App\HourRate(self::ORDER_COUNT_MINUTES);
        $this->assertEquals(1000, $rate->getPrice());
    }

    /**
     * Тариф с включенным gps
     */
    public function testIncludeGps()
    {
        $rate = new App\HourRate(self::ORDER_COUNT_MINUTES);
        $rate->onGps();
        $this->assertEquals(1075, $rate->getPrice());
    }

    /**
     * Тариф с включенным водителем
     */
    public function testIncludeDriver()
    {
        $rate = new App\HourRate(self::ORDER_COUNT_MINUTES);
        $rate->onDriver();
        $this->assertEquals(1100, $rate->getPrice());
    }

    /**
     * Тариф с включенным водителем и gps
     */
    public function testIncludeGpsAndDriver()
    {
        $rate = new App\HourRate(self::ORDER_COUNT_MINUTES);
        $rate->onDriver();
        $rate->onGps();
        $this->assertEquals(1175, $rate->getPrice());
    }

    /**
     * Тариф с дважды включенным водителем и gps
     */
    public function testIncludeGpsAndDoubleDriver()
    {
        $rate = new App\HourRate(self::ORDER_COUNT_MINUTES);
        $rate->onDriver();
        $rate->onDriver();
        $rate->onGps();
        $this->assertEquals(1175, $rate->getPrice());
    }

    /**
     * Тариф с включенным водителем и дважды включенным gps
     */
    public function testIncludeDoubleGpsAndDriver()
    {
        $rate = new App\HourRate(self::ORDER_COUNT_MINUTES);
        $rate->onDriver();
        $rate->onGps();
        $rate->onGps();
        $this->assertEquals(1175, $rate->getPrice());
    }
}