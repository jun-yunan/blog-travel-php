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

    // public function logout(): void
    // {
    //     setcookie('auth', '', time() - 3600, '/');
    //     setcookie('author', '', time() - 3600, '/');
    //     header('Location: /user/sign-in');
    //     exit();
    // }

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





    public function login()
    {
        $this->output->addJs('js/Notify');
        $user_model = new UserModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $loginMode = $_POST['loginMode'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($loginMode === 'true') {
                $user = $user_model->getUser($username, $password);
                if ($user) {
                    session_regenerate_id(true);
                    $this->session->set('logged', true);
                    header('Location: /dashboard');
                    exit;
                } else {
                    $_SESSION['error-message'] = 'Sai tên đăng nhập hoặc mật khẩu';
                    $this->output->load('user/loginOrRegister');
                }
            } else if ($loginMode === 'false') {
                try {
                    $user = $user_model->register($username, $password);
                    if ($user) {
                        $_SESSION['message'] = 'Đăng ký thành công';
                    } else {
                        $_SESSION['error'] = 'Tên đăng nhập đã tồn tại';
                    }
                } catch (\Exception $e) {
                    $this->console->addDebugInfo("Error during register: " . $e->getMessage());
                    //throw $th;
                    $_SESSION['error'] = 'Có lỗi xảy ra. Vui lòng thử lại';
                }

                header('Location: /');
                exit;
            }
        } else {
            $this->output->load('user/loginOrRegister');
        }
    }

    public function logout()
    {
        unset($_SESSION['logged']);
        header('Location: /');
    }
}
