<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  $_SESSION['page-name']="Absensi Siswa";
  $_SESSION['page-to']="absen.php";
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
          </div>
          <div class="card shadow">
            <div class="card-body">
              <?php if($_SESSION['level']!="siswa"){?>
              <div class="col-6">
                <div class="form-group row">
                  <label for="search-absensi" class="col-sm-2 col-form-label">Search:</label>
                  <div class="col-sm-6">
                    <input type="text" id="search-absensi" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <div style="overflow-x: auto;">
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th class="text-dark font-weight-bold">No</th>
                      <th class="text-dark font-weight-bold">Mapel</th>
                      <th class="text-dark font-weight-bold">Kelas</th>
                      <th class="text-dark font-weight-bold" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php $no=1; if(mysqli_num_rows($tableCheckAbsensi)==0){?>
                      <tr>
                        <th class="text-dark font-weight-bold" colspan="5">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableCheckAbsensi)>0){while($row=mysqli_fetch_assoc($tableCheckAbsensi)){?>
                    <tr>
                      <td class="text-dark font-weight-bold"><?= $no;?></td>
                      <td><?= $row['mapel']?></td>
                      <td><?= $row['kelas']?></td>
                      <td><a href="isi-absen.php?id_mapel=<?= $row['id_mapel']?>&id_kelas=<?= $row['id_kelas']?>" class="btn btn-primary btn-sm">Cek Absen</a></td>
                      <?php if($_SESSION['level']=="guru"){?>
                        <td><a href="absen-terisi.php?id_mapel=<?= $row['id_mapel']?>&id_kelas=<?= $row['id_kelas']?>" class="btn btn-success btn-sm">Lihat Absen</a></td>
                      <?php }?>
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
                      <th class="text-dark font-weight-bold">Mapel</th>
                      <th class="text-dark font-weight-bold">Guru</th>
                      <th class="text-dark font-weight-bold">Kelas</th>
                      <th class="text-dark font-weight-bold">Hari/Tanggal</th>
                      <th class="text-dark font-weight-bold">Status</th>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php if(mysqli_num_rows($tableCheckAbsensi)==0){?>
                      <tr>
                        <th class="text-dark font-weight-bold" colspan="5">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableCheckAbsensi)>0){while($row=mysqli_fetch_assoc($tableCheckAbsensi)){?>
                    <tr>
                      <td><?= $row['mapel']?></td>
                      <td><?= $row['nama_guru']?></td>
                      <td><?= $row['kelas']?></td>
                      <td><?= $row['hari'].", ".$row['tanggal']?></td>
                      <td><?= $row['status']?></td>
                    </tr>
                    <?php }}?>
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