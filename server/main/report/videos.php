<script>
    document.addEventListener("DOMContentLoaded", function(event) {
      var scrollpos = sessionStorage.getItem('scrollpos');
      if (scrollpos) {
        window.scrollTo(0, scrollpos);
        sessionStorage.removeItem('scrollpos');
      }
    });

    window.addEventListener("beforeunload", function(e) {
      sessionStorage.setItem('scrollpos', window.scrollY);
    });
</script>
<div class="container mt-5">
    <h2>Danh sách Videos bị báo cáo</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Lí do báo cáo</th>
                <th>Ngày báo cáo</th>
                <th>Video</th>
                <th>Phê duyệt</th>
            </tr>
        </thead>
        <tbody style="background-color: aliceblue;">
            <?php
            $sql_reports = "SELECT v.video_id, v.title, vr.videosrp_id, vr.report_reason, vr.created_at, v.filepath, v.views, v.content FROM videos v INNER JOIN videosrp vr ON v.video_id = vr.video_id";
            $result_reports = $conn->query($sql_reports);

            if ($result_reports->num_rows > 0) {
                while ($row = $result_reports->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['report_reason']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal<?php echo $row['video_id']; ?>">
                                Xem video
                            </button>
                        </td>

                        <td>
                            <form action="process_approval.php" method="POST">
                                <input type="hidden" name="videosrp_id" value="<?php echo $row['videosrp_id']; ?>">
                                <button type="submit" name="approve" class="btn btn-success">Phê duyệt</button>
                                <button type="submit" name="reject" class="btn btn-danger">Từ chối</button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="5">Không có báo cáo nào.</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    // Đợi cho DOM được load hoàn toàn
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = sessionStorage.getItem('scrollpos');
        if (scrollpos) {
            window.scrollTo(0, scrollpos);
            sessionStorage.removeItem('scrollpos');
        }
    });

    window.addEventListener("beforeunload", function(e) {
sessionStorage.setItem('scrollpos', window.scrollY);
    });

    // Hiển thị modal khi nhấn vào nút "Xem video"
    <?php
    $result_reports = $conn->query($sql_reports);
    if ($result_reports->num_rows > 0) {
        while ($row = $result_reports->fetch_assoc()) {
    ?>
            $('#videoModal<?php echo $row['video_id']; ?>').on('shown.bs.modal', function() {
                // Nạp video vào thẻ video khi modal được mở
                $('#videoSource<?php echo $row['video_id']; ?>').attr('src', 'upload/<?php echo $row['filepath']; ?>');
                $('#myVideo<?php echo $row['video_id']; ?>')[0].load();
            });

            $('#videoModal<?php echo $row['video_id']; ?>').on('hidden.bs.modal', function() {
                // Dừng video khi modal được đóng
                $('#myVideo<?php echo $row['video_id']; ?>')[0].pause();
                $('#videoSource<?php echo $row['video_id']; ?>').attr('src', '');
            });
    <?php
        }
    }
    ?>
</script>

<!-- Modal -->
<?php
$result_reports = $conn->query($sql_reports);
if ($result_reports->num_rows > 0) {
    while ($row = $result_reports->fetch_assoc()) {
?>
        <div class="modal fade" id="videoModal<?php echo $row['video_id']; ?>" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videoModalLabel<?php echo $row['video_id']; ?>"><?php echo $row['title']; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="ratio ratio-16x9">
                        <video id="myVideo<?php echo $row['video_id']; ?>" controls class="myvideos" src="upload/<?php echo $row['filepath']; ?>"></video>
                        </div>
                        <div>
                            <h6><?php echo $row['title']; ?></h6>
                            <p><strong>Lượt xem:</strong> <?php echo $row['views']; ?></p>
                            <p><strong>Nội dung:</strong> <?php echo $row['content']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>
