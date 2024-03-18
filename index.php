<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <title>Simp View</title>
  <link rel="shortcut icon" href="img/title.png">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/checkform.js"></script>
  
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      var scrollpos = sessionStorage.getItem('scrollpos');
      if (scrollpos) {
        window.scrollTo(0, scrollpos);
        sessionStorage.removeItem('scrollpos');
      }
    });

    window.addEventListener("beforeunload", function(e) {
      sessionStorage.setItem('scrollpos', window.scrollY);
    });
  </script>
</head>

<body>
  <?php
  ob_start();
  session_start();
  include("server/conn.php");
  include('client/header.php');
  include('client/menu.php');
  include('client/main.php');
  include('client/footer.php');
  ?>
  <script>
    $(document).ready(function() {
  $(".myvideos").on("mouseover", function(event) {
    this.play();

  }).on('mouseout', function(event) {
    this.pause();

  });
})
  </script>
</body>

</html>
