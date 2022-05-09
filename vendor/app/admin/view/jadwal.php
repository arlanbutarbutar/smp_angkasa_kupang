<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title"><span class="iconify" data-icon="bx:time-five"></span> Data Jadwal</h2>
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
                if ($_SESSION['level'] == "admin") {
                    echo '<button type="button" data-toggle="modal" data-target="#exampleModalJadwal" class="btn btn-primary btn-sm">
                    <span class="iconify" data-icon="akar-icons:plus"></span>
                     Input
                     </button>';
                }
                ?>
            </div>
        </form>
    </div>
</div>

<?php
include_once "app/admin/modal/modalJadwal.php";
?>

<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <td>Matapelajaran</td>
                    <td>Guru</td>
                    <td>Kelas</td>
                    <td>Ruang</td>
                    <td>Waktu</td>
                    <td>hari</td>
                    <td>jam</td>
                    <td>Menu</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = table('jadwal');
                while ($row = fetch($data)) {
                    if ($_SESSION['level'] == "guru") {
                        $menu = '<a href="index.php?viewAdmin=masukJadwal&&id=' . $row['id_jadwal'] . '" class="btn btn-light">
                        <span class="iconify" data-icon="ant-design:rotate-right-outlined"></span>
                        Masuk
                        </a>';
                        $del = '';
                    } else {
                        $menu = '';
                        $del = delete('delete', 'id_jadwal', $row['id_jadwal'], 'jadwal', 'jadwal');
                    }
                    echo '<tr>
                    <td>' . tableNameFieldId('tbl_mapel', 'id_mapel', $row['id_mapel'], 'mapel') . '</td>
                    <td>' . tableNameFieldId('guru', 'id_guru', $row['id_guru'], 'nama') . '</td>
                    <td>' . tableNameFieldId('kelas', 'id_kelas', $row['id_kelas'], 'kelas') . '</td>
                    <td>' . $row['ruang'] . '</td>
                    <td>' . $row['lama_mengajar'] . '/ Jam</td>
                    <td>' . $row['hari'] . '</td>
                    <td>' . $row['jam'] . '</td>
                    <td>' . $menu . '' . $del . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="app/admin/js/editKas.js"></script>