<div class="w-full  flex justify-center items-center py-10">
    <form class="w-[450px] border rounded-lg p-6 space-y-8 flex flex-col" id="form-register">
        <div class="flex flex-col self-start text-lg font-semibold">
            <h1>Sign Up</h1>
            <p></p>
        </div>
        <div class="flex flex-col">
            <label for="" class="block text-sm font-medium text-gray-700">Name</label>
            <input name="name" type="text" placeholder="Enter your name..." class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
        </div>
        <div class="flex flex-col">
            <label for="" class="block text-sm font-medium text-gray-700">Email</label>
            <input name="email" type="email" placeholder="Enter your email..." class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
        </div>
        <div class="flex flex-col">
            <label for="" class="block text-sm font-medium text-gray-700">Password</label>
            <input name="password" type="password" placeholder="***********" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
        </div>
        <button type="submit" class="btn btn-primary w-full self-end">Sign Up</button>
        <div class="flex mx-auto items-center text-base text-gray-600">
            <p>Don't have an account? </p>
            <a href="index.php?route=user/user/login" class="text-blue-500">Sign In</a>
        </div>
    </form>
</div>


<script>
    const form = document.querySelector('#form-register');
    let errorMessage;
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);
        console.log(data);
        await axios.post('http://localhost:3001/api/users/sign-up', data).then((response) => {
            console.log(response);
            // errorMessage = response.response.data.message;
            location.href = 'index.php?route=user/user/login';
        }).catch((error) => {
            console.log(error);
            alert('Error[Sign up fail]');
        });

    });
</script>