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
            $sql_reports = "SELECT v.video_id, v.title, vr.videosrp_id, vr.report_reason, vr.created_at, v.filepath FROM videos v INNER JOIN videosrp vr ON v.video_id = vr.video_id";
            $result_reports = $conn->query($sql_reports);

            if ($result_reports->num_rows > 0) {
                while ($row = $result_reports->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['report_reason']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <a href="http://localhost/simpview/watch.php?video_id=<?php echo $row['video_id']; ?>" target="_blank">Xem video</a>
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
