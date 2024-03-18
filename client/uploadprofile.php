<?php
include('../server/conn.php');

$image = $_FILES['img']['name'];
$image_tmp = $_FILES['img']['tmp_name'];
$image = time() . '_' . $image;

echo $image;
if (isset($_POST['profileimg'])) {

    // repair
    if ($image_tmp != '') {
        move_uploaded_file($image_tmp, '../server/img/'. $image);

        $update = "UPDATE users SET img='$image' 
            WHERE user_id='$_GET[user_id]'";

        $sql = "SELECT * FROM users WHERE user_id='$_GET[user_id]' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_array()) {
                unlink('../server/img/' . $row['img']);
            }
        } else {
            //echo "0 results";
        }
    } else {

        $update = "UPDATE users SET img='$image' 
            WHERE user_id='$_GET[user_id]'";
    }

    if ($conn->query($update) === TRUE) {
        //echo "Record updated successfully";
    } else {
        //echo "Error updating record: " . $conn->error;
    }

?>
    <script>
        window.location.replace("../index.php?manage=account&query=about");
    </script>
<?php
}
?>