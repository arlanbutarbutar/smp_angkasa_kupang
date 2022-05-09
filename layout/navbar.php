<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
  <div class="container">
    <div class="d-flex align-items-center">
      <div class="site-logo">
        <a href="<?php if(isset($_SESSION['auth'])==1){echo "../";}?>index.php" class="d-block">
          <img src="<?php if(isset($_SESSION['auth'])==1){echo "../";}?>assets/images/la.png" alt="Image" class="img-fluid" height="100" width="100">
        </a>
      </div>
      <div class="mr-auto">
        <nav class="site-navigation position-relative text-right" role="navigation">
          <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
            <li class="active">
              <a href="<?php if(isset($_SESSION['auth'])==1){echo "../";}?>index.php" class="nav-link text-left font-weight-bold" style="color: #145f98">HOME</a>
            </li>
            <li>
              <a href="<?php if(isset($_SESSION['auth'])==1){echo "../";}?>guru.php" class="nav-link text-left font-weight-bold" style="color: #145f98">DATA GURU</a>
            </li>
            <li>
              <a href="<?php if(isset($_SESSION['auth'])==1){echo "../";}?>sejarah.php" class="nav-link text-left font-weight-bold" style="color: #145f98">SEJARAH</a>
            </li>
            <li>
              <a href="<?php if(isset($_SESSION['auth'])==1){echo "../";}?>visi-misi.php" class="nav-link text-left font-weight-bold" style="color: #145f98">VISI MISI</a>
            </li>
            <li>
              <a href="<?php if(isset($_SESSION['auth'])==1){echo "../";}?>struktur-organisasi.php" class="nav-link text-left font-weight-bold" style="color: #145f98">STRUKTUR ORGANISASI</a>
            </li>
            <li>
              <a href="<?php if(isset($_SESSION['auth'])==1){echo "../";}?>berita.php" class="nav-link text-left font-weight-bold" style="color: #145f98">BERITA</a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="ml-auto">
        <div class="social-wrap">
          <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle" style="background-color: #145f98;border-radius: 5px;"><span class="icon-menu h3"></span></a>
        </div>
      </div>
    </div>
  </div>
</header>