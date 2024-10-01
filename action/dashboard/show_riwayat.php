<?php

include '../../connection/connection.php';

$id = $_SESSION['id'];

$sql = "SELECT user.nama as nama_user, transaksi.id, transaksi.tgl_transaksi, transaksi.total_harga,  transaksi.`status` FROM transaksi
join user on transaksi.user_id = user.id
where transaksi.user_id = $id";
$result = $conn->query($sql);

$no = 1;