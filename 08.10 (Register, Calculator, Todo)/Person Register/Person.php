<?php

class Person
{
    private string $name;
    private string $surname;
    private string $personCode;
    private string $address;

    public function __construct(
        string $name,
        string $surname,
        string $personCode,
        string $address
    )
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->personCode = $personCode;
        $this->address = $address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPersonCode(): string
    {
        return $this->personCode;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function personToArray(): array
    {
        return [
            $this->getName(),
            $this->getSurname(),
            $this->getPersonCode(),
            $this->getAddress()
        ];
    }

}
