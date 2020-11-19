<?php

class MessagesStorage
{
    private string $path;
    private $resource;

    private array $messages;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->resource = fopen($this->path, 'rw+');

        $this->loadMessages();
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function saveMessage(int $personId, string $message): void
    {
        $message = new Message(
            $personId,
            $message
        );

        $this->messages[] = $message;

        fputcsv($this->resource, $message->messageToArray(), ';');
    }

    public function loadMessages(): void
    {
        while (!feof($this->resource)) {
            $messageData = fgetcsv($this->resource, 999, ';');

            if ($messageData !== false) {
                $this->messages[] = new Message(
                    $messageData[0],
                    $messageData[1]
                );
            }
        }
    }
}