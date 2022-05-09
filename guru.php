<?php require_once("controller/script.php");
  require_once("controller/session_visitor.php");
  if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
  $_SESSION['page-name']="SMP ANGKASA PENFUI KUPANG";
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
      <div class="container mb-5" style="margin-top: 150px;">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="font-weight-bold" style="color: #145f98">Data Guru SMP Angkasa Penfui</h2>
          </div>
          <div class="col-md-10 m-auto text-center">
            <div style="overflow-x: auto;">
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col" class="text-dark">#</th>
                    <th scope="col" class="text-dark">NIP</th>
                    <th scope="col" class="text-dark">Nama</th>
                    <th scope="col" class="text-dark">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; if(mysqli_num_rows($dataGuru)==0){?>
                  <tr>
                    <th class="text-dark">Belum ada data guru</th>
                  </tr>
                  <?php }else if(mysqli_num_rows($dataGuru)>0){while($row=mysqli_fetch_assoc($dataGuru)){?>
                  <tr>
                    <th class="text-dark"><?= $no;?></th>
                    <td class="text-dark"><?= $row['nip']?></td>
                    <td class="text-dark"><?= $row['nama_guru']?></td>
                    <td class="text-dark"><?php if($row['id_status']==1){echo "Guru";}else if($row['id_status']==2){echo "Wali Kelas <small>".$row['kelas']."</small>";}?></td>
                  </tr>
                  <?php $no++; }}?>
                </tbody>
              </table>
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