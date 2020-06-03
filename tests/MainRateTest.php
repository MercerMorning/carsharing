<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class MainRateTest extends TestCase
{
    public $expected;
    public function testBasicRateCount()
    {
        $mainRate = new BasicRate(5, 60);
        $mainRate->setGps();
        $mainRate->getPrice();
        $this->expected = 5 * $mainRate->countDistance + 60 * $mainRate->countMinutes + 15;
        $this->assertEquals($this->expected, $mainRate->price);
        $mainRate = new BasicRate(3, 59);
        $mainRate->setGps();
        $mainRate->setDriver();
        $mainRate->getPrice();
        $this->expected = 3 * $mainRate->countDistance + 59 * $mainRate->countMinutes + 100;
        $this->assertEquals($this->expected, $mainRate->price);
        $mainRate = new BasicRate(10, 122);
        $mainRate->setGps();
        $mainRate->deleteGps();
        $mainRate->setGps();
        $mainRate->setDriver();
        $mainRate->setDriver();
        $mainRate->getPrice();
        $this->expected = 10 * $mainRate->countDistance + 122 * $mainRate->countMinutes + 100 + 45;
        $this->assertEquals($this->expected, $mainRate->price);
    }
}