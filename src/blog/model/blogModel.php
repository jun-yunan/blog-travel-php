<?php

namespace Blog;

use DateTime;
use DateTimeZone;
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

    public function getAllBlogs($limit, $offset): array
    {
        try {
            if (!$this->database) {
                throw new \PDOException("Database connection is not initialized");
            }
            $sql = "SELECT * FROM `blog` LIMIT :limit OFFSET :offset"; // ORDER BY createdAt DESC
            $data = $this->database->query($sql, ['limit' => $limit, 'offset' => $offset]);
            // var_dump($data);
            return $data;
        } catch (\PDOException $e) {
            error_log("Database error in getAllBlogs: " . $e->getMessage());
            return [];
        }
    }

    public function countAllBlogs(): int
    {
        return $this->database->query('SELECT COUNT(*) as total FROM `blog`')['total'];
    }

    public function createBlog(string $title, string $content)
    {
        $time_now = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
        $formatted_time = $time_now->format('Y-m-d H:i:s');

        $query = "INSERT INTO blog (title, content, createdAt, updatedAt) VALUES ('$title', '$content', '$formatted_time', '$formatted_time')";

        return $this->database->query($query);
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

    public function findBlogById(int $id)
    {
        return $this->database->query("SELECT * FROM `blog` WHERE id = $id");
    }

    public function updateBlogById(int $id, string $title, string $content)
    {
        $time_now = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
        $formatted_time = $time_now->format('Y-m-d H:i:s');

        $query = "UPDATE blog SET title = '$title', content = '$content', updatedAt = '$formatted_time' WHERE id = $id";

        return $this->database->query($query);
    }

    public function searchBlog(string $keyword)
    {
        $sql = "SELECT * FROM blog WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'";
        return $this->database->query($sql);
    }
}
