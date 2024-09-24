<?php

include '../../connection/connection.php';

session_start();

$user_id = $_POST['user_id'];
$produk_id = $_POST['id'];
$qty = $_POST['qty'];
$total_harga = intval($qty) * intval($_POST['harga']);

$sql = "INSERT INTO keranjang VALUES (null, '$user_id', '$produk_id', '$qty', '$total_harga')";

$result = $conn->query($sql);

if($result == true){
    header('Location: ../../pages/home/cart.php');
}else{
    $_SESSION['msg_err'] = "Data Gagal Ditambahkan";
}

?>