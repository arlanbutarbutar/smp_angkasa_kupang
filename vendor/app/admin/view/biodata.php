<div class="card shadow mb-4">
    <div class="card-body">
        <h2 class="h3 mb-4 page-title">Biodata Siswa [<?php echo tableNameFieldId('siswa', 'id_siswa', $_SESSION['id_siswa'], 'nama'); ?>]</h2>
        <form action="" method="POST">
            <div class="row">
                <div class="col-6">
                    <input type="hidden" name="id_siswa" value="<?php echo tableNameFieldId('siswa', 'id_siswa', $_SESSION['id_siswa'], 'id_siswa'); ?>">
                    <div class="form-group">
                        <label for="">Nisn</label>
                        <input type="text" name="nisn" value="<?php echo tableNameFieldId('siswa', 'id_siswa', $_SESSION['id_siswa'], 'nisn'); ?>" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="<?php echo tableNameFieldId('siswa', 'id_siswa', $_SESSION['id_siswa'], 'nama'); ?>" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="id_kelas" class="form-control select2" id="simple-select2">
                            <?php
                            $id_kelas = tableNameFieldId('siswa', 'id_siswa', $_SESSION['id_siswa'], 'id_kelas');
                            ?>
                            <option value="<?php echo $id_kelas; ?>"><?php echo tableNameFieldId('kelas', 'id_kelas', $id_kelas, 'kelas'); ?></option>
                        </select>
                    </div>
                    <button onclick="return confirm('Yakin Menyimpan Data??')" name="editSiswa" type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <option value="<?php echo tableNameFieldId('siswa', 'id_siswa', $_SESSION['id_siswa'], 'jk'); ?>"><?php echo tableNameFieldId('siswa', 'nama', $_SESSION['username'], 'jk'); ?></option>
                            <?php
                            $jk = ['pria', 'wanita'];
                            foreach ($jk as $j) {
                                echo '<option value="' . $j . '">' . $j . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="tanggalLahir" value="<?php echo tableNameFieldId('siswa', 'id_siswa', $_SESSION['id_siswa'], 'tanggalLahir'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" cols="" rows="" class="form-control"><?php echo tableNameFieldId('siswa', 'id_siswa', $_SESSION['id_siswa'], 'alamat'); ?></textarea>
                    </div>
                </div>
        </form>
    </div>
</div>