<?php
// Koneksi ke database php my admin saya
$cons = mysqli_connect("localhost", "root", "", "multiuser");
if(!$cons) {
    die("koneksi gagal: " . mysqli_connect_error());
}
$conn = mysqli_connect("localhost", "root", "", "data_mahasiswa");
if(!$conn) {
    die("Koneksi kedatabase data_mahasiswa gagal: " . mysqli_connect_error());
}


// KONFIGURASI PAGINATION
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM data_siswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

$awalData = ($jumlahDataPerHalaman * ($halamanAktif - 1));

$query = "SELECT data_siswa.*, jurusan.name AS jurusan_name
          FROM data_siswa
          INNER JOIN jurusan ON data_siswa.prodi_id = jurusan.id 
          LIMIT $awalData, $jumlahDataPerHalaman";

$mahasiswa = query($query);



// query data
function query($query) {
    global $conn;
    $resault = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($resault)) {
        $rows[] = $row;
    }
    return $rows;
}

// function tambah data
function tambah($data) {
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $prodi = htmlspecialchars($data["prodi_id"]);
    $nim = htmlspecialchars($data["nim"]);
    $city = htmlspecialchars($data["city"]);
    $email = htmlspecialchars($data["email"]);
    
//insert data
   $query = "INSERT INTO data_siswa
            VALUES
            ('', '$name', '$prodi', '$nim', '$city', '$email')
   "; 
   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}


//hapus
function hapus($id) {
    // var_dump($id);
    global $conn;
    mysqli_query($conn, "DELETE FROM data_siswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// edit
function edit($data) {
// var_dump($data);
    global $conn;
    
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $nim = htmlspecialchars($data["nim"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $city = htmlspecialchars($data["city"]);
    $email = htmlspecialchars($data["email"]);

    $query = "UPDATE data_siswa SET
             name = '$name',
             nim = '$nim',
             city = '$city',
             email = '$email'
             WHERE id = $id
           ";
mysqli_query($conn, $query);
     
     return mysqli_affected_rows($conn);
}





// function cari        
function cari($keyword) {
    $query = "SELECT data_siswa.*, jurusan.name AS jurusan_name
              FROM data_siswa
              INNER JOIN jurusan ON data_siswa.prodi_id = jurusan.id 
              WHERE
              data_siswa.name LIKE '%$keyword%' OR
              data_siswa.prodi LIKE '%$keyword%' OR
              data_siswa.nim LIKE '%$keyword%' OR
              data_siswa.city LIKE '%$keyword%' OR
              data_siswa.email LIKE '%$keyword%' OR
              jurusan.name LIKE '%$keyword%'
            ";
    return query($query);
}


// function halaman dashboard
function getJumlahMahasiswa() {
    $result = query("SELECT COUNT(*) AS jumlah FROM data_siswa");
    $jumlahMahasiswa = $result[0]['jumlah'];
    return $jumlahMahasiswa;
}
