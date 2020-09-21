<?php

require_once 'app/Spices.php';
require_once 'app/Spices/Salt.php';
require_once 'app/Spices/Paper.php';
use App\Spices\Paper;
use App\Spices\Salt;

$spices[] = new Paper('Caribbean Red Habanero');
$spices[] = new Salt('Sea salt');

foreach ($spices as $spice) {
    echo $spice->getName() . ' ' . $spice->getWeight() . ' kg' . PHP_EOL;
}