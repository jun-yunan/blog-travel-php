<div class="w-full  flex justify-center items-center py-10">
    <form id="form-login" class="w-[450px] border rounded-lg p-6 space-y-8 flex flex-col">
        <div class="flex flex-col self-start text-lg font-semibold">
            <h1>Sign In</h1>
            <p></p>
        </div>
        <div class="flex flex-col">
            <label for="" class="block text-sm font-medium text-gray-700">Email</label>
            <input name="email" type="email" placeholder="Enter your email..." class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
        </div>
        <div class="flex flex-col">
            <label for="" class="block text-sm font-medium text-gray-700">Password</label>
            <input name="password" type="password" placeholder="***********" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
        </div>
        <button type="submit" class="btn btn-primary w-full self-end">Sign In</button>
        <div class="flex mx-auto items-center text-base text-gray-600">
            <p>Don't have an account? </p>
            <a href="index.php?route=user/user/register" class="text-blue-500">Register</a>
        </div>
    </form>
</div>

<script>
    const form = document.querySelector('#form-login');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);
        console.log(data);
        await axios.post('http://localhost:3001/api/users/sign-in', data, {
            withCredentials: true
        }).then((response) => {
            console.log(response);
            location.href = 'index.php?route=blog/blog/index';
        }).catch((error) => {
            console.log(error);
            alert('Error[Sign in fail]');
        });
    });
</script>