<?php
require_once("../config.php");
require_once("../user/auth.php"); 

if (isset($_POST['savenk'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['namakaryawan'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `namakaryawan` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['saveal'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['alamat'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `alamat` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
}

?>