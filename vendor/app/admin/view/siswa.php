<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title"><span class="iconify" data-icon="ph:users-four-duotone"></span> Data Siswa</h2>
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
                    echo '<button type="button" data-toggle="modal" data-target="#exampleModalSiswa" class="btn btn-primary btn-sm"><span class="iconify" data-icon="akar-icons:plus"></span> Input</button>';
                }
                ?>
            </div>
        </form>
    </div>
</div>
<?php
include_once "app/admin/modal/modalSiswa.php";
include_once "app/admin/modal/editSiswa.php";
?>
<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nisn</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SESSION['level'] == "guru") {
                    $id_kelas = tableNameFieldId('guru', 'id_guru', $_SESSION['id_siswa'], 'id_kelas');
                    $data = tableId('siswa', 'id_kelas', $id_kelas);
                } else {
                    $data = table('siswa');
                }
                $no = 1;
                while ($row = mysqli_fetch_array($data)) {
                    echo '<tr>
                        <td>' . $no . '</td>
                        <td>' . $row['nisn'] . '</td>
                        <td>' . $row['nama'] . '</td>
                        <td>' . tableNameFieldId("kelas", "id_kelas", $row['id_kelas'], "kelas") . '</td>
                        <td>' . $row['jk'] . '</td>
                        <td>' . $row['tanggalLahir'] . '</td>
                        <td>' . $row['alamat'] . '</td>
                        <td>' . edit('#editSiswa', $row['id_siswa']) . '' . delete('delete', 'id_siswa', $row['id_siswa'], 'siswa', 'siswa') . '</td>
                    </tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="app/admin/js/editSiswa.js"></script>