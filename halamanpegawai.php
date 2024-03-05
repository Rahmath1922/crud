<?php
require 'function/functionpegawai.php';
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
          <a href="halamanmasuk.php"><i class="fa-solid fa-backward ml-6" data-toggle="tooltip" title="Back"></i></a> 
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
                <h3><i class="fa-solid fa-users-viewfinder mr-2"></i>DATA PEGAWAI</h3>

               
              <button href="" class="btn btn-primary mb-4" onclick="openModal()"><i class="fa-solid fa-user-plus mr-2"></i> TAMBAH DATA PEGAWAI</button>
              <div id="modalTambahPegawai" class="modalDosen">
                <div class="modal-content-dosen">
              <span class="close-dosen" onclick="closeModal()">&times;</span>


             <h2>Tambah Data Pegawai</h2>
             <form id="formTambah" action="" method="post">
              <ul style="list-style: none; pading: 0; margin: 0;">

              <li class="li-pegawai">
                <label class="label-tambah-dosen" for="name">NAMA:</label>
                <input class="input-tambah-id" type="text" name="name" id="name" required >
            </li>

            <li class="li-pegawai">
                <label class="label-tambah-dosen" for="name">NIK:</label>
                <input class="input-tambah-id" type="text" name="nik" id="nik" required >
            </li>

            <li class="li-pegawai">
                <label class="label-tambah-dosen" for="name">BIDANG:</label>
                <input class="input-tambah-id" type="text" name="field" id="field" required >
            </li>

            <li class="li-pegawai">
                <label class="label-tambah-dosen" for="name">EMAIL:</label>
                <input class="input-tambah-id" type="text" name="email" id="email" required >
            </li>

            <li class="li-pegawai">
                <label class="label-tambah-dosen" for="name">NO TELEPON:</label>
                <input class="input-tambah-id" type="text" name="notelp" id="notelp" required >
            </li>

            <li class="li-pegawai">
                <label class="label-tambah-dosen" for="name">JENIS KELAMIN:</label>
                <select class="input-tambah-id" type="text" name="gender" id="gender" required >
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
               </select>
            </li>

            <li class="li-pegawai">
                <button class="button-id" type="submit" name="submit"><i class="fa-solid fa-paper-plane mr-2"></i>KIRIM</button>
            </li>

            </ul>
             </form>
               </div> 
                 </div>
                 <?php
                 if(isset($_POST["submit"])) {
                  if (tambahPegawai($_POST) > 0) {
                    echo "
                    <script>
                    alert('Data berhasil ditambahkan')
                    document.location.href = '';                   
                    </script>
                    ";
                  }else {
                    echo "
                    <script>
                    alert('Data gagal ditambahkan')
                    document.location.href = '';                   
                    </script>
                    ";
                  }
                 }

                 ?>


                 <table class="table table-striped table-bordered">
                  <form class="d-flex" method="post" action="">
                    <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search" required>
                    <button class="btn btn-outline-success mb-4" name="cari" type="submit"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                    
                  

                  <nav aria-label="Page navigation example">
                   <ul class="pagination justify-content-end">
                     <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                         <span aria-hidden="true">&laquo;</span>
                         </a>                 
                     </li>

                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>

                 <li class="page-item">
                 <a class="page-link" href="#" aria-label="Next">
                   <span aria-hidden="true">&raquo;</span>
                    </a>
                     </li>
                         </ul>
                      </nav>

                      <?php if(isset($_POST["cari"])): ?>
                      <a href="halamanpegawai.php" class="kembali-cari"><i class="fa-solid fa-arrow-rotate-left"></i>Back</a>
                <?php endif; ?>

                      </form>
                      <thead>
                        <tr>
                       <th scope ="col">NO</th>
                       <th scope ="col">NAMA</th>
                       <th scope ="col">NIK</th>
                       <th scope ="col">BIDANG</th>
                       <th scope ="col">EMAIL </th>
                       <th scope ="col">NO TELEPON </th>
                      <th scope ="col">JENIS KELAMIN</th>
                       <th scope ="col">EDIT</th>
                        </tr>
                      </thead>


           <?php $a = 1; ?>
            <?php foreach($data_pegawai as $row) : ?>
                      <tbody>
                        <tr>
                    <td><?= $a; ?></td>   
                    <td><?= $row["name"]; ?></td>  
                    <td><?= $row["nik"]; ?></td>  
                    <td><?= $row["field"]; ?></td> 
                    <td><?= $row["email"]; ?></td> 
                    <td><?= $row["notelp"]; ?></td> 
                    <td><?= $row["gender"]; ?></td>

                   
                   
                          
                          <!-- EDIT -->
                          <td> <a <?= $row["id"]; ?>></a>
                          <a class="button-edit" onclick="openEdit('<?= $row['id']; ?>', '<?= $row['name']; ?>', '<?= $row['nik']; ?>', '<?= $row['field']; ?>', '<?= $row['email']; ?>', '<?= $row['notelp']; ?>', '<?=$row['gender']; ?>')">
                          <i class="fas fa-edit bg-warning p-2 text-white" ></i></a>
                          
              <div id="modalEditPegawai" class="edit">
                <div class="edit-content">
                    <span class="close-edit" onclick="closePegawai()">&times;</span>
                    <h2>Edit Data Pegawai</h2>
                    <form action="" class="form-edit" method="post">
                     <input type="hidden" name="id" id="editId">
                     <div class="div-edit">
            <label class="label-id" for="name">NAMA</label>
            <input class="input-id" type="text" name="name" id="editName" required>
            </div>
            <div class="div-edit">
            <label class="label-id" for="nik">NIK</label>
            <input class="input-id" type="text" name="nik" id="editNik" required>
            </div>
            <div class="div-edit">
            <label class="label-id" for="field">BIDANG</label>
            <input class="input-id" type="text" name="field" id="editField" required>
            </div>
            <div class="div-edit">
            <label class="label-id" for="email">NAMA</label>
            <input class="input-id" type="text" name="email" id="editEmail" required>
            </div>
            <div class="div-edit">
            <label class="label-id" for="notelp">NO TELEPON</label>
            <input class="input-id" type="text" name="notelp" id="editNotelp" required>
            </div>
            <div class="div-edit">
            <label class="label-id" for="gender">JENIS KELAMIN</label>
            <select class="input-id" type="text" name="gender" id="editGender" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Wanita">Wanita</option>
            </select>
            </div>
            <button class="button-id" type="submit" name="edit"><i class="fa-solid fa-floppy-disk"></i>Save</button>
                    </form>
                </div>
              </div>
              <?php  
        if( isset($_POST["edit"])) {
          // apakah data berhasil diubah atau belum
          if(ubah($_POST) > 0 ) {
            echo "
            <script>
            alert('Data berhasil diubah!');
            document.location.href = '';
            </script>
            ";
          } else {
            echo "
            <script>
            alert('Tidak ada Perubahan Data');
            document.location.href = '';
            </script>
            ";
          }
         }
  
       ?>
       <!-- edit end -->

       <!-- hapus -->
          <a class="button-hapus">
         <a href="hapuspegawai.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin ingin hapus data?');">
                <i class="fas fa-trash-alt bg-danger p-2 text-white"></i>

              
               
                

                          </td> 
                          
                          <?php $a++; ?>
                        <?php endforeach; ?>
                        </tr>
                      </tbody>  


                      </form> 
                 </table>

<script src="js/pegawai.js"></script>
</body>
</html>