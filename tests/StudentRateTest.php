<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class StudentRateTest extends TestCase
{
    const ORDER_COUNT_MINUTES = 242;
    const ORDER_COUNT_KM = 5;

    /**
     * Тариф без дополнительных услуг
     */
    public function testNonService()
    {
        $rate = new App\StudentRate(self::ORDER_COUNT_KM,self::ORDER_COUNT_MINUTES);
        $this->assertEquals(262, $rate->getPrice());
    }

    /**
     * Тариф с включенным gps
     */
    public function testIncludeGps()
    {
        $rate = new App\StudentRate(self::ORDER_COUNT_KM,self::ORDER_COUNT_MINUTES);
        $rate->onGps();
        $this->assertEquals(337, $rate->getPrice());
    }

    /**
     * Тариф с включенным водителем
     */
    public function testIncludeDriver()
    {
        $rate = new App\StudentRate(self::ORDER_COUNT_KM,self::ORDER_COUNT_MINUTES);
        $rate->onDriver();
        $this->assertEquals(362, $rate->getPrice());
    }

    /**
     * Тариф с включенным водителем и gps
     */
    public function testIncludeGpsAndDriver()
    {
        $rate = new App\StudentRate(self::ORDER_COUNT_KM,self::ORDER_COUNT_MINUTES);
        $rate->onDriver();
        $rate->onGps();
        $this->assertEquals(437, $rate->getPrice());
    }

    /**
     * Тариф с дважды включенным водителем и gps
     */
    public function testIncludeGpsAndDoubleDriver()
    {
        $rate = new App\StudentRate(self::ORDER_COUNT_KM,self::ORDER_COUNT_MINUTES);
        $rate->onDriver();
        $rate->onDriver();
        $rate->onGps();
        $this->assertEquals(437, $rate->getPrice());
    }

    /**
     * Тариф с включенным водителем и дважды включенным gps
     */
    public function testIncludeDoubleGpsAndDriver()
    {
        $rate = new App\StudentRate(self::ORDER_COUNT_KM,self::ORDER_COUNT_MINUTES);
        $rate->onDriver();
        $rate->onGps();
        $rate->onGps();
        $this->assertEquals(437, $rate->getPrice());
    }
}