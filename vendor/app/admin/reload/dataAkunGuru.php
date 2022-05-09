<?php
require_once "../../../public/config/function.php";
if ($_POST['idx']) {
    $id = $_POST['idx'];
    $cek = tableIdAnd('tbl_akun', 'level', 'guru', 'id_siswa', $id);
    if (row($cek) > 0) {
        $label = 'Edit';
    } else {
        $label = 'Buat';
    }
    echo '<input type="hidden" name="id_akun" value="' . $id . '">';
    echo '<div class="col-md-12 form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control">
    </div>
    <div class="col-md-12 form-group">
        <label for="pword">Password</label>
        <input type="password" name="password" id="pword" class="form-control">
    </div>
    <div class="col-md-12 form-group">
        <label for="pword">Password</label>
        <input type="text" name="level" value="guru" class="form-control">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" name="reset" data-dismiss="modal">Keluar</button>
        <button type="submit" name="createAkunGuru" class="btn btn-primary">
            ' . $label . '
        </button>
    </div>';
}
