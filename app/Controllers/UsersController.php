<?php


namespace App\Controllers;


class UsersController
{
    public function register()
    {
        return require_once __DIR__ . '/../Views/UsersRegisterView.php';
    }

    public function login()
    {
        return require_once __DIR__ . '/../Views/UsersLoginView.php';
    }

    public function store()
    {
        if ($_POST['password'] === $_POST['passwordCheck']) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $registerCode = md5($_POST['email']);
            $referredBy = $_POST['r'];

            if(!empty($referredBy)){
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

            header('Location: /');
        }
    }

    public function loginCheck()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $dbPassword = query()
            ->select('password')
            ->from('users')
            ->where('email = :email')
            ->setParameter('email', $email)
            ->execute()
            ->fetchAssociative();

        if(password_verify($password, $dbPassword['password'])){
            sleep(2);
            header("Location: /");
        }
    }
}