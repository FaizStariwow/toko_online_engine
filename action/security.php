<?php 

session_start();
if(isset($_SESSION['id'])){
  if($_SESSION['role'] == 1){
    header('Location:../pages/layout/layout.php');
  }elseif($_SESSION['role'] == 2){
    header('Location:../pages/home/index.php');
  }
}
?>