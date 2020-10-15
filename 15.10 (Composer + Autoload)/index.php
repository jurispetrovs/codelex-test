<?php

require_once 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;
use App\Person;

$id = Uuid::uuid4()->toString();
$person = new Person($id, 'Juris');

echo 'ID: ' . $person->getId() . PHP_EOL;
echo 'Name: ' . $person->getName() . PHP_EOL;