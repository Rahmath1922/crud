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
    $nim = htmlspecialchars($data["nim"]);
    $city = htmlspecialchars($data["city"]);
    $email = htmlspecialchars($data["email"]);
    
//insert data
   $query = "INSERT INTO data_siswa
            VALUES
            ('', '$name', '$nim', '$city', '$email')
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
if (isset($_POST["cari"])) {
    $data_siswa = cari($_POST["keyword"]);
} else{
$data_siswa = query("SELECT * FROM data_siswa");
}

function cari($keyword) {
    $query = "SELECT * FROM data_siswa WHERE
            name LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            city LIKE '%$keyword%' OR
            email LIKE '%$keyword%'     
            ";
            return query($query);
}


// function halaman dashboard
function getJumlahMahasiswa() {
    $result = query("SELECT COUNT(*) AS jumlah FROM data_siswa");
    $jumlahMahasiswa = $result[0]['jumlah'];
    return $jumlahMahasiswa;
}






// HALAMAN DATA DOSEN


// function tambah data
function tamba($data) {
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $nip = htmlspecialchars($data["nip"]);
    $keahlian = htmlspecialchars($data["keahlian"]);
    $status = htmlspecialchars($data["status"]);
    $email = htmlspecialchars($data["email"]);
    $tanggalbergabung = htmlspecialchars($data["tanggalbergabung"]);
    
//insert data
   $query = "INSERT INTO data_dosen
            VALUES
            ('', '$name', '$nip', '$keahlian', '$status', '$email', '$tanggalbergabung')
   "; 
   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}




// function cari
if (isset($_POST["cari"])) {
    $data_dosen = car($_POST["keyword"]);
} else{
$data_dosen = query("SELECT * FROM data_dosen");
}
function car($keyword) {
    $query = "SELECT * FROM data_dosen WHERE
            name LIKE '%$keyword%' OR
            nip LIKE '%$keyword%' OR
            keahlian LIKE '%$keyword%' OR
            status LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            tanggalbergabung LIKE '%$keyword%'     
            ";
            return query($query);
}


// function halaman dashboard
function getJumlahDosen() {
    $result = query("SELECT COUNT(*) AS jumlah FROM data_dosen");
    $jumlahDosen = $result[0]['jumlah'];
    return $jumlahDosen;
}

// Hapus data dosen
function delete($id) {
    global $conn;
    
}


?>