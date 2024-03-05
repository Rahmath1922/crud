<?php
require 'function/functiondosen.php';

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
                <h3><i class="fa-solid fa-chalkboard-user mr-2"></i>DATA DOSEN</h3>

            <!-- Tambah data dosen starts -->
            <button href="" class="btn btn-primary mb-4" onclick="openModal()"><i class="fa-solid fa-user-plus mr-2"></i> TAMBAH DATA DOSEN</button>
             <div id="modalTambahDosen" class="modalDosen">
            <div class="modal-content-dosen">
         <span class="close-dosen" onclick="closeModal()">&times;</span>
           
         <h2>Tambah data Dosen</h2>
        <form id=formTambah action="" method="post">
         <ul style="list-style: none; padding: 0; margin: 0;">

               <li class="li-dosen">
                <label class="label-tambah-dosen" for="name">NAMA:</label>
                <input class="input-tambah-id" type="text" name="name" id="name" required >
            </li> 

               <li class="li-dosen">
                <label class="label-tambah-dosen" for="name">NIP:</label>
                <input class="input-tambah-id" type="text" name="nip" id="nip" required>
            </li>   
            <li class="li-dosen">
                <label class="label-tambah-dosen" for="name">JURUSAN:</label>
                <input class="input-tambah-id" type="text" name="keahlian" id="keahlian" required>
            </li>   
            <li class="li-dosen">
            <label class="label-tambah-dosen" for="status">STATUS:</label>
            <select class="input-tambah-id" name="status" id="status" required>
          <option value="aktif">Aktif</option>
           <option value="tidak aktif">Tidak Aktif</option>
          </select>
          </li>

            <li class="li-dosen">
                <label class="label-tambah-dosen" for="name">EMAIL:</label>
                <input class="input-tambah-id" type="text" name="email" id="email" required>
            </li>   
            <li class="li-dosen">
                <label class="label-tambah-dosen" for="name">TANGGAL BERGABUNG:</label>
                <input class="input-tambah-id" type="date" name="tanggalbergabung" id="tanggalbergabung" required>
            </li>      
            <li class="li-dosen">
                <button class="button-id" type="submit" name="submit"><i class="fa-solid fa-paper-plane mr-2"></i>KIRIM</button>
            </li>
            </ul>
            </form>
             </div>
              </div>

            <?php
            if (isset($_POST["submit"])) {
              if (tambahDosen($_POST) > 0) {
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

            <!-- tambah data dosen end -->


<div>
                <table class="table table-striped table-bordered">

        <!-- SEARCH DOSEN -->
                 <form class="d-flex" method="post" action="">
                  <input class="form-control me-2 " name="keyword" type="search" placeholder="Search" aria-label="Search" required>
                  <button class="btn btn-outline-success mb-4" name="cari" type="submit"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                 

        <!-- PAGINATION -->
        <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        <li class="page-item<?= ($halamanAktifDosen == 1) ? ' disabled' : ''; ?>">
            <a class="page-link" href="?halaman=<?= ($halamanAktifDosen - 1); ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        <?php for ($i = max(1, $halamanAktifDosen - 1); $i <= min($halamanAktifDosen + 1, $jumlahHalamanDosen); $i++) : ?>
            <li class="page-item <?= ($i == $halamanAktifDosen) ? 'active' : ''; ?>">
                <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>

        <li class="page-item <?= ($halamanAktifDosen == $jumlahHalamanDosen) ? 'disabled' : ''; ?>">
            <a class="page-link" href="?halaman=<?= ($halamanAktifDosen + 1); ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>

       


                  <?php if(isset($_POST["cari"])): ?>
                  <a href="halamandosen.php" class="kembali-cari"><i class="fa-solid fa-arrow-rotate-left"></i>Back</a>
                
                    <?php endif; ?>
                  </form>
                
               <thead>
                
                <tr>
                <th scope="col">NO</th>
                <th scope="col">NAMA</th>
                <th scope="col">NIP</th>
                <th scope="col">JURUSAN</th>
                <th scope="col">STATUS</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TANGGAL BERGABUNG</th>
                <th colspan="3">EDIT</th>   
                </tr>
                </thead>

                
                <?php $a = 1 + $awalDataDosen ?>
                <?php foreach($dosen as $row) : ?>
              
               <tbody>
               <tr>
               <td><?= $a; ?></td>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["nip"]; ?></td>
                <td><?= $row["keahlian"]; ?></td>
                <td><?= $row["status"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["tanggalbergabung"]; ?></td>

             

        <!-- Edit modal start -->
    

        <td><a <?= $row["id"]; ?>></a>
       <a class="button-edit" onclick="openEdit('<?= $row['id']; ?>', '<?= $row['name']; ?>', '<?= $row['nip']; ?>', '<?= $row['keahlian']; ?>', '<?= $row['status']; ?>', '<?= $row['email']; ?>', '<?=$row['tanggalbergabung']; ?>')"> <i class="fas fa-edit bg-warning p-2 text-white" ></i></a> 
       
       <div id="modalEditDosen" class="edit">
        <div class="edit-content">
          <span class="close-edit" onclick="closeEdit()">&times;</span>
          <h2>Edit Data Dosen</h2>
          <form action="" class="form-edit" method="post">
            <input type="hidden" name="id" id="editId">
            <div class="div-edit">
            <label class="label-id" for="name">NAMA</label>
            <input class="input-id" type="text" name="name" id="editName" required>
            </div>
            <div class="div-edit">
            <label class="label-id" for="name">NIP</label>
            <input class="input-id" type="text" name="nip" id="editNip" required>
            </div>
            <div class="div-edit">
            <label class="label-id" for="keahlian">JURUSAN</label>
            <input class="input-id" type="text" name="keahlian" id="editKeahlian" required>
            </div>
            <div class="div-edit">
            <label class="label-id" for="status">STATUS</label>
            <select class="input-id" type="text" name="status" id="editStatus" required>
            <option value="Aktif">Aktif</option>
            <option value="tidak Aktif">Tidak aktif</option>
            </select>
            </div>
            <div class="div-edit">
            <label class="label-id" for="email">EMAIL</label>
            <input class="input-id" type="text" name="email" id="editEmail" required>
            </div>
            <div class="div-edit">
            <label class="label-id" for="tanggalBergabung">TANGGAL BERGABUNG</label>
            <input class="input-id" type="date" name="tanggalbergabung" id="editTanggalbergabung" required>
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

        <!-- Edit modal end -->
                 

            <a class="button-hapus">
                <a href="hapus2.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ingin hapus data?');">
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
          



<script src="js/dosen.js"></script>
</body>
</html>