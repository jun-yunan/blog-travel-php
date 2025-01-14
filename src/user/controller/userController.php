<?php

namespace User;

use Engine\Base;

class UserController extends Base
{

    public function signIn(): void
    {
        $this->output->loadNotHeaderFooter("user/signIn");
    }

    public function signUp(): void
    {
        $this->output->loadNotHeaderFooter("user/signUp");
    }

    public function logout(): void
    {
        setcookie('auth', '', time() - 3600, '/');
        setcookie('author', '', time() - 3600, '/');
        header('Location: /user/sign-in');
        exit();
    }

    public function admin(): void
    {
        $this->output->load("user/admin");
    }

    public function notAdmin(): void
    {
        // $this->output->load("user/notAdmin");
        header('Location: /');
    }

    public function profile(): void
    {
        $data = array();
        $user_model = new UserModel();

        if (isset($_COOKIE['author']) && !empty($_COOKIE['author'])) {
            $email = htmlspecialchars($_COOKIE['author']);
            $data['user'] = $user_model->getUserByEmail($email);
        }
        $this->output->load("user/profile", $data);
    }

    public function settings(): void
    {
        $this->output->load("user/settings");
    }

    public function uploadImage()
    {
        try {
            $user_model = new UserModel();

            if (isset($_COOKIE['author']) && !empty($_COOKIE['author'])) {
                $email = htmlspecialchars($_COOKIE['author']);
                $avatar = $_POST['avatar'];
                $user_model->setAvatar($email, $avatar);
                header('Location: index?route=user/user/profile');
            }
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
