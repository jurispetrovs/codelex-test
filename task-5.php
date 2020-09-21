<?php

require_once 'app/Spices.php';
require_once 'app/Spices/Salt.php';
require_once 'app/Spices/Pepper.php';
use App\Spices\Pepper;
use App\Spices\Salt;

$spices[] = new Pepper('Caribbean Red Habanero');
$spices[] = new Salt('Sea salt');

foreach ($spices as $spice) {
    echo $spice->getName() . ' ' . $spice->getWeight() . ' kg' . PHP_EOL;
}