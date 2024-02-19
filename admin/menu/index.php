<?php
session_start();
if( !isset($_SESSION["login"])) {
 header("location: ../login.php");
 exit;
}
error_reporting(0); 
require 'fungsi.php';
$title_web = 'Menu';
$menu = query("SELECT * from menu join jenis_menu on jenis_menu.id_jenis = menu.id_jenis");

//tombol search ditekan
if(isset($_POST["cari"])) {
    $menu = cari($_POST["keyword"]);
}

include '../yha.php';
?>  

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <div class="container">
        
    <h1 class="h2 border-bottom mb-5">Menu</h1>
    
    <div class="container p-0 d-flex justify-content-between">
    <a href="tambah.php"><button type="button" class="btn mt-4 mb-4 btn-success">Tambah (+)</button></a>

    <form class="d-flex h-25 mt-4 mb-4" action="" method="post" role="search">
      <input class="form-control me-2" type="search" placeholder="Cari.." aria-label="Search" name="keyword" autofocus autocomplete="off">
      <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
    </form>

    </div>

    <div class="table-responsive" id="table">
        <table class="table table-striped table-sm text-center">
    <tr>
        <th>#</th>
        <th>menu</th>
        <th>harga</th>
        <th>Kategori</th>
        <th>deskripsi</th>
        <th>stok</th>
        <th>gambar</th>
        <th>Aksi</th>
    </tr>

    <?php $i = 1;?>
    <?php foreach($menu as $data) : ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $data["nama_menu"]; ?></td>
        <td><?= $data["harga_menu"]; ?></td>
        <td><?= $data["jenis"]; ?></td>
        <td><?= $data["deskripsi"]; ?></td>
        <td><?= $data["stok"]; ?></td>
        <td><img src="img/<?= $data["gambar"]?>" width="50" alt="no"></td>

        <td>
            <a href="edit.php?id_menu=<?= $data["id_menu"]; ?>"><button type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button></a>
            <a href="hapus.php?id_menu=<?= $data["id_menu"]; ?>" onclick="return confirm('Yakin ingin Menghapus?');"><button type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a>
        </td>
    </tr>
    <?php $i++ ?>
    <?php endforeach; ?>
    </table>
    </div>
    </div>
    </div>
    </main>

    <?php include '../yhb.php' ?>
