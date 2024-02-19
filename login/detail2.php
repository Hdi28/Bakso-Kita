<?php
session_start();

if( !isset($_SESSION["login"])) {
  header("location: ../login.php");
  exit;
}
require 'fungsi.php';

$id_menu = $_GET["id_menu"];

$data1 = query("SELECT * FROM menu WHERE id_menu = $id_menu")[0];

$result = mysqli_query($conn,"SELECT stok FROM menu WHERE id_menu = $id_menu");

$title_web = 'Pembelian';

include 'yha.php';

if(isset($_POST["submit"])) {

  if( tambah($_POST) > 0 ) {
      echo "<script>
      alert('Menu Berhasil Dipesan');
      document.location.href = 'index.php';
      </script>";
  } else {
      echo "<script>
      alert('data tidak berhasil ditambahkan');
      </script>";
  }
}

error_reporting(0); 


?>

<form action="" method="post">
<input type="hidden" name="username" value="<?php echo $_SESSION["username"] ?>">
<input type="hidden" name="id_menu" value="<?php echo $_GET["id_menu"];?>">
<input type="hidden" name="status" value="1">
<div class="container d-flex justify-content-between" id="container">
    <div class="container">



<div class="container card1" id="card1">
<h4>Masukkan Alamat dan Data Diri</h4>
        
<div class="mb-3 w-100">
  <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
  <input type="text" name="nama"  class="form-control w-100" id="exampleFormControlInput1" required>
</div>
<div class="mb-3 w-100">
  <label for="exampleFormControlInput1" class="form-label">No Hp</label>
  <input type="text" name="no_hp" class="form-control w-100" id="exampleFormControlInput1" required>
</div>
<div class="mb-3 w-100">
  <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
  <textarea class="form-control w-100" name="alamat" id="exampleFormControlTextarea1" rows="3" required></textarea>
</div>
<div class="mb-3 w-100">
  <label for="exampleFormControlTextarea1" class="form-label">Pesan ke Penjual</label>
  <textarea class="form-control w-100" name="pesan" id="exampleFormControlTextarea1" rows="3" placeholder="Opsional"></textarea>
</div>
<div class="card alert alert-danger w-100">
  <div class="card-body">
    <h5 class="card-title">Perhatian !!!</h5>
    <p class="card-text">Pengantaran hanya tersedia di baamang dan sekitarnya saja!!!</p>
  </div>
</div>
</div>
        
</div>


<div class="container">
<h4>Menu Anda</h4>
<div class="card" style="width: 18rem;">
  <img src="../admin/menu/img/<?= $data1['gambar']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $data1['nama_menu']?></h5>

    <div class="container p-0 d-flex justify-content-between">
    <p class="card-text">Rp. <?= $data1['harga_menu'];?></p>
    <p class="card-text">Stok : <?= $data1['stok']; ?></p>
    </div>

    <label class="card-text" for="jumlah">Jumlah</label>
    <input type="number" min="1" name="jumlah_dibeli"   class="form-control w-25" id="jumlah" required>
  </div>
</div>
<div class="d-grid gap-2 mt-4">
  <button class="btn btn-success" type="submit" name="submit">Beli</button>
</div>
</div>
</div>
</form>

<?php include 'yhb.php' ?>