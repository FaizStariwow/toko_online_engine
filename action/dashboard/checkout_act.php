<?php

include '../../connection/connection.php';
session_start();

$user_id = $_SESSION['id'];
$pembayaran = $_POST['pembayaran'];
$tgl_transaksi = date('Y-m-d');
$alamat_lengkap = $_POST['address'] . ',' . $_POST['city'] . ',' . $_POST['province'] . ',' . $_POST['postalcode'];
$no_hp =$_POST['phone'];
$total_harga = intval($_POST['total_harga']);
$status = 1;

$insertData = "insert into transaksi values(null, '$user_id', '$pembayaran', '$alamat_lengkap', $total_harga, '$no_hp', '$tgl_transaksi', '$status')";

$result = $conn->query($insertData);

if ($result == true) {
    $transaksi_id = $conn->insert_id;
    $produkId = explode(",", $_POST['produkId']);
    $jmlBeli = explode(",", $_POST['jmlBeli']);
    $counter = 0;
    foreach ($produkId as $id) {
        $sql = "insert into item_transaksi values(null,'$transaksi_id','$id','$jmlBeli[$counter]')";
        $hasil = $conn->query($sql);
        if($hasil == true){
            $qUpdateStok = "update produk set stok_produk = stok_produk - $jmlBeli[$counter] where id = $id";
            $conn->query($qUpdateStok);
            $qdeleteCart = "delete from keranjang where produk_id = $id";
            $conn->query($qdeleteCart);
            $_SESSION['msg'] = "Transaksi Berhasil";
            header('location: ../../pages/home/index.php');
        }else{
            $_SESSION['msg_err'] = "Transaksi Gagal";
            header('location: ../../pages/home/checkout.php');
        }
        $counter++;
    }

    
} else {
    $_SESSION['msg_err'] = "Data Gagal Ditambahkan";
}
