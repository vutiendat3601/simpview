<div class="py-3">
<h5 class="text-center my-3">ĐỔI MẬT KHẨU</h5>
<?php
if (isset($_POST['changepassword'])) {
    $email = $_POST['email'];
    $oldpassword = md5($_POST['oldpassword']);
    $newpassword = md5($_POST['newpassword']);

    // Truy vấn cơ sở dữ liệu để lấy mật khẩu hiện tại của người dùng
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$oldpassword' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mật khẩu cũ trùng khớp, tiến hành cập nhật mật khẩu mới
        $update_sql = "UPDATE users SET password='$newpassword' WHERE email='$email'";

        if ($conn->query($update_sql) === TRUE) {
            echo '<div style="color: green; text-align: center; font-size: .875rem;">
            <span>Đổi mật khẩu thành công!</span>
            </div>';
        } else {
            echo '<div style="color: red; text-align: center; font-size: .875rem;">
            <span>Lỗi khi cập nhật mật khẩu!</span>
            </div>';
        }
    } else {
        echo '<div style="color: red; text-align: center; font-size: .875rem;">
        <span>Mật khẩu cũ không đúng!</span>
        </div>';
    }
}
?>
<div class="row d-flex justify-content-center align-items-center">
    <div class="col-md-6 col-lg-4 col-9">
        
            <form action="" autocomplete="off" method="POST">
                <div class="d-grid gap-2">
                    <input id="form-log" type="text" name="email" class="form-control form-control-sm my-2" placeholder="Tài khoản">
                    <input id="form-log" type="password" name="oldpassword" class="form-control form-control-sm mb-2" placeholder="Mật khẩu cũ">
                    <input id="form-log" type="password" name="newpassword" class="form-control form-control-sm mb-2" placeholder="Mật khẩu mới">
                    <button id="form-log" type="submit" name="changepassword" class="btn btn-sm btn-success">Đổi mật khẩu</button>
                </div>
            </form>
        
    </div>
</div>
</div>