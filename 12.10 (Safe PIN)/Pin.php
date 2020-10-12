<?php

class Pin
{
    private string $pin = '';

    public function getPin(): string
    {
        return $this->pin;
    }

    public function setPin(string $pin): void
    {
        $this->pin = $pin;
    }

    public function getEnteredPinLength(): int
    {
        return strlen($this->pin);
    }

    public function getHiddenNumCount(): string
    {
        return str_repeat('*', $this->getEnteredPinLength());
    }
}
