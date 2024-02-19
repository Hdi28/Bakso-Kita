<?php 
session_start();
 if( !isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
 }

 if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "login"){
		echo "<script> alert('Anda berhasil melakukan login!'); </script>";
	}
}
 $title_web = 'Dashboard';
include 'yha.php'; 
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <div class="container">
    <h1 class="h2 border-bottom mb-5">Dashboard</h1>

    <div class="container">
    <div class="row">
    <div class="col-md-3">
    <div class="card border-success mb-3" style="max-width: 14rem;">
    <div class="card-header text-bg-success border-success"><i class="bi bi-menu-button-wide-fill"></i> Daftar Menu</div>
    <div class="card-body text-success">
        <?php $query_menu = mysqli_query($conn, 'SELECT * FROM menu');
         $row_menu = mysqli_num_rows($query_menu)?>
    <h1 class="card-title text-center"><?= $row_menu; ?></h1>
    </div>
    <a href="menu/index.php" class="link-hilang"><div class="card-footer text-bg-success  border-success">Tabel Menu <i class="bi bi-chevron-double-right"></i></div></a>
    </div>
    </div>
    
    <div class="col-md-3">
    <div class="card border-success mb-3" style="max-width: 14rem;">
    <div class="card-header text-bg-success border-success"><i class="bi bi-bookmark-fill"></i> Kategori Menu</div>
    <div class="card-body text-success">
    <?php $query_kategori = mysqli_query($conn, 'SELECT * FROM jenis_menu');
         $row_kategori = mysqli_num_rows($query_kategori)?>
    <h1 class="card-title text-center"><?= $row_kategori; ?></h1>
    </div>
    <a href="jenis_menu/index.php" class="link-hilang"><div class="card-footer text-bg-success  border-success">Tabel Kategori <i class="bi bi-chevron-double-right"></i></div></a>
    </div>
    </div>

    <div class="col-md-3">
    <div class="card border-success mb-3" style="max-width: 14rem;">
    <div class="card-header text-bg-success border-success"><i class="bi bi-database-fill"></i> Total Stok Semua Menu</div>
    <div class="card-body text-success">
    <?php $query_pesanan = mysqli_query($conn, 'SELECT SUM(stok) AS total FROM menu'); 
     if ($query_pesanan->num_rows > 0) {
          // Ambil data hasil query
          $row = $query_pesanan->fetch_assoc();
          $total_angka = $row["total"];?>
    <h1 class="card-title text-center"><?= $total_angka; }?></h1>
    </div>
    <a href="menu/index.php" class="link-hilang"><div class="card-footer text-bg-success  border-success">Tabel Menu <i class="bi bi-chevron-double-right"></i></div></a>
    </div>
    </div>

    <div class="col-md-3">
    <div class="card border-success mb-3" style="max-width: 14rem;">
    <div class="card-header text-bg-success border-success"><i class="bi bi-clipboard2-data-fill"></i> Pesanan</div>
    <div class="card-body text-success">
    <?php $query_pesanan = mysqli_query($conn, 'SELECT * FROM pesanan');
         $row_pesanan = mysqli_num_rows($query_pesanan)?>
    <h1 class="card-title text-center"><?= $row_pesanan; ?></h1>
    </div>
    <a href="pesanan/index.php" class="link-hilang"><div class="card-footer text-bg-success  border-success">Tabel Pesanan <i class="bi bi-chevron-double-right"></i></div></a>
    </div>
    </div>

    </div>
    </div>

    

    </div>
    </div>
</main>

<?php include 'yhb.php'; ?>