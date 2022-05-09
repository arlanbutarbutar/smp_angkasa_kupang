<?php require_once("controller/script.php");
  require_once("controller/session_visitor.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="SMP Angkasa Penfui Kupang";
  $_SESSION['page-to']="index.php";
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
      <div class="hero-slide owl-carousel site-blocks-cover">
        <div class="intro-section" style="background-image: url('assets/images/walpaper1.jpeg');">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                <h1><?= $row_dataSekolah['unitOrganisasi']?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php require_once("layout/footer.php");?>
    </div>
    <?php require_once("layout/loader.php");?>
    <?php require_once("layout/footer-js.php");?>
  </body>
</html>