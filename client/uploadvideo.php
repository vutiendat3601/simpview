<?php
include('../server/conn.php');
$title = addslashes($_POST['title']);
$content = addslashes( $_POST['content']);
$category_id = addslashes($_POST['category_id']);
$status = addslashes($_POST['status']);

$video = $_FILES['video']['name'];
$video_tmp = $_FILES['video']['tmp_name'];
$video = time().'_'.$video;

if(isset($_POST['uploadvideo'])){
    $user_id = $_GET['user_id'];
    // add
    $sql = "INSERT INTO videos(user_id,title,content,category_id,privacy,filepath) VALUE('$user_id','$title','$content','$category_id','$status','$video')";
    echo $sql;
    if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    move_uploaded_file($video_tmp,'../server/upload/'.$video);
    ?>
    <script>
        window.location.replace("../index.php?manage=account&query=file");
    </script>       
    <?php
    } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    }

}elseif(isset($_POST['repair'])){
    // repair
    if($video_tmp!=''){
        move_uploaded_file($video_tmp,'../server/upload/'.$video);

        $update = "UPDATE videos SET title='$title', content='$content', category_id='$category_id', privacy='$status', filepath='$video' 
        WHERE video_id='$_GET[video_id]'";
       
        $sql = "SELECT * FROM videos WHERE video_id='$_GET[video_id]' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_array()) {
            unlink('../server/upload/'.$row['filepath']);
        }
        } else {
        //echo "0 results";
        }

    }else{

        $update = "UPDATE videos SET title='$title', content='$content', category_id='$category_id', privacy='$status'
        WHERE video_id='$_GET[video_id]'";
    } 
    
    if ($conn->query($update) === TRUE) {
        //echo "Record updated successfully";
    } else {
        //echo "Error updating record: " . $conn->error;
    }

    ?>
    <script>
        window.location.replace("../index.php?manage=account&query=file");
    </script>       
    <?php
   
}else{
    $video_id=$_GET['video_id'];

    $sql = "SELECT * FROM videos WHERE video_id='$video_id' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
        unlink('../server/upload/'.$row['filepath']);
    }
    } else {
    //echo "0 results";
    }

    $sql = "DELETE FROM videos WHERE video_id='$video_id'";

    if ($conn->query($sql) === TRUE) {
        //echo "Record deleted successfully";
        ?>
        <script>
            window.location.replace("../index.php?manage=account&query=&user_id=<?php echo $row['user_id']; ?>");
        </script>       
        <?php
      ?>
    <!-- <script>
            window.location.replace("../index.php?manage=account&query=file");
        </script>        -->
    <?php
    } else {
      //echo "Error deleting record: " . $conn->error;
    }
}
?>