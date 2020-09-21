<?php

require_once 'app/Spice.php';
require_once 'app/SpicesCollection.php';
require_once 'app/Spices/Salt.php';
require_once 'app/Spices/Pepper.php';

use App\SpicesCollection;
use App\Spice;
use App\Spices\Pepper;
use App\Spices\Salt;

$spices = new SpicesCollection();
$spices->add(new Pepper('Caribbean Red Habanero'));
$spices->add(new Salt('Sea salt'));

foreach ($spices->all() as $spice) {
    /** @var Spice $spice */
    echo $spice->getName() . ' ' . $spice->getWeight() . ' kg' . PHP_EOL;
}