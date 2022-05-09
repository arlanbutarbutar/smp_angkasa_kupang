<?php
require_once "../../../public/config/function.php";
if ($_POST['idx']) {
    $id = $_POST['idx'];
    echo '<input type="hidden" name="id_spp" value="' . $id . '">';
    echo '<div class="form-group">
        <label for="">Biaya SPP</label>
        <input type="number" name="biaya" value="' . tableNameFieldId('spp', 'id_spp', $id, 'biaya') . '" class="form-control" required />
    </div>';
}
