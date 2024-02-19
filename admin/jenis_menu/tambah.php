<?php 
session_start();
if( !isset($_SESSION["login"])) {
 header("location: ../login.php");
 exit;
}
require 'fungsi.php';
$title_web = 'Tambah Kategori Menu';
include '../yha.php';

if(isset($_POST["submit"])) {

    if( tambah($_POST) > 0 ) {
        echo "<script>
        alert('data berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('data tidak berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <div class="container">
    
    <h1 class="h2 border-bottom mb-5">Tambah Kategori Menu</h1>

    <a href="index.php"><button type="button" class="btn mt-4 mb-4 btn-danger"><i class="bi bi-arrow-left"></i> Kembali</button></a>

    <form action="" method="post">
        <p>
            <div class="mb-3 w-50">
            <label for="jenis" class="mb-1">Kategori menu :</label>
            <input class="form-control" type="text" name="jenis" id="jenis" required>
            </div>
        </p>

        <p>
        <button type="submit" class="btn mt-3 mb-4 btn-success" name="submit">Tambah Data <i class="bi bi-floppy2-fill"></i></button>
        </p>
    </form>
    </div>
    </div>
</main>
<?php include '../yhb.php' ?>