<?php

namespace User;

use Engine\Base;
use Service\Database;


class UserModel extends Base
{

    public $database;
    public function __construct()
    {
        $this->database = new Database('localhost', 'root', 'blog_travel_db', '', $this->console);
        $this->database->initialize();
    }

    public function getUserById(string $userId): array
    {
        try {
            if (!$this->database) {
                throw new \PDOException("Database connection is not initialized");
            }
            $sql = "SELECT * FROM user WHERE id = :id";
            $data = $this->database->query($sql, [":id" => $userId]);

            return $data;
        } catch (\PDOException $e) {
            error_log("Database error in getAllBlogs: " . $e->getMessage());
            return [];
        }
    }

    public function getUserByEmail(string $email)
    {
        $sql = "SELECT * FROM `user` WHERE email = '$email'";
        $data = $this->database->query($sql);
        return $data;
    }

    public function setAvatar(string $email, string $avatar)
    {
        $sql = "UPDATE `user` SET avatar = '$avatar' WHERE email = '$email'";
        return $this->database->query($sql);
    }

    public function getUser($username, $password)
    {
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";
        $params = array("username" => $username, "password" => md5(($password)));

        return $this->database->query($query, $params);
    }

    public function isUsernameTaken($username)
    {
        $query = "SELECT COUNT(*) FROM user WHERE username = :username";
        $params = array("username" => $username);
        $result = $this->database->query($query, $params);
        return $result['COUNT(*)'] > 0;
    }

    // public function register($username, $password)
    // {
    //     $existUser = $this->isUsernameTaken($username);
    //     if ($existUser) {
    //         return false;
    //     } else {
    //         $hashedPassword = md5($password);
    //         $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    //         $params = array("username" => $username, "password" => $hashedPassword);
    //         return $this->database->query($query, $params);
    //     }
    // }


    public function login($email, $password)
    {
        if (empty($email) || empty($password)) {
            return [
                'status' => 'error',
                'message' => 'Vui lòng điền email và mật khẩu.'
            ];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return [
                'status' => 'error',
                'message' => 'Email không hợp lệ.'
            ];
        }

        $sql = "SELECT * FROM user WHERE email = ?";
        $result = $this->database->query($sql, [$email]);

        if (empty($result)) {
            return [
                'status' => 'error',
                'message' => 'Email không tồn tại.'
            ];
        }

        $user = $result;

        if (password_verify($password, $user['password'])) {
            return [
                'status' => 'success',
                'message' => 'Đăng nhập thành công!',
                'user' => [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    "role" => $user['role']
                ]
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Mật khẩu không đúng.'
            ];
        }
    }


    public function register($name, $email, $password)
    {
        if (empty($name) || empty($email) || empty($password)) {
            return [
                'status' => 'error',
                'message' => 'Vui lòng điền đầy đủ thông tin.'
            ];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return [
                'status' => 'error',
                'message' => 'Email không hợp lệ.'
            ];
        }

        $checkEmail = $this->database->query("SELECT COUNT(*) as count FROM user WHERE email = ?", [$email]);
        if ($checkEmail[0]['count'] > 0) {
            return [
                'status' => 'error',
                'message' => 'Email đã được sử dụng.'
            ];
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (name, email, password, createdAt) VALUES (?, ?, ?, NOW())";
        $params = [$name, $email, $hashedPassword];

        try {
            $this->database->query($sql, $params);
            return [
                'status' => 'success',
                'message' => 'Đăng ký thành công!'
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => 'Đăng ký thất bại: ' . $e->getMessage()
            ];
        }
    }
}
