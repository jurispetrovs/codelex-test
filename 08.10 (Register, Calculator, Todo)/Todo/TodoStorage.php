<?php

class TodoStorage
{
    private string $path;
    private $resource;

    private array $todos;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->resource = fopen($this->path, 'rw+');
        $this->loadTodos();
    }

    public function getTodos(): array
    {
        return $this->todos;
    }

    public function saveTodo($todoData): void
    {
        $todo = new Todo(
            $todoData['todo']
        );

        $this->todos[] = $todo;

        fputcsv($this->resource, $todo->todoToArray());
    }

    public function deleteTodo(int $id): void
    {
        $this->resource = fopen($this->path, 'w+');

        unset($this->todos[$id]);

        /** @var Todo $todo */
        foreach ($this->todos as $todo) {
            fputcsv($this->resource, $todo->todoToArray());
        }
    }

    public function loadTodos(): void
    {
        while (!feof($this->resource)) {
            $todoData = (array)fgetcsv($this->resource);

            if ($todoData[0] !== false) {
                $this->todos[] = new Todo(
                    (string)$todoData[0]
                );
            }
        }
    }
}