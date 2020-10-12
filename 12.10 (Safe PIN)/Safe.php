<?php

class Safe
{
    private string $pin;

    private bool $locked;

    public function __construct(string $pin, bool $locked = true)
    {
        $this->pin = $pin;
        $this->locked = $locked;
    }

    public function getPin(): string
    {
        return $this->pin;
    }

    public function isLocked(Pin $pin): bool
    {
        if ($this->pin === $pin->getPin()) {
            return false;
        }
        return true;
    }

    public function openSafe(Pin $pin): string
    {
        if ($this->isLocked($pin)) {
            return 'Locked';
        } else {
            return 'Unlocked';
        }
    }

    public function getPinLength(): int
    {
        return strlen($this->pin);
    }

}