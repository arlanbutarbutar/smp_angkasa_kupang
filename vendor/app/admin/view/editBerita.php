<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">
            <span class="iconify" data-icon="bxs:news"></span>
            Edit Berita
        </h2>
    </div>
    <div class="col-auto">
        <form class="form-inline">
            <div class="form-group d-none d-lg-inline">
                <label for="reportrange" class="sr-only">Date Ranges</label>
                <div id="reportrange" class="px-2 py-2 text-muted">
                    <span class="small"></span>
                </div>
            </div>
            <div class="form-group">
                <a href="index.php?viewAdmin=beri" class="btn btn-danger btn-sm">
                    <span class="iconify" data-icon="akar-icons:arrow-back-thick"></span>
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
<?php
$id = $_GET['id'];
?>
<div class="card shadow">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_berita" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="judul" value="<?php echo tableNameFieldId("tbl_berita", "id_berita", $id, "judul"); ?>" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" name="file" class="form-control" />
                <img src='app/admin/file/<?php echo tableNameFieldId("tbl_berita", "id_berita", $id, "gambar"); ?>' width='130px' height='130px' alt="">
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="deskripsi" cols="" rows="" class="form-control"><?php echo tableNameFieldId("tbl_berita", "id_berita", $id, "deskripsi"); ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <select name="kategori" id="kategori" class="select2 form-control custom-select">
                    <option value="<?php echo tableNameFieldId("tbl_berita", "id_berita", $id, "kategori"); ?>"><?php echo tableNameFieldId("tbl_berita", "id_berita", $id, "kategori"); ?></option>
                    <?php
                    selectOption("tbl_kategori", "kategori");
                    ?>
                </select>
            </div>
            <button onclick="return confirm('Yakin Mengedit berita?')" type="submit" name="editBerita" class="btn btn-primary">Simpan Berita</button>
        </form>
    </div>
</div>