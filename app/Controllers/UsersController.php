<?php


namespace App\Controllers;

use App\Services\Users\CheckUserLoginService;
use App\Services\Users\StoreUserService;

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
        (new StoreUserService())->execute($_POST);

        header('Location: /');
    }

    public function loginCheck()
    {
        $check = (new CheckUserLoginService())->execute($_POST['email'], $_POST['password']);

        if ($check) {
            sleep(2);
            header("Location: /");
        }
    }
}