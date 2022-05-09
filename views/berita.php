<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  $_SESSION['page-name']="Berita";
  $_SESSION['page-to']="berita.php";
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
          <div class="row justify-content-between">
            <div class="col-md-12">
              <h1 class="h3 font-weight-bold mt-3" style="color: #145f98"><?= $_SESSION['page-name']?></h1>
            </div>
          </div>
          <div class="row align-items-center mb-2">
            <div class="col">
              <h2 class="h5 page-title">Data Berita</h2>
            </div>
            <div class="col-auto">
              <form class="form-inline">
                <div class="form-group">
                  <button type="button" data-toggle="modal" data-target="#exampleModalBerita" class=" btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i>
                    Input Berita
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="modal fade" id="exampleModalBerita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Form Berita</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md">
                        <div class="form-group">
                          <label for="judul">Judul</label>
                          <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Berita" required>
                        </div>
                        <div class="form-group">
                          <label for="gambar">Gambar</label>
                          <input type="file" id="gambar" name="img-berita" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="kategori">Kategori</label>
                          <select name="kategori" id="kategori" class="select2 form-control custom-select">
                            <?php foreach($selectKategori as $rowSK):?>
                            <option value="<?= $rowSK['kategori']?>"><?= $rowSK['kategori']?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md">
                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <textarea name="deskripsi" id="deskripsi" cols="30" rows="25" style="line-height: 20px;" class="form-control shadow" required></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" name="inputBerita" class="btn btn-primary btn-sm">Simpan Berita</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="card shadow">
            <div class="card-body">
              <div class="col-6">
                <div class="form-group row">
                  <label for="search-berita" class="col-sm-2 col-form-label">Search:</label>
                  <div class="col-sm-6">
                    <input type="text" id="search-berita" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <div style="overflow-x: auto;">
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th class="text-dark font-weight-bold">No</th>
                      <th class="text-dark font-weight-bold">Judul</th>
                      <th class="text-dark font-weight-bold">Gambar</th>
                      <th class="text-dark font-weight-bold">Deskripsi</th>
                      <th class="text-dark font-weight-bold">Pembuat</th>
                      <th class="text-dark font-weight-bold">Kategori</th>
                      <th class="text-dark font-weight-bold" colspan="2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php $no=1; if(mysqli_num_rows($tableBerita)==0){?>
                      <tr>
                        <th class="text-dark font-weight-bold" colspan="8">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableBerita)>0){while($row=mysqli_fetch_assoc($tableBerita)){?>
                      <tr>
                        <td class="text-dark font-weight-bold"><?= $no;?></td>
                        <td><?= $row['judul']?></td>
                        <td><img src='../assets/images/berita/<?= $row['gambar']?>' class="rounded-circle" style="width: 150px;height: 150px;object-fit: cover;"></td>
                        <td><?= strip_tags($row['deskripsi'])?></td>
                        <td><?= $row['pembuat']?></td>
                        <td><?= $row['kategori']?></td>
                        <td><a href="edit-berita.php?id=<?= $row['id_berita']?>" class="btn btn-warning btn-sm">Ubah</a></td>
                        <td>
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $row['id_berita']?>">Hapus</button>
                          <div class="modal fade" id="hapus<?= $row['id_berita']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel"><?= $row['judul']?></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="" method="POST">
                                  <div class="modal-body">
                                    Anda yakin ingin hapus <?= $row['judul']?>?
                                  </div>
                                  <div class="modal-footer justify-content-center">
                                    <input type="hidden" name="id-berita" value="<?= $row['id_berita']?>">
                                    <input type="hidden" name="img-beritaOld" value="<?= $row['gambar']?>">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                    <button type="submit" name="hapusBerita" class="btn btn-danger btn-sm">Hapus</button>
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