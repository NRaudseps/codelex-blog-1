<?php


namespace App\Services\Users;


class StoreUserService
{
    public function execute(array $post): void
    {
        if ($post['password'] === $post['passwordCheck']) {
            $name = $post['name'];
            $email = $post['email'];
            $password = password_hash($post['password'], PASSWORD_DEFAULT);
            $registerCode = md5($post['email']);
            $referredBy = $post['r'];


            if (!empty($referredBy)) {
                query()
                    ->update('users')
                    ->set('reference_count', 'reference_count + 1')
                    ->where('register_code = :register_code')
                    ->setParameter('register_code', $referredBy)
                    ->execute();
            }

            $userQuery = query()
                ->insert('users')
                ->values([
                    'name' => '?',
                    'email' => '?',
                    'password' => '?',
                    'register_code' => '?',
                    'referred_by' => '?',
                    'reference_count' => '0'
                ])
                ->setParameter(0, $name)
                ->setParameter(1, $email)
                ->setParameter(2, $password)
                ->setParameter(3, $registerCode)
                ->setParameter(4, $referredBy)
                ->execute();
        }
    }
}