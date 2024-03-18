<?php
require "./server/phpmailer/Exception.php";
require "./server/phpmailer/PHPMailer.php";
require "./server/phpmailer//SMTP.php";

require "./server/phpmailer//sendmail.php";

if (isset($_POST['forgotpassword'])) {
    $email = $_POST['email'];

    // Truy vấn để lấy địa chỉ email từ cơ sở dữ liệu
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $to = $row['email']; // Địa chỉ email của người nhận từ cơ sở dữ liệu

        // Tạo một mã reset token ngẫu nhiên và thời gian hết hạn
        $reset_token = md5(uniqid(mt_rand(), true));
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $expiration = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Cập nhật mã reset token và thời gian hết hạn vào cơ sở dữ liệu
        $update_sql = "UPDATE users SET reset_token='$reset_token', reset_token_expiration='$expiration' WHERE email='$email'";
        $conn->query($update_sql);

        // Gửi email chứa liên kết đặt lại mật khẩu với mã reset token đến email của người dùng
        $reset_link = "http://localhost/simpview/simpview/client/main/resetpassword.php?token=$reset_token";
        $subject = "Reset password";
        $message = "Nhấp vào  để đặt lại mật khẩu: $reset_link";

        // Gửi email
        if (sendMail($to, $subject, $message)) {
            echo '<div style="color: green; text-align: center; font-size: .875rem;">
            <span>Đã gửi liên kết đặt lại mật khẩu đến email của bạn!</span>
            </div>';
        } else {
            echo '<div style="color: red; text-align: center; font-size: .875rem;">
            <span>Lỗi khi gửi email!</span>
            </div>';
        }
    } else {
        echo '<div style="color: red; text-align: center; font-size: .875rem;">
        <span>Email không tồn tại trong hệ thống!</span>
        </div>';
    }
}
?>
<div class="py-3">
    <h5 class="text-center my-3">QUÊN MẬT KHẨU</h5>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6 col-lg-4 col-9">
            <form action="" method="POST">
                <div class="d-grid gap-2">
                    <input type="text" name="email" class="form-control form-control-sm my-2" placeholder="Email của bạn">
                    <button type="submit" name="forgotpassword" class="btn btn-sm btn-primary">Gửi liên kết đặt lại mật khẩu</button>
                </div>
            </form>
        </div>
    </div>
</div>