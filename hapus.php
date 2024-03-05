<?php
require 'function/functionmahasiswa.php';

if(isset($_GET["id"]) && $_GET["id"] !== ""){
    $id = $_GET["id"];

    if(hapus($id) > 0) {
        echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = 'halamansiswa.php';
        </script>";
        exit;
    } else {
        echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'halamansiswa.php';
        </script>";
        exit;
    }
} else {
    echo "<script>
    alert ('Id tidak valid');
    document.location.href = 'halamansiswa.php';
    </script>";
    exit;
}


?>