<div class="container">
    <div class="row d-flex">
        <?php
        if (isset($_POST['search'])) {
            $keyword = $_POST['keyword'];
        }
        ?>
        <?php
        
            $sql_videos = "SELECT * FROM videos WHERE videos.privacy = 1 AND videos.title LIKE '%$keyword%'
ORDER BY videos.video_id DESC";
// echo $sql_videos;
        $result_videos = $conn->query($sql_videos);

        if ($result_videos->num_rows > 0) {
            // output data of each row

            while ($row_videos = $result_videos->fetch_array()) {
        ?>
                <div class="col-md-3 col-4 my-3" onclick="location.href='watch.php?video_id=<?php echo $row_videos['video_id'] ?>';" style="cursor:pointer;">





                    <div class="ratio ratio-16x9 my-2">
                        <video id="myvideos" muted="muted" class="myvideos" src="server/upload/<?php echo $row_videos['filepath']; ?>"></video>
                    </div>

                    <div style="height: 100px;">
                       

                        <?php
                        $user_id = $row_videos['user_id'];

                        $sql_users = "SELECT * FROM users WHERE users.user_id= $user_id";
                        $result_users = $conn->query($sql_users);

                        if ($result_users->num_rows > 0) {
                            // output data of each row

                            while ($row_users = $result_users->fetch_array()) {

                        ?>
                        <div class="flex-row d-flex my-2">
                        <a style="transform: translateY(0.5rem);" class="text-dark" href="index.php?manage=profile&user_id=<?php echo $row_users['user_id']; ?>"><img style="background-color: #FDECED" id="img-user-video" src="server/img/<?php echo $row_users['img']; ?>" class="rounded-circle mx-1" alt=""></a>
                        <h6 id="title" style="padding: 0.25rem 0.5rem;" class="text-capitalize text-dark"><?php echo $row_videos['title']; ?></h6>
                        </div>
                                <a id="user" class="text-dark" href="index.php?manage=profile&user_id=<?php echo $row_users['user_id']; ?>"><?php echo $row_users['first_name'] ?> <?php echo $row_users['last_name'] ?></a>

                        <?php
                            }
                        } else {
                            //echo "0 results";
                        }
                        ?>

                    </div>





                </div>

        <?php
            }
        } else {
            //echo "0 results";
        }
        ?>
    </div>
</div>
