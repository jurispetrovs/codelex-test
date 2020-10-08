<?php

class NumberGenerator
{
    private int $min;
    private int $max;

    public function __construct(int $min = 1, int $max = 100)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function getRandomNumber(): int
    {
        return rand($this->min, $this->max);
    }

    public function getAverage(array $numbersList): float
    {
        return number_format(array_sum($numbersList) / count($numbersList), 2);
    }
}