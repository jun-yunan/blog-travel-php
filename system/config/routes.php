<?php

/**
 * Array key => url
 * Array value => folder/controller-class/method (index method if none specified)
 */

return [
    "/" => "blog/blog/redirectToDashboard",
    "/login" => "user/user/login",
    "/logout" => "user/user/logout",
    "/dashboard" => "blog/blog/dashboard",
    "/welcome" => "welcome/welcome/index",
    "/product" => "product/product/samplePage",
    "/blog" => "blog/blog/index",
    "/blog/admin" => isset($_COOKIE['role']) && $_COOKIE['role'] == 'admin' ? "blog/blog/admin" : "blog/blog/notAdmin",
    "/update-blog" => "blog/blog/updateBlog",
    "/create-blog" => "blog/blog/createBlog",
    "/cap-nhat-thong-tin" => 'blog/blog/createOrUpdateBlog',
    "/user/sign-in" => "user/user/signIn",
    "/user/sign-up" => "user/user/signUp",
    "/user/logout" => "user/user/logout",
    "/user/profile" => "user/user/profile",
    "/user/settings" => "user/user/settings",
    "/user/upload-image" => "user/user/uploadImage",
    "/user/admin" => isset($_COOKIE['role']) && $_COOKIE['role'] == 'admin' ? "user/user/admin" : "user/user/notAdmin",
];
