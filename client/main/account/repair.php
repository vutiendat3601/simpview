<?php
$sql = "SELECT * FROM videos WHERE video_id='$_GET[video_id]' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_array()) {

?>

        <div class="container d-flex justify-content-center my-3">
            <div class="col-lg-6 my-3 text-center">
                <h6 class="text-uppercase text-muted my-3">Sửa video</h6>
                <form action="client/uploadvideo.php?video_id=<?php echo $row['video_id'] ?>" method="POST" enctype="multipart/form-data">

                    <div class="input-group my-3">
                        <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect08">Tên video</i></label>
                        <input id="input-videos" type="text" name="title" id="inputGroupSelect08" value="<?php echo $row['title'] ?>" class="form-control">
                    </div>

                    <div class="input-group my-3">
                        <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect07">Mô tả</i></label>
                        <input id="input-videos" type="text" name="content" id="inputGroupSelect07" value="<?php echo $row['content'] ?>" class="form-control">
                    </div>

                    <div class="input-group my-3">
                        <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect01">Danh mục</i></label>
                        <select id="input-videos" class="form-select" id="inputGroupSelect01" name="category_id">
                            <?php

                            $sql = "SELECT * FROM category ORDER BY category_id DESC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row_category = $result->fetch_array()) {

                            ?>
                                    <option class="text-capitalize" selected value="<?php echo $row_category['category_id'] ?>"><?php echo $row_category['name'] ?></option>

                            <?php
                                }
                            } else {
                                //echo "0 results";
                            }
                            ?>
                        </select>

                    </div>

                    <div class="input-group my-3">
                        <label style="width: 18%;" class="text-muted input-group-text" for="inputGroupSelect02">Trạng thái</i></label>
                        <select id="input-videos" class="form-select" name="status" id="inputGroupSelect02">
                            <?php
                            if ($row['status'] == 1) {
                            ?>
                                <option value="1" selected>Kích hoạt</option>
                                <option value="0">Ẩn</option>
                            <?php
                            } else {
                            ?>
                                <option value="1">Kích hoạt</option>
                                <option value="0" selected>Ẩn</option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div>
                        <label for="formFileMultiple" class="form-label text-dark fs-6 fw-bolder">Video cũ của bạn</label>
                        <div class="ratio ratio-16x9 my-2">
                            <video id="myvideos" muted="muted" class="myvideos" src="server/upload/<?php echo $row['filepath']; ?>"></video>
                        </div>
                        <input id="input-file" name="video" class="form-control my-3" type="file" id="formFileMultiple" multiple>
                    </div>


                    <button style="width:40%; border-radius:0.5rem;" type="submit" name="repair" class="btn btn-sm btn-success mb-3">Sửa video</button></td>

                </form>
            </div>
    <?php }
} else {
    //echo "0 results";
} ?>