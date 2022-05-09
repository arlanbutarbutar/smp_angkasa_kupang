<?php
require_once "../../../public/config/function.php";
if ($_POST['idx']) {
    $id = $_POST['idx'];
    $id_kelas = tableNameFieldId('siswa', 'id_siswa', $id, 'id_kelas');
    $kelompokKelas = tableNameFieldId('kelas', 'id_kelas', $id_kelas, 'kelompok');
    $spp = tableNameFieldId('spp', 'kelompokKelas', $kelompokKelas, 'biaya');
    echo '<input type="hidden" name="id_siswa" value="' . $id . '">';
    echo '<input type="hidden" value="' . month() . '" name="bulan">';
    echo '<input type="hidden" value="' . year() . '" name="tahun">';
    echo '<div class="form-group">
        <label for="">Nisn</label>
        <input type="text" name="nisn" value="' . tableNameFieldId('siswa', 'id_siswa', $id, 'nisn') . '" class="form-control" disabled />
    </div>
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" name="nama" value="' . tableNameFieldId('siswa', 'id_siswa', $id, 'nama') . '" class="form-control" disabled />
    </div>';
    echo '<div class="form-group">
    <label for="">Biaya SPP</label>
    <input type="text" value="' . rupiah($spp) . '" class="form-control" disabled/>
    </div>';
}
