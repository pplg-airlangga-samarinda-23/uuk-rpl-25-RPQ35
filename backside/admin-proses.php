<?php
include '../db-con.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['log-out'])) {
        session_destroy();
        header("location:../");
    }
elseif($_SERVER['REQUEST_METHOD']==="GET"){
    if(isset($_GET['admin-open'])){
        $id_open=$_GET['admin-open'];

    }
}
} else {
    function panggil($pdo_conne)
    {
        $_SESSION['admin_out']="";
        $stmt = $pdo_conne->prepare("SELECT * FROM `role`");
        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $b) {
            $b = serialize($b);
            $_SESSION['admin_out'] =$_SESSION['admin_out']. "!" . $b;
        };
        header('location:../');
    }
    panggil($pdo_conne);
}
