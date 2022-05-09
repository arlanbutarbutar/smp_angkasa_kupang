<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  $_SESSION['page-name']="Data Kelas";
  $_SESSION['page-to']="kelas.php";
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
              <h2 class="h5 page-title">Data Kelas</h2>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <button type="button" data-toggle="modal" data-target="#exampleModalKelas" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Input</button>
                <div class="modal fade" id="exampleModalKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST">
                        <div class="modal-body text-center">
                          <div class="form-group">
                            <label for="kelas">Kelas Baru</label>
                            <input type="text" name="kelas" id="kelas" class="form-control" required>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="simpanKelas" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card shadow">
            <div class="card-body">
              <div class="col-6">
                <div class="form-group row">
                  <label for="search-kelas" class="col-sm-2 col-form-label">Search:</label>
                  <div class="col-sm-6">
                    <input type="text" id="search-kelas" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <div style="overflow-x: auto;">
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th class="text-dark font-weight-bold">No</th>
                      <th class="text-dark font-weight-bold">Kelas</th>
                      <th class="text-dark font-weight-bold">Jumlah Siswa</th>
                      <th class="text-dark font-weight-bold" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php $no=1; if(mysqli_num_rows($tableKelas)==0){?>
                      <tr>
                        <th colspan="5">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableKelas)>0){while($row=mysqli_fetch_assoc($tableKelas)){?>
                    <tr>
                      <td class="text-dark font-weight-bold"><?= $no;?></td>
                      <td><?= $row['kelas']?></td>
                      <?php $id_kelas=$row['id_kelas'];
                        $checkSiswa=mysqli_query($conn, "SELECT * FROM siswa WHERE id_kelas='$id_kelas'");
                        $arraySiswa=mysqli_num_rows($checkSiswa);
                      ?>
                      <td><?= $arraySiswa;?></td>
                      <td>
                        <button type="button" data-toggle="modal" data-target="#ubahKelas<?= $row['id_kelas']?>" class="btn btn-warning btn-sm">Ubah</button>
                        <div class="modal fade" id="ubahKelas<?= $row['id_kelas']?>" role="dialog">
                          <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Ubah Kelas</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="kelas">Kelas Baru</label>
                                    <input type="text" name="kelas" value="<?= $row['kelas']?>" id="kelas" class="form-control" required>
                                  </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                  <input type="hidden" name="id-kelas" value="<?= $row['id_kelas']?>">
                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                  <button type="submit" name="ubahKelas" class="btn btn-warning btn-sm">Ubah</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <button type="button" data-toggle="modal" data-target="#hapusKelas<?= $row['id_kelas']?>" class="btn btn-danger btn-sm">Hapus</button>
                        <div class="modal fade" id="hapusKelas<?= $row['id_kelas']?>" role="dialog">
                          <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Hapus Kelas</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  Anda yakin ingin hapus kelas <?= $row['kelas']?>?
                                </div>
                                <div class="modal-footer justify-content-center">
                                  <input type="hidden" name="id-kelas" value="<?= $row['id_kelas']?>">
                                  <input type="hidden" name="kelas" value="<?= $row['kelas']?>">
                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                  <button type="submit" name="hapusKelas" class="btn btn-danger btn-sm">Hapus</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
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
    <script src="../assets/js/editKelas.js"></script>
    <?php require_once("../layout/footer-dash.php");?>
  </body>
</html>