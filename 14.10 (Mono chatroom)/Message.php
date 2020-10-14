<?php

class Message
{
    private int $personId;
    private string $message;

    public function __construct(int $personId, string $message)
    {

        $this->personId = $personId;
        $this->message = $message;
    }

    public function getPersonId(): int
    {
        return $this->personId;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function messageToArray(): array
    {
        return [
            $this->personId,
            $this->message
        ];
    }
}