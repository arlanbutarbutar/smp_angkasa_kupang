<?php if(!isset($_SESSION)){session_start();}
  if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	  $uri = 'https://';
  }else{
	  $uri = 'http://';
  }
  $uri .= $_SERVER['HTTP_HOST'];
  if(!isset($_SESSION['id-user'])){
	  header('Location: '.$uri.'/apps/smp_angkasa_kupang/auth/login.php');
  }
  if(isset($_SESSION['id-user'])){
    header('Location: '.$uri.'/apps/smp_angkasa_kupang/views/home.php');
  }
  exit;
?>