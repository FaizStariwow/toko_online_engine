<?php

$host = "sql211.ezyro.com";
$user = "ezyro_37557133";
$pass = "ee0abcb22";
$db = "ezyro_37557133_php_toko_online";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection Failed:" . $conn->connect_error);
}


?>