<?php 
    include '../../connection/connection.php';

    $id = $_POST['id'];
    
    $sql = "SELECT item_transaksi.id, produk.nama as produk, produk.harga as harga_produk, item_transaksi.jml_beli
    FROM item_transaksi 
    JOIN produk ON item_transaksi.produk_id = produk.id 
    WHERE item_transaksi.transaksi_id = ". $id;

    $result = $conn->query($sql);
    $output = [];

    if($result->num_rows > 0 ){
        while($data = $result->fetch_assoc()){
            $output[] = $data;
        }
        echo json_encode($output);
    }else{
        echo json_encode($output);
    }
?>