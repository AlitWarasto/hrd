<?php
require_once("../config.php");
require_once("../user/auth.php"); 

if(isset($_POST['editoutlet'])){

    // filter data yang diinputkan
    $outletid = $_POST['idoutlet'];
    $outletnama = filter_input(INPUT_POST, 'editnamaoutlet', FILTER_SANITIZE_STRING);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);

    // menyiapkan query
    $stmt = $db->prepare("UPDATE `outlet` SET `namaoutlet` = '$outletnama', `alamat` = '$alamat' WHERE `outlet`.`idoutlet` = $outletid");
			$stmt->execute();
    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    ?>
	<script>
	  alert("Data telah ter-Update");
	  location.replace("index.php?msg=Success");
	</script>
	<?php
    
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Produk</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div class="container">
		<div class="col-md-12 d-flex justify-content-center">
			<h1 class="jt">Edit Produk</h1>
		</div>
		<?php
	 	if (isset($_GET['id'])) {
	 		$id = $_GET['id'];
		 	$stmt = $db->prepare("SELECT * FROM outlet WHERE idoutlet=$id");
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			extract($row);
		?>
		<div class=" d-flex justify-content-center">
        	<div class="col-md-4 pb-3 pt-3 rounded rounded-sm glass">
				<form action="" method="POST">
					<div class="form-group">
						<input type="hidden" name="idoutlet" value="<?php echo $idoutlet ?>">
						<label class="jt" for="editnamaoutlet"><b>Nama Outlet</b></label>
						<input class="form-control" type="text" name="editnamaoutlet" placeholder="<?php echo $namaoutlet; ?>">
					</div>
					<div class="form-group">
						<input type="hidden" name="idoutlet" value="<?php echo $idoutlet ?>">
						<label class="jt" for="alamat"><b>Alamat Outlet</b></label>
						<textarea class="form-control" type="text" name="alamat"></textarea>
					</div>
					<input type="submit" class="btn btn-success btn-block" name="editoutlet" value="Update Now" />
					<a class="btn btn-danger btn-block" href="../outlet/index.php">Cancel</a>
				</form>
			</div>
		</div>
		<?php
		}
		?>
	</div>
</body>
</html>