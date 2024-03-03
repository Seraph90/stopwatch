<?php

declare(strict_types=1);

namespace Heifetz;

class Stopwatch
{

    private float $startTime;
    private ?float $uThreshold;
    private int $precision;
    private array $timings = [];

    public function __construct(?float $uThreshold = null, int $precision = 6)
    {
        if (isset($uThreshold)) {
            $this->setThreshold($uThreshold);
        }
        $this->precision = $precision;

        $this->startTime = microtime(true);
    }

    public function setThreshold(float $uThreshold): self
    {
        $this->uThreshold = $uThreshold / 1000000;

        return $this;
    }

    public function restart(): self
    {
        $this->startTime = microtime(true);

        return $this;
    }

    public function add(?string $name = null): void
    {
        $timing = microtime(true) - $this->startTime;
        if (is_null($name)) {
            $this->timings[] = $timing;
        } else {
            $this->timings[$name] = $timing;
        }
        $this->startTime = microtime(true);
    }

    public function getTimings(): array
    {
        $timings = $this->timings;
        if (!empty($this->uThreshold)) {
            $timings = array_filter($timings, fn($timing) => $timing >= $this->uThreshold);
        }

        return array_map(fn($timing) => round($timing, $this->precision), $timings);
    }

}
