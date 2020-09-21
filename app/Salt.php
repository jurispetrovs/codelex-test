<?php
namespace App;
use App\Spices\Spices;
class Salt extends Spices
{
    public function getWeight(): float
    {
        return 100.25;
    }
}