<?php
	require_once("../config.php");
	require_once("../user/auth.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Data Karyawan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<?php 
	if (isset($_GET['id'])) {
		$idview = $_GET['id'];
		$nk = $db->prepare("SELECT namakaryawan FROM karyawan WHERE idkar=$idview");
		$nk->execute();
    	$rownk=$nk->fetch(PDO::FETCH_ASSOC);
    	extract($rownk);
	 ?>
	<div class="container-fluid">
		<div class="row d-flex justify-content-center">
			<div class="col-md-12">
				<h1 class="text-center jt">Data Detail Karyawan <span><br><?php echo $namakaryawan; ?></span></h1>
			</div>
			<div class="col-md-3">
				<div class="glass col-md-12 rounded mb-2 pb-2">
					<h2 class="jt text-center">MENU</h2>
					<a href="addinput.php" class="btn btn-success mb-1 col-md-12">Input Baru</a>
					<a href="../outlet/index.php" class="btn btn-info mb-1 col-md-12">&#127968; Daftar Outlet</a>
					<a href="../products/index.php" class="btn-info btn mb-1 col-md-12" >&#129385; Daftar Produk</a>
					<a href="../report/index.php" class="btn-secondary btn mb-1 col-md-12" >&#128195; Laporan</a>
					<a href="index.php" class="btn-secondary btn mb-1 col-md-12" >&#128694; Back</a>
					<a href="../user/logout.php" class="btn btn-light col-md-12 border border-danger">Logout</a>
				</div>
			</div>
			<div class="col-md-6 tbl">
				<table class="table table-striped glass jt">
				<?php
				$stmt = $db->prepare("SELECT * FROM karyawan WHERE idkar=$idview ORDER BY idkar DESC");
    			$stmt->execute();
			    	While ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
						extract($row); ?>
								<tr>
									<td>ID Karyawan</td>
									<td><?php echo $idkar; ?></td>
								</tr>
								<tr>
									<td>Nama Karyawan</td>
									<td><?php echo $namakaryawan; ?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><?php echo $alamat; ?></td>
								</tr>
								<tr>
									<td>Domisili</td>
									<td><?php echo $domisili; ?></td>
								</tr>
								<tr>
									<td>No KTP</td>
									<td><?php echo $noktp; ?></td>
								</tr>
								<tr>
									<td>No Hand Phone</td>
									<td><?php echo $nohp; ?></td>
								</tr>
								<tr>
									<td>Tempat & tgl Lahir</td>
									<td><?php echo $ttgll; ?></td>
								</tr>
								<tr>
									<td>Pendidikan</td>
									<td><?php echo $pendidikan; ?></td>
								</tr>
								<tr>
									<td>Status Pernikahan</td>
									<td><?php echo $pernikahan; ?></td>
								</tr>
								<tr>
									<td>Tgl Masuk</td>
									<td><?php echo $tglmasuk; ?></td>
								</tr>
								<tr>
									<td>Status Karyawan</td>
									<td><?php echo $status; ?></td>
								</tr>
								<tr>
									<td>Penempatan</td>
									<td><?php echo $penempatan; ?></td>
								</tr>
								<tr>
									<td>Devisi</td>
									<td><?php echo $devisi; ?></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td><?php echo $jabatan; ?></td>
								</tr>
								<tr>
									<td>Sisa Cuti</td>
									<td><?php echo $cuti; ?></td>
								</tr>
								<tr>
									<td>Peringatan</td>
									<td><?php echo $sp; ?></td>
								</tr>
								<tr>
									<td>Gaji Bulan <?php echo date("F Y"); ?></td>
									<td><?php echo "Rp. " .number_format($gaji,2);  ?></td>
								</tr>
								
							</table>
				<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>