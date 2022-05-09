<?php require_once("controller/script.php");
  require_once("controller/session_visitor.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="Berita - SMP Angkasa Penfui Kupang"; 
  $_SESSION['page-to']="berita.php";
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
            <h2 class="font-weight-bold" style="color: #145f98">Berita</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="owl-slide-3 owl-carousel">
              <?php if(mysqli_num_rows($dataBerita)>0){while($row=mysqli_fetch_assoc($dataBerita)){?>
              <div class="course-1-item">
                <figure class="thumnail">
                  <a href="detail-berita.php?id=<?= $row['id_berita']?>">
                    <img src="assets/images/berita/<?= $row['gambar']?>" alt="<?= $row['judul']?>" class="img-fluid">
                  </a>
                  <div class="category" style="background-color: #145f98">
                    <h3><?= $row['judul']?></h3>
                  </div>
                </figure>
                <div class="course-1-content pb-4">
                  <p class="desc mb-4"><?php $num_char = 180; $text = trim($row['deskripsi']); $text=preg_replace('#</?strong.*?>#is', '', $text); echo substr($text, 0,$num_char) . '...'; ?></p>
                  <p><a href="detail-berita.php?id=<?= $row['id_berita']?>" class="btn px-4 text-white" style="background-color: #145f98">Detail</a></p>
                </div>
              </div>
              <?php }}?>
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