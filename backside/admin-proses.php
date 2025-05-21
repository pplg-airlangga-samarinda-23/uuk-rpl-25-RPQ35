<?php
include '../db-con.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['log-out'])) {
        session_destroy();
        header("location:../");
    } elseif (isset($_POST['admin-open'])) {
        $id_open = $_POST['admin-open'];

        foreach (explode("!", $_SESSION['admin_out']) as $data) {
            $data = unserialize($data);
            if ($data == null) {
                continue;
            }
            if ($data['id'] == $id_open) {
                $_SESSION['nama_admin'] = $data['username'];
                $_SESSION['rol'] = $data['role'];
                $_SESSION['id-in'] = $data['id'];
                header("location:../");
            }
        }
    } elseif (isset($_POST['add'])) {
        $namain = $_POST['usn'];
        $passr = $_POST['psw'];
        $rl = $_POST['role'];

        $insertati = $pdo_conne->prepare("INSERT INTO `role` VALUES (NULL, '$namain', '$passr', '$rl')");
        $insertati->execute();

        header("location:../");
    } elseif (isset($_POST['admin_update'])) {
        $id_up = $_POST['admin_update'];
        $rol_in=$_POST['rol-in'];
        $update_admin=$pdo_conne->prepare("UPDATE `role` SET `role` = '$rol_in' WHERE `id` = '$id_up'");
        $update_admin->execute();
        header("location:../");
    } elseif (isset($_POST['restes'])) {
            $id_rem=$_POST['restes'];
            $remover=$pdo_conne->prepare("DELETE FROM `role` WHERE `id` = '$id_rem'");
            $remover->execute();
            header("location:../");
    }
} else {
    function panggil($pdo_conne)
    {
        $_SESSION['admin_out'] = "";
        $stmt = $pdo_conne->prepare("SELECT * FROM `role`");
        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $b) {
            $b = serialize($b);
            $_SESSION['admin_out'] = $_SESSION['admin_out'] . "!" . $b;
        };
        header('location:../');
    }
    panggil($pdo_conne);
    $_SESSION['nama_admin'] = "";
    $_SESSION['rol'] = "";
}
