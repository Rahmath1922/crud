<?php
require 'function.php';

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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-warning fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Selamat datang admin | UNIVERSITAS MAJAPAHIT</a>
  

      <div class="icon ml-4">
        <h5>
           <a href="halamanmasuk.php"><i class="fa-solid fa-backward" data-toggle="tooltip" title="Back"></i></a>
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
    <a class="nav-link text-white" href="#"><i class="fa-solid fa-users-viewfinder mr-2"></i>Daftar Pegawai</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="#"><i class="fa-solid fa-paper-plane mr-2"></i>Nilai Mahasiswa</a><hr class="bg-secondary">
  </li>
</ul>
         </div>
        <div class="col-md-10">
            <!-- clas dalam -->
            <div class="col-md p-7 pt-2">
                <h3><i class="fa-solid fa-user-graduate mr-2"></i>DATA SISWA</h3>

                <button href="" class="btn btn-primary mb-4" onclick="openModal()"><i class="fa-solid fa-user-plus mr-2"></i> TAMBAH DATA MAHASISWA</button>
                <div id="modalTambah" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeModal()">&times;</span>

                        <h2>Tambah data mahasiswa</h2>
                        <form id=formTambah action="" method="post">
                        <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 15px;">
                <label class="label-tambah" for="name" style="display: block; margin-bottom: 5px;">NAMA:</label>
                <input class="input-tambah" type="text" name="name" id="name" required style="width: calc(100% - 10px); padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </li>   
            <li style="margin-bottom: 15px;">
                <label class="label-tambah" for="name" style="display: block; margin-bottom: 5px;">NIM:</label>
                <input class="input-tambah-id" type="text" name="nim" id="nim" required style="width: calc(100% - 10px); padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </li>   
            <li style="margin-bottom: 15px;">
                <label class="label-tambah" for="name" style="display: block; margin-bottom: 5px;">KOTA:</label>
                <input class="input-tambah" type="text" name="city" id="city" required style="width: calc(100% - 10px); padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </li>   
            <li style="margin-bottom: 15px;">
                <label class="label-tambah" for="name" style="display: block; margin-bottom: 5px;">EMAIL:</label>
                <input class="input-tambah" type="text" name="email" id="email" required style="width: calc(100% - 10px); padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </li>   
            <li>
                <button type="submit" name="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;"><i class="fa-solid fa-paper-plane mr-2"></i>KIRIM</button>
            </li>
                        </ul>
                        </form>
                    </div>
                </div>

                <?php
                if (isset($_POST["submit"])) {
                  if (tambah($_POST) > 0) {
                      echo "
                      <script>
                      alert('Data berhasil ditambahkan')
                      document.location.href = '';
                      </script>
                      ";
                  } else {
                      echo "
                      <script>
                      alert('Data gagal ditambahkan')
                      </script>
                      ";
                  }
              }
                ?>
<!-- MOdal tambah data end -->





                <table class="table table-striped table-bordered">
                
                <!-- search start -->
                <form class="d-flex" method="post" action="">
                  <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success mb-4" name="cari" type="submit"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                  </form>
                    <?php if(isset($_POST["cari"])): ?>
                      <a href="halamansiswa.php" class="kembali-cari"><i class="fa-solid fa-arrow-rotate-left"></i>Back</a>

                <?php endif; ?>
                <!-- CEKBOX -->
                <!-- <form action="" method="post" id="formHapus">
    <input type="hidden" name="selected_ids" id="selectedIds">
    <button type="submit" id="deleteButton" style="display: none; padding: 8px 20px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; margin-bottom: 20px;">Hapus Terpilih</button>
    <button type="button" id="cancelButton" style="display: none; padding: 8px 20px; background-color: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer; margin-bottom: 20px;" >Batal</button> -->
               </form>
      
  <thead>
    <tr>
    <!-- <th><input type="checkbox" id="selectAll" /></th> -->
      <th scope="col">NO</th>
      <th scope="col">NAMA</th>
      <th scope="col">NIM</th>
      <th scope="col">KOTA</th>
      <th scope="col">GMAIL</th>
      <th colspan="3">EDIT</th>
    </tr>

    <?php $a = 1; ?>
    <?php foreach($data_siswa as $row) : ?>
  </thead>
  <tbody>
    <tr>
    <!-- <td><input type="checkbox" name="checked_ids[]" value="<?= $row['id']; ?>"></td> -->
            <td><?= $a; ?></td>
            <td><?= $row["name"]; ?></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["city"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><a  <?= $row["id"];?>> </a>

<!-- Edit modal start -->                 
           <td><a  <?= $row["id"];?>>    </a>
            <a class="button-edit" onclick="openEdit('<?= $row['id']; ?>', '<?= $row['name']; ?>', '<?= $row['nim']; ?>', '<?=$row['city']; ?>', '<?=$row['email']; ?>' )">
            <i class="fas fa-edit bg-warning p-2 text-white" ></i>
        </a>
        <div id="modalEdit" class="edit">
          <div class="edit-content">
            <span class="close-edit" onclick="closeEdit()">&times;</span>
            <h2>Edit data Mahasiswa</h2>
            <form class="form-edit" action="" method="post">
              <input type="hidden" name="id" id="editId">
              <div class="div-edit">
                <label class="label-id" for="name">Name</label>
                <input class="input-id" type="text" name="name" id="editName" required >
              </div>
              <div class="div-edit">
                <label class="label-id" for="nim">Nim</label>
                <input class="input-id" type="text" name="nim" id="editNim" required >
              </div>
              <div class="div-edit">
                <label class="label-id" for="city">Kota</label>
                <input class="input-id" type="text" name="city" id="editCity" required >
              </div>
              <div class="div-edit">
                <label class="label-id" for="email">Email</label>
                <input class="input-id" type="text" name="email" id="editEmail" required >
              </div>
              <button class="button-id" type="submit" name="edit"><i class="fa-solid fa-floppy-disk"></i>Save</button>
            </form>
          </div>   
        </div>


        <?php
         if( isset($_POST["edit"])) {
          // apakah data berhasil diubah atau belum
          if(change($_POST) > 0 ) {
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

 





        <a class="button-hapus">
                <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin ingin hapus data?');">
                <i class="fas fa-trash-alt bg-danger p-2 text-white"></i>
        </a>
            </a>
            </td>
            <?php $a++; ?>
          <?php endforeach; ?>

    </tr>
    
  </tbody>
</table>
 
  </div>
</div>
    



<script src="cekbox.js"></script>
<script src="logout.js"></script>
</body>
</html>