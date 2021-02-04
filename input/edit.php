<?php
require_once("../config.php");
require_once("../user/auth.php"); 

if(isset($_POST['editinput'])){

    // filter data yang diinputkan
    $einputid = $_POST['inputid'];
    $eidbahan = $_POST['bahanid'];
    $etanggal = $_POST['etanggal'];
    $eoutlet = $_POST['eoutlet'];
    $ebuat = $_POST['ebuat'];
    $ebuang = $_POST['ebuang'];
    $ebuang = $_POST['ebuang'];
    $ejamhabis = date("H:i", strtotime($_POST['ejamhabis']));
    $handle = "<script type='text/javascript'>
				  alert('Data telah ter-Update');
				  location.replace('index.php?msg=Success');
				</script>";
    // menyiapkan query
    $estmt = $db->prepare("UPDATE `input` SET `idbahan` = '$eidbahan', `tanggal` = '$etanggal', `outlet` = '$eoutlet', `buat` = '$ebuat', `buang` = '$ebuang', `jamhabis` = '$ejamhabis' WHERE `input`.`idinput` = $einputid");
	
	/*Error Handle}*/
	if ($estmt->execute()) {
	  echo $handle;
	} else {
	  echo implode($estmt->errorInfo());
	}
    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    ?>
    
	<?php
    
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Bahan Terbuang</title>
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
<?php
 	if (isset($_GET['id'])) {
 		$id = $_GET['id'];
	 	$stmt = $db->prepare("SELECT * FROM karyawan WHERE idkar=$id");
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
		$idbh = $row['idkar'];
	}
?>
<body>
	<div class="container">
        <div class="col-md-12 d-flex justify-content-center">
            <h1 class="jt">Edit Karyawan<br><span><?php echo $namakaryawan; ?></span></h1>
        </div>
    	<div class=" d-flex justify-content-center">
            <div class="glass col-md-4 pb-3 pt-3 rounded rounded-sm jt">
        		<form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="namakaryawan">Nama Karyawan</label>
                        <input class="form-control" type="text" name="namakaryawan" placeholder="<?php echo $namakaryawan; ?>">
                    </div>
                    <div class="form-group ">
                        <label for="foto">Foto Karyawan</label>
                        <input type="file" name="foto">
                    </div>
                    <div class="form-group ">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" type="text" name="alamat" placeholder="<?php echo $alamat; ?>"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="domisili">Domisili</label>
                        <textarea class="form-control" type="text" name="domisili" placeholder="<?php echo $domisili; ?>"></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="noktp">Nomor KTP</label>
                        <input class="form-control" type="text" name="noktp" placeholder="<?php echo $noktp; ?>">
                    </div>
                    <div class="form-group ">
                        <label for="nohp">Nomor Handphone</label>
                        <input class="form-control" type="text" name="nohp" placeholder="<?php echo $nohp; ?>">
                    </div>
                    <div class="form-group ">
                        <label for="ttgll">Tempat & Tanggal Lahir</label>
                        <input class="form-control" name="ttgll" type="date" placeholder="<?php echo $ttgll; ?>">
                    </div>
                    <div class="form-group ">
                        <label for="pendidikan">Pendidikan Terakhir</label>
                        <input class="form-control" name="pendidikan" type="text" placeholder="Pendidikan Terakhir">                    </div>
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
                        <input class="form-control" name="tglmasuk" type="date">
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
                        <label for="sp">Surat Peringatan</label>
                        <input class="form-control" type="text" name="sp" placeholder="Surat Peringatan">
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