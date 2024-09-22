<?php 
// koneksi
include '../../connection/connection.php';

// data dari form
$id = $_POST['id'];
$name = $_POST['nama'];


// query
$sql = "UPDATE pembayaran SET nama = '$name' WHERE id = $id";

// jalankan query
//responnya apa dan kemana
if($conn->query($sql) === TRUE){
    session_start();
    $_SESSION['msg'] = 'Update Pembayaran Success';
    header('Location:../../pages/pembayaran/index.php');
}else{
    session_start();
    $_SESSION['msg_err'] = 'Update Pembayaran Failed';
    header('Location:../../pages/pembayaran/index.php');
}
