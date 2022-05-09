<!-- Modal -->
<div class="modal fade" id="exampleModalBerita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" name="judul" class="form-control" placeholder="Isi Judul Berita" required />
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="file" class="form-control" required />
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="deskripsi" id="editor" cols="0" rows="0" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="kategori" id="kategori" class="select2 form-control custom-select">
                                    <?php
                                    selectOption("tbl_kategori", "kategori");
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="inputBerita" class="btn btn-primary">Simpan Berita</button>
                </div>
            </form>
        </div>
    </div>
</div>