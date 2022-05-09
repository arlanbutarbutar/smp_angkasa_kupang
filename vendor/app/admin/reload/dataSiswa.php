<?php
require_once "../../../public/config/function.php";
if ($_POST['idx']) {
    $id = $_POST['idx'];
    echo '<input type="hidden" name="id_siswa" value="' . $id . '">';
    echo '<div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Nisn</label>
                <input type="text" name="nisn" value="' . tableNameFieldId('siswa', 'id_siswa', $id, 'nisn') . '" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" value="' . tableNameFieldId('siswa', 'id_siswa', $id, 'nama') . '" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="">Kelas</label>
                <select name="id_kelas" class="form-control select2" id="simple-select2">';
    $id_kelas = tableNameFieldId('siswa', 'id_siswa', $id, 'id_kelas');
    echo '<option value="' . $id_kelas . '">' . tableNameFieldId('kelas', 'id_kelas', $id_kelas, 'kelas') . '</option>';
    selectOptionId("kelas", "kelas", "id_kelas");
    echo '</select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jk" id="" class="form-control">
                <option value="' . tableNameFieldId('siswa', 'id_siswa', $id, 'jk') . '">' . tableNameFieldId('siswa', 'id_siswa', $id, 'jk') . '</option>
                ';
    $jk = ['pria', 'wanita'];
    foreach ($jk as $j) {
        echo '<option value="' . $j . '">' . $j . '</option>';
    }
    echo '</select>
            </div>
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="tanggalLahir" value="' . tableNameFieldId('siswa', 'id_siswa', $id, 'tanggalLahir') . '" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" id="" cols="" rows="" class="form-control">' . tableNameFieldId('siswa', 'id_siswa', $id, 'alamat') . '</textarea>
            </div>
        </div>
    </div>';
}
