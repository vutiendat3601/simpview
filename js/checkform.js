function checkregister() {
   var username = document.getElementById("username").value;
   var email = document.getElementById("email").value;
   var password = document.getElementById("password").value;
   var repassword = document.getElementById("repassword").value;

   y = true;
   regex_email = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
   regex_password = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
   regex_username = /^[a-z0-9]{3,16}$/;

   if (!username.match(regex_username)) {
       x = document.getElementById("checkusername");
       x.innerHTML = "Tài khoản ít nhất ba ký tự (a-z), số (0-9)!";
       x.style.display = "block";
       y = false;
   } else {
       x = document.getElementById("checkusername");
       x.style.display = "none";
   }

   if (!email.match(regex_email)) {
       x = document.getElementById("checkemail");
       x.innerHTML = "Email không hợp lệ!";
       x.style.display = "block";
       y = false;
   } else {
       // Gửi yêu cầu kiểm tra email đến file checkemail.php
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

   if (!password.match(regex_password)) {
       x = document.getElementById("checkpassword");
       x.innerHTML = "Mật khẩu tối thiểu tám ký tự, ít nhất một chữ cái và một số!";
       x.style.display = "block";
       y = false;
   } else {
       x = document.getElementById("checkpassword");
       x.style.display = "none";
   }

   if (password != repassword) {
       x = document.getElementById("checkrepassword");
       x.innerHTML = "Mật khẩu không trùng khớp!";
       x.style.display = "block";
       y = false;
   } else {
       x = document.getElementById("checkrepassword");
       x.style.display = "none";
   }
   return y;
}
