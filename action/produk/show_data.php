<?php
include '../../connection/connection.php';

    $sql = 'SELECT produk.id, produk.nama, kategori_produk.nama as kategori, produk.harga, produk.deskripsi, produk.foto_produk, produk.stok_produk FROM produk JOIN kategori_produk ON produk.kategori_produk_id = kategori_produk.id';

    $result = $conn->query($sql);

    if ($result->num_rows < 0) {
        echo 'Data Tidak Ada';
    }
?>