<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  $_SESSION['page-name']="Jadwal";
  $_SESSION['page-to']="jadwal.php";
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
              <h2 class="h5 page-title">Data Jadwal</h2>
            </div>
            <?php if($_SESSION['level']=="admin"){?>
            <div class="col-auto">
              <div class="form-group">
                <button type="button" data-toggle="modal" data-target="#exampleModalJadwal" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Input</button>
                <div class="modal fade" id="exampleModalJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md">
                              <div class="form-group">
                                <label for="id-mapel">Mata Pelajaran</label>
                                <select name="id-mapel" id="id-mapel" class="form-control" required>
                                  <?php foreach($selectMapel as $rowSM):?>
                                  <option value="<?= $rowSM['id_mapel']?>"><?= $rowSM['mapel']." (".$rowSM['kelas'].")"?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="ruang">Ruang</label>
                                <input type="text" name="ruang" id="ruang" class="form-control" required>
                              </div>
                            </div>
                            <div class="col-md">
                              <div class="form-group">
                                <label for="lama-mengajar">Lama Mengajar</label>
                                <input type="number" name="lama-mengajar" id="lama-mengajar" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="">hari</label>
                                <select name="hari" id="" class="form-control">
                                  <option value="Senin">Senin</option>
                                  <option value="Selasa">Selasa</option>
                                  <option value="Rabu">Rabu</option>
                                  <option value="Kamis">Kamis</option>
                                  <option value="Jumat">Jumat</option>
                                  <option value="Sabtu">Sabtu</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="jam">Jam</label>
                                <input type="time" name="jam" id="jam" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="inputJadwal" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
          <div class="card shadow">
            <div class="card-body">
              <?php if($_SESSION['level']!="siswa"){?>
              <div class="col-6">
                <div class="form-group row">
                  <label for="search-jadwal" class="col-sm-2 col-form-label">Search:</label>
                  <div class="col-sm-6">
                    <input type="text" id="search-jadwal" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <?php }?>
              <div style="overflow-x: auto;">
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th class="text-dark font-weight-bold">Mata Pelajaran</th>
                      <th class="text-dark font-weight-bold">Guru</th>
                      <th class="text-dark font-weight-bold">Kelas</th>
                      <th class="text-dark font-weight-bold">Ruang</th>
                      <th class="text-dark font-weight-bold">Waktu</th>
                      <th class="text-dark font-weight-bold">Hari</th>
                      <th class="text-dark font-weight-bold">Jam</th>
                      <?php if($_SESSION['level']=="admin"){?>
                      <th class="text-dark font-weight-bold">Aksi</th>
                      <?php }?>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php if(mysqli_num_rows($tableJadwal)==0){?>
                      <tr>
                        <th class="text-dark font-weight-bold" colspan="<?php if($_SESSION['level']=="guru" || $_SESSION['level']=="siswa"){echo "7";}else if($_SESSION['level']=="admin"){echo "8";}?>">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableJadwal)>0){while($row=mysqli_fetch_assoc($tableJadwal)){?>
                    <tr>
                      <td><?= $row['mapel']?></td>
                      <td><?= $row['nama_guru']?></td>
                      <td><?= $row['kelas']?></td>
                      <td><?= $row['ruang']?></td>
                      <td><?= $row['lama_mengajar']."/jam"?></td>
                      <td><?= $row['hari']?></td>
                      <td><?= $row['jam']?></td>
                      <?php if($_SESSION['level']=="admin"){?>
                      <td>
                        <button type="button" data-toggle="modal" data-target="#hapusJadwal<?= $row['id_jadwal']?>" class="btn btn-danger btn-sm">Hapus</button>
                        <div class="modal fade" id="hapusJadwal<?= $row['id_jadwal']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Jadwal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  Anda yakin ingin menghapus jadwal <?= $row['mapel']?>?
                                </div>
                                <div class="modal-footer justify-content-center">
                                  <input type="hidden" name="id-jadwal" value="<?= $row['id_jadwal']?>">
                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                  <button type="submit" name="hapusJadwal" class="btn btn-danger btn-sm">Hapus</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
                      <?php }?>
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