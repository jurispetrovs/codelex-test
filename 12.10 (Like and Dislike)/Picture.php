<?php

class Picture
{
    private string $source;
    private int $likes;

    public function __construct(string $source, int $likes)
    {
        $this->source = $source;
        $this->likes = $likes;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getLikes(): int
    {
        return $this->likes;
    }

    public function addLike(): void
    {
        $this->likes++;
    }

    public function takeAwayLike(): void
    {
        $this->likes--;
    }

    public function pictureToArray(): array
    {
        return [
            $this->getSource(),
            $this->getLikes()
        ];
    }
}