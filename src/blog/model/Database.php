<?php 
namespace Blog;
class Database {
    private $connect;
    public function __construct() {
        $this->connect = new \PDO("mysql:host=localhost;dbname=blog_travel_db", "root", "");
        $this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $this->connect;
    }
}