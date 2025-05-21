<?php
session_start();
// $_SESSION['login']=false;

$pdo_conne=new PDO("mysql:hostname=locallhost;dbname=posynadu","root","live");
$pdo_conne->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


$testing=$pdo_conne->prepare("SELECT * FROM `role` ");
$testing->execute();


?>