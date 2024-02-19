<?php 
error_reporting(0);
session_start();
if( !isset($_SESSION["login"])) {
 header("location: ../login.php");
 exit;
}

 require 'fungsi.php';

 $title_web = 'Order';

 $user = $_SESSION['username'];

 $pesanan = query("SELECT * FROM pesanan join menu on menu.id_menu = pesanan.id_menu JOIN statuss ON statuss.id_status = pesanan.id_status WHERE username = '$user' AND statuss = 'Pesanan Dibuat'  ORDER BY id_pesanan DESC ");

 $pesanan1 = query("SELECT * FROM pesanan join menu on menu.id_menu = pesanan.id_menu JOIN statuss ON statuss.id_status = pesanan.id_status WHERE username = '$user' AND statuss = 'Pesanan Dikirim'  ORDER BY id_pesanan DESC ");

 $pesanan2 = query("SELECT * FROM pesanan join menu on menu.id_menu = pesanan.id_menu JOIN statuss ON statuss.id_status = pesanan.id_status WHERE username = '$user' AND statuss = 'Pesanan Telah Sampai'  ORDER BY id_pesanan DESC ");

include 'yha.php';
?>

<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 130px;">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Pesanan Dibuat</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Pesanan Dikirim</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Pesanan Sampai</button>
  </li>
</ul>


<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"><div class="container" style="margin-top: 100px; max-width: 700px;">

<?php foreach($pesanan as $data) : ?>
<div class="card mb-5" style="max-width: 700px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../admin/menu/img/<?= $data["gambar"]?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <div class="container d-flex justify-content-between p-0">
        <div class="container p-0">
        <h5 class="card-title"><?= $data["nama_menu"]?></h5>
        <p class="card-text mt-3">Harga : Rp. <?= $data["harga_menu"]?></p>
        <p class="card-text">Total : Rp. <?= $data["total"]?></p>
        </div>
        <div class="container p-0">
        <p class="card-text"><small class="text-body-secondary"><?= $data['tgl_pesan']; ?></small></p>
        <p class="card-text">Jumlah : <?= $data["jumlah"]?></p>
        <p class="card-text">Status : <?= $data["statuss"]?></p>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

</div>

</div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"><div class="container" style="margin-top: 100px; max-width: 700px;">

<?php foreach($pesanan1 as $data) : ?>
<div class="card mb-5" style="max-width: 700px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../admin/menu/img/<?= $data["gambar"]?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <div class="container d-flex justify-content-between p-0">
        <div class="container p-0">
        <h5 class="card-title"><?= $data["nama_menu"]?></h5>
        <p class="card-text mt-3">Harga : Rp. <?= $data["harga_menu"]?></p>
        <p class="card-text">Total : Rp. <?= $data["total"]?></p>
        </div>
        <div class="container p-0">
        <p class="card-text"><small class="text-body-secondary"><?= $data['tgl_pesan']; ?></small></p>
        <p class="card-text">Jumlah : <?= $data["jumlah"]?></p>
        <p class="card-text">Status : <?= $data["statuss"]?></p>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

</div>
</div>
  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0"><div class="container" style="margin-top: 100px; max-width: 700px;">

<?php foreach($pesanan2 as $data) : ?>
<div class="card mb-5" style="max-width: 700px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../admin/menu/img/<?= $data["gambar"]?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <div class="container d-flex justify-content-between p-0">
        <div class="container p-0">
        <h5 class="card-title"><?= $data["nama_menu"]?></h5>
        <p class="card-text mt-3">Harga : Rp. <?= $data["harga_menu"]?></p>
        <p class="card-text">Total : Rp. <?= $data["total"]?></p>
        </div>
        <div class="container p-0">
        <p class="card-text"><small class="text-body-secondary"><?= $data['tgl_pesan']; ?></small></p>
        <p class="card-text">Jumlah : <?= $data["jumlah"]?></p>
        <p class="card-text">Status : <?= $data["statuss"]?></p>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
</div>
  </div>
</div>







<?php


include 'yhb.php'; ?>