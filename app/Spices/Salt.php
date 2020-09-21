<?php
namespace App\Spices;
use App\Spice;
class Salt extends Spice
{
    public function getWeight(): float
    {
        return 100.25;
    }
}