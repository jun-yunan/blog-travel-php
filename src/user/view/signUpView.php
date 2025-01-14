<?php $toggle_eye = "text"; ?>


<!DOCTYPE html>



<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta author="David Baqueiro">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Travel | Sign Up</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <div class="w-full h-full flex items-center justify-center">
        <div class="w-[80%] h-[80%] relative flex items-center border border-gray-500 rounded-lg shadow-md overflow-hidden">
            <div class="w-[50%] h-full relative">
                <a href="/" class="absolute z-10 top-3 left-3 rounded-full cursor-pointer gap-x-1 bg-gray-500 hover:bg-gray-300 hover:text-gray-500 transition duration-500 text-gray-200 flex items-center justify-center px-4 py-1 text-sm font-medium">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                    <p>back</p>
                </a>
                <div class="swiper w-full h-full">
                    <div class="swiper-wrapper w-full h-full">
                        <div class="swiper-slide flex items-center justify-center">
                            <img class="m-auto w-full h-full object-cover" src="/assets/images/ha_long_1.jpg" alt="ha long">
                        </div>
                        <div class="swiper-slide flex items-center justify-center">
                            <img class="m-auto w-full h-full object-cover" src="/assets/images/ha_long_2.jpg" alt="ha long">
                        </div>
                        <div class="swiper-slide flex items-center justify-center">
                            <img class="m-auto w-full h-full object-cover" src="/assets/images/ha_long_3.jpg" alt="ha long">
                        </div>
                        <div class="swiper-slide flex items-center justify-center">
                            <img class="m-auto w-full h-full object-cover" src="/assets/images/ha_long_4.jpg" alt="ha long">
                        </div>
                        <div class="swiper-slide flex items-center justify-center">
                            <img class="m-auto w-full h-full object-cover" src="/assets/images/ha_long_5.jpg" alt="ha long">
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> -->
                </div>
            </div>

            <div class="w-[50%] h-full">
                <form id="form-sign-up" class="w-full h-full px-12 py-6 space-y-4 flex flex-col">
                    <div class="w-full flex flex-col self-start">
                        <h1 class="text-xl font-semibold text-gray-700">Create an account</h1>
                    </div>
                    <div class="w-full flex items-center gap-x-4">
                        <div class="flex flex-col w-full">
                            <label for="" class="block text-sm font-medium text-gray-700">First Name</label>
                            <div class="flex items-center mt-1 w-full py-1 border border-gray-300 rounded-md shadow-sm">
                                <input name="firstName" type="text" placeholder="Enter your first name..." class="bg-transparent border-none focus:ring-0 w-full" />
                            </div>
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <div class="flex items-center mt-1 w-full py-1 border border-gray-300 rounded-md shadow-sm">
                                <input name="lastName" type="text" placeholder="Enter your last name..." class="bg-transparent border-none focus:ring-0 w-full" />
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="flex items-center mt-1 w-full px-3 py-1 border border-gray-300 rounded-md shadow-sm">
                            <ion-icon name="mail-outline"></ion-icon>
                            <input name="email" type="email" placeholder="Enter your email..." class="bg-transparent border-none focus:ring-0 w-full" />
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="block text-sm font-medium text-gray-700">Password</label>

                        <div class="flex items-center mt-1 w-full px-3 py-1 border border-gray-300 rounded-md shadow-sm">
                            <ion-icon name="key-outline" class="mr-2"></ion-icon>
                            <input name="password" type="password" placeholder="***********" id="input-password" class="bg-transparent w-full border-none focus:ring-0" />
                            <button type="button" id="button-toggle-eye" class="ml-2">
                                <ion-icon id="toggle-icon" name="eye-off-outline"></ion-icon>
                            </button>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary w-full self-end">Sign Up</button>
                    <div class="w-full flex items-center gap-x-2">
                        <div class="flex-1 h-px bg-gray-300"></div>
                        <p class="text-sm font-medium text-gray-500 whitespace-nowrap">Or sign up with</p>
                        <div class="flex-1 h-px bg-gray-300"></div>
                    </div>

                    <div class="flex items-center w-full gap-x-6">
                        <a href="#" id="sign-in-google" class="flex-1 flex items-center justify-center gap-x-2 border-2 border-gray-300 rounded-md hover:bg-gray-100 transition duration-500">
                            <img width="36" height="36" src="https://img.icons8.com/color/48/google-logo.png" alt="google-logo" />
                            <p class="text-base font-medium text-gray-700">Google</p>
                        </a>
                        <a href="#" class="flex-1 flex items-center justify-center gap-x-2 border-2 border-gray-300 rounded-md hover:bg-gray-100 transition duration-500">
                            <img width="36" height="36" src="https://img.icons8.com/ios-filled/50/github.png" alt="github" />
                            <p class="text-base font-medium text-gray-700">Github</p>
                        </a>
                    </div>

                    <div class="flex mx-auto items-center text-base text-gray-600">
                        <p>
                            Already have an account?
                        </p>
                        <a href="/user/sign-in" class="text-blue-500">Sign In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        const signInGoogle = document.querySelector('#sign-in-google');
        signInGoogle.addEventListener('click', (e) => {
            e.preventDefault();
            Toast.fire({
                icon: 'success',
                title: 'Signed in successfully',
            });
        });
    </script>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
        const buttonToggleEye = document.querySelector('#button-toggle-eye');
        const inputPassword = document.querySelector('#input-password');
        const toggleIcon = document.querySelector('#toggle-icon');

        buttonToggleEye.addEventListener('click', () => {
            if (inputPassword.type === 'password') {
                inputPassword.type = 'text';
                toggleIcon.setAttribute('name', 'eye-outline');
            } else {
                inputPassword.type = 'password';
                toggleIcon.setAttribute('name', 'eye-off-outline');
            }
        });

        const form = document.querySelector('#form-sign-up');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            const data = Object.fromEntries(formData);
            data['name'] = `${data.firstName} ${data.lastName}`;
            delete data.firstName;
            delete data.lastName;
            console.log(data);


            await axios.post('http://localhost:3001/api/users/sign-up', data).then((response) => {
                console.log(response);
                Toast.fire({
                    icon: 'success',
                    title: 'Sign Up Successfully',
                });
                location.href = '/user/sign-in';
            }).catch((error) => {
                console.log(error.response.data.message);
                Toast.fire({
                    icon: 'error',
                    title: `${error.response.status} ${error.response.data.message}`,
                });
            });
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="module" src="/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>