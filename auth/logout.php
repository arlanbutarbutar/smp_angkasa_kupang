<?php if(!isset($_SESSION)){session_start();}
  require_once("../controller/script.php");
  if(isset($_SESSION['id-user'])){
    $_SESSION=[];
    session_unset();
    session_destroy();
    header("Location: login.php");exit();
  }
