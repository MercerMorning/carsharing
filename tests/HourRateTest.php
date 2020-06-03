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
        $rate = new HourRate(self::ORDER_COUNT_MINUTES);
        $this->assertEquals(1, $rate->getPrice());
    }

    /**
     * Тариф с включенным gps
     */
    public function testIncludeGps()
    {
        $rate = new HourRate(self::ORDER_COUNT_MINUTES);
        $rate->setGps();
        $this->assertEquals(1, $rate->getPrice());
    }

    /**
     * Тариф с включенным водителем
     */
    public function testIncludeDriver()
    {
        $rate = new HourRate(self::ORDER_COUNT_MINUTES);
        $rate->setDriver();
        $this->assertEquals(1, $rate->getPrice());
    }

    /**
     * Тариф с включенным водителем и gps
     */
    public function testIncludeGpsAndDriver()
    {
        $rate = new HourRate(self::ORDER_COUNT_MINUTES);
        $rate->setDriver();
        $rate->setGps();
        $this->assertEquals(1, $rate->getPrice());
    }

    /**
     * Тариф с дважды включенным водителем и gps
     */
    public function testIncludeGpsAndDoubleDriver()
    {
        $rate = new HourRate(self::ORDER_COUNT_MINUTES);
        $rate->setDriver();
        $rate->setDriver();
        $rate->setGps();
        $this->assertEquals(1, $rate->getPrice());
    }

    /**
     * Тариф с включенным водителем и дважды включенным gps
     */
    public function testIncludeDoubleGpsAndDriver()
    {
        $rate = new HourRate(self::ORDER_COUNT_MINUTES);
        $rate->setDriver();
        $rate->setGps();
        $rate->setGps();
        $this->assertEquals(1, $rate->getPrice());
    }
}