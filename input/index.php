<?php
require_once("../config.php");
require_once("../user/auth.php"); 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Index Data Karyawan Panties Pizza</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row d-flex justify-content-center">
			<div class="col-md-12">
				<h1 class="jt text-center">Data Karyawan<span><br>Panties Pizza</span></h1>
			</div>
			<div class="col-md-3">
				<div class="col-md-12 rounded mb-2 pb-2 glass">
					<h2 class="jt ext-light text-center">MENU</h2>
					<a href="addinput.php" class="btn btn-success mb-1 col-md-12">Input Baru</a>
					<a href="../outlet/index.php" class="btn btn-info mb-1 col-md-12">&#127968; Daftar Outlet</a>
					<a href="../products/index.php" class="btn-info btn mb-1 col-md-12" >&#129385; Daftar Produk</a>
					<a href="../report/index.php" class="btn-secondary btn mb-1 col-md-12" >&#128195; Laporan</a>
					<a href="../user/logout.php" class="btn btn-light col-md-12 border border-danger">Logout</a>
				</div>
			</div>
			<div class="col-md-9 tbl">
				<?php
				 	$nstmt = $db->prepare("SELECT * FROM karyawan ORDER BY namakaryawan ASC");
		    	$nstmt->execute();
		    	While ($nrow=$nstmt->fetch(PDO::FETCH_ASSOC)){
					extract($nrow);
				?>
				<div class="card m-1 float-left glass col-md-3">
					<img src="../img/foto/<?php echo $foto; ?>" class="card-img-top img-thumbnail mt-3">
					<div class="card-body">
						<h5 class="card-title"><?php echo $namakaryawan; ?></h5>
						<p class="card-text"><?php echo $idkar; ?></p>
						<a href="view.php?id=<?php echo $idkar; ?>" class="btn btn-primary">Lihat Profil</a>
					</div>
				</div>
				<?php } ?>
			</div>

			<!--<div class="col-md-8 tbl">
				<table class="jt table table-striped table-hover glass">
					<thead>
						<tr>
							<th>ID Karyawan</th>
							<th>Nama Karyawan</th>
							<th>Detail</th>
							<th>Edit</th>
						</tr>
					</thead>
					<?php
				 	$stmt = $db->prepare("SELECT * FROM karyawan ORDER BY namakaryawan ASC");
			    	$stmt->execute();
			    	While ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row);
					?>
					<tbody>
						<tr>
							<td><?php echo $idkar; ?></td>
							<td><?php echo $namakaryawan; ?></td>
							<td><a href="view.php?id=<?php echo $idkar; ?>" style="color: #50c425">&#128064</a></td>
							<td><a href="edit.php?id=<?php echo $idkar; ?>" style="color: #50c425">&#10002</a></td>
						</tr>
				
					<?php
					}
				 	?>
					</tbody>
				</table>
			</div> -->
		</div>
	</div>
</body>
</html>