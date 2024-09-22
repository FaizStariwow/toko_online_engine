<?php 
// koneksi
include '../../connection/connection.php';

// data dari form
$id = $_POST['id'];
$name = $_POST['nama'];


// query
$sql = "UPDATE kategori_produk SET nama = '$name' WHERE id = $id";

// jalankan query
//responnya apa dan kemana
if($conn->query($sql) === TRUE){
    session_start();
    $_SESSION['msg'] = 'Update Kategori Success';
    header('Location:../../pages/kategori/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Update Kategori Failed';
    header('Location:../../pages/kategori/index.php');
}
