<?php


namespace App\Models;


class Tag
{
    private int $id;
    private string $name;
    private string $created_at;

    public function __construct(int $id, string $name, string $created_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->created_at = $created_at;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function created_ad(): string
    {
        return $this->created_at;
    }
}