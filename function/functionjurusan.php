<?php
// Koneksi ke database php my admin saya

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

// JUrusan
if (isset($_POST["cari"])) {
    $jurusan = caripegawai($_POST["keyword"]);
} else{
     $jurusan = query("SELECT * FROM jurusan");
}    
?>