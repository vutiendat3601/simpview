<div class="py-3">
    <h5 class="text-center my-3">ĐĂNG NHẬP</h5>
    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_array();
            $_SESSION['login'] = $row['username'];
            $_SESSION['client_id'] = $row['user_id'];
    ?>
            <script>
                window.location.replace("index.php?manage=home");
            </script>

    <?php
        } else {
            echo '<div style="color: red; text-align: center; font-size: .875rem;">
    
        <span>Tài khoản mật khẩu không chính xác!</span>
        
        </div>';
        }
    }
    ?>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6 col-lg-4 col-9">

            <form class="my-2" action="" autocomplete="off" method="POST">
                <div class="d-grid gap-2">
                    <input id="form-log" type="text" name="username" class="form-control form-control-sm mb-2" placeholder="Username" autofocus>
                    <input id="form-log" type="password" name="password" class="form-control form-control-sm mb-2" placeholder="Mật khẩu">
                    <button id="form-log" type="submit" name="login" class="btn btn-sm btn-custom text-white">Đăng nhập</button>
                </div>
                <!-- Thêm vào form đăng nhập -->
                <div class="d-flex text-center justify-content-center">
                    <a style="text-decoration: none;" class="mx-1" href="index.php?manage=forgotpassword">Quên mật khẩu?</a>
                </div>

            </form>
            <hr class="my-3">
            <div class="d-flex text-center justify-content-center">
                Bạn không có tài khoản? <a style="text-decoration: none;" class="mx-1" href="index.php?manage=register">Đăng ký</a>
            </div>

        </div>
    </div>
</div>