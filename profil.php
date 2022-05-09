<?php require_once("controller/script.php");
  require_once("controller/session_visitor.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Sejarah - SMP Angkasa Penfui Kupang";
  $_SESSION['page-to']="sejarah.php";
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
      <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('assets/images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0">Admissions</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="custom-breadcrumns border-bottom">
        <div class="container">
          <a href="index.php">Home</a>
          <span class="mx-3 icon-keyboard_arrow_right"></span>
          <span class="current">Profil</span>
        </div>
      </div>
      <div class="site-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <img src="assets/images/course_6.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 ml-auto align-self-center">
              <h2 class="font-weight-bold" style="color: #145f98">Profil Sekolah</h2>
              <p class="text-dark"><?= $row_dataSekolah['kementerian']?></p>
              <p class="text-dark"><?= $row_dataSekolah['unitOrganisasi']?></p>
              <ol class="ul-check primary list-unstyled text-dark">
                <li>Provinsi        : <?= $row_dataSekolah['provinsi']?></li>
                <li>Kabupaten       : <?= $row_dataSekolah['kabupaten']?> </li>
                <li>Kota            : <?= $row_dataSekolah['kota']?></li>
                <li>NSS             : <?= $row_dataSekolah['nss']?></li>
                <li>NPSN            : <?= $row_dataSekolah['npsn']?></li>
                <li>Alamat          : <?= $row_dataSekolah['alamat']?> </li>
                <li>Tlpn            : <?= $row_dataSekolah['telp']?></li>
                <li>Status Sekolah  : <?= $row_dataSekolah['statussekolah']?></li>
                <li>Daerah          : <?= $row_dataSekolah['daerah']?></li>
                <li>Kode Pos        : <?= $row_dataSekolah['kodepos']?> </li>
                <li>Akreditasi      : <?= $row_dataSekolah['akreditasi']?></li>
                <li>Tahun Berdiri   : <?= $row_dataSekolah['tahunberdiri']?></li>
                <li>Luas Gedung     : <?= $row_dataSekolah['luasgedung']?> </li>
                <li>Luas Tanah      : <?= $row_dataSekolah['luastanah']?></li>
                <li>Status Tanah    : <?= $row_dataSekolah['statustanah']?></li>
              </ol>
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