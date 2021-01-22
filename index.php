<?php
require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: timeline.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Panties Pizza</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <header>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="jumbotron">
                    <h1 class="text-center">Selamat datang di Sistem Manajemen Pegawai<span class="text-center"><br>Panties Pizza</span></h1>
                    <p class="text-center">Berdoalah Sebelum Bekerja</p>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <h4>Masuk ke SIMPEG Panties Pizza</h4>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username atau email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" />
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />
                </form>
            </div>
        </div>
    </div>
    <!--<section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-around">
                    <a href="products/index.php" class="btn btn-success mb-1">Daftar Bahan</a>
                    <a href="outlet/index.php" class="btn btn-success mb-1">Daftar Outlet</a>
                    <a href="input/index.php" class="btn btn-success mb-1">Bahan Terbuang</a>
                </div>
            </div>
        </div>
    </section>-->
</body>
</html>