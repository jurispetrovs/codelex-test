<?php

class Person1 {
    protected string $name;
    protected string $surname;
    protected ?string $middleName;

    public function __construct(string $name, string $surname, string $middleName = null) {
        $this->name = $name;
        $this->surname = $surname;
        $this->middleName = $middleName;
    }
    public function name(): string {
        return $this->name;
    }
    public function surname(): string {
        return $this->surname;
    }
    public function middleName(): ?string {
        return $this->middleName;
    }
}

$person = new Person1("Vilis", "Bergmanis");
$person2 = new Person1("Baiba", "Broka");
$person3 = new Person1("Egils", "Melbardis", "Vladimirovičs");

echo "{$person->name()} {$person->middleName()} {$person->surname()}" . PHP_EOL;
echo "{$person2->name()} {$person2->middleName()} {$person2->surname()}" . PHP_EOL;
echo "{$person3->name()} {$person3->middleName()} {$person3->surname()}" . PHP_EOL;