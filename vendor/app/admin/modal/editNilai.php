<!-- modal edit -->
<div class="modal fade" id="inputNilai" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">
                    <i class="fa fa-edit"></i>
                    Form Nilai <br>
                    [<?php echo tableNameFieldId("tbl_bulan", "id_bulan", month(), "bulan"); ?> / <?php echo year(); ?>]
                </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="data-nilai"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" name="reset" data-dismiss="modal">Keluar</button>
                    <button onclick="return confirm('Yakin Menyimpan Data??')" type="submit" name="input_nilai" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal edit -->