<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  if(!isset($_GET['id_siswa'])){
    header("Location: nilaiSiswa.php");exit();
  }else if(isset($_GET['id_siswa'])){
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id_siswa']))));
    $checkNIP=mysqli_query($conn, "SELECT * FROM tbl_akun JOIN guru ON tbl_akun.nip=guru.nip WHERE tbl_akun.id_akun='$id_user'");
    $row_checkNIP=mysqli_fetch_assoc($checkNIP);
    $id_guru=$row_checkNIP['id_guru'];
    $tableNilai=mysqli_query($conn, "SELECT * FROM siswa JOIN guru ON siswa.id_kelas=guru.id_kelas WHERE guru.id_guru='$id_guru' AND siswa.id_siswa='$id_siswa'");
  }
  $_SESSION['page-name']="Nilai Siswa";
  $_SESSION['page-to']="isi-nilai.php?id_siswa=$id_siswa";
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
              <h2 class="h5 page-title">Data Nilai Siswa</h2>
            </div>
            <div class="col-auto">
              <a href="nilaiSiswa.php" class="btn btn-primary btn-sm shadow">Kembali</a>
              <a href="export-excel.php?id=<?= $id_siswa; ?>" class="btn btn-success btn-sm" target="_blank">Export to Excel</a>
            </div>
          </div>
          <div class="card shadow">
            <div class="card-body">
              <div style="overflow-x: auto;">
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th class="text-dark font-weight-bold">Mata Pelajaran</th>
                      <th class="text-dark font-weight-bold">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(mysqli_num_rows($tableNilai)==0){?>
                      <tr>
                        <th class="text-dark font-weight-bold" colspan="2">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableNilai)>0){while($row=mysqli_fetch_assoc($tableNilai)){
                      $id_kelas=$row['id_kelas'];
                      $takeMapelNilai=mysqli_query($conn, "SELECT * FROM tbl_mapel WHERE id_kelas='$id_kelas'");
                      while($rowMN=mysqli_fetch_assoc($takeMapelNilai)){
                    ?>
                    <tr>
                      <td><?= $rowMN['mapel']?></td>
                      <td><a href="isi-nilai.php?id_siswa=<?= $row['id_siswa']?>&id_mapel=<?= $rowMN['id_mapel']?>" class="btn btn-primary btn-sm">Lihat Nilai</a></td>
                    </tr>
                    <?php }}}?>
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