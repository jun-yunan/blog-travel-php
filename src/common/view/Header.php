<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Light PHP</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <link href="/www/dist/src.css?v=<?= $this->cache_version; ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="/global.css" rel="stylesheet">
    <script src="/app.js"></script>
</head>

<body>

    <?php
    // Custom CSS/JS
    // foreach ($this->output_styles as $style_file) {
    //     echo $style_file;
    // }
    // foreach ($this->output_scripts as $script_file) {
    //     echo $script_file;
    // }
    // 
    ?>

    <?php
    if (isset($_COOKIE['auth'])) {
        echo "Chào mừng " . htmlspecialchars($_COOKIE['username']) . ", bạn đã đăng nhập!";
    } else {
        echo "Bạn chưa đăng nhập. Vui lòng đăng nhập!";
    }
    ?>

    <?php foreach ($data as $i) ?>


    <nav class="fixed z-50 top-0 left-0 right-0 h-[60px] bg-white mb-[60px] shadow-md flex items-center w-full justify-center">
        <div class="w-full flex items-center mx-[150px]">
            <a href="/blog" class="text-2xl font-semibold text-black">Blog Travel</a>
            <div id="" class="flex-1 flex items-center justify-center gap-x-6">
                <a class="text-neutral-600 font-medium text-base hover:text-blue-700 hover:bg-sky-200 transition duration-500 px-6 py-2 rounded-lg" href="index.php?route=blog/blog/index">DASHBOARD</a>
                <a class="text-neutral-600 font-medium text-base hover:text-blue-700 hover:bg-sky-200 transition duration-500 px-6 py-2 rounded-lg" href="index.php?route=blog/blog/createBlog">WRITE BLOG</a>
                <a class="text-neutral-600 font-medium text-base hover:text-blue-700 hover:bg-sky-200 transition duration-500 px-6 py-2 rounded-lg" href="index.php?route=product/product/sample">ABOUT</a>
                <a class="text-neutral-600 font-medium text-base hover:text-blue-700 hover:bg-sky-200 transition duration-500 px-6 py-2 rounded-lg" href="index.php?route=product/product/sample">CONTACT</a>
            </div>
            <?php if (isset($_COOKIE['auth'])): ?>
                <div class="dropdown">
                    <div class="p-2 cursor-pointer hover:bg-gray-300 transition duration-500 rounded-full bg-gray-200" data-bs-toggle="dropdown" aria-expanded="false">
                        <img width="30" height="30" src="https://img.icons8.com/parakeet-line/96/user.png" alt="user" />

                    </div>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><?php echo htmlspecialchars($_COOKIE['author']) ?></a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Dark mode</a></li>
                        <li><a class="dropdown-item" href="#">Log out</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="index?route=user/user/login">
                    <button type="button" class="btn btn-primary">Sign In</button>
                </a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- <ul id="slide-out" class="sidenav">
        <br><br>
        <li><a href="/welcome">Welcome</a></li>
        <li>
            <div class="divider"></div>
        </li>
        <li><a href="index.php?route=product/product/samplePage">Sample</a></li>
        <li><a href="index.php?route=product/product/otherMethod">Not found page</a></li>
    </ul> -->

    <div class="mt-[60px] w-full">
        <!-- <div id="main" class="main"> -->