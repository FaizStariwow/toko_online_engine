<?php 
// // include connection.php
// include '../../connection/connection.php';
// // nangkap data ID

// $id = $_GET['id'];
// // query delete
// $sql = "DELETE FROM kategori_produk WHERE id = $id";
// // responnya apa dan kemana
// if($conn->query($sql) === TRUE){
//     session_start();
//     $_SESSION['msg'] = 'Delete Kategori Success';
//     header('Location:../../pages/kategori/index.php');
// }else{
//     session_start();
//     $_SESSION['msg_err'] = 'Delete Kategori Failed';
//     header('Location:../../pages/kategori/index.php');
// }

include '../func.php';
destroy("Kategori","kategori_produk","../../pages/kategori/","../../pages/kategori/");