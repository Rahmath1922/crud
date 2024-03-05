<?php
session_start();
if(!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'function/functiondashboard.php';


$jumlahMahasiswa = getJumlahMahasiswa();
$jumlahDosen = getJumlahDosen();
$jumlahPegawai = getJumlahPegawai();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-warning fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Selamat datang admin</a>
  

      <div class="icon ml-4">
        <h5>
           <a href="logout.php" onclick="return confirm('Yakin ingin logout?')"><i class="fas fa-sign-out-alt ml-6" data-toggle="tooltip" title="sign-out"></i></a>
        </h5>
      </div>
    </div>
  </div>
</nav>

<div class="row no-gutters mt-5">
    <div class="col-md-2 bg-dark mt-2 pr-3 pt-4" id="sidebar">
    <ul class="nav flex-column ml-3 mb-5">
  <li class="nav-item">
    <a class="nav-link active text-white" aria-current="page" href="halamanmasuk.php"><i class="fa-solid fa-gauge mr-2"></i>Dashboard</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="halamansiswa.php"><i class="fa-solid fa-user-graduate mr-2"></i>Daftar Mahasiswa</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="halamandosen.php"><i class="fa-solid fa-chalkboard-user mr-2"></i>Daftar Dosen</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="#"><i class="fa-solid fa-paper-plane mr-2"></i>Nilai Mahasiswa</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="matakuliah.php"><i class="fa-solid fa-book-open"></i>Mata kuliah</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="jurusan.php"><i class="fa-solid fa-scroll"></i>Jurusan</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="halamanpegawai.php"><i class="fa-solid fa-users-viewfinder mr-2"></i>Daftar Pegawai</a><hr class="bg-secondary">
  </li>
</ul>
         </div>
        <div class="col-md-10">
            <!-- clas dalam -->
            <div class="col-md p-7 pt-2">
                <h3><i class="fa-solid fa-gauge mr-2"></i>Dashboard</h3>

                <div class="row text-white">
                <div class="card bg-info m-4" style="width: 18rem;">             
                <div class="card-body">
                    <div class="car-body-icon">
                    <i class="fa-solid fa-user-graduate mr-2"></i>
                    </div>
               <h5 class="card-title">Jumlah Mahasiswa</h5>
               <div class="display-4" id="display-4"><?= $jumlahMahasiswa; ?></div>
              <a href="halamansiswa.php" style="text-decoration: none !important;"><p class="card-text text-white">Lihat detail<i class="fa-solid fa-eye mr-2"></i></p></a>
  </div>
</div>


              <div class="card bg-danger m-4" style="width: 18rem;">             
                <div class="card-body">
                    <div class="car-body-icon">
                    <i class="fa-solid fa-chalkboard-user mr-2"></i>
                    </div>
               <h5 class="card-title">Jumlah Dosen</h5>
                <div class="display-4" id="display-4"><?= $jumlahDosen; ?></div>
                <a href="halamandosen.php" style="text-decoration: none !important;"><p class="card-text text-white">Lihat detail<i class="fa-solid fa-eye ml-2"></i></p></a>

</div>
</div>

               <div class="card bg-success m-4" style="width: 18rem;">             
                <div class="card-body">
                    <div class="car-body-icon">
                    <i class="fa-solid fa-users-viewfinder mr-2"></i>
                    </div>
               <h5 class="card-title">Jumlah Pegawai</h5>
               <div class="display-4" id="display-4"><?= $jumlahPegawai; ?></div>
              <a href="halamanpegawai.php" style="text-decoration: none !important;"><p class="card-text text-white">Lihat detail<i class="fa-solid fa-eye ml-2"></i></p></a>
 
</div>
</div>

               <div class="card bg-warning m-4" style="width: 18rem;">             
                <div class="card-body">
                    <div class="car-body-icon">
                    <i class="fa-solid fa-book-open"></i>
                    </div>
               <h5 class="card-title">Mata kuliah</h5>
               <div class="display-4" id="display-4">11</div>
              <a href="matakuliah.php" style="text-decoration: none !important;"><p class="card-text text-white">Lihat detail<i class="fa-solid fa-eye ml-2"></i></p></a>
 
</div>
</div>

                <div class="card bg-secondary m-4" style="width: 18rem;">             
                <div class="card-body">
                    <div class="car-body-icon">
                    <i class="fa-solid fa-scroll"></i>
                    </div>
               <h5 class="card-title">Jurusan</h5>
               <div class="display-4" id="display-4">11</div>
              <a href="matakuliah.php" style="text-decoration: none !important;"><p class="card-text text-white">Lihat detail<i class="fa-solid fa-eye ml-2"></i></p></a>
 
</div>
</div>
                </div>
            </div>
        </div>

    
</body>
</html>