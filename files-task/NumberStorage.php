<?php

class NumberStorage
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function addNumber(int $randNumber): void
    {
        file_put_contents($this->path, $randNumber . ' ', FILE_APPEND);
    }

    public function loadNumbers(): array
    {
        return (array)explode(' ', trim(file_get_contents($this->path)));
    }
}