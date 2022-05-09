<?php require_once("controller/script.php");
  require_once("controller/session_visitor.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Struktur Organisasi - SMP Angkasa Penfui Kupang";
  $_SESSION['page-to']="struktur-organisasi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("layout/header.php");?>
  </head>
  <body>
    <div class="site-wrap">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>
      <?php require_once("layout/top-info.php");?>
      <?php require_once("layout/navbar.php");?>
      <div class="container mb-5" style="margin-top: 150px;">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="font-weight-bold" style="color: #145f98">Struktur Organisasi</h2>
          </div>
          <div class="col-md-10 m-auto text-center">
            <img class="size "src="assets/images/struktur.jpg" alt="" style="width: 100%;">
          </div>
        </div>
      </div>
      <?php require_once("layout/footer.php");?>
    </div>
    <?php require_once("layout/loader.php");?>
    <?php require_once("layout/footer-js.php");?>
  </body>
</html>