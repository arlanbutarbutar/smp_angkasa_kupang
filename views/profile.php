<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  $_SESSION['page-name']="Profile";
  $_SESSION['page-to']="profile.php";
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
              <div class="card shadow">
                <div class="card-header">
                  <strong class="card-title">Profile Sekolah</strong>
                </div>
                <div class="card-body my-n2">
                  <?php if(mysqli_num_rows($formSekolah)>0){while($row=mysqli_fetch_assoc($formSekolah)){?>
                  <form action="" method="POST">
                    <div class="row">
                      <div class="col-md-12 col-lg-6">
                        <input type="hidden" name="id_sekolah" value="<?= $row['id_sekolah']?>">
                        <div class="form-group">
                          <label for="kementrian">Kementerian</label>
                          <input type="text" name="kementerian" id="kementrian" value="<?= $row['kementerian']?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="unitOrganisasi">Unit / Organisasi</label>
                          <input type="text" name="unitOrganisasi" id="unitOrganisasi" value="<?= $row['unitOrganisasi']?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label>Provinsi / Kabupaten / Kota</label>
                          <div class="input-group">
                            <input type="text" name="provinsi" value="<?= $row['provinsi']?>" class="form-control">
                            <input type="text" name="kabupaten" value="<?= $row['kabupaten']?>" aria-label="First name" class="form-control">
                            <input type="text" name="kota" value="<?= $row['kota']?>" aria-label="Last name" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="nss">NSS</label>
                          <input type="text" name="nss" id="nss" value="<?= $row['nss']?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="npsn">NPSN</label>
                          <input type="text" name="npsn" id="npsn" value="<?= $row['npsn']?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="alamat">Alamat</label>
                          <input type="text" name="alamat" id="alamat" value="<?= $row['alamat']?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="telp">Telp</label>
                          <input type="text" name="telp" id="telp" value="<?= $row['telp']?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-6">
                        <div class="form-group">
                          <label for="statussekolah">Status Sekolah</label>
                          <input type="text" name="statussekolah" id="statussekolah" value="<?= $row['statussekolah']?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="daerah">Daerah</label>
                          <input type="text" name="daerah" id="daerah" value="<?= $row['daerah']?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="kodepos">Kode Poss</label>
                          <input type="text" name="kodepos" id="kodepos" value="<?= $row['kodepos']?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="akreditasi">Akreditasi</label>
                          <input type="text" name="akreditasi" id="akreditasi" value="<?= $row['akreditasi']?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="tahunberdiri">Tahun berdiri</label>
                          <input type="text" name="tahunberdiri" id="tahunberdiri" value="<?= $row['tahunberdiri']?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="luasgedung">Luas Gedung</label>
                          <input type="text" name="luasgedung" id="luasgedung" value="<?= $row['luasgedung']?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="luastanah">Luas Tanah</label>
                          <input type="text" name="luastanah" id="luastanah" value="<?= $row['luastanah']?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="statustanah">Status Tanah</label>
                          <input type="text" name="statustanah" id="statustanah" value="<?= $row['statustanah']?>" class="form-control">
                        </div>
                      </div>
                      <button type="submit" name="simpanProfile" class="btn btn-primary btn-sm mx-auto">Simpan</button>
                    </div>
                  </form>
                  <?php }}?>
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