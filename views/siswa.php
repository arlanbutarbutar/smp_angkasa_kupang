<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  $_SESSION['page-name']="Data Siswa";
  $_SESSION['page-to']="siswa.php";
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
              <h2 class="h5 page-title">Data Siswa</h2>
            </div>
            <div class="col-auto">
              <div class="form-group">
                <button type="button" data-toggle="modal" data-target="#exampleModalGuru" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Input</button>
                <div class="modal fade" id="exampleModalGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Guru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="nisn">Nisn</label>
                                <input type="number" name="nisn" id="nisn" class="form-control" required />
                              </div>
                              <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required />
                              </div>
                              <div class="form-group">
                                <label for="id-kelas">Kelas</label>
                                <select name="id-kelas" id="id-kelas" class="form-control" required>
                                  <?php foreach($selectKelas as $rowSK):?>
                                  <option value="<?= $rowSK['id_kelas']?>"><?= $rowSK['kelas']?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="5" rows="5" class="form-control" required></textarea>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control" required>
                                  <option value="Laki-Laki">Laki-Laki</option>
                                  <option value="Perempuan">Perempuan</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="tanggalLahir">Tanggal Lahir</label>
                                <input type="date" name="tanggalLahir" id="tanggalLahir" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label for="informasi">Informasi</label>
                                <textarea name="informasi" id="informasi" cols="5" rows="9" class="form-control"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="inputSiswa" class="btn btn-primary btn-sm">Simpan</button>
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
                  <label for="search-siswa" class="col-sm-2 col-form-label">Search:</label>
                  <div class="col-sm-6">
                    <input type="text" id="search-siswa" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <div style="overflow-x: auto;">
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th class="text-dark font-weight-bold">No</th>
                      <th class="text-dark font-weight-bold">NISN</th>
                      <th class="text-dark font-weight-bold">Nama</th>
                      <th class="text-dark font-weight-bold">Kelas</th>
                      <th class="text-dark font-weight-bold">Jenis Kelamin</th>
                      <th class="text-dark font-weight-bold">Tgl Lahir</th>
                      <th class="text-dark font-weight-bold">Alamat</th>
                      <th class="text-dark font-weight-bold" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php $no=1; if(mysqli_num_rows($tableSiswa)==0){?>
                      <tr>
                        <th class="text-dark font-weight-bold" colspan="9">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableSiswa)>0){while($row=mysqli_fetch_assoc($tableSiswa)){?>
                    <tr>
                      <td class="text-dark font-weight-bold"><?= $no;?></td>
                      <td><?= $row['nisn']?></td>
                      <td><?= $row['nama']?></td>
                      <td><?= $row['kelas']?></td>
                      <td><?= $row['jk']?></td>
                      <td><?= $row['tanggalLahir']?></td>
                      <td><?= $row['alamat']?></td>
                      <td>
                        <button type="button" data-toggle="modal" data-target="#ubahSiswa<?= $row['id_siswa']?>" class="btn btn-warning btn-sm">Ubah</button>
                        <div class="modal fade" id="ubahSiswa<?= $row['id_siswa']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $row['nama']?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label for="nisn">Nisn</label>
                                        <input type="number" name="nisn" value="<?= $row['nisn']?>" id="nisn" class="form-control" required />
                                      </div>
                                      <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" value="<?= $row['nama']?>" id="nama" class="form-control" required />
                                      </div>
                                      <div class="form-group">
                                        <label for="id-kelas">Kelas</label>
                                        <select name="id-kelas" id="id-kelas" class="form-control" required>
                                          <?php foreach($selectKelas as $rowSK):?>
                                          <option value="<?= $rowSK['id_kelas']?>"><?= $rowSK['kelas']?></option>
                                          <?php endforeach;?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="5" rows="5" class="form-control" required><?= $row['alamat']?></textarea>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select name="jk" id="jk" class="form-control" required>
                                          <option value="Laki-Laki">Laki-Laki</option>
                                          <option value="Perempuan">Perempuan</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="tanggalLahir">Tanggal Lahir</label>
                                        <input type="date" name="tanggalLahir" value="<?= $row['tanggalLahir']?>" id="tanggalLahir" class="form-control" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="informasi">Informasi</label>
                                        <textarea name="informasi" id="informasi" cols="5" rows="9" class="form-control"><?= $row['informasi']?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                  <input type="hidden" name="id-siswa" value="<?= $row['id_siswa']?>">
                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                  <button type="submit" name="ubahSiswa" class="btn btn-warning btn-sm">Ubah</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <button type="button" data-toggle="modal" data-target="#hapusSiswa<?= $row['id_siswa']?>" class="btn btn-danger btn-sm"><i class="fas fa-user"></i> Hapus</button>
                        <div class="modal fade" id="hapusSiswa<?= $row['id_siswa']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  Anda yakin ingin menghapus siswa <?= $row['nama']?>?
                                </div>
                                <div class="modal-footer justify-content-center">
                                  <input type="hidden" name="id-siswa" value="<?= $row['id_siswa']?>">
                                  <input type="hidden" name="nisn" value="<?= $row['nisn']?>">
                                  <input type="hidden" name="nama" value="<?= $row['nama']?>">
                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                  <button type="submit" name="hapusSiswa" class="btn btn-danger btn-sm">Hapus</button>
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