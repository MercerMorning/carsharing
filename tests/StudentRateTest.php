<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class StudentRateTest extends TestCase
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
    public function testHourRateCount()
    {
        $objHourRate = new HourRate(242);
        $objHourRate->setGps();
        $objHourRate->getPrice();
        $this->expected = 5 * $objHourRate->countHours + 15 * 5;
        $this->assertEquals($this->expected, $objHourRate->price);
        $objHourRate = new HourRate(30);
        $objHourRate->setGps();
        $objHourRate->setDriver();
        $objHourRate->getPrice();
        $this->expected = 1 * $objHourRate->countHours + 100;
        $this->assertEquals($this->expected, $objHourRate->price);
        $objHourRate = new HourRate(60);
        $objHourRate->setGps();
        $objHourRate->deleteGps();
        $objHourRate->setGps();
        $objHourRate->setDriver();
        $objHourRate->setDriver();
        $objHourRate->getPrice();
        $this->expected = 1 * $objHourRate->countHours + 100 + 15;
        $this->assertEquals($this->expected, $objHourRate->price);
    }
    public function testStudentRateCount()
    {
        $objStudentRate = new StudentRate(6, 15);
        $objStudentRate->setGps();
        $objStudentRate->getPrice();
        $this->expected = 6 * $objStudentRate->countDistance + 15 * $objStudentRate->countMinutes;
        $this->assertEquals($this->expected, $objStudentRate->price);
    }
}