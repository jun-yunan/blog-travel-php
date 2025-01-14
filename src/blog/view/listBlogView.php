<?php  ?>


<div class="p-4 flex flex-col" id="form-list-blog">

    <div class="flex justify-between items-center">
        <div class='flex flex-col items-start'>
            <h3 class="text-3xl font-bold underline text-purple-500 mb-6">Danh sách Blog</h3>

            <form method="GET" class="flex flex-col items-start gap-y-2">
                <input class="w-[380px]" type="text" name="keyword" placeholder="search blog by id, title, content, tag.">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <?php if ($checked == true): ?>
            <button type="button" class="btn btn-danger">Delete</button>
        <?php endif; ?>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><input type="checkbox" class="checkBoxAll"></th>
                <th scope="col">ID</th>
                <th scope="col">Author</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">CreatedAt</th>
                <th scope="col">UpdatedAt</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="">
            <?php if (empty($blogs)): ?>
                <tr>
                    <td colspan="5">No blogs found.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($blogs as $blog): ?>
                    <tr>
                        <th scope="col"><input type="checkbox" class="selectedCheckBox"></th>
                        <td><?php echo htmlspecialchars($blog['id']); ?></td>
                        <td><?php echo htmlspecialchars($blog['authorId']); ?></td>
                        <td><?php echo htmlspecialchars($blog['title']); ?></td>
                        <td><?php echo htmlspecialchars($blog['content']); ?></td>
                        <td><?php echo htmlspecialchars($blog['createdAt']); ?></td>
                        <td><?php echo htmlspecialchars($blog['updatedAt']); ?></td>
                        <td>
                            <!-- <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Details</a></li>
                                    <li><a class="dropdown-item" href="/update-blog?id=<?php echo $blog['id'] ?>">Edit blog</a></li>
                                    <li class="flex flex-col items-center justify-center">
                                        <form method="POST" id="form-delete-blog" class="dropdown-item text-rose-700 hover:bg-rose-200 hover:text-rose-700">
                                            <input type="text" name="id" class="hidden" value="<?php echo htmlspecialchars($blog['id']) ?>">
                                            <button type="submit" class="">
                                                <i class="fa-solid fa-trash"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div> -->
                            <div class="flex flex-row items-center gap-x-2 text-base font-medium">
                                <a href="/cap-nhat-thong-tin">Add</a>|
                                <a href="/cap-nhat-thong-tin?id=<?php echo $blog['id']; ?>">Edit</a>|
                                <form method="POST" action="">
                                    <input class="hidden" name="id" value=<?php echo htmlspecialchars($blog['id']) ?> />
                                    <input type="submit" value="Delete" onclick="return confirm('Are you sure delete blog?');" class="text-rose-600" />
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</div>


<?php if (isset($_SESSION['message'])): ?>
    <script>
        showNotification('<?php echo $_SESSION['message'] ?>', 'success');
        <?php unset($_SESSION['message']); ?>
    </script>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <script>
        showNotification('<?php echo $_SESSION['error'] ?>', 'error');
        <?php unset($_SESSION['error']); ?>
    </script>
<?php endif; ?>

<!-- <script>
    const selectAllCheckbox = document.querySelector('.checkBoxAll');
    const selectedCheckBox = document.querySelectorAll('.selectedCheckBox');
    const formDeleteBlog = document.querySelector('#form-delete-blog');


    formDeleteBlog.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(formDeleteBlog);
        const data = Object.fromEntries(formData);
        console.log(data.blogId);

        await axios.post(`http://localhost:8000/api/blogs/${data.blogId}`, data).then((response) => {
            console.log(response);
            location.reload();
        }).catch((error) => {
            console.log(error);
            alert('Error[Delete blog fail]' + error);
        });
    });

    selectAllCheckbox.addEventListener('change', (e) => {
        selectedCheckBox.forEach((checkbox) => {
            checkbox.checked = e.target.checked;

        });
    });

    selectedCheckBox.forEach((checkbox) => {
        checkbox.addEventListener('change', (e) => {
            if (!e.target.checked) {
                selectAllCheckbox.checked = false;
            }

        });
    });

    const form = document.querySelector('#form-list-blog');
</script> -->