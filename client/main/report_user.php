<?php
// Kiểm tra có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'report_user') {
    // Kiểm tra xem các trường thông tin cần thiết có tồn tại không
    if (isset($_POST['report_reason'])) {
        // Lấy dữ liệu từ POST
        $userId = $_GET['user_id'];
        $reportReason = $_POST['report_reason'];

        // Chuẩn bị câu lệnh INSERT vào bảng usersrp
        $sql_report = "INSERT INTO usersrp (user_id, report_reason) VALUES ('$userId',  '$reportReason')";

        if ($conn->query($sql_report) === TRUE) {
            ?>
            <script>
                window.location.replace("watch.php?video_id=<?php echo $video_id ?>");
            </script>
            <?php
        } 
    } else {
        // Nếu thiếu dữ liệu cần thiết
        // echo "<script>alert('Vui lòng điền đầy đủ thông tin.');</script>";
    }
}
?>

<style>
    /* CSS để chỉnh màu chữ và kiểu chữ của nút "Báo cáo" */
    #reportUser {
        color: #cc0000; /* Màu chữ đỏ đậm */
        font-weight: bold; /* Chữ in đậm */
        background: none; /* Loại bỏ background */
        border: none; /* Loại bỏ border */
    }

    /* Hover màu chữ */
    #reportUser:hover {
        color: red; /* Màu chữ khi hover */
    }
</style>

<?php if(isset($_SESSION['login'])) { ?>
    <!-- Nút "Báo cáo" -->
    <button id="reportUser" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#reportModal" data-user-id="<?php echo $_SESSION['login']; ?>">Báo cáo</button>
<?php } ?>

<!-- Phần HTML của trang report -->

<!-- Modal báo cáo -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportModalLabel">Báo cáo người dùng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reportForm" method="post">
                    <div class="mb-3">
                        <!-- Trường ẩn để lưu user_id -->
                        <input type="hidden" id="reportUserId" name="user_id">
                        <label for="reportReason" class="form-label">Lí do:</label>
                        <textarea class="form-control" id="reportReason" name="report_reason" rows="3" required></textarea>
                    </div>
                    <input type="hidden" name="action" value="report_user">
                    <button type="submit" value="report_user" class="btn btn-primary">Gửi báo cáo</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript để xử lý báo cáo -->
<script>
    $(document).ready(function() {
        // Xử lý khi mở modal
        $('#reportModal').on('show.bs.modal', function(e) {
            var userId = $(e.relatedTarget).data('user-id');
            $('#reportUserId').val(userId); // Lưu user_id vào trường ẩn
        });
    });
</script>
