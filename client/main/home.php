<div class="container">
    <div class="row d-flex">
        <?php
        if (isset($_GET['category_id'])) {
            $sql_videos = "SELECT * FROM videos 
            WHERE videos.category_id=$_GET[category_id] AND videos.privacy = 1
            ORDER BY videos.video_id DESC";
        } else {
            $sql_videos = "SELECT * FROM videos WHERE videos.privacy = 1
            ORDER BY videos.video_id DESC";
        }
        $result_videos = $conn->query($sql_videos);

        if ($result_videos->num_rows > 0) {
            // output data of each row

            while ($row_videos = $result_videos->fetch_array()) {
        ?>
                <div class="col-md-4 col-lg-3 col-6 my-3" onclick="location.href='watch.php?video_id=<?php echo $row_videos['video_id'] ?>';" style="cursor:pointer;">

                    <div class="ratio ratio-16x9 my-2">
                        <video id="myvideos" muted="muted" class="myvideos" src="server/upload/<?php echo $row_videos['filepath']; ?>"></video>
                    </div>

                    <div style="height: 90px;">
                        <?php
                        $user_id = $row_videos['user_id'];

                        $sql_users = "SELECT * FROM users WHERE users.user_id= $user_id";
                        $result_users = $conn->query($sql_users);

                        if ($result_users->num_rows > 0) {
                            // output data of each row

                            while ($row_users = $result_users->fetch_array()) {

                        ?>
                                <div class="flex-row d-flex my-2">
                                    <a id="user-main" class="text-dark d-flex align-items-center" href="index.php?manage=profile&user_id=<?php echo $row_users['user_id']; ?>">
                                        <img src="server/img/<?php echo $row_users['img'] ?>" class="rounded-circle" alt="">
                                    </a>
                                    <div>
                                        <b><p style="padding: 0.25rem 0.5rem; margin: 0" class="text-capitalize text-dark"><?php echo $row_videos['title']; ?></p></b>
                                        <a id="user" class="text-dark" href="index.php?manage=profile&user_id=<?php echo $row_users['user_id']; ?>">
                                            <?php echo $row_users['first_name'] ?> <?php echo $row_users['last_name'] ?>
                                        </a>
                                        <span style="font-size:0.7rem; color: #737374"><i>
                                            <?php echo $row_videos['updated_at'] ?>
                                        </span></i>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>
