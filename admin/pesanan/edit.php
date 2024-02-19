<?php 
session_start();
if( !isset($_SESSION["login"])) {
 header("location: ../login.php");
 exit;
}
$title_web = 'Edit Pesanan';
require 'fungsi.php';
include '../yha.php';



$id_pesanan = $_GET["id_pesanan"];

$data1 = query("SELECT * FROM pesanan join menu on menu.id_menu = pesanan.id_menu WHERE id_pesanan = $id_pesanan")[0];

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
    
    <h1 class="h2 border-bottom mb-5">Edit Pesanan</h1>

    <a href="index.php"><button type="button" class="btn mt-4 mb-4 btn-danger"><i class="bi bi-arrow-left"></i> Kembali</button></a>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_pesanan" value="<?= $data1["id_pesanan"]?>">

        <p>
            <div class="mb-3 w-50">
            <label for="username" class="mb-1">Username :</label>
            <input class="form-control" type="text" name="username" id="username" value="<?= $data1["username"]?>" disabled>
            </div>
        </p>

        <p>
        <div class="mb-3 w-50">
            <label for="nama" class="mb-1">Nama Lengkap :</label>
            <input class="form-control" type="text" name="nama_lengkap" id="nama" value="<?= $data1["nama_lengkap"]?>" disabled>
        </div>
        </p>

        <p>
        <div class="mb-3 w-50">
            <label for="no_hp" class="mb-1">No Hp :</label>
            <input class="form-control" type="text" name="no_hp" id="no_hp" value="<?= $data1["no_hp"]?>" disabled>
        </div>
        </p>

        <p>
        <label for="alamat">Alamat :</label>
        <div class="mb-3 w-50">
        <div class="form-floating">
        <textarea class="form-control" id="alamat" name="alamat" style="height: 100px" disabled><?= $data1["alamat"]?></textarea>
        </div>
        </div>
        </p>


        <p>
        <label for="alamat">Pesan :</label>
        <div class="mb-3 w-50">
        <div class="form-floating">
        <textarea class="form-control" id="alamat" name="pesan" style="height: 100px" disabled><?= $data1["pesan_untuk_penjual"]?></textarea>
        </div>
        </div>
        </p>

        <p>
        <div class="mb-3 w-50">
            <label for="id_menu" class="mb-1">Nama Menu :</label>
            <input class="form-control" type="text" name="id_menu" id="id_menu" value="<?= $data1["id_menu"]?>" disabled>
        </div>
        </p>

        <p>
        <div class="mb-3 w-50">
            <label for="jumlah" class="mb-1">Jumlah :</label>
            <input class="form-control" type="text" name="jumlah" id="jumlah" value="<?= $data1["jumlah"]?>" disabled>
        </div>
        </p>

        <p>
        <div class="mb-3 w-50">
            <label for="jumlah" class="mb-1">Total :</label>
            <input class="form-control" type="text" name="jumlah" id="jumlah" value="<?= $data1["total"]?>" disabled>
        </div>
        </p>

        <p>
        <div class="mb-3 w-50">
            <label for="tgl_pesan" class="mb-1">Waktu Pesan</label>
            <input class="form-control" type="text" name="tgl_pesan" id="tgl_pesan" value="<?= $data1["tgl_pesan"]?>" disabled>
        </div>
        </p>

        <p>
            <div class="mb-3 w-50">
            <label for="id_status" class="mb-1">Status :</label>
            <select name="id_status" id="id_status" class="form-select">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM statuss");
                while($data = mysqli_fetch_array($query)) {
                ?>
                <option value="<?= $data['id_status']?>" <?php echo($data['id_status'] === $data1['id_status'])?'selected':''; ?>><?php echo $data['statuss']?></option>
                <?php 
                }
                ?>
            </select>
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
