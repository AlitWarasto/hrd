<?php
require_once("../config.php");
require_once("../user/auth.php"); 
?>


<!DOCTYPE html>
<html>
<head>
	<title>List Outlet</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">Daftar Outlet</h1>
			</div>
			<div class="col-md-3">
				<div class="col-md-12 rounded mb-2 pb-2 glass">
					<h2 class="text-info text-center">MENU</h2>
					<a href="addoutlet.php" class="btn btn-success mb-1 col-md-12">Tambah Outlet</a>
					<a href="../timeline.php" class="btn btn-info mb-1 col-md-12">&#127972; Dashboard</a>
					<a href="../user/logout.php" class="btn btn-light col-md-12 border border-danger">Logout</a>
				</div>
			</div>
			<div class="col-md-8 tbl">
				<table class="table table-dark table-striped glass jt">
					<thead>
						<tr>
							<th>Nama Outlet</th>
							<th>Alamat</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<?php
				 	
				 	$stmt = $db->prepare("SELECT * FROM outlet");
			    	$stmt->execute();
			    	While ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row);
					?>
					<tbody>
						<tr>
							<td><?php echo $namaoutlet; ?></td>
							<td><?php echo $alamat; ?></td>
							<td><a href="edit.php?id=<?php echo $idoutlet; ?>" style="color: #50c425">Edit</a></td>
							<?php
								if (isset($_GET['id'])) {
									$outletid = $_GET['id'];
									$delconn = $db->prepare("SELECT * FROM `outlet` WHERE `idoutlet` = $outletid");
									$delconn->execute();
									$row=$delconn->fetch(PDO::FETCH_ASSOC);
									extract($row);
							}
							?>
							<td><a onclick="return confirm('Hapus <?php echo $namaoutlet; ?>?')" href="delete.php?id=<?php echo $idoutlet; ?>" style="color: #e34d4d">Delete</a></td>
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