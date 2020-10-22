<?php

class PersonStorage
{
    private string $path;
    private $resource;

    private array $persons;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->resource = fopen($this->path, 'rw+');

        $this->loadPersons();
    }

    public function loadPersons(): void
    {
        while (!feof($this->resource)) {
            $personData = fgetcsv($this->resource);

            if ($personData !== false) {
                $this->persons[] = new Person(
                    $personData[0],
                    $personData[1]
                );
            }
        }
    }

    public function getPersonByPin(string $pin): ?Person
    {
        /** @var Person $person */
        foreach ($this->persons as $person) {
            if ($person->getPin() === $pin) {
                return $person;
            }
        }
        return null;
    }
}