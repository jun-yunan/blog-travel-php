<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Travel</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <link href="/www/dist/src.css?v=<?= $this->cache_version; ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


    <script>
        async function getUserByEmail() {
            try {
                const response = await axios.get('http://localhost:3001/api/users/<?php echo $_COOKIE['author'] ?>', {
                    withCredentials: true,
                })
                if (response.status === 200) {
                    console.log(response.data);
                }
            } catch (error) {
                console.log(error);

            }
        }

        getUserByEmail();
    </script>


    <nav class="fixed z-50 top-0 left-0 right-0 h-[60px] bg-white mb-[60px] shadow-md flex items-center w-full justify-center">
        <div class="w-full flex items-center mx-[150px]">
            <a class="text-2xl font-semibold text-black rounded-full overflow-hidden">
                <img src="./assets/images/logo.jpg" class="object-cover" width="48" height="48" alt="">
            </a>

            <div id="" class="flex-1 flex items-center justify-center gap-x-6">
                <a class="text-neutral-600 font-medium text-base hover:text-blue-700 hover:bg-sky-200 transition duration-500 px-6 py-2 rounded-lg" href="/">DASHBOARD</a>
                <a class="text-neutral-600 font-medium text-base hover:text-blue-700 hover:bg-sky-200 transition duration-500 px-6 py-2 rounded-lg" href="index.php?route=blog/blog/createBlog">WRITE BLOG</a>
                <a class="text-neutral-600 font-medium text-base hover:text-blue-700 hover:bg-sky-200 transition duration-500 px-6 py-2 rounded-lg" href="index.php?route=product/product/sample">ABOUT</a>
                <a class="text-neutral-600 font-medium text-base hover:text-blue-700 hover:bg-sky-200 transition duration-500 px-6 py-2 rounded-lg" href="index.php?route=product/product/sample">CONTACT</a>
                <?php if (isset($_SESSION['logged']) && $_SESSION['logged']): ?>
                    <a class="text-neutral-600 font-medium text-base hover:text-blue-700 hover:bg-sky-200 transition duration-500 px-6 py-2 rounded-lg" href="index.php?route=user/user/logout">Đăng Xuất</a>
                <?php endif; ?>
            </div>
            <?php if (isset($_COOKIE['auth'])): ?>
                <div class="dropdown">
                    <div class="p-2 cursor-pointer hover:bg-gray-300 transition duration-500 rounded-full bg-gray-200" data-bs-toggle="dropdown" aria-expanded="false">
                        <img width="30" height="30" src="https://img.icons8.com/parakeet-line/96/user.png" alt="user" />

                    </div>

                    <ul class="dropdown-menu">
                        <li class="px-2">
                            <p class="cursor-default font-medium text-sky-600"><?php echo htmlspecialchars($_COOKIE['author']) ?></p>
                        </li>
                        <div class="dropdown-divider"></div>
                        <?php if (isset($_COOKIE['role']) && $_COOKIE['role'] == 'admin'): ?>
                            <li><a class="dropdown-item" href="/user/admin">User Admin</a></li>
                        <?php endif; ?>
                        <?php if (isset($_COOKIE['role']) && $_COOKIE['role'] == 'admin'): ?>
                            <li><a class="dropdown-item" href="/blog/admin">Blog Admin</a></li>
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="index?route=user/user/profile">Profile</a></li>
                        <li><a class="dropdown-item" href="index?route=user/user/settings">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Dark mode</a></li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a class="dropdown-item" href="/user/logout">
                                <div class="flex items-center gap-x-2">
                                    <i class="fa-solid fa-right-from-bracket text-rose-600"></i>
                                    <p class="text-rose-600 font-semibold text-base">Logout</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="/user/sign-in">
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

    <div class="mt-[60px] w-full h-full">
        <!-- <div id="main" class="main"> -->