<?php
// Kiểm tra nếu tồn tại tham số email được gửi từ JavaScript
if(isset($_GET['email'])) {
    $email = $_GET['email'];

    // Sử dụng prepared statement để tránh SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra xem có bất kỳ kết quả nào trùng với địa chỉ email được nhập vào không
    if($result->num_rows > 0) {
        // Địa chỉ email đã tồn tại trong cơ sở dữ liệu
        echo "Email đã tồn tại!";
    } else {
        // Địa chỉ email chưa tồn tại trong cơ sở dữ liệu
        echo "Email hợp lệ!";
    }

    // Đóng kết nối và statement
    $stmt->close();
    $conn->close();
} else {
    // Nếu không có tham số email được gửi đến, hiển thị thông báo lỗi
    echo "Không có thông tin email được gửi!";
}
?>
