<?php
if (isset($_GET['categorylist_id'])  && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $categorylist_id = $_GET['categorylist_id'];

}
if (isset($_GET['delete'])) {

    $video_id = $_GET['delete'];


    $sql = "DELETE FROM playlist WHERE video_id = $video_id";

    if ($conn->query($sql) === TRUE) {
        //echo "Record deleted successfully";
    } else {
        //echo "Error deleting record: " . $conn->error;
    }
}
?>


<?php
$sql_list = "SELECT * FROM categorylist
                            WHERE categorylist.user_id = $user_id AND categorylist.categorylist_id = $categorylist_id LIMIT 1";
//echo $sql_list;
$result_list = $conn->query($sql_list);

if ($result_list->num_rows > 0) {
    // output data of each row

    $row_list = $result_list->fetch_array();

?>


    <div class="mx-3 my-4">
        <h6 class="text-uppercase bolder text-muted">Danh sách phát: <?php echo $row_list['name']; ?></h6>

    </div>

<?php

} else {
    //echo "0 results";
}


?>



<div class="container my-3">
    <div class="row d-flex">

        <?php
        $sql_playlist = "SELECT * FROM playlist WHERE categorylist_id= $categorylist_id AND user_id = $user_id ORDER BY list_id DESC";
        $result_playlist = $conn->query($sql_playlist);

        if ($result_playlist->num_rows > 0) {
            // output data of each row

            while ($row_playlist = $result_playlist->fetch_array()) {

        ?>


                <div class="col-md-3 col-4 my-2">


                    <?php

                    $sql_videos = "SELECT * FROM videos WHERE video_id = $row_playlist[video_id]";
                    $result_videos = $conn->query($sql_videos);

                    if ($result_videos->num_rows > 0) {
                        // output data of each row

                        $row_videos = $result_videos->fetch_array();
                    ?>


                        <div class="ratio ratio-16x9" onclick="location.href='watch.php?video_id=<?php echo $row_videos['video_id'] ?>&categorylist_id=<?php echo $categorylist_id ?>';" style="cursor:pointer;">
                            <video id="myvideos" muted="muted" class="myvideos" src="server/upload/<?php echo $row_videos['filepath']; ?>"></video>
                        </div>
                    <?php

                    } else {
                        //echo "0 results";
                    }
                    ?>

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
                                    <a style="transform: translateY(0.5rem);" class="text-dark" href="index.php?manage=profile&user_id=<?php echo $row_users['user_id']; ?>"><img id="img-user-video" src="server/img/<?php echo $row_users['img']; ?>" class="rounded-circle mx-1" alt="..."></a>
                                    <h6 id="title" style="padding: 0.25rem 0.5rem;" class="text-capitalize text-dark"><?php echo $row_videos['title']; ?></h6>
                                </div>
                                <a id="user" class="text-dark" href="index.php?manage=profile&user_id=<?php echo $row_users['user_id']; ?>"><?php echo $row_users['first_name'] ?> <?php echo $row_users['last_name'] ?></a>
                                <span style="font-size:0.7rem">
               <?php echo $row_videos['updated_at'] ?>
               </span>

                        <?php
                            }
                        } else {
                            //echo "0 results";
                        }
                        ?>
                        <a class="fs-6 text-dark mx-2" href="index.php?manage=account&query=listvideos&categorylist_id=<?php echo  $row_list['categorylist_id'] ?>&user_id=<?php echo $user_id ?>&delete=<?php echo $row_playlist['video_id']; ?>"><i id="i" class="fa-solid fa-trash"></i></a>
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