<?php

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
// HALAMAN DATA DOSEN


// Paganation halaman dosen
$jumlahDataPerHalamanDosen = 5;
$jumlahDataDosen = count(query("SELECT * FROM data_dosen"));
$jumlahHalamanDosen = ceil($jumlahDataDosen / $jumlahDataPerHalamanDosen);
$halamanAktifDosen = (isset($_GET["halaman"]) && $_GET["halaman"] > 0) ? $_GET["halaman"] : 1;


$awalDataDosen = ($jumlahDataPerHalamanDosen * $halamanAktifDosen) - $jumlahDataPerHalamanDosen;
$dosen = query("SELECT * FROM data_dosen LIMIT $awalDataDosen, $jumlahDataPerHalamanDosen");


// function tambah data
function tambahDosen($data) {
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
    $dosen = car($_POST["keyword"]);
} else {
    $awalDataDosen = ($jumlahDataPerHalamanDosen * $halamanAktifDosen) - $jumlahDataPerHalamanDosen;
    $dosen = query("SELECT * FROM data_dosen LIMIT $awalDataDosen, $jumlahDataPerHalamanDosen");
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
    mysqli_query($conn, "DELETE FROM data_dosen WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// edit
function change($data) {
    //  var_dump($data);
        global $conn;
        
        $id = $data["id"];
        $name = htmlspecialchars($data["name"]);
        $nip = htmlspecialchars($data["nip"]);
        $keahlian = htmlspecialchars($data["keahlian"]);
        $status = htmlspecialchars($data["status"]);
        $email = htmlspecialchars($data["email"]);
        $tanggalbergabung = htmlspecialchars($data["tanggalbergabung"]);
    
        $query = "UPDATE data_dosen SET
                 name = '$name',
                 nip = '$nip',
                 keahlian = '$keahlian',
                 status = '$status',
                 email = '$email',
                 tanggalbergabung = '$tanggalbergabung'
                 WHERE id = $id
               ";
    mysqli_query($conn, $query);
         
         return mysqli_affected_rows($conn);
    
    }



?>