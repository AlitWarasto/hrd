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
</head>
<body>
	<div class="container">
		<div class="col-md-12 d-flex justify-content-center">
			<h1>Edit Bahan Terbuang</h1>
		</div>
		<?php
	 	if (isset($_GET['id'])) {
	 		$id = $_GET['id'];
		 	$stmt = $db->prepare("SELECT * FROM input WHERE idinput=$id");
			$stmt->execute();
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			extract($row);
			$idbh = $row['idbahan'];
		?>
		<div class="d-flex justify-content-center">
        	<div class="col-md-4 bg-light border border-secondary pb-3 pt-3 rounded rounded-sm">
				<form action="" method="POST">
					<div class="form-group">
						<input type="hidden" name="inputid" value="<?php echo $idinput ?>">
						<label for="name">Nama Produk</label>
						<select name="bahanid">
					    	<?php
					    	$einbb = $db->prepare("SELECT * FROM bahanbaku WHERE idbb=$idbh");
					    	$einbb->execute();
					    	$rowbb=$einbb->fetch(PDO::FETCH_ASSOC);
				    		extract($rowbb); ?>
				    		<option class="form-control" value="<?php echo $idbb; ?>"><?php echo $namabb; ?></option>
				    		<?php
					    	$stmtb = $db->prepare("SELECT * FROM bahanbaku");
					    	$stmtb->execute();
					    	While ($brow=$stmtb->fetch(PDO::FETCH_ASSOC)){
					    		extract($brow); ?>
					    		<option value="<?php echo $idbb; ?>"><?php echo $namabb; ?></option>
					    	<?php
					    	}
					    	?>
					    </select>
					    <div class="form-group ">
		    				<label for="etanggal">Tanggal</label>
		    				<input class="form-control" type="date" name="etanggal" value="<?php echo $tanggal; ?>">
	    				</div>
	    				<label for="eoutlet">Outlet</label>
	    				<select name="eoutlet">
					    	<?php
					    	$eino = $db->prepare("SELECT * FROM outlet WHERE idoutlet=$outlet");// belum selesai lanjut disini
					    	$eino->execute();
					    	$rowo=$eino->fetch(PDO::FETCH_ASSOC);
				    		extract($rowo); ?>
				    		<option class="form-control" value="<?php echo $idoutlet; ?>"><?php echo $namaoutlet; ?></option>
				    		<?php
					    	$stmto = $db->prepare("SELECT * FROM outlet");
					    	$stmto->execute();
					    	While ($orow=$stmto->fetch(PDO::FETCH_ASSOC)){
					    		extract($orow); ?>
					    		<option value="<?php echo $idoutlet; ?>"><?php echo $namaoutlet; ?></option>
					    	<?php
					    	}
					    	?>
					    </select>
					    <div class="form-group ">
					    	<label for="ebuat">Buat Bahan Baku</label>
					    	<input  class="form-control" type="text" name="ebuat" value="<?php echo $buat ?>">
				    	</div>
				    	<div class="form-group ">
					    	<label for="ebuat">Buang Bahan Baku</label>
					    	<input class="form-control" type="text" name="ebuang" value="<?php echo $buang ?>">
				    	</div>
				    	<div class="form-group">
	                    <label for="ejamhabis">Jam Habis</label>
	                    <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
	                        <input type="text" name="ejamhabis" value="<?php echo $jamhabis ?>" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
	                        <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
	                            <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
	                        </div>
	                    </div>
	                </div>
					</div>
					<input type="submit" class="btn btn-success btn-block" name="editinput" value="Update Now" />
					<a class="btn btn-danger btn-block" href="../input/index.php">Cancel</a>
				</form>
			</div>
		</div>
		<?php
		}
		?>
	</div>
	<script type="text/javascript">
        $(function () {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });
    </script>
</body>
</html>