<?php

namespace Blog;

use Engine\Base;

class BlogController extends Base
{

    public function index(): void
    {
        $blog_model = new BlogModel();

        $data = array();

        $limit = 10;

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $offset = ($page - 1) * $limit;

        $data['blogs'] = $blog_model->getAllBlogs($limit, $offset);

        $total_blogs = $blog_model->countAllBlogs();

        $total_pages = ceil($total_blogs / $limit);

        $data['total_pages'] = $total_pages;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            try {
                $blog_model->deleteBlogById($id);
                $_SESSION['message'] = "Blog deleted successfully";
            } catch (\Exception $e) {
                $_SESSION['error'] = "Error deleting blog" . $e->getMessage();
            }
            header('Location: index.php?route=blog/blog/index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $keyword = $_GET['keyword'];
            if ($keyword) {
                $result = $blog_model->searchBlog($keyword);
                $data['blogs'] = empty($result) ? array() : (isset($result[0]) ? $result : array($result));
            } else {
                $data['blogs'] = $blog_model->getAllBlogs($limit, $offset);
            }
        }
        $this->output->addJs('/js/Notify');
        $this->output->load("blog/listBlog", $data);
    }

    public function dashboard(): void
    {
        $blog_model = new BlogModel();
        $data = array();
        $limit = 10;

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $offset = ($page - 1) * $limit;
        $data['blogs'] = $blog_model->getAllBlogs($limit, $offset);
        $this->output->load("blog/dashboard", $data);
    }

    public function redirectToDashboard(): void
    {
        header('Location: /dashboard');
    }

    public function notAdmin(): void
    {
        header('Location: /');
    }

    public function admin(): void
    {
        $blog_model = new BlogModel();
        $data = array();
        $limit = 10;

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        $offset = ($page - 1) * $limit;
        $data['blogs'] = $blog_model->getAllBlogs($limit, $offset);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            try {
                $blog_model->deleteBlogById($id);
                $_SESSION['message'] = "Blog deleted successfully";
            } catch (\Exception $e) {
                $_SESSION['error'] = "Error deleting blog" . $e->getMessage();
            }
            header('Location: index.php?route=blog/blog/index');
            exit;
        }
        $this->output->addJs('/js/Notify');
        $this->output->load("blog/listBlog", $data);
    }

    public function createBlog(): void
    {
        $data = array();
        $blog_model = new BlogModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $blog_model->createBlog($title, $content);
            header('Location: index.php?route=blog/blog/index');
        }
        $this->output->load("blog/createBlog", $data);
    }

    public function updateBlog()
    {
        $data = array();
        $blog_model = new BlogModel();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_GET["id"];
            $title = $_POST["title"];
            $content = $_POST["content"];

            $blog_model->updateBlogById($id, $title, $content);
            header("Location: /blog");
        } else {
            if ($_GET['id']) {
                $data['blog'] = $blog_model->findBlogById($_GET['id']);
            }
        }

        $this->output->load('blog/updateBlog', $data);
    }

    public function createOrUpdateBlog()
    {
        $data = array();
        $blog_model = new BlogModel();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_GET["id"];
            $title = $_POST["title"];
            $content = $_POST["content"];

            if ($id) {
                try {
                    $blog_model->updateBlogById($id, $title, $content);
                    $_SESSION['message'] = "Blog updated successfully";
                } catch (\Exception $e) {
                    $this->console->addError('Error during update' . $e->getMessage());
                    $_SESSION['error'] = "Error updating blog";
                }
            } else {
                try {
                    $blog_model->createBlog($title, $content);
                    $_SESSION['message'] = "Blog created successfully";
                } catch (\Exception $e) {
                    $this->console->addError('Error during create' . $e->getMessage());
                    $_SESSION['error'] = "Error creating blog";
                }
            }
            header("Location: /blog");
        } else {
            if ($_GET['id']) {
                $data['blog'] = $blog_model->findBlogById($_GET['id']);
            }
        }

        $this->output->load('blog/createOrUpdateBlog', $data);
    }
}
