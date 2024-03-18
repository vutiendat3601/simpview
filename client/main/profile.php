<?php
if (isset($_GET['user_id'])) {
    $account = $_GET['user_id'];

    $sql = "SELECT * FROM users WHERE user_id =$account LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_array();

?>

        <div class="col-md-12 col-12 rounded-3">
            <img style="background-color: #FDF7F8" id="img-bg" src="server/img/<?php echo $row['profile_pic']; ?>" class="rounded-3 img-fluid" alt="">
        </div>

        <div class="d-flex">

            <div class="col-md-3 col-3 text-center">
                <img style="background-color: #FDECED" id="img-profile" src="server/img/<?php echo $row['img']; ?>" class="img-thumbnail rounded-circle" alt="">
            </div>

            <div id="name-profile" class="col-md-7 col-8 text-left">

                <h4 class="fw-bold text-dark col-12"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></h4>
                <p class="text-dark col-12"><?php echo $row['email']; ?></p>
                <br>
            </div>
            <div class="col-sm-2 d-flex justify-content-end">
                <?php include('client/main/report_user.php'); ?>
            </div>
        </div>


        <div class="container my-3">
            <div class="flex-row d-flex">
                <div class="navbar navbar-nav">
                    <a class="rounded-circle clickable nav-link mx-2 bg-light" id="btnLeft-profile"><i class="fa-solid fa-angle-left"></i></a>
                </div>

                <nav class="mainViewer-profile navbar navbar-expand">
                    <div class="navbar-nav content-profile" id="content-profile">
                        <?php
                        $user_id = $_GET['user_id'];
                        ?>

                        <?php
                        ?>
                        <a id="menu" class="navbar-brand card nav-link mx-2 bg-light" href="index.php?manage=profile&user_id=<?php echo $user_id ?>">Tất cả</a>
                        <?php
                        $sql = "SELECT * FROM category";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row

                            while ($row = $result->fetch_array()) {
                        ?>
                                <a id="menu" class="navbar-brand card nav-link mx-2 bg-light" href="index.php?manage=profile&user_id=<?php echo $user_id ?>&category_id=<?php echo $row['category_id']; ?>"><?php echo $row['name'] ?></a>

                        <?php
                            }
                        } else {
                            //echo "0 results";
                        }
                        ?>
                    </div>
                </nav>

                <div class="navbar navbar-nav">
                    <a class="rounded-circle clickable nav-link mx-2 bg-light" id="btnRight-profile"><i class="fa-solid fa-angle-right"></i></a>

                </div>
            </div>
        </div>



<?php
    } else {
        //echo "0 results";
    }
}
?>

<div class="container my-3">
    <div class="row d-flex">
        <?php

        //echo ($_GET['category_id']);
        if (isset($_GET['category_id'])) {
            $sql_videos = "SELECT * FROM videos
                WHERE videos.category_id= $_GET[category_id] AND videos.user_id= $_GET[user_id]
                ORDER BY videos.video_id DESC";
        } else {
            $sql_videos = "SELECT * FROM videos
                WHERE videos.user_id= $_GET[user_id]
                ORDER BY videos.video_id DESC";
        }

        $result_videos = $conn->query($sql_videos);

        if ($result_videos->num_rows > 0) {
            // output data of each row

            while ($row_videos = $result_videos->fetch_array()) {
        ?>
                <div class="col-md-3 col-4 my-3" onclick="location.href='watch.php?video_id=<?php echo $row_videos['video_id'] ?>';" style="cursor:pointer;">




                    <div class="ratio ratio-16x9 my-2">
                        <video id="myvideos" muted="muted" class="myvideos" src="server/upload/<?php echo $row_videos['filepath']; ?>"></video>
                    </div>
                    <h6 id="title" class="card-title nav-link text-dark"><?php echo $row_videos['title']; ?></h6>
                    <span class="mx-3" style="font-size:0.7rem">
                        <?php echo $row_videos['created_at'] ?>
                    </span>
                </div>
        <?php
            }
        } else {
            //echo "0 results";
        }
        ?>

    </div>
</div>




<script>
    var btnL = document.getElementById("btnLeft-profile");
    var btnR = document.getElementById("btnRight-profile");

    var content = document.getElementById("content-profile");

    btnR.addEventListener("click", goRight);
    btnL.addEventListener("click", goLeft);

    var clickedIndex = 0;

    function goRight() {
        if (clickedIndex <= 4) {
            clickedIndex = clickedIndex + 1;
            content.style.marginLeft = -190 * clickedIndex + "px";
        } else {
            // Nếu bạn muốn vòng quay lại khi đến cuối, có thể sử dụng đoạn sau:
            clickedIndex = 0;
            content.style.marginLeft = "0px";
        }
    }

    function goLeft() {
        if (clickedIndex > 0) {
            clickedIndex = clickedIndex - 1;
            content.style.marginLeft = -190 * clickedIndex + "px";

        }
    }
</script>