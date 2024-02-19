<?php 
session_start();
if( !isset($_SESSION["login"])) {
 header("location: ../login.php");
 exit;
}

if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "login"){
		echo "<script> alert('Anda berhasil melakukan login!'); </script>";
	}
}

 require 'fungsi.php';

 $title_web = 'Main';

error_reporting(0); 


$bakso = query("SELECT * FROM menu WHERE id_jenis = '3'");
$mie_ayam = query("SELECT * FROM menu WHERE id_jenis = '2'");
$minuman = query("SELECT * FROM menu WHERE id_jenis = '4'");

include 'yha.php';
?>



<div class="container bakso" id="bakso">
      <h1 class="text-center border-bottom mb-5" id="cat">Menu Bakso</h1>
      <div class="border-bottom row row-cols-1 row-cols-md-4 g-4">

      <?php foreach($bakso as $data) : ?>
  <div class="col mb-5">
    <div class="card h-100 w-15">
    <a href="detail.php?id_menu=<?= $data["id_menu"]; ?>" id="hover">
      <img src="../admin/menu/img/<?= $data["gambar"]?>" class="card-img-top" alt="no">
      <div class="card-body">
        <h5 class="card-title"><?= $data["nama_menu"]?></h5>
        <p class="card-text">Rp. <?= $data["harga_menu"]?></p>
      </div>
    </a>
    </div>
  </div>
  <?php endforeach; ?>
</div> 
</div>


<div class="container bakso" id="mie_ayam">
      <h1 class="text-center border-bottom mb-5" id="cat">Menu Mie Ayam</h1>
      <div class="border-bottom row row-cols-1 row-cols-md-4 g-4">
      <?php foreach($mie_ayam as $data) : ?>
  <div class="col mb-5">
    <div class="card h-100 w-15">
    <a href="detail.php?id_menu=<?= $data["id_menu"]; ?>" id="hover">
      <img src="../admin/menu/img/<?= $data["gambar"]?>" class="card-img-top" alt="no">
      <div class="card-body">
        <h5 class="card-title"><?= $data["nama_menu"]?></h5>
        <p class="card-text harga">Rp. <?= $data["harga_menu"]?></p>
      </div>
    </a>
    </div>
  </div>
  <?php endforeach; ?>
</div> 
</div>


<div class="container bakso" id="minuman">
      <h1 class="text-center border-bottom mb-5">Menu Minuman</h1>
      <div class="border-bottom row row-cols-1 row-cols-md-4 g-4">

      <?php foreach($minuman as $data) : ?>
  <div class="col mb-5">
    <div class="card h-100 w-15">
    <a href="detail.php?id_menu=<?= $data["id_menu"]; ?>" id="hover">
      <img src="../admin/menu/img/<?= $data["gambar"]?>" class="card-img-top" alt="no">
      <div class="card-body">
        <h5 class="card-title"><?= $data["nama_menu"]?></h5>
        <p class="card-text">Rp. <?= $data["harga_menu"]?></p>
      </div>
    </a>
    </div>
  </div>
  <?php endforeach; ?>
</div> 
</div>

<?php include 'yhb.php'; ?>