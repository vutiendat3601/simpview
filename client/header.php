<?php
// Đăng xuất, hủy sesion
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
  unset($_SESSION['login']);
  unset($_SESSION['client_id']);
}
?>
<div id="header" class="sticky-top py-2">
  <div class="d-flex flex-row align-items-center justify-content-center">
    <div class="align-items-center col-md-2 col-2">
      <a href="index.php" class="px-2 d-flex text-dark justify-content-center text-decoration-none">
        <img id="img-logo" class="img-fluid" src="img/logo.png" alt="">
      </a>
    </div>

    <div class="col-md-8 col-8">
      <form class="d-flex justify-content-center" action="index.php?manage=search" method="POST">
        <div class="input-group rounded-pill" id="search">
          <input id="input-search" name="keyword" type="text" class="form-control" placeholder="Tìm kiếm" aria-describedby="button-addon2">
          <button id="btn-search" name="search" class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass px-2"></i></button>
        </div>
      </form>
    </div>


    <div class="col-md-2 col-2 d-flex justify-content-center">

      <?php
      // Kiểm tra xem đã tồn tai sesion login hay chưa, nếu tồn tại thì truy vấn lấy Id
      if (isset($_SESSION['login'])) {

        $account = $_SESSION['login'];

        $sql = "SELECT * FROM users WHERE username ='$account' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

          $row = $result->fetch_array();


      ?>

          <div class="dropdown">

            <div class="dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
              <a href="index.php?manage=account" class="d-flex text-dark justify-content-center text-decoration-none"><img id="img-user" src="server/img/<?php echo $row['img']; ?>" class="rounded-circle mx-1" style="background-color: #e7f0fe;"></a>
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">


              <li><a class="dropdown-item" type="button" href="index.php?manage=account&query=&user_id=<?php echo $row['user_id']; ?>"><i class="fa-solid fa-user"></i><span class="mx-2"> Kênh của tôi</span></a></li>

              <li><a class="dropdown-item" type="button" href="index.php?manage=changepassword"><i class="fa-solid fa-key"></i><span class="mx-2">Đổi mật khẩu</span></a></li>
              <li><a class="dropdown-item" type="button" href="index.php?logout=1"><i class="fa-solid fa-right-from-bracket"></i><span class="mx-2">Đăng xuất</span></a></li>
            </ul>
          </div>
        <?php
        }
        ?>

      <?php
      } else { ?>
        <a href="index.php?manage=login" class="icon text-muted fs-5 navbar-nav nav-link">
          <i class="fa-solid fa-user rounded-circle" id="user-before"></i>
        </a>
      <?php } ?>

    </div>
  </div>
</div>