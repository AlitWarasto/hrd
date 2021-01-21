<?php 
session_start();
if(!isset($_SESSION["user"])){
	header("Location: login.php");
} else {
	header("Location: ../timeline.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Dashboard INV Panties Pizza</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<header>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Selamat datang di Inventory Panties Pizza</h1>
                        <p>Berdoa Sebelum Bekerja</p>
                    </div>
                    <div class="col-md-4">
                        <a href="login.php" class="btn btn-success">Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>