<?php

require_once 'app/Spices/Spices.php';
require_once 'app/Salt.php';
require_once 'app/Paper.php';
use App\Spices\Spices;
use App\Paper;
use App\Salt;

$spices[] = new Paper('Caribbean Red Habanero');
$spices[] = new Salt('Sea salt');

foreach ($spices as $spice) {
    echo $spice->getName() . ' ' . $spice->getWeight() . ' kg' . PHP_EOL;
}