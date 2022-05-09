<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  if(!isset($_GET['id'])){
    header("Location: berita.php");exit();
  }else if(isset($_GET['id'])){
    $data=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id']))));
    $editBerita=mysqli_query($conn, "SELECT * FROM tbl_berita WHERE id_berita='$data'");
  }
  $_SESSION['page-name']="Edit Berita";
  $_SESSION['page-to']="edit-berita.php?id=".$data;
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
            <?php if(mysqli_num_rows($editBerita)>0){while($row=mysqli_fetch_assoc($editBerita)){?>
              <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" id="judul" name="judul" value="<?= $row['judul']?>" class="form-control" placeholder="Judul Berita">
                  </div>
                  <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" id="gambar" name="img-berita" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="select2 form-control custom-select">
                      <?php foreach($selectKategori as $rowSK):?>
                      <option value="<?= $rowSK['kategori']?>"><?= $rowSK['kategori']?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="25" style="line-height: 20px;" class="form-control shadow"><?= $row['deskripsi']?></textarea>
                  </div>
                  <input type="hidden" name="id-berita" value="<?= $row['id_berita']?>">
                  <input type="hidden" name="img-beritaOld" value="<?= $row['gambar']?>">
                  <a href="berita.php" class="btn btn-secondary btn-sm">Batal</a>
                  <button type="submit" name="ubahBerita" class="btn btn-warning btn-sm">Ubah</button>
                </form>
              </div>
            <?php }}?>
          </div>
        </div>
      </main>
    </div>
    <?php require_once("../layout/footer-dash.php");?>
  </body>
</html>