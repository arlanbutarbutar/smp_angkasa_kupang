<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  $_SESSION['page-name']="Setting";
  $_SESSION['page-to']="setting.php";
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
            <div class="col-md-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                  <h2 class="h5 page-title">Data Biaya SPP / <?= date('Y'); ?></h2>
                </div>
                <div class="col-auto">
                  <form class="form-inline">
                    <div class="form-group">
                      <button type="button" data-toggle="modal" data-target="#exampleModalSpp" class="btn btn-primary btn-sm"><span class="iconify" data-icon="akar-icons:plus"></span> Input</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card shadow">
                <div class="card-body">
                  <table class="table table-striped table-bordered text-center table-responsive">
                    <thead>
                      <tr>
                        <th class="text-dark font-weight-bold">No</th>
                        <th class="text-dark font-weight-bold">Biaya Spp / Bulan</th>
                        <th class="text-dark font-weight-bold">Kelompok Kelas</th>
                        <th class="text-dark font-weight-bold">Tahun / Ajaran</th>
                        <th class="text-dark font-weight-bold" colspan="2">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1;?>
                      <tr>
                        <td class="text-dark font-weight-bold"><?= $no;?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <?php $no++;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <?php require_once("../layout/footer-dash.php");?>
  </body>
</html>