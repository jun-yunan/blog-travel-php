<?php

namespace Blog;

use Engine\Base;

class BlogController extends Base
{

    public function index(): void
    {
        $blog_model = new BlogModel();
        $data = array();
        $data['blogs'] = $blog_model->getAllBlogs();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $blog_model->deleteBlogById($_POST['id']);
            header('Location: index.php?route=blog/blog/index');
        }
        $this->output->load("blog/listBlog", $data);
    }

    public function createBlog(): void
    {
        $this->output->load("blog/createBlog");
    }
}
