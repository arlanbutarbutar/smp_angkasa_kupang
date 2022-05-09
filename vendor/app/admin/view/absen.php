<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Data Absensi</h2>
        <?php
        $id_kelas = tableNameFieldId('guru', 'id_guru', $_SESSION['id_siswa'], 'id_kelas');
        ?>
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
                <?php
                if ($_SESSION['level'] == "guru") {
                    // echo '<button type="button" data-toggle="modal" data-target="#exampleModalAbsen" class="btn btn-primary btn-sm"><span class="iconify" data-icon="akar-icons:plus"></span> Input Absen</button>';
                }
                ?>
            </div>
        </form>
    </div>
</div>
<?php
include_once "app/admin/modal/absenSiswa.php";
?>
<div class="row">
    <div class="col-md">
        <form action="" method="POST">
            <select name="id_mapel" id="" class="form-control" onchange="this.form.submit();">
                <option value=""> -- Mata Pelajaran -- </option>
                <?php
                if ($_SESSION['level'] == "admin") {
                    echo selectOptionId('tbl_mapel', 'mapel', 'id_mapel');
                } else {
                    echo selectOptionIdTableId('tbl_mapel', 'mapel', 'id_mapel', 'id_kelas', $id_kelas);
                }
                ?>
            </select>
        </form>
    </div>
    <div class="col-md">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md">
                    <input type="date" name="tanggal" class="form-control">

                </div>
                <div class="col-md">
                    <button type="submit" name="cariTanggal" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>
<br>

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
                if (isset($_POST['id_mapel'])) {
                    echo 'Mata Pelajaran : ' . tableNameFieldId('tbl_mapel', 'id_mapel', $_POST['id_mapel'], 'mapel');
                    $data = tableId('absensi', 'id_mapel', $_POST['id_mapel']);
                } else
                if (isset($_POST['cariTanggal'])) {
                    echo 'Tanggal Pencarian ' . $_POST['tanggal'];
                    $data = tableId('absensi', 'tanggal', $_POST['tanggal']);
                } else {
                    $data = tableId('absensi', 'id_kelas', $id_kelas);
                }
                // tableIdAnd('absensi', 'id_kelas', $id_kelas, 'tanggal', dateNow());
                while ($row = fetch($data)) {
                    echo '<tr>
                    <td>' . tableNameFieldId('siswa', 'id_siswa', $row['id_siswa'], 'nama') . '</td>
                    <td>' . tableNameFieldId('tbl_mapel', 'id_mapel', $row['id_mapel'], 'mapel') . '</td>
                    <td>' . $row['hari'] . '</td>
                    <td>' . $row['tanggal'] . '</td>
                    <td>' . $row['status'] . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>