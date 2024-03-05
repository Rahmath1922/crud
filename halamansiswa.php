<?php
require 'function/functionmahasiswa.php';
$res = query("SELECT * FROM jurusan");
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
    <a class="nav-link text-white" href="nilaisiswa.php"><i class="fa-solid fa-paper-plane mr-2"></i>Nilai Mahasiswa</a><hr class="bg-secondary">
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
                <h3><i class="fa-solid fa-user-graduate mr-2"></i>DATA SISWA</h3>

                <button href="" class="btn btn-primary mb-4" onclick="openModal()"><i class="fa-solid fa-user-plus mr-2"></i> TAMBAH DATA MAHASISWA</button>
                <div id="modalTambah" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeModal()">&times;</span>

                        <h2>Tambah data mahasiswa</h2>
                        <form id=formTambah action="" method="post">
                        <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="margin-bottom: 15px;">
                <label class="label-tambah" for="name">NAMA:</label>
                <input class="input-tambah-id" type="text" name="name" id="name" required >
            </li>   
            <li style="margin-bottom: 15px;">
                <label class="label-tambah" for="name">NIM:</label>
                <input class="input-tambah-id" type="text" name="nim" id="nim" required >
            </li>   
            <li style="margin-bottom: 15px;">
                <label class="label-tambah" for="name">KOTA:</label>
                <input class="input-tambah-id" type="text" name="city" id="city" required >
            </li>   
            <li style="margin-bottom: 15px;">
                <label class="label-tambah" for="name">EMAIL:</label>
                <input class="input-tambah-id" type="text" name="email" id="email" required >
            </li>   
            <li style="margin-bottom: 15px;">
            <label for="">Pilih Jurusan</label>
            <select name="prodi_id" id="" class="form-control">
              <option value="" disabled>Select Jurusan</option>
              <?php foreach ($res as $key) : ?>
              <option value="<?= $key['id']; ?>"><?= $key['name'];?></option>
              <?php endforeach ;?>
            </select>
            </li>   
            <li>
                <button class="button-id" type="submit" name="submit"><i class="fa-solid fa-paper-plane mr-2"></i>KIRIM</button>
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
                  <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search" required>
                  <button class="btn btn-outline-success mb-4" name="cari" type="submit"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                


                  <!-- pagination -->
                  <nav aria-label="page navigation example">
                     <ul class="pagination justify-content-end">
                     <li class="page-item <?= ($halamanAktif == 1) ? 'disabled' : ''; ?>">
                 <a class="page-link" href="?halaman=<?= ($halamanAktif - 1); ?>" aria-label="previous">
                  <span aria-hidden="true">&laquo;</span>
                   </a>
                   </li>

                   <?php for ($i = max(1, $halamanAktif - 1); $i <= min($halamanAktif + 1, $jumlahHalaman); $i++) : ?>
               <li class="page-item <?= ($i == $halamanAktif) ? 'active' : ''; ?>">
             <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                 <?php endfor; ?>
                 
           <li class="page-item <?= ($halamanAktif == $jumlahHalaman) ? 'disabled' : ''; ?>">
              <a class="page-link" href="?halaman=<?= ($halamanAktif + 1); ?>" aria-label="next">
               <span aria-hidden="true">&raquo;</span>
              </a>
              </li>
                     </ul>
                  </nav>
                  
                    <?php if(isset($_POST["cari"])): ?>
                      <a href="halamansiswa.php" class="kembali-cari"><i class="fa-solid fa-arrow-rotate-left"></i>Back</a>
                <?php endif; ?>             
        </form>  
  
  
        <thead>
    <tr>
    <!-- <th><input type="checkbox" id="selectAll" /></th> -->
      <th scope="col">NO</th>
      <th scope="col">NAMA</th>
      <th scope="col">NIM</th>
      <th scope="col">KOTA</th>
      <th scope="col">GMAIL</th>
      <th scope="col">Jurusan</th>
      <th colspan="3">EDIT</th>
    </tr>
    </thead>

    <?php
// Bagian atas kode PHP Anda
if(isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];
    $mahasiswa = cari($keyword);
} else {
    $query = "SELECT data_siswa.*, jurusan.name AS jurusan_name
              FROM data_siswa
              INNER JOIN jurusan ON data_siswa.prodi_id = jurusan.id 
              LIMIT $awalData, $jumlahDataPerHalaman";

    $mahasiswa = query($query);
}
?>  

    <?php $a = 1 + $awalData ?>
    <?php foreach($mahasiswa as $row) : ?>
  
  <tbody>
    <tr>
 
            <td><?= $a; ?></td>
            <td><?= $row["name"]; ?></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["city"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan_name"]; ?></td>
          
            
          

<!-- Edit modal start -->                 
           <td> <a <?= $row["id"];?>></a>
            <a class="button-edit" onclick="openEdit( '<?= $row['id']; ?>', '<?= $row['name']; ?>', '<?= $row['nim']; ?>', '<?=$row['city']; ?>', '<?=$row['email']; ?>' )"> 
          <i class="fas fa-edit bg-warning p-2 text-white"></i></a> 
        
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
          if(edit($_POST) > 0 ) {
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




<script src="js/mahasiswa.js"></script>
</body>
</html>