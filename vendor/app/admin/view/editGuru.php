<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Edit Data Guru</h2>
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
                <a href="index.php?viewAdmin=guru" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </form>
    </div>
</div>

<div class="card shadow">
    <div class="card-body">
        <form action="" method="POST">
            <?php
            echo '<input type="hidden" name="id_guru" value="' . $_GET['id'] . '">
            <div class="form-group">
                <label for="">Nip</label>
                <input type="text" name="nip" value="' . tableNameFieldId('guru', 'id_guru', $_GET['id'], 'nip') . '" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" value="' . tableNameFieldId('guru', 'id_guru', $_GET['id'], 'nama') . '" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="">Wali Kelas</label>
                <select name="id_kelas" id="" class="form-control">';
            selectOptionIdTableId('kelas', 'kelas', 'id_kelas', 'id_guru', $_GET['id']);
            selectOptionId('kelas', 'kelas', 'id_kelas');
            echo '</select>
            </div>';
            ?>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button onclick="return confirm('Yakin Menyimpan Data??')" type="submit" name="editGuru" class="btn btn-primary">Simpan</button>

        </form>
    </div>
</div>