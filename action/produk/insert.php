<?php 
include '../../connection/connection.php';

$nama = $_POST['nama'];
$kategori = $_POST['kategori_produk_id'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$foto = $_FILES['foto']['name'];
$stok = $_POST['stok'];

if ($_FILES['foto']) {
    $nama_file = $_FILES['foto']['name'];
    $source = $_FILES['foto']['tmp_name'];
    $folder = 'C:\laragon\www\toko_online\assets\images\produk\\';

    move_uploaded_file($source, $folder. $nama_file);
}

$sql = "INSERT INTO produk VALUES (null,'$kategori','$nama' , '$harga', '$deskripsi','$foto','$stok')";

if($conn->query($sql) == true){
    session_start();
    $_SESSION['msg'] = 'Add Product Success';
    header('Location:../../pages/produk/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Add Product Failed';
    header('Location:../../pages/produk/add_produk.php');
}


?>