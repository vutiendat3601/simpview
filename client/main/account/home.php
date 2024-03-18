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
                <a id="menu" class="navbar-brand card nav-link mx-2 bg-light" href="index.php?manage=account&query=&user_id=<?php echo $user_id ?>">Tất cả</a>
                <?php
                // Truy vấn danh mục
                $sql = "SELECT * FROM category";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row

                    while ($row = $result->fetch_array()) {
                ?>
                        <a id="menu" class="navbar-brand card nav-link mx-2 bg-light" href="index.php?manage=account&query=&user_id=<?php echo $user_id ?>&category_id=<?php echo $row['category_id']; ?>"><?php echo $row['name'] ?></a>

                <?php
                    }
                }
                ?>
            </div>
        </nav>

        <div class="navbar navbar-nav">
            <a class="rounded-circle clickable nav-link mx-2 bg-light" id="btnRight-profile"><i class="fa-solid fa-angle-right"></i></a>

        </div>
    </div>
</div>



<div class="container my-3">
    <div class="row d-flex">
        <?php
        // truy vấn video theo danh mục hoặc tất cả
        // echo ($_GET['category_id']);
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
                    <h6 style="padding: 0.25rem 0.5rem;" id="title" class="text-capitalize nav-link text-dark"><?php echo $row_videos['title']; ?></h6>
                    
                    <a class="fs-6 mx-2" href="client/uploadvideo.php?video_id=<?php echo $row_videos['video_id'] ?>"><i id="process" class="text-muted fa-solid fa-trash"></i></a>
                    <a class="fs-6 mx-2" href="index.php?manage=account&query=repair&video_id=<?php echo $row_videos['video_id'] ?>"><i id="process" class="text-muted fa-solid fa-wrench"></i></a>
                    <span style="font-size:0.7rem">
               <?php echo $row_videos['updated_at'] ?>
               </span>

                </div>
        <?php
            }
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
    if (clickedIndex <= 4 ) {
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