<?php

include '../db-con.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['log-in'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $admin_check = $pdo_conne->prepare("SELECT * FROM `role` WHERE `username` = '$username' AND `password` = '$password' ");
        $admin_check->execute();
        if ($admin_check->rowCount() > 0) {
            $_SESSION['login'] = true;
            $_SESSION['pesan'] = false;
            foreach ($admin_check->fetchAll(PDO::FETCH_ASSOC) as $roling) {
                $_SESSION['role'] = $roling['role'];
                $_SESSION['username'] = $roling['username'];
            };
            header('location:../');
        } else {
            $_SESSION['pesan'] = true;
            header("location : ../");
        }
    }
}
