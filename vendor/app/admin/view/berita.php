<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">
            <span class="iconify" data-icon="gis:map-users"></span>
            Data Berita
        </h2>
    </div>
    <div class="col-auto">
        <form class="form-inline">
            <div class="form-group d-none d-lg-inline">
                <label for="reportrange" class="sr-only">Date Ranges</label>
                <div id="reportrange" class="px-2 py-2 text-muted">
                    <span class="small"></span>
                </div>
            </div>
            <div class="form-group">
                <button type="button" data-toggle="modal" data-target="#exampleModalBerita" class=" btn btn-primary btn-sm">
                    <span class="iconify" data-icon="akar-icons:plus"></span>
                    Input Berita
                </button>
            </div>
        </form>
    </div>
</div>

<?php
include_once "app/admin/modal/modalBerita.php";
?>
<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Pembuat</th>
                    <th>Kategori</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $table = table("tbl_berita");
                $no = 1;
                while ($row = fetch($table)) {
                    echo '<tr>
                            <td>' . $no . '</td>
                            <td>' . $row['judul'] . '</td>
                            <td>' . "<img src='app/admin/file/$row[gambar]' width='130px' height='130px'>" . '</td>
                            <td>' . potongString($row['deskripsi']) . '</td>
                            <td>' . $row['pembuat'] . '</td>
                            <td>' . $row['kategori'] . '</td>
                            <td>' . editNoneAjax("editBerita", $row['id_berita']) . '' . delete('delete', 'id_berita', $row['id_berita'], 'tbl_berita', 'berita') . '</td>
                        </tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>