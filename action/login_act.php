<?php 
// untuk menggabungkan file connection.php
include '../connection/connection.php';

session_start();
// get data from formnya
$username = $_POST['username'];
$password = $_POST['password'];

// action for check data from database
$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

$result = $conn->query($sql);
$_SESSION['is_login'] = false;
if($result->num_rows > 0){
    $data = $result->fetch_assoc();
    if($data['role'] == 1){
        $_SESSION['id'] = $data['id'];
        $_SESSION['is_login'] = true;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['role'] = $data['role'];
        echo "<script>alert('Login Success, Anda Sebagai Admin');</script>";
        echo header('location: ../pages/layout/layout.php');
    }elseif($data['role'] == 2){
        $_SESSION['id'] = $data['id'];
        $_SESSION['is_login'] = true;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['role'] = $data['role'];
        echo "<script>alert('Login Success, Anda Sebagai User');</script>";
        echo "<script>location.href = '../pages/home/index.php';</script>";
    }

}else{
    session_start();
    $_SESSION['message'] = "Username or Password is wrong";
    return header('location: ../pages/login_view.php');
}
?>