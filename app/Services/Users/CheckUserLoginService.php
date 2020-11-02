<?php


namespace App\Services\Users;


class CheckUserLoginService
{
    public function execute(string $email, string $password): bool
    {
        $dbPassword = query()
            ->select('password')
            ->from('users')
            ->where('email = :email')
            ->setParameter('email', $email)
            ->execute()
            ->fetchAssociative();

        return password_verify($password, $dbPassword['password']);
    }
}