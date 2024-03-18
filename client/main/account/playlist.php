<?php
if (isset($_GET['categorylist_id'])  && isset($_SESSION['client_id'])) {
    $user_id = $_SESSION['client_id'];
    $categorylist_id = $_GET['categorylist_id'];

    //echo $user_id;
}
if (isset($_GET['delete'])) {

    $list_id = $_GET['delete'];


    $sql = "DELETE FROM playlist WHERE list_id = $list_id";

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



    <h6 style="font-size: 1rem;" class="mb-2 mx-2"><?php echo $row_list['name']; ?></h6>

<?php

} else {
    //echo "0 results";
}


?>



<div class="mx-2 my-2">


    <?php
    $sql_playlist = "SELECT * FROM playlist WHERE categorylist_id= $categorylist_id AND user_id = $user_id ORDER BY list_id DESC";
    $result_playlist = $conn->query($sql_playlist);

    if ($result_playlist->num_rows > 0) {
        // output data of each row

        while ($row_playlist = $result_playlist->fetch_array()) {

    ?>


            <div class="d-flex flex-row my-3" style="cursor:pointer;">


                <?php

                $sql_videos = "SELECT * FROM videos WHERE video_id = $row_playlist[video_id]";
                $result_videos = $conn->query($sql_videos);

                if ($result_videos->num_rows > 0) {
                    // output data of each row

                    $row_videos = $result_videos->fetch_array();
                ?>

                    <div class="col-5">


                        <div class="ratio ratio-16x9" onclick="location.href='watch.php?video_id=<?php echo $row_videos['video_id'] ?>&categorylist_id=<?php echo $idlist ?>';">
                            <video id="myvideos" muted="muted" class="myvideos" src="server/upload/<?php echo $row_videos['filepath']; ?>"></video>
                        </div>
                    </div>
                <?php

                } else {
                    //echo "0 results";
                }
                ?>
                <div style="height: 100px;" class="mx-2 col-7">
                    <h6 id="title-list" style="padding: 0.25rem 0.5rem;" class="text-capitalize text-dark"><?php echo $row_videos['title']; ?></h6>
                    
                    <?php
                    $user_id = $row_videos['user_id'];

                    $sql_users = "SELECT * FROM users WHERE users.user_id= $user_id";
                    $result_users = $conn->query($sql_users);

                    if ($result_users->num_rows > 0) {
                        // output data of each row

                        while ($row_users = $result_users->fetch_array()) {
                    ?>
                            <a id="user" class="text-dark" href="index.php?manage=profile&user_id=<?php echo $row_users['user_id']; ?>"><?php echo $row_users['first_name'] ?> <?php echo $row_users['last_name'] ?></i></a>
                            <span style="font-size:0.7rem">
               <?php echo $row_videos['created_at'] ?>
               </span>

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