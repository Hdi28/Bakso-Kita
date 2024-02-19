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

function tambah($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $id_jenis = htmlspecialchars($data["id_jenis"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $stok = htmlspecialchars($data["stok"]);

    // gambar
    $gambar = upload();
    if( !$gambar) {
        return false;
    }

    $query = "INSERT INTO menu VALUES ('', '$nama', '$harga', '$id_jenis','$deskripsi', '$stok', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!!');
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar!!');
        </script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}






function hapus($id_menu) {
    global $conn;
    mysqli_query($conn, "DELETE FROM menu WHERE id_menu = $id_menu");

    return mysqli_affected_rows($conn);
}


function edit($data) {
    global $conn;

    $id_menu = $data['id_menu'];
    $nama = htmlspecialchars($data["nama_menu"]);
    $harga = htmlspecialchars($data["harga_menu"]);
    $id_jenis = htmlspecialchars($data["id_jenis"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $stok = htmlspecialchars($data["stok"]);
    $gambar_lama = htmlspecialchars($data["gambar_lama"]);


    if($_FILES['gambar']['error'] === 4) {
        $gambar = $gambar_lama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE menu SET nama_menu = '$nama', harga_menu = '$harga', id_jenis = '$id_jenis',deskripsi = '$deskripsi', stok = '$stok', gambar = '$gambar' WHERE id_menu = $id_menu";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword) {
    $query = "SELECT * FROM menu JOIN jenis_menu on jenis_menu.id_jenis = menu.id_jenis WHERE nama_menu LIKE '%$keyword%' OR harga_menu LIKE '%$keyword%' OR jenis LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%'";
    return query($query);
}

?>