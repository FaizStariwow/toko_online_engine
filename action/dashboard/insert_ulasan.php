<?php

include '../../connection/connection.php';
session_start();

$user_id = $_SESSION['id'];
$produk_id = $_POST['produk'];
$ulasan = $_POST['ulasan'];
$rating = $_POST['rating'];
$foto = $_FILES['foto_ulasan']['name'];


if ($foto) {
    $nama_file = $_FILES['foto_ulasan']['name'];
    $source = $_FILES['foto_ulasan']['tmp_name'];
    $type = $_FILES['foto_ulasan']['type'];
    $new_file = 'produk_'.date('dmYHis').'.'.$type;
    $folder = 'C:\laragon\www\toko_online\assets\images\produk';

    move_uploaded_file($source, $folder. $nama_file);
}


$sql = "INSERT INTO ulasan VALUES(null, '$produk_id', '$user_id', '$ulasan', '$rating', '$foto')" ;

if($conn->query($sql) == true){
    
    $_SESSION['msg'] = 'Add Kategori Success';
    header('location:../../pages/home/detail_produk.php?id=' . $produk_id);
}else{
    
    $_SESSION['msg_error'] = 'Add Kategori Failed';
    header('location:../../pages/kategori/detail produk.php');
}
