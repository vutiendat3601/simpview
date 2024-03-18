<?php
// Include file kết nối đến cơ sở dữ liệu $conn
require(__DIR__ . '/../../server/conn.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Kiểm tra xem mã reset token có hợp lệ không
    $sql = "SELECT * FROM users WHERE reset_token='$token' AND reset_token_expiration > NOW() LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if (isset($_POST['resetpassword'])) {
            $newpassword = md5($_POST['newpassword']);
            $email = $result->fetch_assoc()['email'];

            // Cập nhật mật khẩu mới cho người dùng
            $update_sql = "UPDATE users SET password='$newpassword', reset_token=NULL, reset_token_expiration=NULL WHERE email='$email'";
            if ($conn->query($update_sql) === TRUE) {
                echo '<div style="color: green; text-align: center; font-size: .875rem;">
                <span>Đặt lại mật khẩu thành công!</span>
                </div>';
            } else {
                echo '<div style="color: red; text-align: center; font-size: .875rem;">
                <span>Lỗi khi đặt lại mật khẩu!</span>
                </div>';
            }
        }
    } else {
        echo '<div style="color: red; text-align: center; font-size: .875rem;">
        <span>Mã reset token không hợp lệ hoặc đã hết hạn!</span>
        </div>';
    }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="py-3">
    <h5 class="text-center my-3">ĐẶT LẠI MẬT KHẨU</h5>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6 col-lg-4 col-9">
            <form action="" method="POST">
                <div class="d-grid gap-2">
                    <input type="password" name="newpassword" class="form-control form-control-sm mb-2" placeholder="Mật khẩu mới">
                    <button type="submit" name="resetpassword" class="btn btn-sm btn-success">Đặt lại mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>
