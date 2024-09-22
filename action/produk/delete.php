<?php 
// // include connection.php
// include '../../connection/connection.php';
// // nangkap data ID

// $id = $_GET['id'];
// // query delete
// $sql = "DELETE FROM produk WHERE id = $id";
// // responnya apa dan kemana
// if($conn->query($sql) === TRUE){
//     session_start();
//     $_SESSION['msg'] = 'Delete Product Success';
//     header('Location:../../pages/produk/index.php');
// }else{
//     session_start();
//     $_SESSION['msg_err'] = 'Delete Product Failed';
//     header('Location:../../pages/produk/index.php');
// }

include '../func.php';
destroy("produk","produk","../../pages/produk/index.php","../../pages/produk/index.php");