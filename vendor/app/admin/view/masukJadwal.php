<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Data Jadwal Mengajar MataPelajaran
            [<?php
                $id_kelas = tableNameFieldId('guru', 'id_guru', $_SESSION['id_siswa'], 'id_kelas');
                $id_mapel = tableNameFieldId('jadwal', 'id_jadwal', $_GET['id'], 'id_mapel');
                $_SESSION['id_mapel'] = $id_mapel;
                $_SESSION['get'] = $id_mapel;
                $id_guru = tableNameFieldId('jadwal', 'id_jadwal', $_GET['id'], 'id_guru');
                echo tableNameFieldId('tbl_mapel', 'id_mapel', $id_mapel, 'mapel');
                ?> ]
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
                <a href="index.php?viewAdmin=jadwal" class="btn btn-danger btn-sm"><span class="iconify" data-icon="akar-icons:arrow-back-thick"></span> Kembali</a>
                &nbsp;
                <?php
                if ($_SESSION['level'] == "guru") {
                    echo '<button type="button" data-toggle="modal" data-target="#exampleModalAbsen" class="btn btn-primary btn-sm"><span class="iconify" data-icon="akar-icons:plus"></span> Input Absen</button>';
                }
                ?>
            </div>
        </form>
    </div>
</div>

<?php
include_once "app/admin/modal/absenSiswa.php";
include_once "app/admin/modal/editNilai.php";
echo "Hari Ini :" . day() . "<br>";
echo '<span class="iconify" data-icon="fa-solid:chalkboard-teacher"></span>  ' . "Guru :" . tableNameFieldId('guru', 'id_guru', $id_guru, 'nama');
?>

<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <th>Siswa</th>
                <th>Mapel</th>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php
                $data = tableId('siswa', 'id_kelas', $id_kelas);
                while ($row = fetch($data)) {
                    $id_absen = tableNameFieldId('absensi', 'id_guru', $id_guru, 'id_absen');
                    echo '<tr>
                    <td>' . $row['nama'] . '</td>
                    <td>' . tableNameFieldId('tbl_mapel', 'id_mapel', $id_mapel, 'mapel') . '</td>
                    <td>' . day() . '</td>
                    <td>' . dateNow() . '</td>
                    <td>
                    ' . tableIdThreeField('absensi', 'id_guru', $id_guru, 'id_siswa', $row['id_siswa'], 'id_mapel', $id_mapel, 'status') . '
                    </td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="app/admin/js/inputNilai.js"></script>