<!-- Modal -->
<div class="modal fade" id="exampleModalKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kelas Baru</label>
                        <input type="text" name="kelas" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="">Kelompok Kelas</label>
                        <select name="kelompok" id="" class="form-control">
                            <?php
                            $kelompok = [1, 2, 3];
                            foreach ($kelompok as $kel) {
                                echo '<option value="' . $kel . '">' . $kel . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="simpanKelas" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>