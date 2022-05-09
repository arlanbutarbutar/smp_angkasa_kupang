<!-- Modal -->
<div class="modal fade" id="exampleModalAbsen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Absensi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_guru" value="<?php echo $_SESSION['id_siswa']; ?>">
                    <?php
                    $id_kelas = tableNameFieldId('guru', 'id_guru', $_SESSION['id_siswa'], 'id_kelas');
                    ?>
                    <div class="form-group">
                        <select name="id_siswa" id="" class="form-control">
                            <?php
                            echo selectOptionIdTableId('siswa', 'nama', 'id_siswa', 'id_kelas', $id_kelas);
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_mapel" id="" class="form-control">
                            <?php
                            if (!empty($_GET['id'])) {
                                echo '<option value="' . $_SESSION['id_mapel'] . '">' . tableNameFieldId('tbl_mapel', 'id_mapel', $_SESSION['id_mapel'], 'mapel') . '</option>';
                            } else {
                                selectOptionIdTableId('tbl_mapel', 'mapel', 'id_mapel', 'id_kelas', $id_kelas);
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="hari" id="" class="form-control">
                            <?php
                            foreach (hari() as $h) {
                                echo '<option value="' . day() . '">' . day() . '</option>';
                                echo '<option value="' . $h . '">' . $h . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="date" name="tanggal" value="<?php echo dateNow(); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <select name="status" id="" class="form-control">
                            <?php
                            $status = ['hadir', 'izin', 'sakit', 'alpha'];
                            foreach ($status as $s) {
                                echo '<option value="' . $s . '">' . $s . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="Inputabsensi" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>