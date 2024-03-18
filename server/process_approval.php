<?php
include("conn.php");
// Kiểm tra xem có dữ liệu POST được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem nút nào đã được nhấn
    if (isset($_POST['approve'])) {
        // Nếu admin chọn "Phê duyệt"
        $videosrp_id = $_POST['videosrp_id'];

        // Lấy thông tin video từ bảng videosrp
        $sql_get_video = "SELECT video_id FROM videosrp WHERE videosrp_id = $videosrp_id";
        $result_get_video = $conn->query($sql_get_video);

        if ($result_get_video->num_rows > 0) {
            $row = $result_get_video->fetch_assoc();
            $video_id = $row['video_id'];

            // Xóa video từ bảng videos
            $sql_delete_video = "DELETE FROM videos WHERE video_id = $video_id";
            if ($conn->query($sql_delete_video) === TRUE) {
                // Xóa báo cáo từ bảng videosrp sau khi xóa video thành công
                $sql_delete_report = "DELETE FROM videosrp WHERE videosrp_id = $videosrp_id";
                if ($conn->query($sql_delete_report) === TRUE) {
                    // Thông báo và chuyển hướng người dùng sau khi xử lý thành công
                    echo "<script>
                            alert('Phê duyệt báo cáo và xóa video thành công!');
                            window.history.back();
                          </script>";
                    exit();
                } else {
                    echo "Lỗi khi xóa báo cáo: " . $conn->error;
                }
            } else {
                echo "Lỗi khi xóa video: " . $conn->error;
            }
        } else {
            echo "Không tìm thấy thông tin video!";
        }
    } elseif (isset($_POST['reject'])) {
        // Nếu admin chọn "Từ chối"
        $videosrp_id = $_POST['videosrp_id'];

        // Xóa báo cáo từ bảng videosrp
        $sql_delete_report = "DELETE FROM videosrp WHERE videosrp_id = $videosrp_id";
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

