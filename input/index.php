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
</head>
<body>
	<div class="container-fluid">
		<div class="row d-flex justify-content-center">
			<div class="col-md-12">
				<h1 class="text-center">Data Karyawan<span><br>Panties Pizza</span></h1>
			</div>
			<div class="col-md-2">
				<div class="col-md-12 bg-dark navbar-dark rounded mb-2 pb-2">
					<h2 class="text-light text-center">MENU</h2>
					<a href="addinput.php" class="btn btn-success mb-1 col-md-12">Input Data</a>
					<a href="../outlet/index.php" class="btn btn-info mb-1 col-md-12">&#127968; Daftar Outlet</a>
					<a href="../products/index.php" class="btn-info btn mb-1 col-md-12" >&#129385; Daftar Produk</a>
					<a href="../report/index.php" class="btn-secondary btn mb-1 col-md-12" >&#128195; Laporan</a>
					<a href="../user/logout.php" class="btn btn-light col-md-12 border border-danger">Logout</a>
				</div>
			</div>
			<div class="col-md-6">
				<table class="table table-dark table-striped">
					<thead>
						<tr>
							<th>ID Karyawan</th>
							<th>Nama Karyawan</th>
							<th>Detail</th>
						</tr>
					</thead>
					<?php
				 	$stmt = $db->prepare("SELECT * FROM karyawan ORDER BY idkar DESC");
			    	$stmt->execute();
			    	While ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row);
					?>
					<tbody>
						<tr>
							<td><?php echo $idkar; ?></td>
							<td><?php echo $namakaryawan; ?></td>
							<td><a href="view.php?id=<?php echo $idkar; ?>" style="color: #50c425">detail</a></td>
						</tr>
				
					<?php
					}
				 	?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>