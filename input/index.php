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
					<a href="../timeline.php" class="btn btn-info mb-1 col-md-12">&#127972; Dashboard</a>
					<a href="../user/logout.php" class="btn btn-light col-md-12 border border-danger">Logout</a>
				</div>
			</div>
			<div class="col-md-9 tbl">
				<?php
				 	$nstmt = $db->prepare("SELECT * FROM karyawan ORDER BY namakaryawan ASC");
		    	$nstmt->execute();
		    	While ($nrow=$nstmt->fetch(PDO::FETCH_ASSOC)){
					extract($nrow);
					$lkata = 2;
			    $xnk = explode(' ',str_replace(array("\n","\r","\t"),'',strip_tags($namakaryawan)));
			    if (count($xnk)> $lkata) {
			    	$ti = " ...";
			    } else {
			    	$ti = "";
			    }
			    $nk = implode(" ",array_splice($xnk,0,$lkata)).$ti;
				?>
				<div class="card m-1 float-left glass col-md-2">
					<div class="mt-3" style="height: 200px;overflow: hidden;border: 3px solid #fff;border-radius: 5px;">
						<img src="../img/foto/<?php echo $foto; ?>" class="card-img-top" style="height: 100%;object-fit: cover;">
					</div>
					<div class="card-body">
						<h5 class="card-title"><?php echo $nk; ?></h5>
						<?php
              $otcon = $db->prepare("SELECT namaoutlet FROM outlet WHERE idoutlet=$penempatan");
              $otcon->execute();
              $otrow=$otcon->fetch(PDO::FETCH_ASSOC);
                extract($otrow);
            ?>
						<p class="card-text small"><?php echo $namaoutlet; ?></p>
						<a href="view.php?id=<?php echo $idkar; ?>" class="btn btn-primary">Lihat Profil</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>