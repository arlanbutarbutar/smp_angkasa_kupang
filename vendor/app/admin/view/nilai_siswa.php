<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Data Nilai Siswa [
            <?php echo tableNameFieldId('siswa', 'id_siswa', $_GET['id'], 'nama'); ?>
            ]
            <br>
            Kelas : <?php
                    $id_kelas = tableNameFieldId('siswa', 'id_siswa', $_GET['id'], 'id_kelas');
                    echo $id_kelas;
                    ?>
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
                <a href="app/admin/excell/dataNilaiSiswa.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success btn-sm" target="blank">Export Excell</a>
                <a href="index.php?viewAdmin=nilai" class="btn btn-danger btn-sm"><span class="iconify" data-icon="akar-icons:arrow-back-thick"></span> Kembali</a>
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#inputNilai">Input Nilai</a>
            </div>
        </form>
    </div>
</div>

<?php
include_once 'app/admin/modal/modalNilaiSiswa.php';
?>

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <?php
                        $jenisNilai = ['Nilai Harian', 'Nilai Tugas 1', 'Nilai Tugas 2', 'Nilai Tugas 3', 'Nilai Ulangan 1', 'Nilai Ulangan 2', 'Nilai Ulangan 3', 'Nilai Mith', 'Nilai Semester'];
                        foreach ($jenisNilai as $jn) {
                            echo '<th>' . $jn . '</th>';
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = tableId('tbl_mapel', 'id_kelas', $id_kelas);
                    while ($row = fetch($data)) {

                        echo '<tr>
                        <td>' . $row['mapel'] . '</td>';
                        $jenisNilai = ['Nilai Harian', 'Nilai Tugas 1', 'Nilai Tugas 2', 'Nilai Tugas 3', 'Nilai Ulangan 1', 'Nilai Ulangan 2', 'Nilai Ulangan 3', 'Nilai Mith', 'Nilai Semester'];
                        foreach ($jenisNilai as $jn) {
                            // check Nilai 
                            $check = tableIdThree('tbl_nilai', 'id_siswa', $_GET['id'], 'id_mapel', $row['id_mapel'], 'jenisNilai', $jn);
                            if (row($check) > 0) {
                                $id_nilai = tableIdAndField('tbl_nilai', 'id_siswa', $_GET['id'], 'id_mapel', $row['id_mapel'], 'id_nilai');
                                $nilai = tableIdAndField('tbl_nilai', 'id_siswa', $_GET['id'], 'id_mapel', $row['id_mapel'], 'nilai');
                                $jenisNilai = tableIdAndField('tbl_nilai', 'id_siswa', $_GET['id'], 'id_mapel', $row['id_mapel'], 'jenisNilai');
                                $del = '<a href="index.php?deleteAdmin=deleteNilai&&id=' . $id_nilai . '&&id_siswa=' . $_GET['id'] . '&&jenisNilai=' . $jn . '" class="badge badge-danger">Delete </a>';
                            } else {
                                $id_nilai = '';
                                $nilai = '';
                                $jenisNilai = '';
                                $del = '';
                            }
                            echo '<td>' . tableIdThreeField('tbl_nilai', 'id_mapel', $row['id_mapel'], 'id_siswa', $_GET['id'], 'jenisNilai', $jn, 'nilai') . '' . $del . '</td>';
                        }
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>







<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="app/admin/js/inputNilai.js"></script>