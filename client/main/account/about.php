<div class="border-bottom my-3 mx-2 py-3 d-flex row">
    <div class="col-md-6 col-12 my-2">
        Ngày tham gia <?php echo $row['created_at'] ?>
    </div>
    <div class="col-md-6 col-12 my-2 text-center">

        <h5 class="text-start mx-2 my-2">
            Cập nhật
        </h5>
        <form style="width: 100%;" class="float-end my-2" action="client/uploadimg.php?user_id=<?php echo $row['user_id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFileSm" class="form-label">Ảnh bìa</label>
                <div class="d-flex">
                    <input id="input-update" name="image" class="form-control form-control-sm" id="formFileSm" type="file">
                    <button id="btn-update"  style="width: 30%" class="btn text-muted btn-sm btn-secondary mx-2" type="submit" name="updateimg" id="inputGroupFileAddon03">Cập nhật</button>
                </div>
            </div>        
        </form>

        <form style="width: 100%;" class="float-end my-2" action="client/uploadprofile.php?user_id=<?php echo $row['user_id'] ?>" method="post" enctype="multipart/form-data">

        <div class="mb-3">
        <label for="formFileSm" class="form-label">Ảnh đại diện</label>
        <div class="d-flex">
            <input id="input-update" name="img" class="form-control form-control-sm" id="formFileSm" type="file">
            <button id="btn-update"  style="width: 30%" class="btn text-muted btn-sm btn-secondary mx-2" type="submit" name="profileimg" id="inputGroupFileAddon03">Cập nhật</button>
        </div>
        </div>
        </form>

    </div>
</div>

<style>
    #input-update{
        border-radius: 0.5rem;
    }
    #btn-update{
        border-radius: 0.5rem;
        background-color: #FDF0F1;
        border: 1px solid #ced4da;
    }
    #btn-update:hover{
        color:#212529 !important;
        background-color: #FADADD;
    }
</style>