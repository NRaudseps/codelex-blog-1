<?php


namespace App\Models;


class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $registerCode;
    private string $referredBy;
    private int $referenceCount;

    public function __construct(int $id, string $name, string $email, string $password, string $registerCode, string $referredBy, int $referenceCount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->registerCode = $registerCode;
        $this->referredBy = $referredBy;
        $this->referenceCount = $referenceCount;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function registerCode(): string
    {
        return $this->registerCode;
    }

    public function referredBy(): string
    {
        return $this->referredBy;
    }

    public function referenceCount(): int
    {
        return $this->referenceCount;
    }
}