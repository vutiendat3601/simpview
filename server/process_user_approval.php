<?php
include("conn.php");

// Kiểm tra có dữ liệu POST được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra nút đã được nhấn chưa
    if (isset($_POST['approve'])) {
        // Nếu admin chọn "Phê duyệt"
        $usersrp_id = $_POST['usersrp_id'];

        // Lấy thông tin người dùng từ bảng usersrp
        $sql_get_user = "SELECT user_id FROM usersrp WHERE usersrp_id = $usersrp_id";
        $result_get_user = $conn->query($sql_get_user);

        if ($result_get_user->num_rows > 0) {
            $row = $result_get_user->fetch_assoc();
            $user_id = $row['user_id'];

            // Xử lý phê duyệt báo cáo (ở đây là ví dụ, bạn có thể thay đổi logic xử lý tùy theo yêu cầu)
            // Ví dụ: Xóa người dùng từ bảng users
            $sql_delete_user = "DELETE FROM users WHERE user_id = $user_id";
            if ($conn->query($sql_delete_user) === TRUE) {
                // Xóa báo cáo từ bảng usersrp sau khi xử lý thành công
                $sql_delete_report = "DELETE FROM usersrp WHERE usersrp_id = $usersrp_id";
                if ($conn->query($sql_delete_report) === TRUE) {
                    // Thông báo và chuyển hướng người dùng sau khi xử lý thành công
                    echo "<script>
                            alert('Phê duyệt báo cáo và xóa người dùng thành công!');
                            window.history.back();
                          </script>";
                    exit();
                } else {
                    echo "Lỗi khi xóa báo cáo: " . $conn->error;
                }
            } else {
                echo "Lỗi khi xóa người dùng: " . $conn->error;
            }
        } else {
            echo "Không tìm thấy thông tin người dùng!";
        }
    } elseif (isset($_POST['reject'])) {
        // Nếu admin chọn "Từ chối"
        $usersrp_id = $_POST['usersrp_id'];

        // Xóa báo cáo từ bảng usersrp
        $sql_delete_report = "DELETE FROM usersrp WHERE usersrp_id = $usersrp_id";
        if ($conn->query($sql_delete_report) === TRUE) {
            // Thông báo và chuyển hướng người dùng sau khi xử lý thành công
            echo "<script>
                    alert('Từ chối báo cáo thành công!');
                    window.history.back();
                  </script>";
            exit();
        } else {
            echo "Lỗi khi xóa báo cáo: " . $conn->error;
        }
    }
}
?>
