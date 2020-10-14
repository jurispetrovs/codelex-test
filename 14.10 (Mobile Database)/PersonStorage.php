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
                    $personData[1],
                    $personData[2]
                );
            }
        }
    }

    public function searchPersonByNumber(string $phoneNumber): ?Person
    {
        /** @var Person $person */
        foreach ($this->persons as $person) {
            if($person->getPhoneNumber() === $phoneNumber)
            {
                return $person;
            }
        }
        return null;
    }

    public function searchResult(string $phoneNumber): string
    {
        $result = $this->searchPersonByNumber($phoneNumber);

        if($result !== null)
        {
            return $result->getName() . ' ' . $result->getSurname();
        } else {
            return 'Phone number not found in the database';
        }
    }
}