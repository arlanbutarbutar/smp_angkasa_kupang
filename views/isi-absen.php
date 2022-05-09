<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  if(!isset($_GET['id_mapel']) || !isset($_GET['id_kelas'])){
    header("Location: absen.php");exit();
  }else if(isset($_GET['id_mapel']) || !isset($_GET['id_kelas'])){
    $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id_mapel']))));
    $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id_kelas']))));
    if($_SESSION['level']=="admin"){
      $tableAbsensi=mysqli_query($conn, "SELECT * FROM absensi JOIN siswa ON absensi.id_siswa=siswa.id_siswa JOIN tbl_mapel ON absensi.id_mapel=tbl_mapel.id_mapel JOIN kelas ON absensi.id_kelas=kelas.id_kelas WHERE absensi.id_mapel='$id_mapel' AND absensi.id_kelas='$id_kelas' ORDER BY absensi.id_absen DESC");
    }
    if($_SESSION['level']=="guru"){
      $tableAbsensi=mysqli_query($conn, "SELECT * FROM guru JOIN siswa ON guru.id_kelas=siswa.id_kelas JOIN tbl_mapel ON guru.id_mapel=tbl_mapel.id_mapel JOIN kelas ON guru.id_kelas=kelas.id_kelas WHERE guru.id_mapel='$id_mapel' AND guru.id_kelas='$id_kelas' ORDER BY siswa.id_siswa ASC");
    }
  }
  $_SESSION['page-name']="Absensi Siswa";
  $_SESSION['page-to']="isi-absen.php?id_mapel=$id_mapel&id_kelas=$id_kelas";
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
                    <?php }else if(mysqli_num_rows($tableAbsensi)>0){while($row=mysqli_fetch_assoc($tableAbsensi)){
                      if($_SESSION['level']=="admin"){?>
                      <tr>
                        <td class="text-dark font-weight-bold"><?= $no;?></td>
                        <td><?= $row['nama']?></td>
                        <td><?= $row['mapel']?></td>
                        <td><?= $row['hari'].", ".$row['tanggal']?></td>
                        <td><?= $row['status']?></td>
                      </tr>
                    <?php }else if($_SESSION['level']=="guru"){
                      $tglNow=date('d M Y');
                      $id_siswaNow=$row['id_siswa'];
                      $dataAbsen=mysqli_query($conn, "SELECT * FROM absensi WHERE id_siswa='$id_siswaNow' AND id_mapel='$id_mapel' AND id_kelas='$id_kelas' AND tanggal='$tglNow'");?>
                      <tr>
                        <td class="text-dark font-weight-bold"><?= $no;?></td>
                        <td><?= $row['nama']?></td>
                        <td><?= $row['mapel']?></td>
                        <?php if(mysqli_num_rows($dataAbsen)==0){?>
                          <td>-</td>
                          <td>
                            <button type="button" data-toggle="modal" data-target="#isiAbsen<?= $row['id_siswa']?>" class="btn btn-primary btn-sm">Isi Absen</button>
                            <div class="modal fade" id="isiAbsen<?= $row['id_siswa']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Isi Absen <?= $row['nama']?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Pilih Kehadiran Siswa!
                                  </div>
                                  <div class="modal-footer border-top-0 justify-content-center mt-n3">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                    <form action="" method="POST">
                                      <input type="hidden" name="id-guru" value="<?= $row['id_guru']?>">
                                      <input type="hidden" name="id-siswa" value="<?= $row['id_siswa']?>">
                                      <input type="hidden" name="id-mapel" value="<?= $row['id_mapel']?>">
                                      <input type="hidden" name="id-kelas" value="<?= $row['id_kelas']?>">
                                      <input type="hidden" name="nama" value="<?= $row['nama']?>">
                                      <button type="submit" name="tidakHadir" class="btn btn-warning btn-sm">Tidak Hadir</button>
                                    </form>
                                    <form action="" method="POST">
                                      <input type="hidden" name="id-guru" value="<?= $row['id_guru']?>">
                                      <input type="hidden" name="id-siswa" value="<?= $row['id_siswa']?>">
                                      <input type="hidden" name="id-mapel" value="<?= $row['id_mapel']?>">
                                      <input type="hidden" name="id-kelas" value="<?= $row['id_kelas']?>">
                                      <input type="hidden" name="nama" value="<?= $row['nama']?>">
                                      <button type="submit" name="hadir" class="btn btn-success btn-sm">Hadir</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
                        <?php }else if(mysqli_num_rows($dataAbsen)>0){$rowAbsen=mysqli_fetch_assoc($dataAbsen);?>
                          <td><?= $rowAbsen['hari'].", ".$rowAbsen['tanggal']?></td>
                          <td><?= $rowAbsen['status']?></td>
                        <?php }?>
                      </tr>
                    <?php }$no++; }}?>
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