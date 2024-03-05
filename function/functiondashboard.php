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


// function halaman dashboard mahasiswa
function getJumlahMahasiswa() {
    $result = query("SELECT COUNT(*) AS jumlah FROM data_siswa");
    $jumlahMahasiswa = $result[0]['jumlah'];
    return $jumlahMahasiswa;
}

// function halaman dashboard dosen
function getJumlahDosen() {
    $result = query("SELECT COUNT(*) AS jumlah FROM data_dosen");
    $jumlahDosen = $result[0]['jumlah'];
    return $jumlahDosen;
}

    // function halaman dashboard pegawai
    function getJumlahPegawai() {
        $result = query("SELECT COUNT(*) AS jumlah FROM data_pegawai");
        $jumlahPegawai = $result[0]['jumlah'];
        return $jumlahPegawai;
    }
?>