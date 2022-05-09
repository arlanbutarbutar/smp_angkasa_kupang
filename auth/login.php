<?php require_once("../controller/script.php");
  if(isset($_SESSION['id-user'])){header("Location: ../views/route.php");exit();}
  $_SESSION['page-name']="Login - SMP Angkasa Penfui Kupang"; 
  $_SESSION['page-to']="login.php";
  $_SESSION['auth']=1;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once("../layout/header.php");?>
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
      <?php require_once("../layout/top-info.php");?>
      <?php require_once("../layout/navbar.php");?>
      <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('../assets/images/bg_1.jpg')">
        <div class="container">
          <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
              <h2 class="mb-0">Login</h2>
              <p>Selamat Datang, Silahkan Masukan pasword dan username anda.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="custom-breadcrumns border-bottom">
        <div class="container">
          <a href="../index.php">Home</a>
          <span class="mx-3 icon-keyboard_arrow_right"></span>
          <span class="current">Login</span>
        </div>
      </div>
      <div class="site-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-5">
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="email">Email/NIP/NISN</label>
                    <input type="text" name="email" id="email" class="form-control form-control-lg" required>
                  </div>
                  <div class="col-md-12 form-group">
                    <label for="pword">Password</label>
                    <input type="password" name="password" id="pword" class="form-control form-control-lg" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <input type="submit" name="login" value="Log In" class="btn btn-primary btn-lg px-5">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php require_once("../layout/footer.php");?>
    </div>
    <?php require_once("../layout/loader.php");?>
    <?php require_once("../layout/footer-js.php");?>
  </body>
</html>