<?php
include '../../connection/connection.php';

$sql = "
    SELECT
        transaksi.id, 
        user.nama AS pembeli, 
        produk.nama AS produk, 
        pembayaran.nama AS pembayaran,
        jumlah AS qty, tgl_transaksi, alamat_pengiriman, total_harga, status as status
    FROM
        transaksi 
    JOIN 
        user ON transaksi.user_id = user.id 
    JOIN 
        produk ON transaksi.produk_id = produk.id 
    JOIN 
        pembayaran ON transaksi.pembayaran_id = pembayaran.id 
";

$result = $conn->query($sql);

if ($result->num_rows < 0) {
    echo 'Data Tidak Ada';
}
