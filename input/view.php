<?php
	require_once("../config.php");
	require_once("../user/auth.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Data Karyawan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
					<a href="index.php" class="btn-secondary btn mb-1 col-md-12" >&#127939; Back</a>
					<a href="../user/logout.php" class="btn btn-light col-md-12 border border-danger">Logout</a>
				</div>
			</div>
			<div class="col-md-9 tbl">
				<table class="table table-striped glass jt">
				<?php
				$stmt = $db->prepare("SELECT * FROM karyawan WHERE idkar=$idview");
    			$stmt->execute();
			    	While ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
						extract($row); ?>
								<tr>
									<td class="d-flex justify-content-center" style="position: relative;">
										<img src="../img/foto/<?php echo $foto; ?>" class="img-fluid" width="150vw">
										<a href="#" class="btn btn-primary d-block mr-3" style="position: absolute; right: 0px;">&#10002</a>
									</td>
								</tr>
								<tr>
									<td>ID Karyawan</td>
									<td><?php echo $idkar; ?></td>
								</tr>
								<tr>
									<td>Nama Karyawan</td>
									<td><?php echo $namakaryawan; ?></td>
									<td><button class="btn btn-primary" data-toggle="modal" data-target="#namakaryawan">Edit</button></td>
								</tr>
								<!-- The Modal -->
								<div class="modal" id="namakaryawan">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								        <h4 class="modal-title">Masukan Nama Lengkap</h4>
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								      </div>

								      <!-- Modal body -->
							        <form action="edit.php" method="POST" enctype="multipart/form-data">
								      	<div class="modal-body">
			                    <div class="form-group ">
			                        <label for="namakaryawan">Nama Karyawan</label>
			                        <input type="hidden" name="idnk" value="<?php echo $idkar; ?>">
			                        <input class="form-control" type="text" name="namakaryawan" placeholder="<?php echo $namakaryawan; ?>">
			                    </div>
								      	</div>

								      <!-- Modal footer -->
									      <div class="modal-footer">
									      	<input type="submit" class="btn btn-success" name="savenk" value="Simpan" />
									      </div>
		                  </form>

								    </div>
								  </div>
								</div>
								<tr>
									<td>Alamat</td>
									<td><?php echo $alamat; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>Domisili</td>
									<td><?php echo $domisili; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>No KTP</td>
									<td><?php echo $noktp; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>No Hand Phone</td>
									<td><?php echo $nohp; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>Tempat & tgl Lahir</td>
									<td><?php echo $ttgll; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>Pendidikan</td>
									<td><?php echo $pendidikan; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>Status Pernikahan</td>
									<td><?php echo $pernikahan; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>Tgl Masuk</td>
									<td><?php echo $tglmasuk; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>Status Karyawan</td>
									<td><?php echo $status; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>Penempatan</td>
									<td><?php echo $penempatan; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>Devisi</td>
									<td><?php echo $devisi; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td><?php echo $jabatan; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>Sisa Cuti</td>
									<td><?php echo $cuti; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>Peringatan</td>
									<td><?php echo $sp; ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
								</tr>
								<tr>
									<td>Gaji Bulan <?php echo date("F Y"); ?></td>
									<td><?php echo "Rp. " .number_format($gaji,2);  ?></td>
									<td><a href="#" class="btn btn-primary">Edit</a></td>
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