<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  if($_SESSION['level']=="guru"){
    header("Location: biodataGuru.php");exit();
  }
  $_SESSION['page-name']="Dashboard";
  $_SESSION['page-to']="home.php";
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
          <div class="row">
            <div class="col-md-12">
              <h1 class="h3 font-weight-bold mt-3" style="color: #145f98"><?= $_SESSION['page-name']?></h1>
            </div>
            <?php if($_SESSION['level']=="admin"){?>
            <div class="col-md-12">
              <div class="mb-2 align-items-center">
                <div class="card border-0 shadow mb-4">
                  <div class="card-body" style="background-color: #145f98;">
                    <div class="row mt-1 align-items-center justify-content-between">
                      <div class="col-lg-2 text-center pl-4">
                        <p class="mb-1 small text-white">Data Siswa Keseluruhan</p>
                        <span class="h3 text-white"><?= $array_dataSiswa?> Siswa</span>
                      </div>
                      <div class="col-lg-2 text-center py-4">
                        <p class="mb-1 small text-white">Data Guru </p>
                        <span class="h3 text-white"><?= $array_dataGuru?> Guru</span>
                      </div>
                      <div class="col-lg-2 text-center py-4">
                        <p class="mb-1 small text-white">Mata pelajaran</p>
                        <span class="h3 text-white"><?= $array_dataMapel?> Mapel</span>
                      </div>
                      <div class="col-lg-2 text-center py-4">
                        <p class="mb-1 small text-white">Kelas</p>
                        <span class="h3 text-white"><?= $array_dataKelas?> Kelas</span>
                      </div>
                      <div class="col-lg-2 text-center py-4">
                        <p class="mb-1 small text-white"> Jumlah Akun</p>
                        <span class="h3 text-white"><?= $array_dataAkun?> Akun</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php }if($_SESSION['level']=="siswa"){ if(mysqli_num_rows($cardSiswa)>0){$row=mysqli_fetch_assoc($cardSiswa);?>
            <div class="col-lg-6">
              <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="../assets/images/guru/user.png" alt="<?= $row['nama']?>" style="width: 100%;">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><?= $row['nama']?></h5>
                      <h3>NIP: <?= $row['nisn']?></h3>
                      <p class="card-text">Kelas: <?= $row['kelas']?></p>
                      <p class="card-text mt-n2">Tanggal Lahir: <?php $tglLahir=$row['tanggalLahir']; $tglLahir=date_create($tglLahir); echo date_format($tglLahir, "d M Y")?></p>
                      <p class="card-text mt-n2">Alamat: <?= $row['alamat']?></p>
                      <p class="card-text mt-n2">Jenis Kelamin: <?= $row['jk']?></p>
                      <p class="card-text mt-n2">Informasi: <?= $row['informasi']?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php }}?>
          </div>
        </div>
      </main>
    </div>
    <?php require_once("../layout/footer-dash.php");?>
  </body>
</html>