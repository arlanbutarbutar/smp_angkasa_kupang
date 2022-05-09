<?php
require_once "../../../public/config/function.php";
if ($_POST['idx']) {
    $id = $_POST['idx'];
    echo '<input type="hidden" name="id_kas" value="' . $id . '">';
    echo '<div class="form-group">
    <label for="">Nominal</label>
        <input type="number" name="nominal" value="' . tableNameFieldId('kas', 'id_kas', $id, 'nominal') . '" class="form-control">
    </div>
    <div class="form-group">
    <label for="">Jenis</label>
    <select name="jenis" id="" class="form-control form-control-sm">
        <option value="' . tableNameFieldId('kas', 'id_kas', $id, 'jenis') . '">' . tableNameFieldId('kas', 'id_kas', $id, 'jenis') . '</option>
    </select>
    </div>';
}
