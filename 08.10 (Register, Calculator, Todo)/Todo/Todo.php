<?php

class Todo
{
    private string $todo;

    public function __construct(string $todo)
    {
        $this->todo = $todo;
    }

    public function getTodo(): string
    {
        return $this->todo;
    }

    public function todoToArray(): array
    {
        return [
            $this->getTodo()
        ];
    }
}