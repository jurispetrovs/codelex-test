<?php

class Person {
    protected string $name;
    protected string $surname;
    protected ?string $middlename;

    public function __construct(string $name, string $surname, ?string $middlename = null) {
        $this->name = $name;
        $this->surname = $surname;
        $this->middlename = $middlename;
    }
    public function name() {
        return $this->name;
    }
    public function surname() {
        return $this->surname;
    }
    public function middlename() {
        return $this->middlename;
    }
}

$person = new Person("Vilis", "Bergmanis");
$person2 = new Person("Baiba", "Broka");
$person3 = new Person("Egils", "Melbardis", "Vladimirovičs");

echo "{$person->name()} {$person->middlename()} {$person->surname()}" . PHP_EOL;
echo "{$person2->name()} {$person2->middlename()} {$person2->surname()}" . PHP_EOL;
echo "{$person3->name()} {$person3->middlename()} {$person3->surname()}" . PHP_EOL;