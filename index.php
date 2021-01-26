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
        } else {
            $handle = "<script type='text/javascript'>
                  alert('USER atau Password SALAH !');
                  location.replace('index.php?msg=LoginFailed');
                </script>";
            echo $handle;
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
    <title>SIMPEG Panties Pizza</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row ">
            <div class="ch col-md-12 d-flex flex-wrap align-content-center justify-content-center">
                <div class="col-md-12 d-flex justify-content-center mt-3 mb-3">
                    <img class="h-bg img-fluid" src="img/logo.png">
                </div>
                <div class="col-md-4 rounded rounded-sm pt-3 pb-3 glass mb-3">
                    <h4 class="jt text-center">Masuk ke SIMPEG<br><span>Panties Pizza</span></h4>
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
    </div>
</body>
</html>