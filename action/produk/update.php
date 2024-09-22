<?php 
// koneksi
include '../../connection/connection.php';

// data dari form
$id = $_POST['id'];
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

// query
$sql = "UPDATE produk SET  kategori_produk_id = $kategori, nama = '$nama', harga = $harga, deskripsi = '$deskripsi', foto_produk = '$foto', stok_produk = $stok WHERE id = $id";

// jalankan query
//responnya apa dan kemana
if($conn->query($sql) === TRUE){
    session_start();
    $_SESSION['msg'] = 'Update Product Success';
    header('Location:../../pages/produk/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Update Product Failed';
    header('Location:../../pages/produk/index.php');
}




?>