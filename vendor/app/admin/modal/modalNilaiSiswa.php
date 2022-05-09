<!-- modal edit -->
<div class="modal fade" id="inputNilai" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-edit"></i>Input Nilai Siswa</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <!-- <div class="data-siswa"></div> -->
                    <input type="hidden" name="id_siswa" value="<?php echo $_GET['id']; ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mata Pelajaran</label>
                        <select name="id_mapel" id="id_mapel" class="form-control">
                            <?php
                            selectOptionIdTableId('tbl_mapel', 'mapel', 'id_mapel', 'id_kelas', $id_kelas);
                            ?>
                        </select>
                    </div>

                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kelompok</label>
                        <select name="jenis_kelompok" id="jenis_kelompok" class="form-control" required>
                            <option value=""> -- Jenis Kelompok -- </option>
                            <option value="KL.3">KL.3</option>
                            <option value="KL.4">KL.4</option>
                        </select>
                    </div> -->

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nilai</label>
                        <input type="text" name="nilai" id="nilai" class="form-control" placeholder="Nilai..." required />
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Nilai</label>
                        <select name="jenisNilai" id="" class="form-control">
                            <?php
                            $jenisNilai = ['Nilai Harian', 'Nilai Tugas 1', 'Nilai Tugas 2', 'Nilai Tugas 3', 'Nilai Ulangan 1', 'Nilai Ulangan 2', 'Nilai Ulangan 3', 'Nilai Mith', 'Nilai Semester'];
                            foreach ($jenisNilai as $jn) {
                                echo '<option value="' . $jn . '">' . $jn . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" name="reset" data-dismiss="modal">Keluar</button>
                    <button onclick="return confirm('Yakin Mengedit Data??')" type="submit" name="input_nilai" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal edit -->