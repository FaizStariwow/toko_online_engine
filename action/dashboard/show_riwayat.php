<?php

include '../../connection/connection.php';

$id = $_SESSION['id'];

$sql = "SELECT transaksi.id, produk.nama as produk, transaksi.tgl_transaksi, transaksi.status, transaksi.total_harga FROM transaksi JOIN produk ON produk.id = transaksi.produk_id WHERE transaksi.user_id = $id";

$result = $conn->query($sql);

$no = 1;