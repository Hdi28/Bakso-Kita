<?php
session_start();

if( isset($_SESSION["login"])) {
    header("location: login/index.php");
    exit;
}
require 'fungsi.php';

$title_web = 'Detail';

$id_menu = $_GET["id_menu"];

$data1 = query("SELECT * FROM menu WHERE id_menu = $id_menu")[0];


error_reporting(0); 

include 'yha.php';
?>

<div class="container" id="container">
<h1 class="mb-5 text-center">Detail Menu</h1>
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="admin/menu/img/<?= $data1['gambar']; ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title mb-5"><?= $data1['nama_menu']?></h2>
        <p class="card-text">Harga : <?= $data1['harga_menu']?></p>
        <p class="card-text">Stok  : <?= $data1['stok']?></p>
        <div class="d-grid gap-2">
<button class="btn btn-primary mt-2" onclick="return alert('Anda harus melakukan login');" type="button">Beli</button>
</div>
      </div>
    </div>
  </div>
</div>
</div>


<?php include 'yhb.php' ?>