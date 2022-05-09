<!-- Modal -->
<div class="modal fade" id="exampleModalGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nip</label>
                        <input type="text" name="nip" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="">Wali Kelas</label>
                        <select name="id_kelas" id="" class="form-control">
                            <?php
                            selectOptionId('kelas', 'kelas', 'id_kelas');
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="return confirm('Yakin Menyimpan Data??')" type="submit" name="inputGuru" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>