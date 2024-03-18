<div class="container my-3">
    <?php
    if (isset($_GET['manage'])) {
        $temp = $_GET['manage'];
    } else {
        $temp = '';
    }
    if ($temp == 'login') {
        include("main/login.php");
    } elseif ($temp == 'register') {
        include("main/register.php");
    } elseif ($temp == 'account') {
        include("main/account.php");
        ?>
        <style>
            #none {
                display: none !important;
            }
        </style>
    <?php
    } elseif ($temp == 'forgotpassword') {
        include("main/forgotpassword.php");
    } elseif ($temp == 'resetpassword') {
        include("main/resetpassword.php");
    

    } elseif ($temp == 'profile') {
        include("main/profile.php");
    ?>
        <style>
            #none {
                display: none !important;
            }
        </style>
    <?php

    } elseif ($temp == 'search') {
        include("main/search.php");
    } elseif ($temp == 'changepassword') {
        include("main/changepassword.php");
    } else {
        include("main/home.php");
    }
    ?>
</div>