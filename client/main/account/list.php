<?php
// Xóa list
if (isset($_GET['categorylist_id']) && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $categorylist_id = $_GET['category_list'];

    $sql = "DELETE FROM playlist WHERE categorylist_id = $categorylist_id AND user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        //echo "Record deleted successfully";
    } else {
        //echo "Error deleting record: " . $conn->error;
    }


    $sql_categorylist = "DELETE FROM categorylist WHERE categorylist_id = $categorylist_id AND user_id = $user_id";

    if ($conn->query($sql_categorylist) === TRUE) {
        //echo "Record deleted successfully";
    } else {
        //echo "Error deleting record: " . $conn->error;
    }
}


?>

<?php
// Thêm list
if (isset($_SESSION['client_id'])) {
    $user_id = $_SESSION['client_id'];

    // echo $user_id;
}
if (isset($_POST['newlist'])) {
    $list = $_POST['list'];

    $sql = "INSERT INTO categorylist(name, user_id) VALUES('$list','$user_id')";

    // echo $sql;
    if ($conn->query($sql) === TRUE) {
?>
        <script>
            window.location.replace("index.php?manage=account&query=list");
        </script>
<?php
    }
}
?>

<div class="d-flex flex-row mx-3 my-4">

    <div class="col-6 col-md-6 my-2">
        <h6 class="text-uppercase bolder text-dark">Danh sách phát của bạn</h6>
    </div>
    <div class="dropdown col-md-6 col-6">

        <div style="float: right;" class="btn btn-white dropdown-toggle" type="button" id="dropdownMenu3" data-bs-toggle="dropdown" aria-expanded="false">
            <h6 id="btn-add" class="text-muted">Thêm danh sách phát</h6>
        </div>

        <div id="listForm" class="dropdown-menu col-md-9 col-lg-6 col-12" aria-labelledby="dropdownMenu3">
            <form class="form-floating mx-3 my-1" action="" method="POST">
                <input style="height: 5rem;" type="text" class="form-control" name="list" id="floatingInputValue" placeholder="Tên danh sách phát">
                <label class="text-muted" for="floatingInputValue">Tên danh sách phát</label>
                <button style="float: right;" type="submit" name="newlist" class="btn btn-sm text-primary fw-bolder">TẠO</button>
            </form>
        </div>
    </div>

</div>


<div class="d-flex row">

    <?php
    $sql_list = "SELECT * FROM categorylist
                            WHERE categorylist.user_id = $user_id 
                            ORDER BY categorylist.categorylist_id DESC";
    //echo $sql_list;
    $result_list = $conn->query($sql_list);

    if ($result_list->num_rows > 0) {
        // output data of each row

        while ($row_list = $result_list->fetch_array()) {
    ?>


            <?php

            $sql_playlist = "SELECT * FROM playlist WHERE categorylist_id= $row_list[categorylist_id] AND user_id = $user_id ORDER BY list_id DESC LIMIT 1";
            $result_playlist = $conn->query($sql_playlist);

            if ($result_playlist->num_rows > 0) {
                // output data of each row

                while ($row_playlist = $result_playlist->fetch_array()) {
            ?>
                    <?php

                    $sql_videos = "SELECT * FROM videos WHERE video_id = $row_playlist[video_id]";
                    $result_videos = $conn->query($sql_videos);

                    if ($result_videos->num_rows > 0) {
                        // output data of each row

                        $row_videos = $result_videos->fetch_array();
                        $v = $row_videos['video_id'];
                    ?>
                        <div class="my-3 mx-2 d-flex flex-row">
                            <div class="col-md-3 col-6">


                                <div class="ratio ratio-16x9" onclick="location.href='watch.php?video_id=<?php echo $v ?>&categorylist_id=<?php echo $row_list['categorylist_id'] ?>';" style="cursor:pointer;">
                                    <video id="myvideos" muted="muted" class="myvideos" src="server/upload/<?php echo $row_videos['filepath']; ?>"></video>
                                </div>
                            </div>
                            <div class="col-6 col-md-9 mx-2">
                                <h5 style="padding-bottom:0;" class="text-dark nav-link"><?php echo $row_list['name']; ?></h5>
                                <h6 id="title-list" class="text-capitalize">
                                    <?php echo $row_videos['title']; ?>
                                </h6>
                                <a id="list-link" class="nav-link nav-item text-muted" href="index.php?manage=account&query=listvideos&categorylist_id=<?php echo  $row_list['categorylist_id'] ?>&user_id=<?php echo $user_id ?>">Xem toàn bộ danh sách</a>
                                <a class="fs-6 nav-link nav-item" href="index.php?manage=account&query=list&categorylist_id=<?php echo  $row_list['categorylist_id'] ?>&user_id=<?php echo $user_id ?> "><i id="process" class="text-muted fa-solid fa-trash"></i></a>
                            </div>
                        </div>

                    <?php

                    } else {
                        //echo "0 results";
                    }
                    ?>

            <?php
                }
            } else {
                //echo "0 results";
            }
            ?>

    <?php
        }
    } else {
        //echo "0 results";
    }
    ?>

</div>
