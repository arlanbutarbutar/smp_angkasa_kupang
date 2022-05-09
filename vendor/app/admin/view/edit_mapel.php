<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Edit Data Mapel</h2>
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
                <a href="index.php?viewAdmin=mapel">Kembali</a>
                <!-- <button type="button" data-toggle="modal" data-target="#inputMapel" class="btn btn-primary btn-sm"><span class="iconify" data-icon="akar-icons:plus"></span> Input</button> -->
            </div>
        </form>
    </div>
</div>

<div class="card shadow">
    <div class="card-body">
        <form action="" method="post">
            <input type="hidden" name="id_mapel" value="<?php echo $_GET['id']; ?>">
            <div class="form-group">
                <label for="">MataPelajaran</label>
                <input type="text" name="mapel" id="mapel" value="<?php echo tableNameFieldId('tbl_mapel', 'id_mapel', $_GET['id'], 'mapel'); ?>" class="form-control" placelholder="Matapelajaran..">
            </div>
            <div class="form-group">
                <label for="">Kelas</label>
                <select name="id_kelas" id="id_kelas" class="form-control">
                    <?php
                    echo '<option value=' . tableNameFieldId('tbl_mapel', 'id_mapel', $_GET['id'], 'id_kelas') . '>' . tableNameFieldId('tbl_mapel', 'id_mapel', $_GET['id'], 'id_kelas') . '</option>';
                    selectOptionId('kelas', 'kelas', 'id_kelas');
                    ?>
                </select>
            </div>
            <div class="form-group">
                <button onclick="return confirm('Yakin Mengubah data??')" type="submit" name="edit_mapel" class="btn btn-primary">Simpan</button>
                <a href="index.php?viewAdmin=mapel" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>