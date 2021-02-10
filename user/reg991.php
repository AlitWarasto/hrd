<?php
/*validasi form*/
$error_nama = "";
$error_email = "";
$error_username = "";
$error_password = "";

$nama = "";
$email = "";
$username = "";
$password = "";

function cek_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) 
  {
    $error_nama = "Nama tidak boleh kosong";
  } 
  else 
  {
    $nama = cek_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$nama)) 
    {
      $nameErr = "Inputan Hanya boleh huruf dan spasi"; 
    }
  }
  
  if (empty($_POST["email"])) 
  {
    $error_email = "Email tidak boleh kosong";
  } 
  else 
  {
    $email = cek_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
      $error_email = "Format email Invalid"; 
    }
  }

  if (empty($_POST["username"])) 
  {
    $error_username = "Username tidak boleh kosong";
  } 
  else
  {
    $username = cek_input($_POST["username"]);
  }

  if (empty($_POST["password"])) 
  {
    $error_password = "Password tidak boleh kosong";
  }
  
}


require_once("../config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) {
        header("Location: ../index.php");
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register SIMPEG Panties Pizza</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .warning {color: #FF0000;}
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
        <h4>Register SIMPEG Panties Pizza</h4>
        <p>Sudah punya akun? <a href="../index.php">Login di sini</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control <?php echo ($error_nama !="" ? "is-invalid" : ""); ?>" type="text" name="name"  placeholder="Nama kamu" value="<?php echo $nama; ?>"/><span class="warning"><?php echo $error_nama; ?></span>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control <?php echo ($error_username !="" ? "is-invalid" : ""); ?>" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>"/><span class="warning"><?php echo $error_username; ?></span>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control <?php echo ($error_email !="" ? "is-invalid" : ""); ?>" type="email" name="email" placeholder="Alamat Email" value="<?php echo $email; ?>"/><span class="warning"><?php echo $error_email; ?></span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control <?php echo ($error_email !="" ? "is-invalid" : ""); ?>" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"/><span class="warning"><?php echo $error_password; ?></span>
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

        </form>
            
        </div>
    </div>
</div>

</body>
</html>