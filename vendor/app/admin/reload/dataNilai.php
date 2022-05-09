<?php
require_once "../../../public/config/function.php";
if ($_POST['idx']) {
    $id = $_POST['idx'];
    echo '<input type="hidden" name="id_siswa" value="' . $id . '">';
    echo '<div class="form-group">
            <label for="">Mata Pelajaran</label>
            <select name="id_mapel" id="" class="form-control">';
    selectOptionIdTableId('tbl_mapel', 'mapel', 'id_mapel', 'id_mapel', $_SESSION['get']);
    echo '</select>
        </div>
        <div class="form-group">
        <label for="">Nilai</label>
        <input type="text" name="nilai" id="nilai" class="form-control" placeholder="Nilai..." required />
    </div>';
}
