<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  $_SESSION['page-name']="Biodata Guru";
  $_SESSION['page-to']="biodataGuru.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <?php require_once("../layout/header-dash.php");?>
  </head>
  <body class="vertical light">
    <div class="wrapper">
      <?php require_once("../layout/topbar.php");?>
      <?php require_once("../layout/sidebar.php");?>
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <h1 class="h3 font-weight-bold mt-3" style="color: #145f98"><?= $_SESSION['page-name']?></h1>
            </div>
          </div>
          <?php if(mysqli_num_rows($cardAkun)>0){$row=mysqli_fetch_assoc($cardAkun);?>
          <div class="row">
            <div class="col-lg-6">
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="../assets/images/guru/<?= $row['foto']?>" alt="<?= $row['nama']?>" style="width: 100%;">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><?= $row['nama_guru']?></h5>
                      <h3>NIP: <?= $row['nip']?></h3>
                      <p class="card-text">Status: <?= $row['status_aktif']?></p>
                      <p class="card-text mt-n2">Jabatan: <?= $row['status']?></p>
                      <p class="card-text mt-n2">Kelas: <?= $row['kelas']?></p>
                      <p class="card-text mt-n2">Mapel: <?= $row['mapel']?></p>
                      <p class="card-text mt-n2">Jenis Kelamin: <?= $row['jenis_kelamin']?></p>
                      <p class="card-text mt-n2">Alamat: <?= $row['alamat']?></p>
                      <p class="card-text mt-n2">TTL: <?= $row['tempat_lahir'].", ".$row['tgl_lahir']?></p>
                      <p class="card-text mt-n2">Agama: <?= $row['agama']?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
      </main>
    </div>
    <?php require_once("../layout/footer-dash.php");?>
  </body>
</html>