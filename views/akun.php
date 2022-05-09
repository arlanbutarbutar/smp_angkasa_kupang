<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  $_SESSION['page-name']="Akun";
  $_SESSION['page-to']="akun.php";
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
              <h2 class="h5 page-title">Data Akun</h2>
            </div>
          </div>
          <div class="card shadow">
            <div class="card-body">
              <div class="col-6">
                <div class="form-group row">
                  <label for="search-akun" class="col-sm-2 col-form-label">Search:</label>
                  <div class="col-sm-6">
                    <input type="text" id="search-akun" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <div style="overflow-x: auto;">
                <table class="table table-striped table-bordered text-center">
                  <thead>
                    <tr>
                      <th class="text-dark font-weight-bold">No</th>
                      <th class="text-dark font-weight-bold">Username</th>
                      <th class="text-dark font-weight-bold">Level</th>
                      <th class="text-dark font-weight-bold">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="search-page">
                    <?php $no=1; if(mysqli_num_rows($tableAkun)==0){?>
                      <tr>
                        <th class="text-dark font-weight-bold" colspan="4">Belum ada data</th>
                      </tr>
                    <?php }else if(mysqli_num_rows($tableAkun)>0){while($row=mysqli_fetch_assoc($tableAkun)){?>
                    <tr>
                      <td><?= $no;?></td>
                      <td><?= $row['email']?></td>
                      <td><?= $row['level']?></td>
                      <td>
                        <button type="button" data-toggle="modal" data-target="#hapusAkun<?= $row['id_akun']?>" class="btn btn-danger btn-sm"><i class="fas fa-user"></i> Hapus</button>
                        <div class="modal fade" id="hapusAkun<?= $row['id_akun']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="" method="POST">
                                <div class="modal-body">
                                  Anda yakin ingin menghapus akun <?= $row['email']?>?
                                </div>
                                <div class="modal-footer justify-content-center">
                                  <input type="hidden" name="id-akun" value="<?= $row['id_akun']?>">
                                  <input type="hidden" name="email" value="<?= $row['email']?>">
                                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                  <button type="submit" name="hapusAkun" class="btn btn-danger btn-sm">Hapus</button>
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