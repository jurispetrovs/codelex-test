<?php

class PersonStorage
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function loadPersonsProducts(string $personProducts): array
    {
        $personProducts = trim($personProducts, "{}");
        $personProducts = (array)explode('|', $personProducts);

        return $personProducts;
    }

    public function loadPersons(): array
    {
        $fileContent = file_get_contents($this->path);
        $rows = array_filter((array)explode('/', $fileContent));
        $persons = [];

        foreach ($rows as $row) {
            $personData = (array)explode(';', $row);
            $personProductData = $this->loadPersonsProducts($personData[3]);
            $persons[] = new Person(
                (int)$personData[0],
                (string)trim($personData[1]),
                (int)$personData[2],
                (array)$personProductData
            );
        }

        return $persons;
    }
}