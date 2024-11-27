<?php

/**
 * Array key => url
 * Array value => folder/controller-class/method (index method if none specified)
 */

return [
    "/" => "blog/blog/index",
    "/welcome" => "welcome/welcome/index",
    "/product" => "product/product/samplePage",
    "/blog" => "blog/blog/index",
    "/update-blog" => "blog/blog/updateBlog",
    "/create-blog" => "blog/blog/createBlog",
    "/cap-nhat-thong-tin" => 'blog/blog/createOrUpdateBlog',
    "/user/login" => "user/user/login",
    "/user/register" => "user/user/register",
];
