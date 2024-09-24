<?php

// include connection.php
include '../../connection/connection.php';
// nangkap data ID

$id = $_GET['id'];
// query delete
$sql = "DELETE FROM keranjang WHERE id = $id";
// responnya apa dan kemana
if($conn->query($sql) === TRUE){
    session_start();
    $_SESSION['msg'] = 'Delete Product Success';
    header('Location:../../pages/home/cart.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Delete Product Failed';
    header('Location:../../pages/home/cart.php');
}