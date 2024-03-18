<?php
// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'report') {
    // Kiểm tra xem các trường thông tin cần thiết có tồn tại không
    if (isset($_POST['video_title']) && isset($_POST['report_reason'])) {
        // Lấy dữ liệu từ POST
        $videoId = $_GET['video_id'];
        $videoTitle = $_POST['video_title'];
        $reportReason = $_POST['report_reason'];
        // Chuẩn bị câu lệnh INSERT vào bảng videosrp
        $sql_report = "INSERT INTO videosrp (video_id, report_reason) VALUES ('$videoId', '$reportReason')";

        if ($conn->query($sql_report) === TRUE) {
            ?>
            <script>
                window.location.replace("watch.php?video_id=<?php echo $video_id ?>");
            </script>
            <?php
        }
    } else {
        // Nếu thiếu dữ liệu cần thiết
        // echo '<script>alert("Dữ liệu không hợp lệ.");</script>';
    }
}

// Nếu không phải là phương thức POST hoặc không có hành động báo cáo, tiếp tục hiển thị trang và mã HTML dưới đây
?>

<?php if(isset($_SESSION['login'])) { ?>
    <button id="reportVideo" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#reportModal" data-video-title="<?php echo $row_videos['title']; ?>" data-video-id="<?php echo $row_videos['video_id']; ?>">Báo cáo</button>
<?php } ?>

<!-- Phần HTML của trang report -->

<!-- Modal báo cáo -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportModalLabel">Báo cáo video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reportForm" method="post">
                    <div class="mb-3">
                        <label for="reportVideoTitle" class="form-label">Video: </label>
                        <input type="text" class="form-control" id="reportVideoTitle" name="video_title" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="reportReason" class="form-label">Lí do:</label>
                        <textarea class="form-control" id="reportReason" name="report_reason" rows="3" required></textarea>
                    </div>
                    <!-- Thêm trường ẩn để lưu video_id -->
                    <input type="hidden" id="reportVideoId" name="video_id">
                    <input type="hidden" name="action" value="report">
                    <button type="submit" value="report" class="btn btn-primary">Gửi báo cáo</button>
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
        var videoTitle = $(e.relatedTarget).data('video-title');
        var videoId = $(e.relatedTarget).data('video-id');
        $('#reportVideoTitle').val(videoTitle); // Hiển thị tên video trong input
        $('#reportVideoId').val(videoId);
    });
});
</script>
