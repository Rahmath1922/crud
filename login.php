<?php
session_start();
if( isset($_SESSION["login"])) {
    header("location: halamanmasuk.php");
    exit;
}

require 'function.php';

// variabel awal
$username = "";
$password = "";
$err = "";

// pemberitahuan login gagal apa berhasil
if( isset($_POST['login']) ){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === '' or $password === '') {
        $err .="<div class='err'>Silahkan masukan username dan password</div>";
    }
    if (empty ($err)) {
        $r1 = "SELECT * FROM admin WHERE username = '$username'";
        $q1 = mysqli_query($cons, $r1);
        $r2 = mysqli_fetch_array($q1);
        if (!empty($r2)) {
            if ($r2['password'] != md5($password)) {
                $err .="<div class='err'>Akun tidak ditemukan atau password salah</div>";
            } else {
                $_SESSION['admin_username'] = $username;
                $_SESSION["login"] = true;
                header("location: halamanmasuk.php");
                exit();
            }
        } else {
            $err .="<div class='err'>Akun tidak ditemukan</div>";
        }
    }
    if(empty($err)) {
        $_SESSION['admin_username'] = $username;
        $_SESSION["login"] =true;
        header("location: halamanmasuk.php");
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

</body>
<div class="container" id="ups">
    <h1>LOGIN</h1>
    <?php
    if($err){
        echo "<ul>$err</ul>";
    }
?>
    <form action="" method="post">
        <input type="text" class="input" name="username" placeholder="Username.." /><br>
        <input type="password" name="password" class="input" placeholder="Masukan password.." /><br>
        <button class="button-masuk" type="submit" name="login" value="login">Login</button>
    </form>
</div>

</html>