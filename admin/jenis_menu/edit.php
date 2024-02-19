<?php 
session_start();
if( !isset($_SESSION["login"])) {
 header("location: ../login.php");
 exit;
}
require 'fungsi.php';
$title_web = 'Edit Kategori Menu';
include '../yha.php';

$id_jenis = $_GET["id_jenis"];

$data1 = query("SELECT * FROM jenis_menu WHERE id_jenis = $id_jenis")[0];

if(isset($_POST["submit"])) {

    if( edit($_POST) > 0 ) {
        echo "<script>
        alert('data berhasil diubah');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('data tidak berhasil diubah');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <div class="container">
    
    <h1 class="h2 border-bottom mb-5">Edit Kategori Menu</h1>

    <a href="index.php"><button type="button" class="btn mt-4 mb-4 btn-danger"><i class="bi bi-arrow-left"></i> Kembali</button></a>
    <form action="" method="post">
        <input type="hidden" name="id_jenis" value="<?= $data1["id_jenis"]?>">
        <p>
            <div class="mb-3 w-50">
            <label for="jenis" class="mb-1">Kategori menu :</label>
            <input class="form-control" type="text" name="jenis" id="jenis" value="<?= $data1["jenis"]?>" required>
            </div>
        </p>
        <p>
        <button type="submit" class="btn mt-3 mb-4 btn-success" name="submit">Ubah Data <i class="bi bi-pencil-square"></i></button>
        </p>
    </form>
    </div>
    </div>
</main>
<?php include '../yhb.php' ?>