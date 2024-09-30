<?php
include '../../connection/connection.php';
$user_id = $_SESSION['id'];
$sql = "select keranjang.id AS keranjang_id, produk.id, produk.nama as produk, keranjang.jumlah, keranjang.total_harga, produk.foto_produk, produk.deskripsi, produk.harga from keranjang join produk on keranjang.produk_id = produk.id";
$result = $conn->query($sql);
