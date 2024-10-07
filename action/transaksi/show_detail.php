<?php 
    include '../../connection/connection.php';

    $id = $_POST['id'];
    
    $sql = "SELECT transaksi.id, user.nama AS pembeli, pembayaran.nama AS pembayaran, tgl_transaksi, alamat_pengiriman, total_harga, no_hp, transaksi.`status` as status FROM transaksi JOIN user ON transaksi.user_id = user.id JOIN pembayaran ON transaksi.pembayaran_id = pembayaran.id WHERE transaksi.id = ". $id;

    $result = $conn->query($sql);


    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        echo json_encode($data);
    }
?>