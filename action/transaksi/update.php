<?php 
include '../../connection/connection.php';
session_start();

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE transaksi SET status = $status WHERE id = $id";

if ($conn->query($sql) == true) {
    $_SESSION['msg'] = 'Data Update Successfully';
    header('Location:../../pages/transaksi/index.php');
}else {
    $_SESSION['msg_err'] = 'Data Update Not Successfully';
    header('Location:../../pages/transaksi/index.php');
}
?>