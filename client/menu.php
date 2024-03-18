<div id="none" class="container my-3">
  <div class="flex-row d-flex">
    <div class="navbar navbar-nav">
      <a class="rounded-circle clickable nav-link mx-2" id="btnLeft"><i class="fa-solid fa-angle-left"></i></a>
    </div>

    <nav class="mainViewer navbar navbar-expand">
      <div class="navbar-nav content" id="content">

        <?php
        ?>
        <a id="menu" class="navbar-brand clickable nav-link mx-2" href="index.php?manage=">Tất cả</a>
        <?php
        // Truy vấn danh mục
        $sql = "SELECT * FROM category";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row

          while ($row = $result->fetch_array()) {
        ?>
            <a id="menu" class="navbar-brand clickable nav-link mx-2" href="index.php?manage=&category_id=<?php echo $row['category_id'] ?>"><?php echo $row['name'] ?></a>

        <?php
          }
        }
        ?>
      </div>
    </nav>

    <div class="navbar navbar-nav">
      <a class="rounded-circle clickable nav-link mx-2" id="btnRight"><i class="fa-solid fa-angle-right"></i></a>

    </div>
  </div>
</div>

<script>
  var btnL = document.getElementById("btnLeft");
  var btnR = document.getElementById("btnRight");

  var content = document.getElementById("content");

  btnR.addEventListener("click", goRight);
  btnL.addEventListener("click", goLeft);

  var clickedIndex = 0;

  function goRight() {
    if (clickedIndex <= 5 ) {
        clickedIndex = clickedIndex + 1;
        content.style.marginLeft = -190 * clickedIndex + "px";
    } else {
        // Nếu bạn muốn vòng quay lại khi đến cuối, có thể sử dụng đoạn sau:
        clickedIndex = 0;
        content.style.marginLeft = "0px";
    }
}

  function goLeft() {
    if (clickedIndex > 0) {
      clickedIndex = clickedIndex - 1;
      content.style.marginLeft = -190 * clickedIndex + "px";

    }
  }
</script>