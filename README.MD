# Stopwatch – Class for checking delays during code execution

[![Latest Stable Version](http://poser.pugx.org/seraph90/stopwatch/v)](https://packagist.org/packages/seraph90/stopwatch)
[![Total Downloads](http://poser.pugx.org/seraph90/stopwatch/downloads)](https://packagist.org/packages/seraph90/stopwatch)
[![License](http://poser.pugx.org/seraph90/stopwatch/license)](https://packagist.org/packages/seraph90/stopwatch)
[![PHP Version Require](http://poser.pugx.org/seraph90/stopwatch/require/php)](https://packagist.org/packages/seraph90/stopwatch)

## Why you might need this
If you don’t want to use complex tools for code profiling, but just need to find a place that slows down the execution of all code.

## Installation & loading
Just add this line to your `composer.json` file:

```json
"seraph90/stopwatch": "^1.0"
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
