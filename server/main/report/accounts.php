<style>
        .user-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>

    <div class="container mt-5">
        <h2>Danh sách Người dùng bị báo cáo</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Họ và tên</th>
                    <th>Ảnh</th>
                    <th>Lí do báo cáo</th>
                    <th>Ngày báo cáo</th>
                    <th>Phê duyệt</th>
                </tr>
            </thead>
            <tbody style="background-color: aliceblue;">
                <?php
                $sql_reports = "SELECT u.user_id, u.first_name, u.last_name, u.img, ur.usersrp_id, ur.report_reason, ur.created_at FROM users u INNER JOIN usersrp ur ON u.user_id = ur.user_id";
                $result_reports = $conn->query($sql_reports);

                if ($result_reports->num_rows > 0) {
                    while ($row = $result_reports->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                            <td><img src="img/<?php echo $row['img']; ?>" class="user-img" alt=""></td>
                            <td><?php echo $row['report_reason']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <form action="process_user_approval.php" method="POST">
                                    <input type="hidden" name="usersrp_id" value="<?php echo $row['usersrp_id']; ?>">
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
                        <td colspan="6">Không có người dùng nào bị báo cáo.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

