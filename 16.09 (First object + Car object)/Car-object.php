<?php

Class Auto {
    private string $name;
    private int $tank;
    public function __construct(string $name, int $tank) {
        $this->name = $name;
        $this->tank = $tank;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getTank(): int {
        return $this->tank;
    }
}

class Audi extends Auto {
    public function uniqAudiFeature(): string {
        return "Laser headlights";
    }
}

class BMW extends Auto {
    public function getTank(): int {
        return $tank = 120;
    }
}

class Mercedes extends Auto {
    public function uniqMercedesFeature(): string {
        return "BBS wheels";
    }
}

$autoDealership = [
    new Audi("RS6", 80),
    new BMW("M5", 90),
    new Mercedes("C63 AMG", 70)

];

foreach ($autoDealership as $auto) {
    if ($auto instanceof BMW) {
        echo "{$auto->getName()} ({$auto->getTank()})" . PHP_EOL;
    } elseif ($auto instanceof Audi) {
        echo "{$auto->getName()} ({$auto->getTank()}) {$auto->uniqAudiFeature()}" . PHP_EOL;
    } elseif($auto instanceof Mercedes) {
        echo "{$auto->getName()} ({$auto->getTank()}) {$auto->uniqMercedesFeature()}" . PHP_EOL;
    }
}