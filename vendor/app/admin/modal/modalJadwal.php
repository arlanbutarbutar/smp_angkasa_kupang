<!-- Modal -->
<div class="modal fade" id="exampleModalJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Mata Pelajaran</label>
                                <select name="id_mapel" id="" class="form-control">
                                    <?php echo selectOptionId('tbl_mapel', 'mapel', 'id_mapel'); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="id_kelas" id="" class="form-control">
                                    <?php echo selectOptionId('kelas', 'kelas', 'id_kelas'); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Ruang</label>
                                <input type="text" name="ruang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Guru</label>
                                <select name="id_guru" id="" class="form-control">
                                    <?php echo selectOptionId('guru', 'nama', 'id_guru'); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Lama Mengajar</label>
                                <input type="number" name="lama_mengajar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">hari</label>
                                <select name="hari" id="" class="form-control">
                                    <?php
                                    foreach (hari() as $h) {
                                        echo '<option value="' . $h . '">' . $h . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jam</label>
                                <input type="time" name="jam" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="inputJadwal" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>