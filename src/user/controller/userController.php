<?php

namespace User;

use Engine\Base;
use Service\Database;

class UserController extends Base
{

    public function login(): void
    {
        $this->output->load("user/login");
    }

    public function register(): void
    {
        $this->output->load("user/register");
    }

    public function logout(): void
    {
        setcookie('auth', '', time() - 3600, '/');
        setcookie('username', '', time() - 3600, '/');
        header('Location: index.php?route=user/user/login');
    }
}
