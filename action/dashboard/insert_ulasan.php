<?php

include '../../connection/connection.php';
session_start();

$user_id = $_SESSION['id'];
$produk_id = $_POST['produk'];
$ulasan = $_POST['ulasan'];
$rating = $_POST['rating'];
$foto = '';

if (!empty($_FILES['foto_ulasan']['name'])) {
    $type = strtolower(pathinfo($_FILES['foto_ulasan']['name'], PATHINFO_EXTENSION));
    $new_file = 'ulasan_' . date('YmdHis') . '.' . $type;
    $folder = '../../assets/images/ulasan/';

    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    if (!move_uploaded_file($_FILES['foto_ulasan']['tmp_name'], $folder . $new_file)) {
        $_SESSION['msg_error'] = 'Gagal mengunggah foto ulasan';
        header('location:../../pages/home/detail_produk.php?id=' . $produk_id);
        exit();
    }

    $foto = $new_file;
}

$sql = "INSERT INTO ulasan (produk_id, user_id, ulasan, rating, foto_ulasan) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iisss", $produk_id, $user_id, $ulasan, $rating, $foto);

$_SESSION['msg'] = $stmt->execute() ? 'Berhasil menambahkan ulasan' : 'Gagal menambahkan ulasan';
header('location:../../pages/home/detail_produk.php?id=' . $produk_id);
