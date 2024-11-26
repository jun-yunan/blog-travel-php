<?php

namespace Blog;

use Engine\Base;
use Service\Database;


class BlogModel extends Base
{

    public $database;
    public function __construct()
    {
        $this->database = new Database('localhost', 'root', 'blog_travel_db', '', $this->console);
        $this->database->initialize();
        // var_dump($this->database);
    }

    public function getAllBlogs(): array
    {
        try {
            if (!$this->database) {
                throw new \PDOException("Database connection is not initialized");
            }
            $sql = "SELECT * FROM blog ORDER BY createdAt DESC";
            $data = $this->database->query($sql);
            // var_dump($data);
            return $data;
        } catch (\PDOException $e) {
            error_log("Database error in getAllBlogs: " . $e->getMessage());
            return [];
        }
    }


    public function deleteBlogById(int $id)
    {
        try {
            if (!$this->database) {
                throw new \PDOException("Database connection is not initialized");
            }
            $sql = "DELETE FROM `blog` WHERE id = $id";

            return  $this->database->query($sql);
        } catch (\PDOException $e) {
            error_log("Database error in deleteBlogById: " . $e->getMessage());
        }
    }
}
