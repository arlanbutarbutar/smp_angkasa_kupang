<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Data Kelas</h2>
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
                <!-- <button type="button" class="btn btn-sm mr-2"><span class="fe fe-filter fe-16 text-muted"></span></button> -->
                <button type="button" data-toggle="modal" data-target="#exampleModalKelas" class="btn btn-primary btn-sm"><span class="iconify" data-icon="akar-icons:plus"></span> Input</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once "app/admin/modal/modalKelas.php";
include_once "app/admin/modal/editKelas.php";
?>
<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Jumlah Siswa</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = table('kelas');
                $no = 1;
                while ($row = mysqli_fetch_array($data)) {
                    echo '<tr>
                        <td>' . $no . '</td>
                        <td>' . $row['kelas'] . '</td>
                        <td>' . totalfieldOneCount('siswa', 'id_kelas', $row['id_kelas'], 'id_siswa') . ' / Siswa</td>
                        <td>' . edit('#editKelas', $row['id_kelas']) . '' . delete('delete', 'id_kelas', $row['id_kelas'], 'kelas', 'kelas') . '</td>
                    </tr>';
                    $no++;
                }
                ?>

            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="app/admin/js/editKelas.js"></script>