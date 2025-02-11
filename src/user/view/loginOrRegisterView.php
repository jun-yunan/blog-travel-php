<div class="wrapper mt-[80px] flex justify-center items-center">
    <div class="wrapper-auth bg-white p-[20px] rounded-md shadow-md w-[300px]">
        <h2 id="formTitle">Đăng nhập</h2>
        <form class="block" id="authForm" action="" method="POST">
            <input type="hidden" name="loginMode" value="">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>

            <?php if (isset($_SESSION['error_message'])): ?>
                <p class="error-message" style="color:red"><?php echo $_SESSION['error_message']; ?></p>
                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>
            <button class="w-full p-3 bg-[#28a745] text-white border-none cursor-pointer" type="submit" id="loginOrRegister">Đăng nhập</button>
            <a class="block mt-3 text-center" href="#" id="toggleLink">Chưa có tài khoản? Đăng ký ngay</a>
        </form>
    </div>
</div>


<?php if (isset($_SESSION['message'])): ?>
    <script>
        showNotification('<?php echo $_SESSION['message']; ?>', 'success');
        <?php unset($_SESSION['message']); ?>
    </script>

<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <script>
        showNotification('<?php echo $_SESSION['error']; ?>', 'error');
        <?php unset($_SESSION['error']); ?>
    </script>

<?php endif; ?>

<script>
    const toggleLink = document.getElementById('toggleLink');
    const submitButton = document.getElementById('loginOrRegister');
    const formTitle = document.getElementById('formTitle');
    const authForm = document.getElementById('authForm');
    const loginMode = document.querySelector('input[name="loginMode"]');

    let isLoginMode = true;
    loginMode.value = isLoginMode;
    toggleLink.addEventListener('click', (e) => {
        e.preventDefault();
        isLoginMode = !isLoginMode;
        loginMode.value = isLoginMode;
        if (isLoginMode) {
            formTitle.innerText = 'Đăng nhập';
            submitButton.innerText = 'Đăng nhập';
            authForm.querySelector('input[name="username"]').placeholder = 'Tên tài khoản';
        } else {
            formTitle.innerText = 'Đăng ký';
            submitButton.innerText = 'Đăng ký';
            authForm.querySelector('input[name="username"]').placeholder = 'Tên tài khoản mới';

        }

        toggleLink.textContent = isLoginMode ? 'Chưa có tài khoản? Đăng ký ngay' : 'Đã có tài khoản? Đăng nhập ngay';
    });
</script>