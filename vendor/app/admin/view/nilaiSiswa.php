<?php
$id_kelas = tableNameFieldId('guru', 'id_guru', $_SESSION['id_siswa'], 'id_kelas');
?>
<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">
            <span class="iconify" data-icon="ant-design:file-outlined"></span>
            Data Nilai Siswa Kelas <?php echo tableNameFieldId('kelas', 'id_kelas', $id_kelas, 'kelas'); ?>
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
include_once "app/admin/modal/modalKonfirmasi.php";
?>

<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Kelas</th>
                    <th colspan="<?php echo rowStableId('tbl_mapel', 'id_kelas', '1'); ?>">
                        <center>
                            Mata Pelajaran
                        </center>
                    </th>
                </tr>
                <tr>
                    <?php
                    $mapel = tableId('tbl_mapel', 'id_kelas', 1);
                    while ($rowMap = fetch($mapel)) {
                        echo '<th>' . $rowMap['mapel'] . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php

                $data = tableId('siswa', 'kelompokKelas', 1);
                $no = 1;
                while ($row = fetch($data)) {
                    echo '<tr>
                    <td>' . $no . '</td>
                    <td>' . $row['nama'] . '</td>
                    <td>' . tableNameFieldId('kelas', 'id_kelas', $row['id_kelas'], 'kelas') . '</td>';
                    $mapel = tableId('tbl_mapel', 'id_kelas', 1);
                    while ($rowMap = fetch($mapel)) {
                        echo '<td>' . tableIdAndField('tbl_nilai', 'id_mapel', $rowMap['id_mapel'], 'id_siswa', $row['id_siswa'], 'nilai') . '</td>';
                    }
                    echo '<td>
                    <a href="index.php?viewAdmin=nilai_siswa&id=' . $row['id_siswa'] . '" class="btn btn-success btn-sm">
                    <span class="iconify" data-icon="bi:pencil-square"></span>
                     Nilai
                     </a></td>
                    </tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>