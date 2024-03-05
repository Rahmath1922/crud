<?php
require 'function/functionjurusan.php';
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
           <i class="fas fa-sign-out-alt ml-6" data-toggle="tooltip" title="sign-out"></i>
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
                <h3><i class="fa-solid fa-scroll"></i>JURUSAN MAHASISWA</h3>

               <button href="" class="btn btn-primary mb-4" onclick="openModal()"><i class="fa-solid fa-user-plus mr-2"></i>TAMBAH JURUSAN/PRODI</button>
          <div id="modalTambahJurusan" class="modalDosen">
           <div class="modal-content-dosen">
            <span class="close-dosen" onclick="closeModal()">&times;</span>
            <h2>Tambah Prodi</h2>
            <form id="formTambah" action="" method="post">
              <ul style="list-style: none; pading:0; margin: 0;">
              <li class="li-pegawai">
                <label class="label-tambah-dosen " for="name">PRODI:</label>
                <input class="input-tambah-id" type="text" name="prodi" id="prodi" required >
            </li>
            <li>
                <button class="button-id m-3" type="submit" name="submit"><i class="fa-solid fa-paper-plane mr-2"></i>KIRIM</button>
            </li>
            </ul>
            </form>

           </div>
          </div>

          <table class="table table-strioed table-bordered">

            <thead>
                <tr>
                    <th scope="col" style="width: 0%">NO</th>
                    <th scope="col">JURUSAN</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
   
       
            <?php $a = 1; ?>
            <?php foreach($jurusan as $row) : ?>
            <tbody>
                <tr>
                    <td><?= $a; ?></td>
                    <td><?= $row["name"]; ?></td>
                    <td style="width: 20%">
                    <a><i class="fa-solid fa-eye bg-primary p-2 text-white"></i></a>
                    <a> <i class="fas fa-edit bg-warning p-2 text-white"></i></a>
                    <a><i class="fas fa-trash-alt bg-danger p-2 text-white"></i></a>
                    </td>
                 

                    <?php $a++; ?>
                        <?php endforeach; ?>
                </tr>
            </tbody>
          </table>


        </div>
   
</div>
    
<script src="js/jurusan.js"></script>
</body>
</html>