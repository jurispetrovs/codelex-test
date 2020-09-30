<?php

require_once 'NumberGenerator.php';
require_once 'NumberStorage.php';

$path = './numbers.txt';
$storage = new NumberStorage($path);

$randNumberGenerator = new NumberGenerator(1, 1000);
$randNumber = $randNumberGenerator->getRandomNumber();

$storage->addNumber($randNumber);
$numbersList = $storage->loadNumbers();

echo 'Number added: ' . $randNumber . PHP_EOL;
echo 'AVG: ' . $randNumberGenerator->getAverage($numbersList) . PHP_EOL;