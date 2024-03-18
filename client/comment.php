<div class="my-4 mx-2">
<?php
        $video_id = $_GET['video_id'];
      if (isset($_SESSION['login'])) {


        $account = $_SESSION['login'];

        $sql = "SELECT * FROM users WHERE username ='$account' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          $row = $result->fetch_array();

            $user_id = $row['user_id'];
            //save cmt
            if (isset($_POST['cmt_submit'])) {
                $cmt =$_POST['cmt'];
            
                $sql_cmt = "INSERT INTO comments(user_id, video_id ,cmt) VALUES('$user_id','$video_id','$cmt')";
            
                if ($conn->query($sql_cmt) === TRUE) {
            ?>
                    <script>
                        window.location.replace("watch.php?video_id=<?php echo $v ?>");
                    </script>
            <?php
                } else {
                //
                }
            }


      ?>
            <div class="d-flex row-flex">
            <div class="col-1">
                <img style=" background-color: #FADADD" id="img-user" src="server/img/<?php echo $row['img']; ?>" class="rounded-circle" alt="">
            </div>
            <div class="col-11">
                <form action="" method="POST">
                <div class="">
                    <input  id="cmt" type="text" name="cmt" class="form-control mb-1" placeholder="Viết bình luận ..."><em id="checkrepassword"></em>
                    <button id="btn-cmt" style="float: right;" type="submit" name="cmt_submit" class="btn btn-sm btn-custom my-1">Bình luận</button>
                </div>
            </form>
            </div>
            
        </div>
            
        <?php
        } else {
          //echo "0 results";
        }

        ?>

      <?php
      } else { ?>
      <div class="d-flex row-flex">
      
        <span style="font-size: 1.4rem;"><i class="fa-solid fa-user"></i></span>
        
    
      <a href="index.php?manage=login" class="mx-2 fs-6 text-dark navbar-nav nav-link px-2">Đăng nhập để bình luận</a>
      
      
      </div>
      <?php } ?>

    
</div>

<div class="my-2">
    <?php
        $sql = "SELECT * FROM comments WHERE comments.video_id = $video_id ORDER BY comments.comment_id DESC ";
        $result = $conn->query($sql);

        // echo $sql;
        if ($result->num_rows > 0) {
          // output data of each row
            while ($row = $result->fetch_array()) {




    ?>
    
    <div class="d-flex row-flex my-3">
        <?php
        $user_id = $row['user_id'];
        $sql_user = "SELECT * FROM users WHERE user_id ='$user_id' LIMIT 1";
        $result_user = $conn->query($sql_user);
        
        
        if ($result_user->num_rows > 0) {
          // output data of each row
          $row_user = $result_user->fetch_array();
        ?>
            <div class="col-sm-1">
                <img style=" background-color: #FADADD" id="img-user" src="server/img/<?php echo $row_user['img']; ?>" class="img-user-watch rounded-circle mx-2" alt="">
            </div>
            <div class="col-sm-11">
               <span style="font-weight: bolder !important; font-size:0.875rem" class="text-lowercase mx-1">
                    @<?php echo $row_user['username'] ?>
               </span>
               <span style="font-size:0.7rem">
               <?php echo $row['created_at'] ?>
               </span>
               <p class="mx-1" >
                    <?php echo $row['cmt'] ?>
               </p>
            </div>
            <?php
        } else {
          //echo "0 results";
        }

        ?>
            </div>
            <?php
            }
        } else {
          //echo "0 results";
        }

        ?>

</div>