<?php
// include connection.php
include '../../connection/connection.php';
// nangkap data ID

$id = $_GET['id'];
// query delete
$sql = "DELETE FROM transaksi WHERE id = $id";
// responnya apa dan kemana
if ($conn->query($sql) === TRUE) {
    session_start();
    $_SESSION['msg'] = 'Delete transaksi Success';
    header('Location:../../pages/transaksi/index.php');
} else {
    session_start();
    $_SESSION['msg_err'] = 'Delete transaksi Failed';
    header('Location:../../pages/transaksi/index.php');
}
