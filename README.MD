# Stopwatch – Class for checking delays during code execution

![GitHub Release](https://img.shields.io/github/v/release/alex-heifetz/stopwatch)
![GitHub Downloads (all assets, all releases)](https://img.shields.io/packagist/dt/alex-heifetz/stopwatch)
![GitHub License](https://img.shields.io/github/license/alex-heifetz/stopwatch)
![Packagist Dependency Version](https://img.shields.io/packagist/dependency-v/alex-heifetz/stopwatch/php)


## Why you might need this
If you don’t want to use complex tools for code profiling, but just need to find a place that slows down the execution of all code.

## Installation & loading
Just add this line to your `composer.json` file:

```json
"alex-heifetz/stopwatch": "^1.0"
```

or run

```sh
composer require seraph90/stopwatch
```

## A Simple Example

```php
<?php

// Import Stopwatch class into the global namespace
use Heifetz\Stopwatch;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Create an instance;
// We can set a threshold that doesn't interest us
$stopwatch = new Stopwatch(210000);

usleep(500000);
// Add first time measurement
$stopwatch->add('500000');

usleep(200000);
// Add another, this one must be skipped by threshold
$stopwatch->add('200000');

usleep(300000);
$stopwatch->add('300000');

// Display all timings 
print_r($stopwatch->getTimings());
// Result like:
//
// Array
// (
//     [500000] => 0.505021
//     [300000] => 0.300916
// )
//

```
