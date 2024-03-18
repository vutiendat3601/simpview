<?php
    if (isset($_GET['manage']) && $_GET['query'] ) {
        $temp = $_GET['manage'];
        $query = $_GET['query'];
    } else {
        $temp = '';
        $query ='';
    }
    if ($temp == 'account' && $query == 'list') {
        include("account/list.php");
    }elseif ($temp == 'account' && $query == 'listvideos') {
            include("account/listvideos.php");
    } elseif ($temp == 'account' && $query == 'file') {
        include("account/file.php");
    } elseif ($temp == 'account' && $query == 'about') {
        include("account/about.php");
    } elseif ($temp == 'account' && $query == 'repair') {
        include("account/repair.php");
    } else {
        include("account/home.php");
    }
    ?>