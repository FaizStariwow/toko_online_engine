<?php 
// include connection.php
include '../../connection/connection.php';
// nangkap data ID

$id = $_GET['id'];
// query delete
$sql = "DELETE FROM pembayaran WHERE id = $id";
// responnya apa dan kemana
if($conn->query($sql) === TRUE){
    session_start();
    $_SESSION['msg'] = 'Delete Pembayaran Success';
    header('Location:../../pages/pembayaran/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Delete Pembayaran Failed';
    header('Location:../../pages/pembayaran/index.php');
}

// include '../func.php';
// destroy("Kategori","kategori_produk","../../pages/kategori/","../../pages/kategori/");