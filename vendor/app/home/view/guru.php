<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Data Guru</h2>
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
                <button type="button" data-toggle="modal" data-target="#exampleModalGuru" class="btn btn-primary btn-sm"><span class="iconify" data-icon="akar-icons:plus"></span> Input</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once "app/admin/modal/modalGuru.php";
include_once "app/admin/modal/modalAkunGuru.php";
?>
<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered table-info text-gray-600" style="width:80%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nip</th>
                    <th>Nama</th>
                    <th>WaliKelas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = table('guru');
                $no = 1;
                while ($row = fetch($data)) {
                    echo '<tr>
                    <td>' . $no . '</td>
                    <td>' . $row['nip'] . '</td>
                    <td>' . $row['nama'] . '</td>
                    <td>' . tableNameFieldId('kelas', 'id_kelas', $row['id_kelas'], 'kelas') . '</td>
                    </tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="app/admin/js/editGuru.js"></script>
<script src="app/admin/js/akunGuru.js"></script>