<?php
require_once "../../../public/config/function.php";
if ($_POST['idx']) {
    $id = $_POST['idx'];
    echo '<input type="hidden" name="id_kelas" value="' . $id . '">';
    echo '<div class="form-group">
            <label for="">Kelas Baru</label>
            <input type="text" name="kelas" value="' . tableNameFieldId('kelas', 'id_kelas', $id, 'kelas') . '" class="form-control" required />
        </div>
        <div class="form-group">
            <label for="">Kelompok Kelas</label>
            <select name="kelompok" id="" class="form-control">
            <option value="' . tableNameFieldId('kelas', 'id_kelas', $id, 'kelompok') . '">' . tableNameFieldId('kelas', 'id_kelas', $id, 'kelompok') . '</option>
            ';
    $kelompok = [1, 2, 3];
    foreach ($kelompok as $kel) {
        echo '<option value="' . $kel . '">' . $kel . '</option>';
    }
    echo '</select>
        </div>';
}
