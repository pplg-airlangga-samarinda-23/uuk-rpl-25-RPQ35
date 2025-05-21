<?php
include '../db-con.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['log-out'])) {
        session_destroy();
        header("location:../");

    } elseif (isset($_POST['kader-open'])) {
        $id_open = $_POST['kader-open'];


        // foreach (explode("!", $_SESSION['kader-out']) as $data) {
        //     $data = unserialize($data);
        //     if ($data['id'] == $id_open) {
        //         $nama = $data['nama'];
        //     }
        // }

    } elseif ($_POST['bayi_update']) {
        $tinggi=$_POST['tinggi_bayi'];
        $berat=$_POST['berat_bayi'];
        $inserting_bayi=$pdo_conne->prepare("INSERT INTO `bayi` VALUES (null,{$_SESSION['kader-open']},$berat,$tinggi)");
        $inserting_bayi->execute();
    }
} else {
    function panggil($pdo_conne)
    {
        // ini_set('display_errors', 0);
        $_SESSION['kader_out'] = "";
        $stmt = $pdo_conne->prepare("SELECT * FROM `bayi` ORDER BY `id` DESC ");
        $stmt->execute();
        // var_dump($_SESSION['kader_out']);
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $b) {
            foreach (explode("!", $_SESSION['kader_out']) as $arry) {
                if ($arry == null) {
                    continue;
                }
                if (unserialize(($arry))) {
                    if (in_array($b['nama'], unserialize($arry))) {
                        $_SESSION['skipper'] = $b['id'];
                    }
                } else {
                    break;
                }
            }
            if ($_SESSION['skipper'] == $b['id']) {
                continue;
            }
            $b = serialize($b);
            $_SESSION['kader_out'] = $_SESSION['kader_out'] . "!" . $b;
        }
        header('location:../');
    }
    panggil($pdo_conne);
}
