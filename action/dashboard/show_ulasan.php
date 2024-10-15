<?php 
    include '../../connection/connection.php';

    $id = $_GET['id'];
    
    $sql = "SELECT ulasan.user_id, ulasan.ulasan, user.nama as user, ulasan.rating, ulasan.foto_ulasan
    From
        ulasan
    Join
        user ON user.id = ulasan.user_id
    ";

    $result = $conn->query($sql);


    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
    }
?>

