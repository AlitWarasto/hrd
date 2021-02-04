<?php
require_once("../config.php");
require_once("../user/auth.php"); 

if (isset($_POST['savenk'])) {
    $idnk = $_POST['idnk'];
    $updnk = $_POST['namakaryawan'];
    $unk = $db->prepare("UPDATE `karyawan` SET `namakaryawan` = '$updnk' WHERE `karyawan`.`idkar`=$idnk");
    $unk->execute();
    header('location: view.php?id='.$idnk);
} else {
    print_r("ERROR");
}

?>