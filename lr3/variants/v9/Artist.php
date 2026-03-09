<?php

class Artist
{
    public string $name;
    public string $style;
    public int $exhibitions;

    public function __construct(string $name = '', string $style = '', int $exhibitions = 0)
    {
        $this->name = $name;
        $this->style = $style;
        $this->exhibitions = $exhibitions;
    }
    public function getInfo(): string
    {
        return "Художник: {$this->name}, Стиль: {$this->style}, Виставки: {$this->exhibitions}";
    }
}