<?php
//make create user to database
include '../connection/connection.php';

//get data from formnya 
$username = $_POST['username'];
$password = $_POST['password'];

// action for insert data to database
$sql = "SELECT * FROM user WHERE username = '$username'";

$result = $conn->query($sql);

// session_start();
// $_SESSION['username'] = $result['username'];
// $_SESSION['name'] = $result['name'];
// $_SESSION['email'] = $result['email'];
// $_SESSION['loggedin'] = true;

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($data['role'] == 1) {
        session_start();
        $_SESSION['id'] = $data['id'];
        $_SESSION['is_login'] = true;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];
        echo "<script>alert('Login Success, Anda Sebagai Admin');</script>";
        echo "<script>location.href='../pages/layout/layout.php';</script>";
    } elseif ($data['role'] == 2) {
        session_start();
        $_SESSION['id'] = $data['id'];
        $_SESSION['is_login'] = true;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];
        echo "<script>alert('Login Success, Anda Sebagai User');</script>";
        echo "<script>location.href='../pages/home/index.php';</script>";
    }
} else {
    session_start();
    $_SESSION['message'] = "Username and Password is wrong";

    return header('location: ../pages/login_view.php');
}


echo $result;
