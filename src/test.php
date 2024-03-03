<?php

use Heifetz\Stopwatch;

require(__DIR__ . '/../vendor/autoload.php');

$stopwatch = new Stopwatch(210000);

usleep(500000);
$stopwatch->add('500000');

usleep(200000);
$stopwatch->add('200000');

usleep(300000);
$stopwatch->add('300000');


print_r($stopwatch->getTimings());
