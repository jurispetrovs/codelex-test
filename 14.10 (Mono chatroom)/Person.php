<?php

class Person
{
    private int $id;
    private string $name;
    private string $pin;

    public function __construct(int $id, string $name, string $pin)
    {
        $this->id = $id;
        $this->name = $name;
        $this->pin = $pin;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPin(): string
    {
        return $this->pin;
    }
}