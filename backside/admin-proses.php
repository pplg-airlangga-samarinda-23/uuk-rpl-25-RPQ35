<?php
include '../db-con.php';
if($_SERVER['REQUEST_METHOD']==="POST"){
    if(isset($_POST['log-out'])){
        session_destroy();
        header ("location:../");
    }
}

?>