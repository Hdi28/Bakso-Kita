<?php
include '../koneksi.php';

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $row = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


function edit($data) {
    global $conn;

    $id_pesanan = $data['id_pesanan'];
    $id_status = htmlspecialchars($data["id_status"]);



    $query = "UPDATE pesanan SET id_status = '$id_status' WHERE id_pesanan = $id_pesanan";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword) {
    $query = "SELECT * FROM pesanan join menu on menu.id_menu = pesanan.id_menu JOIN statuss ON statuss.id_status = pesanan.id_status WHERE nama_menu LIKE '%$keyword%' OR username LIKE '%$keyword%' OR nama_lengkap LIKE '%$keyword%' OR no_hp LIKE '%$keyword%' OR alamat LIKE '%$keyword%' OR pembayaran LIKE '%$keyword%' OR pengantaran LIKE '%$keyword%' ORDER BY id_pesanan DESC";
    return query($query);
}


function caristatus1() {
    $query = "SELECT * FROM pesanan join menu on menu.id_menu = pesanan.id_menu JOIN statuss ON statuss.id_status = pesanan.id_status WHERE statuss = 'Pesanan Dibuat' ORDER BY id_pesanan DESC";
    return query($query);
}

function caristatus2() {
    $query = "SELECT * FROM pesanan join menu on menu.id_menu = pesanan.id_menu JOIN statuss ON statuss.id_status = pesanan.id_status WHERE statuss = 'Pesanan Dikirim' ORDER BY id_pesanan DESC";
    return query($query);
}

function caristatus3() {
    $query = "SELECT * FROM pesanan join menu on menu.id_menu = pesanan.id_menu JOIN statuss ON statuss.id_status = pesanan.id_status WHERE statuss = 'Pesanan Telah Sampai' ORDER BY id_pesanan DESC";
    return query($query);
}
?>