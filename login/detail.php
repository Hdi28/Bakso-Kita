<?php
session_start();

if( !isset($_SESSION["login"])) {
  header("location: ../login.php");
  exit;
}
require 'fungsi.php';

$id_menu = $_GET["id_menu"];

$data1 = query("SELECT * FROM menu WHERE id_menu = $id_menu")[0];

$title_web = 'Detail';

error_reporting(0); 

include 'yha.php';
?>

<div class="container" id="container">
<h1 class="mb-5 text-center">Detail Menu</h1>
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../admin/menu/img/<?= $data1['gambar']; ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title mb-2"><?= $data1['nama_menu']?></h2>
        <p class="card-text">Harga : <?= $data1['harga_menu']?></p>
        <p class="card-text">Stok  : <?= $data1['stok']?></p>
        <p class="card-text">Deskripsi : <?= $data1['deskripsi']?></p>
        <a href="detail2.php?id_menu=<?= $data1["id_menu"]?>"><div class="d-grid gap-2 p-0">
<button class="btn btn-success mt-2" type="button">Beli</button>
</div>
</a>
      </div>
    </div>
  </div>
</div>
</div>


<?php include 'yhb.php'; ?>