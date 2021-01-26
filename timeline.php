<?php require_once("user/auth.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMPEG Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex flex-wrap align-content-center justify-content-center">
            <div class="col-md-12 d-flex justify-content-center mt-3 mb-3">
                <img class="h-bg img-fluid" src="img/logo.png">
            </div>  
            <div class="col-md-3">
                <div class="col-md-12 rounded mb-2 pb-2 glass">
                    <h2 class="jt ext-light text-center">MENU</h2>
                    <a class="btn btn-success mb-1 col-md-12" href="input/index.php">Data Karyawan</a>
                    <a href="addinput.php" class="btn btn-success mb-1 col-md-12">Input Baru</a>
                    <a href="../outlet/index.php" class="btn btn-info mb-1 col-md-12">&#127968; Daftar Outlet</a>
                    <a href="../products/index.php" class="btn-info btn mb-1 col-md-12" >&#129385; Daftar Produk</a>
                    <a href="../report/index.php" class="btn-secondary btn mb-1 col-md-12" >&#128195; Laporan</a>
                    <a href="../user/logout.php" class="btn btn-light col-md-12 border border-danger">Logout</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img class="img img-fluid rounded-circle mb-3" width="160" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
                        <h3><?php echo  $_SESSION["user"]["name"] ?></h3>
                        <p><?php echo $_SESSION["user"]["email"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>