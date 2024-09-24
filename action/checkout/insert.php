<?php
// Pastikan sesi sudah dimulai
session_start();

// Sambungkan ke database
include '../connection/connection.php';

// Ambil data dari form
$nama_depan = $_POST['first_name'];
$nama_belakang = $_POST['last_name'];
$email = $_POST['email'];
$no_hp = $_POST['phone'];
$alamat = $_POST['address'];
$kota = $_POST['city'];
$kode_pos = $_POST['postal_code'];
$provinsi = $_POST['province'];
$metode_pembayaran = $_POST['payment_method'];

// Siapkan query SQL
$sql = "INSERT INTO checkout (nama_depan, nama_belakang, email, no_hp, alamat, kota, kode_pos, provinsi, metode_pembayaran) 
          VALUES (NULL,$nama_depan, $nama_belakang, $email, $no_hp, $alamat, $kota, $kode_pos, $provinsi, $metode_pembayaran)";


// Eksekusi query
if ($conn->query($sql) == TRUE) {
    $_SESSION['msg'] = "Checkout berhasil!";
    header("Location: ../../pages/home/checkout.php");
} else {
    $_SESSION['msg_err'] = "Terjadi kesalahan saat checkout. Silakan coba lagi.";
    header("Location: ../../pages/home/checkout.php");
}

$conn->close();
