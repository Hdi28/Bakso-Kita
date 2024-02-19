<?php

include '../admin/koneksi.php';


function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $row = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}



function tambah($data) {
    global $conn;

    date_default_timezone_set('Asia/Jakarta');


    $username = htmlspecialchars($data["username"]);
    $nama = htmlspecialchars($data["nama"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $pesan = htmlspecialchars($data["pesan"]);
    $id_menu = htmlspecialchars($data['id_menu']);
    $jumlah_dibeli = htmlspecialchars($data['jumlah_dibeli']);

    $result1 = mysqli_query($conn,"SELECT harga_menu FROM menu WHERE id_menu = $id_menu");
    $row1 = mysqli_fetch_assoc($result1);
    $harga = $row1['harga_menu'];

    $total = $jumlah_dibeli * $harga;
    $tanggal = date("Y-m-d H:i:s");
    $status = htmlspecialchars($data["status"]);


    $query = "INSERT INTO pesanan VALUES ('','$username', '$nama', '$no_hp', '$alamat','$pesan', '$id_menu', '$jumlah_dibeli','$total', '$tanggal', '$status')";
    mysqli_query($conn, $query);

    $result = mysqli_query($conn,"SELECT stok FROM menu WHERE id_menu = $id_menu");
    $row = mysqli_fetch_assoc($result);
    $stok_tersedia = $row['stok'];

    if($stok_tersedia >= $jumlah_dibeli){
        //kurangi stok
        $stok_baru = $stok_tersedia - $jumlah_dibeli;
        mysqli_query($conn,"UPDATE menu SET stok = $stok_baru WHERE id_menu = $id_menu");
    }

    return mysqli_affected_rows($conn);
}

?>