<?php

require_once 'app/Spice.php';
require_once 'app/SpicesCollection.php';

foreach (glob('app/Spices/*.php') as $filename) {
    require_once $filename;
}

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