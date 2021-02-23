<?php
require_once("../config.php");
require_once("../user/auth.php"); 

if (isset($_POST['savenk'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['namakaryawan'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `namakaryawan` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savefoto'])) {  /*Edit File FOTO*/
    $idnk = $_POST['idnk'];
    $nfoto = $_FILES['foto']['name'];
    if ($nfoto=="") {
        ?>
        <script>alert('File foto tidak boleh kosong');location.replace('view.php?id='+<?php echo $idnk; ?>);</script>
    <?php
    return(false);
    }
    $cfoto = $db->prepare("SELECT foto FROM karyawan WHERE idkar=$idnk");
    $cfoto->execute();
    $frow = $cfoto->fetch(PDO::FETCH_ASSOC);
    extract($frow);
    $ffoto = "../img/foto/".$foto;
    $ext = pathinfo($nfoto, PATHINFO_EXTENSION);
    $newname = $idnk.'.'.$ext;
    if (isset($foto) && $foto==$newname) {
        if (file_exists($ffoto)) {
            unlink($ffoto); /*Delete file lama*/
            move_uploaded_file($_FILES['foto']['tmp_name'], $ffoto);
            if (file_exists($ffoto)) {
                header('location: view.php?id='.$idnk);
            } else {
                $handle = "<script type='text/javascript'>
                          alert('Upload Foto GAGAL');
                          location.replace('view.php?id='".$idnk.");
                        </script>";
                echo $handle;
            }
        }
    } else {
        $ffoto = "../img/foto/".$newname;
        $infoto = $db->prepare("UPDATE `karyawan` SET `foto` = '$newname' WHERE `karyawan`.`idkar`=$idnk");
        $infoto->execute();
        move_uploaded_file($_FILES['foto']['tmp_name'], $ffoto);
        if (file_exists($ffoto)) {
            header('location: view.php?id='.$idnk);
        } else {
            $handle = "<script type='text/javascript'>
                      alert('Upload Foto GAGAL');
                      location.replace('view.php?id='".$idnk.");
                    </script>";
            echo $handle;
        }
    } 
} elseif(isset($_POST['savealamat'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['alamat'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `alamat` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savedomisili'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['domisili'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `domisili` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savenoktp'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['noktp'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `noktp` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savenohp'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['nohp'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `nohp` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savettgll'])) {
    $idnk = $_POST['idnk'];
    $upt4 = $_POST['tempat'];
    $updk = $_POST['ttgll'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `ttgll` = '$updk', `tempat` = '$upt4' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savependidikan'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['pendidikan'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `pendidikan` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savepernikahan'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['pernikahan'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `pernikahan` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savetglmasuk'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['tglmasuk'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `tglmasuk` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savestatus'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['status'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `status` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savepenempatan'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['penempatan'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `penempatan` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savedevisi'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['devisi'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `devisi` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savejabatan'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['jabatan'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `jabatan` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savecuti'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['cuti'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `cuti` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savesp'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['sp'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `sp` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} elseif(isset($_POST['savegaji'])) {
    $idnk = $_POST['idnk'];
    $updk = $_POST['gaji'];
    $xudk = $db->prepare("UPDATE `karyawan` SET `gaji` = '$updk' WHERE `karyawan`.`idkar`=$idnk");
    $xudk->execute();
    header('location: view.php?id='.$idnk);
} else {
	echo "ERROR";
}

?>