<?php

class PersonStorage
{
    private $resource;

    private array $persons;

    public function __construct()
    {
        $this->resource = fopen('./register.csv', 'rw+');
        $this->loadPersons();
    }

    public function getByPersonCode($personData): string
    {
        foreach ($this->persons as $person) {
            /** @var Person $person */
            if ($person->getPersonCode() === $personData['personCode']) {
                return 'Fail';
            }
        }

        return $this->savePerson($personData);
    }

    public function savePerson($personData): string
    {
        $person = new Person(
            $personData['name'],
            $personData['surname'],
            $personData['personCode'],
            $personData['address']
        );

        fputcsv($this->resource, $person->personToArray());
        return 'Success';
    }

    public function loadPersons(): void
    {
        while (!feof($this->resource)) {
            $personData = (array)fgetcsv($this->resource);

            if ($personData[0] !== false) {
                $this->persons[] = new Person(
                    (string)$personData[0],
                    (string)$personData[1],
                    (string)$personData[2],
                    (string)$personData[3],
                );
            }
        }
    }

    public function searchPerson(string $personCode): string
    {
        /** @var Person $person */
        foreach ($this->persons as $person) {
            if ($person->getPersonCode() === $personCode) {
                return $person->getName() . ' ' . $person->getSurname() . ' '
                    . $person->getPersonCode() . ' ' . $person->getAddress();
            }
        }
        return 'Person with "' . $personCode . '" person code does not exist in the register';
    }
}
