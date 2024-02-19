<?php 
session_start();
if( !isset($_SESSION["login"])) {
 header("location: ../login.php");
 exit;
}
$title_web = 'Edit Menu';
require 'fungsi.php';
include '../yha.php';


$id_menu = $_GET["id_menu"];

$data1 = query("SELECT * FROM menu WHERE id_menu = $id_menu")[0];

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
    
    <h1 class="h2 border-bottom mb-5">Edit Menu</h1>

    <a href="index.php"><button type="button" class="btn mt-4 mb-4 btn-danger"><i class="bi bi-arrow-left"></i> Kembali</button></a>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_menu" value="<?= $data1["id_menu"]?>">
    <input type="hidden" name="gambar_lama" value="<?= $data1["gambar"]?>">

        <p>
            <div class="mb-3 w-50">
            <label for="nama" class="mb-1">Nama :</label>
            <input class="form-control" type="text" name="nama_menu" id="nama" value="<?= $data1["nama_menu"]?>" required>
            </div>
        </p>

        <p>
        <div class="mb-3 w-50">
            <label for="harga" class="mb-1">Harga :</label>
            <input class="form-control" type="number" name="harga_menu" id="harga" value="<?= $data1["harga_menu"]?>" required>
        </div>
        </p>

        <p>
            <div class="mb-3 w-50">
            <label for="id_jenis" class="mb-1">Kategori menu :</label>
            <select name="id_jenis" id="id_jenis" class="form-select">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM jenis_menu");
                while($data = mysqli_fetch_array($query)) {
                ?>
                <option value="<?= $data['id_jenis']?>" <?php echo($data['id_jenis'] === $data1['id_jenis'])?'selected':''; ?>><?php echo $data['jenis']?></option>
                <?php 
                }
                ?>
            </select>
            </div>
        </p>

        <p>
            <div class="mb-3 w-50">
            <label for="deskripsi" class="mb-1">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required><?= $data1["deskripsi"]?></textarea>
            </div>
        </p>

        <p>
        <div class="mb-3 w-50">
            <label for="stok" class="mb-1">Stok :</label>
            <input class="form-control" type="number" name="stok" id="stok" value="<?= $data1["stok"]?>" required>
        </div>
        </p>

        <p>
        <div class="mb-3 w-50">
            <label for="gambar" class="mb-1">Gambar :</label><br>
            <!-- <img src="img/<?= $data1['gambar']; ?>" width="40" alt=""><br> -->
            <input class="form-control" type="file" name="gambar" id="gambar">
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
