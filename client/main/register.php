<script>
        function checkregister() {
            // Mã JavaScript đã được định nghĩa ở trên
        }

        function checkemail(email) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = this.responseText.trim();
                    if (response === "Email đã tồn tại!") {
                        x = document.getElementById("checkemail");
                        x.innerHTML = response;
                        x.style.display = "block";
                        y = false;
                    } else {
                        x = document.getElementById("checkemail");
                        x.style.display = "none";
                    }
                }
            };
            xmlhttp.open("GET", "checkemail.php?email=" + email, true);
            xmlhttp.send();
        }
</script>

<div class="py-3">
<h5 class="text-center my-3">ĐĂNG KÝ</h5>
<?php
if (isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql_checkusername = "SELECT * FROM users WHERE username='$username'";
    $result_checkusername = $conn->query($sql_checkusername);

    $sql_checkemail = "SELECT * FROM users WHERE email='$email'";
    $result_checkemail = $conn->query($sql_checkemail);

    // Kiểm tra username đã tồn tại chưa
    if ($result_checkusername->num_rows > 0 ) {
        echo '<div style="color: red; text-align: center; font-size: .875rem; margin-bottom: 10px;">
    
        <span>Tài khoản đã tồn tại!</span>
        
        </div>';
    }
    elseif ($result_checkemail->num_rows > 0) {
        echo '<div style="color: red; text-align: center; font-size: .875rem; margin-bottom: 10px;">
    
        <span>Email đã tồn tại!</span>
        
        </div>';
    } else {
        $sql_adduser = "INSERT INTO users(first_name, last_name, username, email, password) VALUES('$first_name','$last_name','$username','$email','$password')";
        $result_adduser = $conn->query($sql_adduser);
?>
        <script>
            window.location.replace("index.php?manage=login");
        </script> 
      
<?php
        }
    }
?>
<div class="row d-flex justify-content-center align-items-center">
    <div style="padding-right: 15px; padding-left: 15px;" class="col-md-6 col-lg-4 col-9">
        <div class="mb-3">
            <form onsubmit="return checkregister()" action="" method="POST">
                <div id="form-log" class="d-grid gap-2">
                    <input id="first_name" type="text" name="first_name" class="form-control form-control-sm form-log mb-1" placeholder="Tên" autofocus><span class="e mx-1" id="checkfirst_name"></span>
                    <input id="last_name" type="text" name="last_name" class="form-control form-control-sm form-log my-1" placeholder="Họ"><span class="e mx-1" id="checklast_name"></span>
                    <input id="username" type="text" name="username" class="form-control form-control-sm form-log my-1" placeholder="Tài khoản"><span class="e mx-1" id="checkusername"></span>
                    <input id="email" type="text" name="email" class="form-control form-control-sm form-log my-1" placeholder="Email" onchange="checkemail(this.value)">
                        <span class="e mx-1" id="checkemail"></span>
                    <input id="password" type="password" name="password" class="form-control form-control-sm form-log my-1" placeholder="Mật khẩu"><span class="e mx-1" id="checkpassword"></span>
                    <input id="repassword" type="password" name="repassword" class="form-control form-control-sm form-log mt-1 mb-2" placeholder="Nhập lại mật khẩu"><span class="e mx-1" id="checkrepassword"></span>
                    <button type="submit" name="register" class="btn-id btn btn-sm btn-custom form-log">Đăng ký</button>
                </div>
            </form>
            <hr class="my-3">
            <div class="d-flex justify-content-center">
                Bạn đã có tài khoản? <a style="text-decoration: none;" class="mx-1" href="index.php?manage=login">Đăng nhập</a></button>

            </div>
        </div>
    </div>
</div>
</div>
<style>
    .form-log{
        border-radius: 50rem !important;
    }
    .e{
        display: none;
        line-height: 0.3rem;
        font-size: 0.7rem;
        color: #d93025;
    }
</style>
