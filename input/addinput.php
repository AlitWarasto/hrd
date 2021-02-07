<?php
require_once("../user/auth.php"); 
require_once("../config.php");

if(isset($_POST['saveinput'])){

    $idkar = date("ymd").$_POST['noktp'];
    $namakaryawan = $_POST['namakaryawan'];
    $alamat = $_POST['alamat'];
    $domisili = $_POST['domisili'];
    $noktp = $_POST['noktp'];
    $nohp = $_POST['nohp'];
    $tempat = $_POST['tempat'];
    $ttgll = $_POST['ttgll'];
    $pendidikan = $_POST['pendidikan'];
    $pernikahan = $_POST['pernikahan'];
    $tglmasuk = $_POST['tglmasuk'];
    $status = $_POST['status'];
    $penempatan = $_POST['penempatan'];
    $devisi = $_POST['devisi'];
    $jabatan = $_POST['jabatan'];
    $cuti = $_POST['cuti'];
    $sp = $_POST['sp'];
    $gaji = $_POST['gaji'];

    /*=== upload file ===*/
    $foto = $_FILES['foto']['name'];
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    $newname = $idkar.'.'.$ext;

    /* menyiapkan query */
    $sql = "INSERT INTO karyawan (idkar, namakaryawan, alamat, domisili, noktp, nohp, ttgll, pendidikan, pernikahan, tglmasuk, status, penempatan, devisi, jabatan, cuti, sp, gaji, foto) 
            VALUES (:idkar, :namakaryawan, :alamat, :domisili, :noktp, :nohp, :tempat, :ttgll, :pendidikan, :pernikahan, :tglmasuk, :status, :penempatan, :devisi, :jabatan, :cuti, :sp, :gaji, :foto)";
    $stmt = $db->prepare($sql);

    /* bind parameter ke query */
    $params = array(
        ":idkar" => $idkar,
        ":namakaryawan" => $namakaryawan,
        ":alamat" => $alamat,
        ":domisili" => $domisili,
        ":noktp" => $noktp,
        ":nohp" => $nohp,
        ":tempat" => $tempat,
        ":ttgll" => $ttgll,
        ":pendidikan" => $pendidikan,
        ":pernikahan" => $pernikahan,
        ":tglmasuk" => $tglmasuk,
        ":status" => $status,
        ":penempatan" => $penempatan,
        ":devisi" => $devisi,
        ":jabatan" => $jabatan,
        ":cuti" => $cuti,
        ":sp" => $sp,
        ":gaji" => $gaji,
        ":foto" => $newname,
    );

    /* eksekusi query untuk menyimpan ke database */
    $saved = $stmt->execute($params);

    /* upload file ke destinasi folder */
    move_uploaded_file($_FILES['foto']['tmp_name'], "../img/foto/".$newname);

    /*  jika query simpan berhasil, maka user sudah terdaftar
         maka alihkan ke halaman login
    */
    if($saved) {
        header("Location: index.php");
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Input Data Karyawan Baru Panties Pizza</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- time picker -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="col-md-12 d-flex justify-content-center">
            <h1 class="jt">Input Karyawan Baru<span><br>Panties Pizza</span></h1>
        </div>
    	<div class=" d-flex justify-content-center">
            <div class="glass col-md-4 pb-3 pt-3 rounded rounded-sm jt">
        		<form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="namakaryawan">Nama Karyawan</label>
                        <input class="form-control" type="text" name="namakaryawan" placeholder="Nama Karyawan">
                    </div>
                    <div class="form-group ">
                        <label for="foto">Foto Karyawan</label>
                        <input type="file" name="foto">
                    </div>
                    <div class="form-group ">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" type="text" name="alamat" placeholder="Alamat Asal"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="domisili">Domisili</label>
                        <textarea class="form-control" type="text" name="domisili" placeholder="Domisili Sekarang"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="noktp">Nomor KTP</label>
                        <input class="form-control" type="text" name="noktp" placeholder="Nomor KTP">
                    </div>
                    <div class="form-group ">
                        <label for="nohp">Nomor Handphone</label>
                        <input class="form-control" type="text" name="nohp" placeholder="Nomor Handphone">
                    </div>
                    <div class="form-group ">
                        <label for="tempat">Tempat Lahir</label>
                        <input class="form-control" name="tempat" type="text">
                        <label for="ttgll">Tanggal Lahir</label><br>
                        <input class="datepicker" name="ttgll" type="date">
                    </div>
                    <div class="form-group ">
                        <label for="pendidikan">Pendidikan Terakhir</label>
                        <input class="form-control" name="pendidikan" type="text" placeholder="Pendidikan Terakhir">
                    </div>
                    <div class="form-group ">
                        <label for="pernikahan">Status Pernikahan</label><br>
                        <select name="pernikahan">
                            <option value="Menikah">Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Janda">Janda</option>
                            <option value="Duda">Duda</option>
                        </select> 
                    </div>
                    <div class="form-group ">
                        <label for="tglmasuk">Tanggal Masuk</label>
                        <input class="datepicker" name="tglmasuk" type="date">
                    </div>
                    <div class="form-group ">
                        <label for="status">Status Karyawan</label><br>
                        <select name="status">
                            <option value="Aktif">Aktif</option>
                            <option value="Non Aktif">Non Aktif</option>
                            <option value="Resign">Resign</option>
                            <option value="PHK">PHK</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="penempatan">Penempatan</label><br>
                        <select name="penempatan">
                            <option value="Kantor Pusat">Kantor Pusat</option>
                            <option value="Outlet">Outlet</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="devisi">Devisi</label><br>
                        <select name="devisi">
                            <option value="Operasional">Operasional</option>
                            <option value="Accounting">Accounting</option>
                            <option value="Marketing">Marketing</option>
                            <option value="HRD">HRD</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="jabatan">Jabatan</label>
                        <input class="form-control" type="text" name="jabatan" placeholder="Jabatan">
                    </div>
                    <div class="form-group ">
                        <label for="cuti">cuti</label>
                        <input class="form-control" type="text" name="cuti" placeholder="Sisa Cuti">
                    </div>
                    <div class="form-group ">
                        <label for="sp">Surat Peringatan</label><br>
                        <select name="sp">
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="Surat Teguran">Surat Teguran</option>
                            <option value="SP 1">SP 1</option>
                            <option value="SP 2">SP 2</option>
                            <option value="SP 3">SP 3</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="gaji">Gaji</label>
                        <input class="form-control" type="text" name="gaji" placeholder="Gaji">
                    </div>
        			<input type="submit" class="btn btn-success btn-block " name="saveinput" value="Simpan" />
                    <a class="btn btn-danger btn-block " href="../input/index.php">Cancel</a>
        		</form>
    	   </div>
        </div>
    </div>
</body>
</html>