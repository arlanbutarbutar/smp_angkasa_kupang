<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  $_SESSION['page-name']="Mata Pelajaran";
  $_SESSION['page-to']="mapel.php";
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
              <h2 class="h5 page-title">Data Mapel</h2>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <button type="button" data-toggle="modal" data-target="#inputMapel" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Input</button>
                <div class="modal fade" id="inputMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Mapel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="post">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="mapel">Mata Pelajaran</label>
                            <input type="text" name="mapel" id="mapel" class="form-control" placeholder="Mata Pelajaran" required />
                          </div>
                          <div class="form-group">
                            <label for="id_kelas">Kelas</label>
                            <select name="id-kelas" id="id_kelas" class="form-control">
                              <?php foreach($selectKelas as $rowSK):?>
                              <option value="<?= $rowSK['id_kelas']?>"><?= $rowSK['kelas']?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="inputMapel" class="btn btn-primary btn-sm">Simpan</button>
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
                  <label for="search-mapel" class="col-sm-2 col-form-label">Search:</label>
                  <div class="col-sm-6">
                    <input type="text" id="search-mapel" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <div style="overflow-x: auto;">
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <td class="text-dark font-weight-bold">No</td>
                      <td class="text-dark font-weight-bold">MataPelajaran</td>
                      <td class="text-dark font-weight-bold" colspan="2">Aksi</td>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php $no=1; if(mysqli_num_rows($tableMapel)==0){?>
                    <tr>
                      <th class="text-dark font-weight-bold" colspan="5">Belum ada data</th>
                    </tr>
                    <?php }else if(mysqli_num_rows($tableMapel)>0){while($row=mysqli_fetch_assoc($tableMapel)){?>
                    <tr>
                      <th class="text-dark font-weight-bold"><?= $no;?></th>
                      <td><?= $row['mapel']?></td>
                      <td>
                        <button type="button" data-toggle="modal" data-target="#ubahMapel<?= $row['id_mapel']?>" class="btn btn-warning btn-sm">Ubah</button>
                        <div class="modal fade" id="ubahMapel<?= $row['id_mapel']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Mapel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="post">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="mapel">Mata Pelajaran</label>
                                    <input type="text" name="mapel" value="<?= $row['mapel']?>" id="mapel" class="form-control" placeholder="Mata Pelajaran" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="id_kelas">Kelas</label>
                                    <select name="id-kelas" id="id_kelas" class="form-control">
                                      <?php foreach($selectKelas as $rowSK):?>
                                      <option value="<?= $rowSK['id_kelas']?>"><?= $rowSK['kelas']?></option>
                                      <?php endforeach;?>
                                    </select>
                                  </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                  <input type="hidden" name="id-mapel" value="<?= $row['id_mapel']?>">
                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                  <button type="submit" name="ubahMapel" class="btn btn-warning btn-sm">Ubah</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <button type="button" data-toggle="modal" data-target="#hapusMapel<?= $row['id_mapel']?>" class="btn btn-danger btn-sm">Hapus</button>
                        <div class="modal fade" id="hapusMapel<?= $row['id_mapel']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Mapel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="post">
                                <div class="modal-body">
                                  Anda yakin ingin menghapus mata pelajaran <?= $row['mapel']?>?
                                </div>
                                <div class="modal-footer justify-content-center">
                                  <input type="hidden" name="id-mapel" value="<?= $row['id_mapel']?>">
                                  <input type="hidden" name="mapel" value="<?= $row['mapel']?>">
                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                  <button type="submit" name="hapusMapel" class="btn btn-danger btn-sm">Hapus</button>
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
    <?php require_once("../layout/footer-dash.php");?>
  </body>
</html>