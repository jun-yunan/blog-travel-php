<?php $data = [
    'label' => 'Your Name',
    'placeholder' => 'Enter your name',
    'value' => ''
]; ?>


<div class="py-16 flex items-center justify-center">
    <form method="POST" action="http://localhost:3001/api/blogs" class="w-[450px] flex flex-col border-2 border-gray-300 p-4 rounded-md space-y-8">
        <div class="flex flex-col self-start">
            <h1 class="text-xl font-semibold">Create Blog</h1>
            <p class="mt-2 text-gray-600 text-sm">
                Share your ideas, thoughts, and creativity by creating a new blog post. Write, edit, and inspire others.
            </p>
            <div class="w-full h-[1px] bg-gray-400 mt-2"></div>
        </div>
        <div class="space-y-8">
            <div class="flex flex-col gap-y-2">
                <label for="tags" class="block text-sm font-medium text-gray-700">Title</label>
                <input name="title" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter your title...">
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="tags" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="exampleFormControlTextarea1" rows="4" placeholder="Write..."></textarea>
                <!-- <div id="editor"></div> -->
            </div>
            <div class="flex flex-col gap-y-2">
                <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                <input type="text" id="tags" name="tags" placeholder="Enter tags (separate with commas)" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                <small class="text-gray-500">Example: travel, food, destinations,...</small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-[50%] self-end">Create Blog</button>
    </form>
</div>

<script>
    const form = document.querySelector('form');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);
        console.log(data);
        const response = await axios.post('http://localhost:3001/api/blogs', data);
        console.log(response);
    });
</script>