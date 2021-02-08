<?php
require_once("../user/auth.php"); 
require_once("../config.php");

if(isset($_POST['addoutlet'])){

    // filter data yang diinputkan
    $namaoutlet = filter_input(INPUT_POST, 'namaoutlet', FILTER_SANITIZE_STRING);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);

    // menyiapkan query
    $sql = "INSERT INTO outlet (namaoutlet, alamat) 
            VALUES (:namaoutlet, :alamat)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":namaoutlet" => $namaoutlet,
        ":alamat" => $alamat,
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) {
        header("Location: index.php?msg=Sukses");
    }
    
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Outlet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <h1 class="jt">Tambah Outlet</h1>
        </div>
    	<div class=" d-flex justify-content-center">
            <div class="col-md-4 glass pb-3 pt-3 rounded rounded-sm">
        		<form action="" method="POST">
        			<div class="form-group ">
        				<label class="jt" for="name"><b>Nama Outlet</b></label>
        				<input class="form-control" type="text" name="namaoutlet" placeholder="Nama Outlet">
                    </div>
                    <div class="form-group ">
                        <label class="jt" for="alamat"><b>Alamat Outlet</b></label><br>
                        <textarea class="form-control" type="text" name="alamat"></textarea>
                    </div>
        			<input type="submit" class="btn btn-success btn-block " name="addoutlet" value="Tambah Outlet" />
                    <a class="btn btn-danger btn-block " href="../outlet/index.php">Cancel</a>
        		</form>
    	   </div>
        </div>
    </div>
</body>
</html>