<?php 
session_start();
if( !isset($_SESSION["login"])) {
 header("location: ../login.php");
 exit;
}
require 'fungsi.php';

$id_menu = $_GET["id_menu"];

if( hapus($id_menu) > 0 ) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
    alert('data gagal dihapus');
    document.location.href = 'index.php';
    </script>";
}

?>