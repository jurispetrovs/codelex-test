<?php

class Investment
{
    private float $capital;
    private int $years;
    private float $percent;
    private int $currentYear = 1;

    public function __construct(float $capital, int $years, float $percent)
    {
        $this->capital = $capital;
        $this->years = $years;
        $this->percent = $percent;
    }

    public function getCapital(): float
    {
        return $this->capital;
    }

    public function getYears(): int
    {
        return $this->years;
    }

    public function getPercent(): float
    {
        return ($this->percent / 100);
    }

    public function getCurrentYear(): int
    {
        return $this->currentYear;
    }

    public function setCapital()
    {
        $this->currentYear++;
        return $this->capital += $this->capital * $this->getPercent();
    }
}