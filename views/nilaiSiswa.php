<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  $_SESSION['page-name']="Nilai";
  $_SESSION['page-to']="nilaiSiswa.php";
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
          </div>
          <div class="card shadow">
            <div class="card-body">
              <?php if($_SESSION['level']!="siswa"){?>
              <div class="col-6">
                <div class="form-group row">
                  <label for="search-nilai" class="col-sm-2 col-form-label">Search:</label>
                  <div class="col-sm-6">
                    <input type="text" id="search-nilai" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <div style="overflow-x: auto;">
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th class="text-dark font-weight-bold">No</th>
                      <th class="text-dark font-weight-bold">Nama</th>
                      <th class="text-dark font-weight-bold">Kelas</th>
                      <th class="text-dark font-weight-bold">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php $no=1; if(mysqli_num_rows($tableCheckNilai)==0){?>
                      <tr>
                        <th class="text-dark font-weight-bold" colspan="4">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableCheckNilai)>0){while($row=mysqli_fetch_assoc($tableCheckNilai)){?>
                    <tr>
                      <td class="text-dark font-weight-bold"><?= $no;?></td>
                      <td><?= $row['nama']?></td>
                      <td><?= $row['kelas']?></td>
                      <td><a href="cek-mapel.php?id_siswa=<?= $row['id_siswa']?>" class="btn btn-primary btn-sm">Cek Mapel</a></td>
                    </tr>
                    <?php $no++; }}?>
                  </tbody>
                </table>
              </div>
              <?php }else if($_SESSION['level']=="siswa"){?>
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
                      <td><a href="nilai-terisi.php?id_siswa=<?= $row['id_siswa']?>&id_mapel=<?= $rowMN['id_mapel']?>" class="btn btn-primary btn-sm">Lihat Nilai</a></td>
                    </tr>
                    <?php }}}?>
                  </tbody>
                </table>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
      </main>
    </div>
    <?php require_once("../layout/footer-dash.php");?>
  </body>
</html>