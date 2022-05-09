<!-- Modal -->
<div class="modal fade" id="exampleModalAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Akun Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="pword">Password</label>
                        <input type="password" name="password" id="pword" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <input type="text" name="level" value="siswa" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Siswa</label>
                        <select name="id_akun" id="" class="form-control">
                            <?php
                            echo selectOptionId('siswa', 'nama', 'id_siswa');
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="createAkunSiswa" class="btn btn-primary">Simpan Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>