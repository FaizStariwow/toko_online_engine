<?php

include '../../connection/connection.php';

$name = $_POST['name'];

$sql = "INSERT INTO pembayaran VALUES(null, '$name')" ;

if($conn->query($sql) == true){
    session_start();
    $_SESSION['msg'] = 'Add Pembayaran Success';
    header('location:../../pages/pembayaran/index.php');
}else{
    session_start();
    $_SESSION['msg_error'] = 'Add Pembayaran Failed';
    header('location:../../pages/pembayaran/index.php');
}
