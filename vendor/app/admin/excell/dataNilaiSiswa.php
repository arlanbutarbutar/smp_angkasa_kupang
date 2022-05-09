<?php
require_once "../../../public/config/function.php";
$id_kelas = tableNameFieldId('siswa', 'id_siswa', $_GET['id'], 'id_kelas');
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Nilai Siswa Excell.xls");
?>
<center>
    <h3>Data Nilai </h3>
    <?php echo tableNameFieldId('siswa', 'id_siswa', $_GET['id'], 'nama'); ?>
</center>
<table border="1">
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
            $jenisNilai = ['Nilai Harian', 'Nilai Tugas 1', 'Nilai Tugas 2', 'Nilai Tugas 3', 'Nilai Ulangan 1', 'Nilai Ulangan 2', 'Nilai Ulangan 3', 'Nilai MID', 'Nilai Semester'];
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
                echo '<td>' . tableIdThreeField('tbl_nilai', 'id_mapel', $row['id_mapel'], 'id_siswa', $_GET['id'], 'jenisNilai', $jn, 'nilai') . '' . "" . '</td>';
            }
            echo '</tr>';
        }
        ?>
    </tbody>
</table>