<?php

include '../../connection/connection.php';

$id = $_SESSION['id'];

$sql = "SELECT SUM(total_harga) AS total FROM transaksi WHERE MONTH(tgl_transaksi) = MONTH(NOW()) AND transaksi.user_id = $id AND transaksi.status = 2";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}