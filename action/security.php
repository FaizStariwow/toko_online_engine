<?php

session_start();

if (!isset($_SESSION['id'])){
    echo header('location:/php_toko_online/pages/login_view.php');
}

?>