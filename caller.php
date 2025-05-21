<?php

if($_SESSION['login']==true){
    if($_SESSION['role']=="andmin"){
        include 'views/admin.php';
    }
    else if($_SESSION['role']=="kader"){
        include 'views/kader.php';
    }

}

?>