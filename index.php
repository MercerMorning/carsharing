<?php
require __DIR__ . '/vendor/autoload.php';
$objBasicRate = new App\MainRate(5, 60);
$objBasicRate->setGps();
echo $objBasicRate->getPrice(), PHP_EOL;
$objStudentRate = new App\StudentRate(3, 60);
$objStudentRate->setDriver();
$objStudentRate->setGps();
echo $objStudentRate->getPrice(), PHP_EOL;
$objHourRate= new App\HourRate(3, 60);
$objHourRate->setDriver();
$objHourRate->setGps();
echo $objHourRate->getPrice(), PHP_EOL;





