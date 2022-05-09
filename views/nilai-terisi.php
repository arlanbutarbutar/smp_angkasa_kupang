<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  if(!isset($_GET['id_siswa']) || !isset($_GET['id_mapel'])){
    header("Location: nilaiSiswa.php");exit();
  }else if(isset($_GET['id_siswa']) || isset($_GET['id_mapel'])){
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id_siswa']))));
    $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id_mapel']))));
    $tableNilai=mysqli_query($conn, "SELECT * FROM tbl_nilai JOIN tbl_mapel ON tbl_nilai.id_mapel=tbl_mapel.id_mapel WHERE tbl_nilai.id_siswa='$id_siswa' AND tbl_nilai.id_mapel='$id_mapel'");
  }
  $_SESSION['page-name']="Nilai Siswa";
  $_SESSION['page-to']="nilai-terisi.php?id_siswa=$id_siswa&id_mapel=$id_mapel";
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
              <a href="nilaiSiswa.php" class="btn btn-success btn-sm shadow mr-2">Kembali</a>
            </div>
          </div>
          <div class="card shadow">
            <div class="card-body">
              <div style="overflow-x: auto;">
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th class="text-dark font-weight-bold">Mata Pelajaran</th>
                      <th class="text-dark font-weight-bold">Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(mysqli_num_rows($tableNilai)==0){?>
                      <tr>
                        <th class="text-dark font-weight-bold" colspan="2">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableNilai)>0){while($row=mysqli_fetch_assoc($tableNilai)){?>
                    <tr>
                      <td><?= $row['mapel']?></td>
                      <td><?= $row['jenisNilai']." ".$row['nilai']." (".$row['statusNilai'].")"?></td>
                    </tr>
                    <?php }}?>
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