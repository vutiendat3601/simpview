<?php
// Truy vấn thông tin của tài khoản
if (isset($_SESSION['login'])) {
    $account = $_SESSION['login'];

    $sql = "SELECT * FROM users WHERE username ='$account' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_array();

?>

        <div class="col-md-12 col-12 rounded-3">
            <img style="background-color: #e7f0fe;" id="img-bg" src="server/img/<?php echo $row['profile_pic']; ?>" class="rounded-3 img-fluid" alt="">
        </div>

        <div class="d-flex">

            <div class="col-md-3 col-3 text-center">
                <img style="background-color: #e7f0fe;" id="img-profile" src="server/img/<?php echo $row['img']; ?>" class="img-thumbnail rounded-circle" alt="">
            </div>

            <div id="name-profile" class="col-md-9 col-9 text-left">

                <h4 class="fw-bold text-dark col-12"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></h4>
                <p class="text-dark col-12"><?php echo $row['email']; ?></p>
                <br>
            </div>
        </div>

        
        <nav id="nav-profile" class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a id="menu-profile" href="index.php?manage=account&query=&user_id=<?php echo $row['user_id']; ?>" class="nav-link" aria-current="page">TRANG CHỦ</a>
                        <a id="menu-profile" href="index.php?manage=account&query=list" class="nav-link" >DANH SÁCH PHÁT</a>
                        <a id="menu-profile" href="index.php?manage=account&query=file" class="nav-link">QUẢN LÝ VIDEO</a>
                        <a id="menu-profile" href="index.php?manage=account&query=about" class="nav-link">GIỚI THIỆU</a>
                    </div>
                </div>
            </div>
        </nav>

        <?php
        include('main.php');
        ?>
<?php
    }
}
?>