<?php 
session_start();
if( !isset($_SESSION["login"])) {
 header("location: ../login.php");
 exit;
}


require 'fungsi.php';
$title_web = 'Pesanan';
$pesanan = query("SELECT * from pesanan join menu on menu.id_menu = pesanan.id_menu JOIN statuss ON statuss.id_status = pesanan.id_status  ORDER BY id_pesanan DESC");

//tombol searc ditekan
if(isset($_POST["cari"])) {
    $pesanan = cari($_POST["keyword"]);
}

if(isset($_POST["status1"])) {
    $pesanan = caristatus1();
}

if(isset($_POST["status2"])) {
    $pesanan = caristatus2();
}

if(isset($_POST["status3"])) {
    $pesanan = caristatus3();
}


include '../yha.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <div class="container">
        
    <h1 class="h2 border-bottom mb-5">Pesanan</h1>

    
    <div class="container p-0 d-flex justify-content-between">
        <form action="" method="post">
    <div class="dropdown">
  <button class="btn btn-success dropdown-toggle mt-4 mb-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Status
  </button>
  <ul class="dropdown-menu">
    <li><button class="dropdown-item" type="submit" name="status1">Pesanan dibuat</button></li>
    <li><button class="dropdown-item" type="submit" name="status2">Pesanan dikirim</button></li>
    <li><button class="dropdown-item" type="submit" name="status3">Pesanan telah sampai</button></li>
  </ul>
</div>
</form>

    <form class="d-flex h-25 mt-4 mb-4" action="" method="post" role="search">
      <input class="form-control me-2" type="search" placeholder="Cari.." aria-label="Search" name="keyword" autofocus autocomplete="off">
      <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
    </form>

    </div>
    

    <div class="table-responsive" id="table">
        <table class="table table-striped table-sm text-center">
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>Nama Lengkap</th>
        <th>No Hp</th>
        <th>Alamat</th>
        <th>Pesan</th>
        <th>Menu</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Waktu Pesan</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php $i = 1;?>
    <?php foreach($pesanan as $data) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $data["username"]; ?></td>
        <td><?= $data["nama_lengkap"]; ?></td>
        <td><?= $data["no_hp"]; ?></td>
        <td><?= $data["alamat"]; ?></td>
        <td><?= $data["pesan_untuk_penjual"]; ?></td>
        <td><?= $data["nama_menu"]?></td>
        <td><?= $data["jumlah"]; ?></td>
        <td>Rp. <?= $data["total"]; ?></td>
        <td><?= $data["tgl_pesan"]; ?></td>
        <td><?= $data["statuss"]?></td>

        <td>
            <a href="edit.php?id_pesanan=<?= $data["id_pesanan"]; ?>"><button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></a>
        </td>
    </tr>
    <?php $i++ ?>
    <?php endforeach; ?>
    </table>
    </div>
    </div>
    </div>
    </main>

<?php include '../yhb.php'; ?>