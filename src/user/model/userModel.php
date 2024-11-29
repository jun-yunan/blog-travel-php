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
}
