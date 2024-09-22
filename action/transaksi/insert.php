<?php 
include '../../connection/connection.php';

$user_id = $_POST['user_id'];
$produk_id = $_POST['produk_id'];
$pembayaran_id = $_POST['pembayaran_id'];
$alamat_pengiriman = $_POST['alamat_pengiriman'];
$total_harga = $_POST['total_harga'];
$jumlah = $_POST['jumlah'];
$tgl_transaksi = $_POST['tgl_transaksi'];
$status = $_POST['status'];

$sql = "INSERT INTO transaksi VALUES (null, '$user_id', '$produk_id', '$pembayaran_id', '$alamat_pengiriman', '$total_harga', '$jumlah', '$tgl_transaksi', '$status')";

if($conn->query($sql) == true){
    session_start();
    $_SESSION['msg'] = 'Add transaksi Success';
    header('Location:../../pages/transaksi/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Add transaksi Failed';
    header('Location:../../pages/transaksi/create.php');
}


?>