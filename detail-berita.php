<?php require_once("controller/script.php");
  require_once("controller/session_visitor.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  if(!isset($_GET['id'])){
    header("Location: berita.php");exit();
  }else if(isset($_GET['id'])){
    $data=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id']))));
    $dataBeritaNow=mysqli_query($conn, "SELECT * FROM tbl_berita WHERE id_berita='$data'");
    $row=mysqli_fetch_assoc($dataBeritaNow);
    $_SESSION['page-name']="Berita ".$row['judul']." - SMP Angkasa Penfui Kupang"; $_SESSION['page-to']="berita.php";
  }
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
      <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-7">
              <h2 class="mb-0"><?= $row['judul']?></h2>
            </div>
          </div>
        </div>
      </div>
      <div class="custom-breadcrumns border-bottom">
        <div class="container">
          <a href="berita.php">Berita</a>
          <span class="mx-3 icon-keyboard_arrow_right"></span>
          <span class="current"><?= $row['kategori']?></span>
        </div>
      </div>
      <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6 mb-4">
              <p>
                <img src="assets/images/berita/<?= $row['gambar']?>" alt="Image" class="img-fluid" style="width: 100%;">
              </p>
            </div>
            <div class="col-lg-5 ml-auto align-self-center">
              <h2 class="section-title-underline mb-5">
                <span>Deskripsi</span>
              </h2>
              <?= $row['deskripsi']?>
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