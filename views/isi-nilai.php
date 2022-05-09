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
  $_SESSION['page-to']="isi-nilai.php?id_siswa=$id_siswa&id_mapel=$id_mapel";
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
              <a href="cek-mapel.php?id_siswa=<?= $id_siswa?>" class="btn btn-primary btn-sm shadow mr-2">Kembali</a>
              <button type="button" data-toggle="modal" data-target="#inputNilai" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Input Nilai</button>
              <div class="modal fade" id="inputNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Input Nilai</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="" method="post">
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="nilai">Nilai</label>
                          <input type="number" name="nilai" id="nilai" class="form-control" placeholder="Nilai" required />
                        </div>
                        <div class="form-group">
                          <label for="jenis-nilai">Jenis Nilai</label>
                          <select name="jenisNilai" id="jenis-nilai" class="form-control">
                            <option value="Nilai Harian">Nilai Harian</option>
                            <option value="Nilai Tugas 1">Nilai Tugas 1</option>
                            <option value="Nilai Tugas 2">Nilai Tugas 2</option>
                            <option value="Nilai Tugas 3">Nilai Tugas 3</option>
                            <option value="Nilai Ulangan 1">Nilai Ulangan 1</option>
                            <option value="Nilai Ulangan 2">Nilai Ulangan 2</option>
                            <option value="Nilai Ulangan 3">Nilai Ulangan 3</option>
                            <option value="PTS">PTS (Penilaian Tengah Semester)</option>
                            <option value="PAS">PAS (Penilaian Akhir Semester)</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-center">
                        <input type="hidden" name="id-siswa" value="<?= $id_siswa?>">
                        <input type="hidden" name="id-mapel" value="<?= $id_mapel?>">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                        <button type="submit" name="inputNilai" class="btn btn-primary btn-sm">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
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
                      <th class="text-dark font-weight-bold">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(mysqli_num_rows($tableNilai)==0){?>
                      <tr>
                        <th class="text-dark font-weight-bold" colspan="3">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableNilai)>0){while($row=mysqli_fetch_assoc($tableNilai)){?>
                    <tr>
                      <td><?= $row['mapel']?></td>
                      <td><?= $row['jenisNilai']." ".$row['nilai']." (".$row['statusNilai'].")"?></td>
                      <td>
                        <button type="button" data-toggle="modal" data-target="#hapusNilai<?= $row['id_nilai']?>" class="btn btn-danger btn-sm">Hapus</button>
                        <div class="modal fade" id="hapusNilai<?= $row['id_nilai']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Nilai</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  Anda yakin ingin menghapus nilai <?= $row['jenisNilai']?>?
                                </div>
                                <div class="modal-footer justify-content-center">
                                  <input type="hidden" name="id-nilai" value="<?= $row['id_nilai']?>">
                                  <input type="hidden" name="jenisNilai" value="<?= $row['jenisNilai']?>">
                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                  <button type="submit" name="hapusNilai" class="btn btn-danger btn-sm">Hapus</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
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