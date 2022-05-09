<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">
            <span class="iconify" data-icon="ant-design:file-outlined"></span>
            Data Nilai [<?php echo tableNameFieldId('siswa', 'id_siswa', $_SESSION['id_siswa'], 'nama'); ?>]
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
            </div>
        </form>
    </div>
</div>
<?php
$id_kelas = tableNameFieldId('siswa', 'id_siswa', $_SESSION['id_siswa'], 'id_kelas');
?>
<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <?php
            $checkVeriv = tableIdAnd('konfirmasi', 'id_kelas', $id_kelas, 'status', 'selesai');
            tableId('konfirmasi', 'id_kelas', $id_kelas);
            if (row($checkVeriv) > 0) {
                $data = tableId('tbl_mapel', 'id_kelas', $id_kelas);
                while ($row = fetch($data)) {
                    // check Nilai 
                    $check = tableIdAnd('tbl_nilai', 'id_siswa', $_SESSION['id_siswa'], 'id_mapel', $row['id_mapel']);
                    if (row($check) > 0) {
                        $nilai = tableIdAndField('tbl_nilai', 'id_siswa', $_SESSION['id_siswa'], 'id_mapel', $row['id_mapel'], 'nilai');
                    } else {
                        $nilai = '';
                    }
                    echo '<tr>
                        <td>' . $row['mapel'] . '</td>
                        <td>' . $nilai . '</td>
                    </tr>';
                }
            } else {
                echo '<tr>
                <td colspan="2">Data Nilai Masih Proses</td>
                </tr>';
            }
            ?>
        </table>
    </div>
</div>