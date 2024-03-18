<?php
session_start();
include("server/conn.php");
$video_id = $_GET['video_id'];

$sql_update_views = "UPDATE videos SET views = views + 1 WHERE video_id = '$video_id'";
$conn->query($sql_update_views);
//echo $v;
$sql_videos = "SELECT * FROM videos
WHERE videos.video_id= '$video_id'
ORDER BY videos.video_id DESC";
//echo $sql_videos;
$result_videos = $conn->query($sql_videos);

if ($result_videos->num_rows > 0) {
    // output data of each row

    while ($row_videos = $result_videos->fetch_array()) {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Bootstrap CSS -->
            <link rel="shortcut icon" href="img/title.png">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
           
            <title><?php echo $row_videos['title'] ?></title>
        </head>

        <body>
            <script>
                $(document).ready(function() {
                    $(".myvideos").on("mouseover", function(event) {
                        this.play();

                    }).on('mouseout', function(event) {
                        this.pause();

                    });
                })
            </script>
            <?php
            include('client/header.php');
            ?>
            <div class="container-xxl ">
                

               
                <div class="row">

                    <div class="col-md-8 my-3">
                        <div class="ratio ratio-16x9">
                            <iframe src="server/upload/<?php echo $row_videos['filepath']; ?>" allowfullscreen></iframe>
                        </div>

                        <div>
                            <h5 id="titlte-list" class="text-dark text-capitalize my-4 mx-2"><?php echo $row_videos['title']; ?></h5>

                            <?php
                            $user_id = $row_videos['user_id'];

                            $sql_users = "SELECT * FROM users WHERE users.user_id= $user_id";
                            $result_users = $conn->query($sql_users);

                            if ($result_users->num_rows > 0) {
                                // output data of each row

                                $row_users = $result_users->fetch_array();
                            ?>
                            <div class="d-flex flex-row">
                            <div class="col-sm-1">
                                <img id="img-user" src="server/img/<?php echo $row_users['img']; ?>" class="img-user-watch rounded-circle mx-2" alt="">
                            </div>
                            <div class="col-sm-2">
                                <a id="user-watch" class="text-dark nav-link" href="index.php?manage=profile&user_id=<?php echo $row_users['user_id']; ?>"><?php echo $row_users['first_name'] ?> <?php echo $row_users['last_name'] ?></i></a>
                            </div>
                            <div class="col-sm-4">
                                <p class="mx-2" class="mx-2" style="margin-top: 0.25rem;">Lượt xem: <?php echo $row_videos['views']; ?></p>
                            </div>
                            <div class="col-sm-4 d-flex justify-content-end">
                                    <?php include('client/main/report.php'); ?>
                            </div>
                            <div class="col-sm-1 d-flex justify-content-end">
                                    <?php include('client/main/account/addplaylist.php'); ?>
                            </div>
                            </div>
                            
                                    

                            <?php
                                
                            } else {
                                //echo "0 results";
                            }
                            ?>
                        </div>

                        <div class="my-4">
                            <p class="mx-2"><?php echo $row_videos['content']; ?></p>
                        </div>

                        <?php 
                        include('client/comment.php');
                        ?>

                    </div>

                


                    <div class=" col-12 col-md-4 my-3">
                        <?php
                        // List
                        if(isset($_GET['categorylist_id'])){
                            include('client/main/account/playlist.php');
                        }
                            
                        ?>
                        <h6 style="font-size: 1rem;" class="mx-2 mb-2">Danh sách đề xuất</h6>
                        <?php
                        $sql_related = "SELECT * FROM videos
                            WHERE videos.category_id = $row_videos[category_id] AND videos.privacy= 1
                            AND videos.video_id < $row_videos[video_id] + 50
                            ORDER BY videos.video_id LIMIT 50";
                        //echo $sql_related;
                        $result_related = $conn->query($sql_related);

                        if ($result_related->num_rows > 0) {
                            // output data of each row

                            while ($row_related = $result_related->fetch_array()) {
                        ?>
                        
                            
                                <div class="d-flex flex-row my-3" onclick="location.href='watch.php?video_id=<?php echo $row_related['video_id']?>';" style="cursor:pointer;">

                                
                                <div class="col-5">
                                    <div class="ratio ratio-16x9">
                                        <video id="myvideos" muted="muted" class="myvideos" src="server/upload/<?php echo $row_related['filepath']; ?>"></video>
                                    </div>
                                </div>
                                <div class="col-7 mx-2">
                                    <h6 style="padding: 0.25rem 0.5rem;" id="title-list" class="text-dark nav-link"><?php echo $row_related['title']; ?></h6>

                                    <?php
                                    $id = $row_related['user_id'];

                                    $sql_users = "SELECT * FROM users WHERE users.user_id= $id";
                                    $result_users = $conn->query($sql_users);

                                    if ($result_users->num_rows > 0) {
                                        // output data of each row

                                        $row_users = $result_users->fetch_array();
                                    ?>
                                            <a id="user" class="text-dark" href="index.php?manage=profile&user_id=<?php echo $row_users['user_id']; ?>"><?php echo $row_users['first_name'] ?> <?php echo $row_users['last_name'] ?></i></a>
                                            <span style="font-size:0.7rem">
               <?php echo $row_videos['updated_at'] ?>
               </span>

                                    <?php
                                        
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

            </div>          
        </body>

        </html>

<?php
    }
} else {
    //echo "0 results";
}
?>