<!-- modal edit -->
<div class="modal fade" id="editSiswa" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Siswa</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="data-siswa"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" name="reset" data-dismiss="modal">Keluar</button>
                    <button onclick="return confirm('Yakin Menyimpan Data??')" type="submit" name="editSiswa" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal edit -->