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
            $data = (array)fgetcsv($this->resource);

            if (filesize($this->path) == 0) {
                $this->persons[] = new Person(
                    'Juris',
                    '54',
                    '765'
                );
            } elseif ($data[0] !== false) {
                $this->persons[] = new Person(
                    (string)$data[0],
                    (int)$data[1],
                    (int)$data[2]
                );
            }
        }
    }

    public function getPersonByName(string $name): Person
    {
        foreach ($this->persons as $person) {
            /** @var Person $person */
            if ($person->getName() === $name) {
                return $person;
            }
        }

        $person = $this->getPersonFromAPI($name);
        fputcsv($this->resource, $person->personToArray());

        return $person;
    }

    public function getPersonFromAPI(string $name): Person
    {
        $data = file_get_contents('https://api.agify.io/?name=' . $name);
        $person = json_decode($data, true);

        return new Person(
            $person['name'],
            $person['age'],
            $person['count']
        );
    }
}