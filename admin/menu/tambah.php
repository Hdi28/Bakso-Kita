<?php 
session_start();
if( !isset($_SESSION["login"])) {
 header("location: ../login.php");
 exit;
}
$title_web = 'Tambah Menu';
include '../yha.php';
require 'fungsi.php';

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
    
    <h1 class="h2 border-bottom mb-5">Tambah Menu</h1>

    <a href="index.php"><button type="button" class="btn mt-4 mb-4 btn-danger"><i class="bi bi-arrow-left"></i> Kembali</button></a>


    <form action="" method="post" enctype="multipart/form-data">
        <p>
            <div class="mb-3 w-50">
            <label for="nama" class="mb-1">Nama :</label>
            <input class="form-control" type="text" name="nama" id="nama" required>
            </div>
        </p>

        <p>
            <div class="mb-3 w-50">
            <label for="harga" class="mb-1">Harga :</label>
            <input class="form-control" type="number" name="harga" id="harga" required>
            </div>
        </p>

        <p>
            <div class="mb-3 w-50">
            <label for="id_jenis">Kategori menu :</label>
            <select class="form-select" name="id_jenis" id="id_jenis">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM jenis_menu");
                while($data = mysqli_fetch_array($query)) {
                ?>
                <option value="<?= $data['id_jenis']?>"><?php echo $data['jenis']?></option>
                <?php 
                }
                ?>
            </select>
            </div>
        </p>

        <p>
            <div class="mb-3 w-50">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
            </div>
        </p>

        <p>
            <div class="mb-3 w-50">
            <label for="stok" class="mb-1">Stok :</label>
            <input class="form-control" type="number" name="stok" id="stok" required>
            </div>
        </p>

        <p>
            <div class="mb-3 w-50">
            <label for="gambar" class="mb-1">Gambar :</label>
            <input class="form-control" type="file" name="gambar" id="gambar">
            </div>
        </p>

        <p>
            <button type="submit" class="btn mt-3 mb-4 btn-success" name="submit">Tambah Data <i class="bi bi-floppy2-fill"></i></button>
        </p>

    </form>

    </div>
    </div>
</main>
<?php include '../yhb.php'; ?>
