<?php

include '../../connection/connection.php';

$sql = "SELECT 
    produk.nama AS produk,
    COUNT(ulasan.id) AS jumlah_ulasan,
    AVG(ulasan.rating) AS rata_rata_rating
FROM 
    produk
JOIN 
    ulasan ON produk.id = ulasan.produk_id
GROUP BY 
    produk.id, produk.nama";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // echo 'Data Tidak Ada';

} else {
    echo "Data Tidak Ada";
}
