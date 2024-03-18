<?php
$user_id = $row['user_id'];
?>
<div class="container d-flex justify-content-center my-3">
    <div class="col-md-6 col-12 my-3 text-center">
        <h6 class="text-uppercase text-dark my-3">Thêm video</h6>
        <form action="client/uploadvideo.php?user_id=<?php echo $row['user_id'] ?>" method="POST" enctype="multipart/form-data">

            <div class="input-group my-3">
                <label style="width: 30%;" class="text-muted input-group-text" for="inputGroupSelect08">Tên video</i></label>
                <input type="text" name="title" id="inputGroupSelect08" class="form-control">
            </div>

            <div class="input-group my-3">
                <label style="width: 30%;" class="text-muted input-group-text" for="inputGroupSelect07">Mô tả</i></label>
                <input type="text" name="content" id="inputGroupSelect07" class="form-control">
            </div>

            <div class="input-group my-3">
                <label style="width: 30%;" class="text-muted input-group-text" for="inputGroupSelect01">Danh mục</i></label>
                <select class="form-select" id="inputGroupSelect01" name="category_id">
                    <?php

                    $sql = "SELECT * FROM category ORDER BY category_id DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_array()) {

                    ?>
                            <option class="text-capitalize" value="<?php echo $row['category_id'] ?>"><?php echo $row['name'] ?></option>
                    <?php
                        }
                    } else {
                        //echo "0 results";
                    }
                    ?>

                </select>

            </div>

            <div class="input-group my-3">
                <label style="width: 30%;" class="text-muted input-group-text" for="inputGroupSelect02">Trạng thái</i></label>
                <select class="form-select" id="inputGroupSelect02" name="status">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>

            </div>

            <div class="mb-3">
                <label for="formFileMultiple" class="form-label text-dark fs-6 fw-bolder">Video của bạn</label>
                <input id="input-file" name="video" class="form-control" type="file" id="formFileMultiple" multiple>
            </div>
            <button style="width:100%; border-radius:0.5rem" type="submit" name="uploadvideo" class="btn btn-sm mb-3 btn-custom">Thêm video</button></td>
        </form>
    </div>

</div>