<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  $_SESSION['page-name']="Data Guru";
  $_SESSION['page-to']="guru.php";
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
              <h2 class="h5 page-title">Data Guru</h2>
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
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="nip">Nip</label>
                            <input type="number" name="nip" id="nip" class="form-control" required />
                          </div>
                          <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required />
                          </div>
                          <div class="form-group">
                            <label for="jenis-kelamin">Jenis Kelamin</label>
                            <select name="jenis-kelamin" id="jenis-kelamin" class="form-control">
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="address" name="alamat" id="alamat" class="form-control" required />
                          </div>
                          <div class="form-group">
                            <label for="tempat-lahir">Tempat Lahir</label>
                            <input type="text" name="tempat-lahir" id="tempat-lahir" class="form-control" required />
                          </div>
                          <div class="form-group">
                            <label for="tgl-lahir">Tgl Lahir</label>
                            <input type="date" name="tgl-lahir" id="tgl-lahir" class="form-control" required />
                          </div>
                          <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" name="agama" id="agama" class="form-control" required />
                          </div>
                          <div class="form-group">
                            <label for="status-aktif">Status Aktif</label>
                            <select name="status-aktif" id="status-aktif" class="form-control" required>
                              <option value="Aktif">Aktif</option>
                              <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="mapel">Mata Pelajaran</label>
                            <select name="id-mapel" id="id-mapel" class="form-control" required>
                              <?php foreach($selectMapel as $rowSM):?>
                              <option value="<?= $rowSM['id_mapel']?>"><?= $rowSM['mapel']?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="id-status">Status Jabatan</label>
                            <select name="id-status" id="id-status" class="form-control" required>
                              <?php foreach($selectStatusGuru as $rowSSG):?>
                              <option value="<?= $rowSSG['id_status']?>"><?= $rowSSG['status']?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="img-guru">Profile Guru</label>
                            <div class="custom-file">
                              <input type="file" name="img-guru" class="custom-file-input" id="customFile" required>
                              <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" name="inputGuru" class="btn btn-primary btn-sm">Simpan</button>
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
                  <label for="search-guru" class="col-sm-2 col-form-label">Search:</label>
                  <div class="col-sm-6">
                    <input type="text" id="search-guru" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <div style="overflow-x: auto;">
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th class="text-dark font-weight-bold">No</th>
                      <th class="text-dark font-weight-bold">NIP</th>
                      <th class="text-dark font-weight-bold">Nama</th>
                      <th class="text-dark font-weight-bold">Jenis Kelamin</th>
                      <th class="text-dark font-weight-bold">Alamat</th>
                      <th class="text-dark font-weight-bold">TTL</th>
                      <th class="text-dark font-weight-bold">Agama</th>
                      <th class="text-dark font-weight-bold">Status Aktif</th>
                      <th class="text-dark font-weight-bold">Mapel</th>
                      <th class="text-dark font-weight-bold">Profile</th>
                      <th class="text-dark font-weight-bold">Kelas</th>
                      <th class="text-dark font-weight-bold">Status Guru</th>
                      <th class="text-dark font-weight-bold" colspan="3">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php $no=1; if(mysqli_num_rows($tableGuru)==0){?>
                      <tr>
                        <th class="text-dark font-weight-bold" colspan="15">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableGuru)>0){while($row=mysqli_fetch_assoc($tableGuru)){?>
                    <tr>
                      <td class="text-dark font-weight-bold"><?= $no;?></td>
                      <td><?= $row['nip']?></td>
                      <td><?= $row['nama_guru']?></td>
                      <td><?= $row['jenis_kelamin']?></td>
                      <td><?= $row['alamat']?></td>
                      <td><?= $row['tempat_lahir']." ".$row['tgl_lahir']?></td>
                      <td><?= $row['agama']?></td>
                      <td><?= $row['status_aktif']?></td>
                      <td><?= $row['mapel']?></td>
                      <td><img src="../assets/images/guru/<?= $row['foto']?>" style="width: 150px;height: 150px;object-fit: cover;" class="rounded-circle" alt="<?= $row['nama_guru']?>"></td>
                      <td><?= $row['kelas']?></td>
                      <td><?= $row['status']?></td>
                      <td>
                        <?php $nip=$row['nip']; 
                          $checkNIP=mysqli_query($conn, "SELECT * FROM tbl_akun WHERE nip='$nip'");
                          if(mysqli_num_rows($checkNIP)==0){
                        ?>
                          <button type="button" data-toggle="modal" data-target="#akunGuru<?= $row['id_guru']?>" class="btn btn-primary btn-sm"><i class="fas fa-user"></i> Buat Akun</button>
                          <div class="modal fade" id="akunGuru<?= $row['id_guru']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Buat Akun Guru</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="" method="POST">
                                  <div class="modal-body">
                                    Anda yakin ingin membuat akun guru <?= $row['nama_guru']?>?
                                  </div>
                                  <div class="modal-footer justify-content-center">
                                    <input type="hidden" name="nip" value="<?= $row['nip']?>">
                                    <input type="hidden" name="nama" value="<?= $row['nama_guru']?>">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                    <button type="submit" name="akunGuru" class="btn btn-primary btn-sm">Buat Sekarang</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        <?php }?>
                      </td>
                      <td>
                        <button type="button" data-toggle="modal" data-target="#ubahGuru<?= $row['id_guru']?>" class="btn btn-warning btn-sm">Ubah</button>
                        <div class="modal fade" id="ubahGuru<?= $row['id_guru']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $row['nama_guru']?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="nip">Nip</label>
                                    <input type="number" name="nip" value="<?= $row['nip']?>" id="nip" class="form-control" required />
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" value="<?= $row['nama_guru']?>" id="nama" class="form-control" required />
                                  </div>
                                  <div class="form-group">
                                    <label for="jenis-kelamin">Jenis Kelamin</label>
                                    <select name="jenis-kelamin" id="jenis-kelamin" class="form-control" required>
                                      <option value="Laki-Laki">Laki-Laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="address" name="alamat" value="<?= $row['alamat']?>" id="alamat" class="form-control" required/>
                                  </div>
                                  <div class="form-group">
                                    <label for="tempat-lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat-lahir" value="<?= $row['tempat_lahir']?>" id="tempat-lahir" class="form-control" required/>
                                  </div>
                                  <div class="form-group">
                                    <label for="tgl-lahir">Tgl Lahir</label>
                                    <input type="date" name="tgl-lahir" value="<?= $row['tgl_lahir']?>" id="tgl-lahir" class="form-control" required/>
                                  </div>
                                  <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" name="agama" value="<?= $row['agama']?>" id="agama" class="form-control" required/>
                                  </div>
                                  <div class="form-group">
                                    <label for="status-aktif">Status Aktif</label>
                                    <select name="status-aktif" id="status-aktif" class="form-control" required>
                                      <option value="Aktif">Aktif</option>
                                      <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="mapel">Mata Pelajaran</label>
                                    <select name="id-mapel" id="id-mapel" class="form-control" required>
                                      <?php foreach($selectMapel as $rowSM):?>
                                      <option value="<?= $rowSM['id_mapel']?>"><?= $rowSM['mapel']?></option>
                                      <?php endforeach;?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="id-status">Status Jabatan</label>
                                    <select name="id-status" id="id-status" class="form-control" required>
                                      <?php foreach($selectStatusGuru as $rowSSG):?>
                                      <option value="<?= $rowSSG['id_status']?>"><?= $rowSSG['status']?></option>
                                      <?php endforeach;?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="img-guru">Profile Guru</label>
                                    <div class="custom-file">
                                      <input type="file" name="img-guru" class="custom-file-input" id="customFile">
                                      <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                  <input type="hidden" name="id-guru" value="<?= $row['id_guru']?>">
                                  <input type="hidden" name="img-guruOld" value="<?= $row['foto']?>">
                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                  <button type="submit" name="ubahGuru" class="btn btn-warning btn-sm">Ubah</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>
                        <button type="button" data-toggle="modal" data-target="#hapusGuru<?= $row['id_guru']?>" class="btn btn-danger btn-sm"><i class="fas fa-user"></i> Hapus</button>
                        <div class="modal fade" id="hapusGuru<?= $row['id_guru']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Guru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  Anda yakin ingin menghapus guru <?= $row['nama_guru']?>?
                                </div>
                                <div class="modal-footer justify-content-center">
                                  <input type="hidden" name="id-guru" value="<?= $row['id_guru']?>">
                                  <input type="hidden" name="nip" value="<?= $row['nip']?>">
                                  <input type="hidden" name="nama" value="<?= $row['nama_guru']?>">
                                  <input type="hidden" name="img-guruOld" value="<?= $row['foto']?>">
                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                  <button type="submit" name="hapusGuru" class="btn btn-danger btn-sm">Hapus</button>
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
    <script src="../assets/js/editGuru.js"></script>
    <script src="../assets/js/akunGuru.js"></script>
    <?php require_once("../layout/footer-dash.php");?>
  </body>
</html>