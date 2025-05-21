<?php
include '../db-con.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['log-out'])) {
        session_destroy();
        header("location:../");
    } elseif (isset($_POST['kader-open'])) {
        $id_open = $_POST['kader-open'];


        foreach (explode("!", $_SESSION['kader_out']) as $data) {
            $data = unserialize($data);
            if ($data == null) {
                continue;
            }
            if ($data['id'] == $id_open) {
                $_SESSION['nama_bayi'] = $data['nama'];
                $_SESSION['tinggi-an'] = $data['tinggi_badan'];
                $_SESSION['berat-an'] = $data['berat_badan'];
                header("location:../");
            }
        }
    } elseif (isset($_POST['bayi_update'])) {
        if ($_SESSION['nama_bayi'] != null && isset($_POST['tinggi_bayi']) && isset($_POST['berat_bayi'])) {
            $tinggi = $_POST['tinggi_bayi'];
            $berat = $_POST['berat_bayi'];
            $inserting_bayi = $pdo_conne->prepare("INSERT INTO `bayi` VALUES (null,'$_SESSION[nama_bayi]',$berat,$tinggi)");
            $inserting_bayi->execute();
            header("location:../");
        } else {
            $_SESSION['pesanan'] = "pilih bayi , masukan keterangan";
            header("location:../");
        }
    } elseif (isset($_POST['open'])) {
        $nama_open = $_POST['open'];

        $callout = $pdo_conne->prepare("SELECT * FROM `bayi` WHERE `nama` ='$nama_open'");
        $callout->execute();
        $_SESSION['kader_out'] = "";
        foreach ($callout->fetchAll(PDO::FETCH_ASSOC) as $c) {
            $c = serialize($c);
            $_SESSION['kader_out'] = $_SESSION['kader_out'] . "!" . $c;
        }
        header("location:../");
    } elseif (isset($_POST['restes'])) {
        $_SESSION['tinggi-an'] = "";
        $_SESSION['berat-an'] = "";
        header("location:../");
    } elseif (isset($_POST['adder'])) {
        $nama_in=$_POST['nimang'];
        $berat_in=$_POST['niming'];
        $tinggi_in=$_POST['nimong'];

        $inserto=$pdo_conne->prepare("INSERT INTO `bayi` VALUES (null,'$nama_in','$berat_in','$tinggi_in')");
        $inserto->execute();
        header("location:../");
    }
} else {
    function panggil($pdo_conne)
    {
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

        $_SESSION['nama_bayi'] = "";
        $_SESSION['tinggi-an'] = "";
        $_SESSION['berat-an'] = "";
        header('location:../');
    }
    panggil($pdo_conne);
}
