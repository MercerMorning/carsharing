<?php
require __DIR__ . '/vendor/autoload.php';
$mainRate = new App\MainRate(5, 60);
$mainRate->onGps();
echo $mainRate->getPrice(), PHP_EOL;
$studentRate = new App\StudentRate(3, 60);
$studentRate->onDriver();
$studentRate->onGps();
echo $studentRate->getPrice(), PHP_EOL;
$hourRate= new App\HourRate(3, 60);
$hourRate->onDriver();
$hourRate->onGps();
echo $hourRate->getPrice(), PHP_EOL;





