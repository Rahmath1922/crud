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

function getJumlahPegawai() {
    $result = query("SELECT COUNT(*) AS jumlah FROM data_pegawai");
    $jumlahPegawai = $result[0]['jumlah'];
    return $jumlahPegawai;
}


    // function cari        
    if (isset($_POST["cari"])) {
        $data_pegawai = caripegawai($_POST["keyword"]);
    } else{
         $data_pegawai = query("SELECT * FROM data_pegawai");
    }

    

function caripegawai($keyword) {
    $query = "SELECT * FROM data_pegawai WHERE
            name LIKE '%$keyword%' OR
            nik LIKE '%$keyword%' OR
            field LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            notelp LIKE '%$keyword%' OR
            gender LIKE '%$keyword%'     
            ";
            return query($query);
}

//hapus
function hapuspegawai($id) {
    // var_dump($id);
    global $conn;
    mysqli_query($conn, "DELETE FROM data_pegawai WHERE id = $id");
    return mysqli_affected_rows($conn);
}


// edit
function ubah($data) {
    //  var_dump($data);
        global $conn;
        
        $id = $data["id"];
        $name = htmlspecialchars($data["name"]);
        $nik = htmlspecialchars($data["nik"]);
        $field = htmlspecialchars($data["field"]);
        $email = htmlspecialchars($data["email"]);
        $notelp = htmlspecialchars($data["notelp"]);
        $gender = htmlspecialchars($data["gender"]);
    
        $query = "UPDATE data_pegawai SET
                 name = '$name',
                 nik = '$nik',
                 field = '$field',
                 email = '$email',
                 notelp = '$notelp',
                 gender = '$gender'
                 WHERE id = $id
               ";
    mysqli_query($conn, $query);
         
         return mysqli_affected_rows($conn);
    
    }
    
    // function tambah data pegawai
    function tambahPegawai($data) {
        global $conn;
        $name = htmlspecialchars($data["name"]);
        $nik = htmlspecialchars($data["nik"]);
        $field = htmlspecialchars($data["field"]);
        $email = htmlspecialchars($data["email"]);
        $notelp = htmlspecialchars($data["notelp"]);
        $gender = htmlspecialchars($data["gender"]);

        // insert data pegawai
        $query = "INSERT INTO data_pegawai
                  VALUES
                  ('', '$name', '$nik', '$field', '$email', '$notelp', '$gender')
                 ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);         
       }



?>