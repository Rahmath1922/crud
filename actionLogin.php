<?php
session_start();
if( isset($_SESSION["login"])) {
    header("location: halamanmasuk.php");
    exit;
}

require 'function.php';
$username = "";
$password = "";
$err = "";
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
header("location:login.php?err=$err");
exit;


?>