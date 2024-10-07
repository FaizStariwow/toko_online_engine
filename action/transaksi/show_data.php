<?php
include '../../connection/connection.php';

$sql = "
    SELECT
        transaksi.id, 
        user.nama AS pembeli,
        pembayaran.nama AS pembayaran,
        no_hp, tgl_transaksi, alamat_pengiriman, total_harga, status as status
    FROM
        transaksi 
    JOIN 
        user ON transaksi.user_id = user.id 
    JOIN 
        pembayaran ON transaksi.pembayaran_id = pembayaran.id 
";

$result = $conn->query($sql);

if ($result->num_rows < 0) {
    echo 'Data Tidak Ada';
}
