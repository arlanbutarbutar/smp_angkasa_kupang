<?php require_once("script.php");
  if(isset($_SESSION['id-user'])){
    header("Location: views/route.php");exit();
  }