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


    // menyiapkan query
    $sql = "INSERT INTO karyawan (idkar, namakaryawan, alamat, domisili, noktp, nohp, ttgll, pendidikan, pernikahan, tglmasuk, status, penempatan, devisi, jabatan, cuti, sp, gaji) 
            VALUES (:idkar, :namakaryawan, :alamat, :domisili, :noktp, :nohp, :ttgll, :pendidikan, :pernikahan, :tglmasuk, :status, :penempatan, :devisi, :jabatan, :cuti, :sp, :gaji)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":idkar" => $idkar,
        ":namakaryawan" => $namakaryawan,
        ":alamat" => $alamat,
        ":domisili" => $domisili,
        ":noktp" => $noktp,
        ":nohp" => $nohp,
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
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
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
</head>
<body>
    <div class="container">
        <div class="col-md-12 d-flex justify-content-center">
            <h1>Input Karyawan Baru<span><br>Panties Pizza</span></h1>
        </div>
    	<div class=" d-flex justify-content-center">
            <div class="col-md-4 bg-light border border-secondary pb-3 pt-3 rounded rounded-sm">
        		<form action="" method="POST">
                    <div class="form-group ">
                        <label for="namakaryawan">Nama Karyawan</label>
                        <input class="form-control" type="text" name="namakaryawan" placeholder="Nama Karyawan">
                    </div>
                    <div class="form-group ">
                        <label for="alamat">Alamat</label>
                        <input class="form-control" type="text" name="alamat" placeholder="Alamat Asal">
                    </div>
                    <div class="form-group ">
                        <label for="domisili">Domisili</label>
                        <input class="form-control" type="text" name="domisili" placeholder="Domisili Sekarang">
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
                        <label for="ttgll">Tempat & Tanggal Lahir</label>
                        <input class="form-control" name="ttgll" type="date">
                    </div>
                    <div class="form-group ">
                        <label for="pendidikan">Pendidikan Terakhir</label>
                        <input class="form-control" name="pendidikan" type="text" placeholder="Pendidikan Terakhir">                    </div>
                    <div class="form-group ">
                        <label for="pernikahan">Status Pernikahan</label>
                        <input class="form-control" name="pernikahan" type="text" placeholder="Status Pernikahan">
                    </div>
                    <div class="form-group ">
                        <label for="tglmasuk">Tanggal Masuk</label>
                        <input class="form-control" name="tglmasuk" type="date">
                    </div>
                    <div class="form-group ">
                        <label for="status">Status Karyawan</label>
                        <input class="form-control" type="text" name="status" placeholder="Status Karyawan">
                    </div>
                    <div class="form-group ">
                        <label for="penempatan">Penempatan</label>
                        <input class="form-control" type="text" name="penempatan" placeholder="Penempatan">
                    </div>
                    <div class="form-group ">
                        <label for="devisi">Devisi</label>
                        <input class="form-control" type="text" name="devisi" placeholder="Devisi">
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
                    
        			<!--<div class="form-group ">
                        <label for="bbid">Bahan Baku</label>
                        <select name="bbid">
                            <?php
                                $bbcon = $db->prepare("SELECT * FROM bahanbaku");
                                $bbcon->execute();
                                While ($row=$bbcon->fetch(PDO::FETCH_ASSOC)){
                                    extract($row); ?>
                                    <option value="<?php echo $idbb; ?>"><?php echo $namabb; ?></option>
                                <?php
                                }
                                ?>
                        </select>
                        <div class="form-group ">
            				<label for="tanggal">Tanggal</label>
            				<input class="form-control" type="date" name="tanggal">
            			</div>
                    </div>
                    <div class="form-group ">
                        <label for="outletid">Outlet</label>
                        <select name="namaoutlet">
                            <?php
                                $bbcon = $db->prepare("SELECT * FROM outlet");
                                $bbcon->execute();
                                While ($row=$bbcon->fetch(PDO::FETCH_ASSOC)){
                                    extract($row); ?>
                                    <option value="<?php echo $idoutlet; ?>"><?php echo $namaoutlet; ?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>
                    <div class="form-group ">
        				<label for="buat">Buat Bahan Baku</label>
        				<input class="form-control" type="text" name="buat" placeholder="Buat">
        			</div>
                    <div class="form-group ">
                        <label for="buang">Buang Bahan Baku</label>
                        <input class="form-control" type="text" name="buang" placeholder="Buang">
                    </div>
                    <div class="form-group">
                        <label for="jamhabis">Jam Habis</label>
                        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                            <input type="text" name="jamhabis" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
                            <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                            </div>
                        </div>
                    </div>-->
        			<input type="submit" class="btn btn-success btn-block " name="saveinput" value="Simpan" />
                    <a class="btn btn-danger btn-block " href="../input/index.php">Cancel</a>
        		</form>
    	   </div>
        </div>
    </div>
   <!--<script type="text/javascript">
        $(function () {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });
    </script>-->
</body>
</html>