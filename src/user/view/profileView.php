<div class="w-full flex flex-col px-40">
    <div>
        <p class="text-lg font-semibold">Account Details</p>
        <!-- <p><?php echo htmlspecialchars($user['email']) ?></p> -->
    </div>

    <div class="mt-[24px] shadow flex items-center w-full h-[150px] px-4 gap-x-6 border border-gray-400 rounded-lg">
        <div class="flex flex-col items-center gap-y-2">
            <div class="w-[75px] h-[75px] flex items-center overflow-hidden justify-center rounded-full border-2 border-gray-300 shadow-md">
                <img id="selected-image" class="object-cover" width="75" height="75" src="<?php echo isset($user['avatar']) && !empty($user['avatar']) ? htmlspecialchars($user['avatar']) : "https://img.icons8.com/parakeet-line/96/user.png" ?>" alt="user" />
            </div>
            <label for="choose-image" class="flex items-center justify-center gap-x-2 text-sm font-medium py-1 px-2 rounded-lg border shadow border-gray-400 bg-gray-100 hover:bg-gray-200 cursor-pointer">
                <i class="fa-regular fa-image"></i>
                <p>Select Image</p>
            </label>
        </div>

        <form action="index?route=user/user/uploadImage" class="hidden" method="POST">
            <input class="hidden" id="choose-image" type="file" accept="image/*">
            <input class="hidden" id="base64-output" name="avatar" type="text">
            <input class="hidden" type="submit" id="submit-image">
        </form>

        <label for="submit-image" class="text-sm cursor-pointer font-medium flex items-center gap-x-2 p-2 border-2 border-sky-600 transition-colors duration-500 hover:bg-sky-100 rounded-lg">
            <i class="fa-solid fa-upload text-sky-600"></i>
            <p class="text-sky-600">Upload</p>
        </label>

        <button id="button-remove-image" class="text-sm font-medium flex items-center gap-x-2 p-2 border-2 border-rose-700 transition-colors duration-500 hover:bg-rose-100 rounded-lg">
            <i class="fa-solid fa-trash text-rose-600"></i>
            <p class="text-rose-600">Remove</p>
        </button>
    </div>

    <div class="mt-[48px] shadow flex flex-col w-full p-4 gap-x-6 gap-y-6 border border-gray-400 rounded-lg">

        <div class="flex w-full items-center gap-x-6">
            <div class="flex-1 flex flex-col space-y-6">
                <div class="flex flex-col">
                    <label for="" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" readonly value="<?php echo isset($_COOKIE['author']) ? htmlspecialchars($_COOKIE['author']) : ''; ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <div class="flex flex-col">
                    <label for="" class="block text-sm font-medium text-gray-700">Name</label>
                    <input name="name" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <div class="flex flex-col">
                    <label for="" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select class="form-select mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" aria-label="Default select example">
                        <!-- <option selected>Select gender</option> -->
                        <option value="none">None</option>
                        <option value="male">
                            <i class="fa-solid fa-mars"></i>
                            <p>Male</p>
                        </option>
                        <option value="female">
                            <!-- <i class="fa-solid fa-venus"></i> -->
                            <img width="24" height="24" src="https://img.icons8.com/ios/50/female.png" alt="female" />
                            <p>Female</p>
                        </option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>

            <div class="flex-1 flex flex-col space-y-6">
                <div class="flex flex-col">
                    <label for="" class="block text-sm font-medium text-gray-700">Address</label>
                    <input name="address" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <div class="flex flex-col">
                    <label for="" class="block text-sm font-medium text-gray-700">Birthday</label>
                    <input name="birthday" type="date" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <div class="flex flex-col">
                    <label for="" class="block text-sm font-medium text-gray-700">Number Phone</label>
                    <input name="numberPhone" type="tel" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center">
            <button class="w-[150px] text-sm font-medium flex items-center justify-center gap-x-2 p-2 border-2 border-rose-500 transition-colors duration-500 hover:bg-rose-600 bg-rose-500 text-white rounded-lg">
                <i class="fa-solid fa-trash "></i>
                <p class="">Delete Account</p>
            </button>
            <div class="flex gap-x-6 items-center">
                <button class="w-[150px] text-sm font-medium flex items-center justify-center gap-x-2 p-2 border-2 hover:bg-gray-200 text-gray-600 transition-colors duration-500  rounded-lg">
                    <p class="">Cancel</p>
                </button>
                <button class="w-[150px] text-sky-600 text-sm font-medium flex items-center justify-center gap-x-2 p-2 border-2 border-sky-700 transition-colors duration-500 hover:bg-sky-700 hover:text-white rounded-lg">
                    <p class="">Saves Change</p>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let userId = "<?php echo $user['id'] ?>";
    if (!!userId) {
        let user_data = <?php echo json_encode($user) ?>;
        document.getElementsByName('name')[0].value = user_data['name'];
        document.getElementsByName('password')[0].value = user_data['password'];
        document.getElementsByName('address')[0].value = user_data['address'];
        document.getElementsByName('birthday')[0].value = user_data['birthday'];
        document.getElementsByName('numberPhone')[0].value = user_data['numberPhone'];
    }


    const selectedImage = document.getElementById('selected-image');
    const chooseImage = document.getElementById('choose-image');
    const buttonRemoveImage = document.getElementById('button-remove-image');
    const base64Output = document.getElementById('base64-output');
    const form = document.querySelector('form');



    chooseImage.addEventListener('change', function() {
        if (chooseImage.files && chooseImage.files[0]) {
            const file = chooseImage.files[0];
            const reader = new FileReader();
            if (!file.type.startsWith('image/')) {
                alert('Please select a valid image file.');
                chooseImage.value = '';
                return;
            }


            reader.onload = function(event) {
                base64Output.value = event.target.result;
                // selectedImage.src = base64Output.value;
                console.log(base64Output.value);

            };

            reader.onerror = function(error) {
                console.error('Error converting image to Base64:', error);
            };

            reader.readAsDataURL(file);


            selectedImage.src = URL.createObjectURL(file);
        }
    });

    buttonRemoveImage.addEventListener('click', function() {
        selectedImage.src = 'https://img.icons8.com/parakeet-line/96/user.png';

        chooseImage.value = '';
    });

    // form.addEventListener('submit', function(event) {
    //     event.preventDefault();
    //     const formData = new FormData(form);
    //     const data = Object.fromEntries(formData);
    //     console.log(data);

    //     fetch('index.php?route=user/user/uploadImage', {
    //             method: 'POST',
    //             body: JSON.stringify(data),
    //         }).then(response => response.json())
    //         .then(data => {
    //             console.log(data);
    //         })
    //         .catch(error => {
    //             console.error(error);
    //         });
    // });
</script>