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

    $jenis = htmlspecialchars($data["jenis"]);

    $query = "INSERT INTO jenis_menu VALUES ('', '$jenis')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id_jenis) {
    global $conn;
    mysqli_query($conn, "DELETE FROM jenis_menu WHERE id_jenis = $id_jenis");

    return mysqli_affected_rows($conn);
}


function edit($data) {
    global $conn;

    $id_jenis = $data["id_jenis"];
    $jenis = htmlspecialchars($data["jenis"]);

    $query = "UPDATE jenis_menu SET jenis = '$jenis' WHERE id_jenis = $id_jenis";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM jenis_menu WHERE jenis LIKE '%$keyword%'";
    return query($query);
}

?>