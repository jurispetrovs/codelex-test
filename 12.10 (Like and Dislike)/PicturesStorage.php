<?php

class PicturesStorage
{
    private string $path;
    private $resource;

    private array $pictures;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->resource = fopen($path, 'rw+');

        $this->loadPictures();
    }

    public function getPictures(): array
    {
        return $this->pictures;
    }

    public function getPictureByIndex(int $index): Picture
    {
        return $this->pictures[$index];
    }

    public function loadPictures(): void
    {
        while (!feof($this->resource)) {
            $pictureData = (array)fgetcsv($this->resource);

            if ($pictureData[0] !== false) {
                $this->pictures[] = new Picture(
                    (string)$pictureData[0],
                    (int)$pictureData[1]
                );
            }
        }
    }

    public function savePictures(): void
    {
        $this->resource = fopen($this->path, 'w+');

        /** @var Picture $picture */
        foreach ($this->pictures as $picture) {
            fputcsv($this->resource, $picture->pictureToArray());
        }
    }
}