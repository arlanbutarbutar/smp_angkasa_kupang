<!-- Modal -->
<div class="modal fade" id="exampleModalConfir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
                        <label for="">Select</label>
                        <select name="status" id="" class="form-control">
                            <?php
                            $status = ['proses', 'revisi', 'selesai'];
                            foreach ($status as $s) {
                                echo '<option value="' . $s . '">' . $s . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="simpanKonfirmasi" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>