<?php $checked = false ?>

<div class="p-4 flex flex-col" id="form-list-blog">
    <div class="flex justify-between items-center">
        <h3 class="text-3xl font-bold underline text-purple-500 mb-6">Danh sách Blog</h3>
        <?php if ($checked == true): ?>
            <button type="button" class="btn btn-danger">Delete</button>
        <?php endif; ?>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><input type="checkbox" class="checkBoxAll"></th>
                <th scope="col">ID</th>
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
                        <td><?php echo htmlspecialchars($blog['title']); ?></td>
                        <td><?php echo htmlspecialchars($blog['content']); ?></td>
                        <td><?php echo htmlspecialchars($blog['createdAt']); ?></td>
                        <td><?php echo htmlspecialchars($blog['updatedAt']); ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Details</a></li>
                                    <li><a class="dropdown-item" href="#">Edit blog</a></li>
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
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>


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