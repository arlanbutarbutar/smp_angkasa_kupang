<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  if($_SESSION['level']!="guru"){
    header("Location: absen.php");exit();
  }
  if(!isset($_GET['id_mapel']) || !isset($_GET['id_kelas'])){
    header("Location: absen.php");exit();
  }else if(isset($_GET['id_mapel']) || !isset($_GET['id_kelas'])){
    $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id_mapel']))));
    $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id_kelas']))));
    $checkNIP=mysqli_query($conn, "SELECT * FROM tbl_akun JOIN guru ON tbl_akun.nip=guru.nip WHERE tbl_akun.id_akun='$id_user'");
    $row_checkNIP=mysqli_fetch_assoc($checkNIP);
    $id_guru=$row_checkNIP['id_guru'];
    $tableAbsensi=mysqli_query($conn, "SELECT * FROM absensi JOIN siswa ON absensi.id_siswa=siswa.id_siswa JOIN tbl_mapel ON absensi.id_mapel=tbl_mapel.id_mapel JOIN kelas ON absensi.id_kelas=kelas.id_kelas JOIN guru ON absensi.id_guru=guru.id_guru WHERE absensi.id_mapel='$id_mapel' AND absensi.id_kelas='$id_kelas' AND guru.id_guru='$id_guru' ORDER BY absensi.id_absen DESC");
  }
  $_SESSION['page-name']="Absensi Siswa";
  $_SESSION['page-to']="absen-terisi.php?id_mapel=$id_mapel&id_kelas=$id_kelas";
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
          <div class="row align-items-center mb-2">
            <div class="col">
              <h2 class="h5 page-title">Data Absensi</h2>
            </div>
            <div class="col-auto">
              <a href="absen.php" class="btn btn-primary btn-sm shadow">Kembali</a>
            </div>
          </div>
          <div class="card shadow">
            <div class="card-body">
              <div style="overflow-x: auto;">
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th class="text-dark font-weight-bold">No</th>
                      <th class="text-dark font-weight-bold">Siswa</th>
                      <th class="text-dark font-weight-bold">Mapel</th>
                      <th class="text-dark font-weight-bold">Hari/Tanggal</th>
                      <th class="text-dark font-weight-bold">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; if(mysqli_num_rows($tableAbsensi)==0){?>
                      <tr>
                        <th class="text-dark font-weight-bold" colspan="5">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableAbsensi)>0){while($row=mysqli_fetch_assoc($tableAbsensi)){?>
                      <tr>
                        <td class="text-dark font-weight-bold"><?= $no;?></td>
                        <td><?= $row['nama']?></td>
                        <td><?= $row['mapel']?></td>
                        <td><?= $row['hari'].", ".$row['tanggal']?></td>
                        <td><?= $row['status']?></td>
                      </tr>
                    <?php $no++; }}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <?php require_once("../layout/footer-dash.php");?>
  </body>
</html>