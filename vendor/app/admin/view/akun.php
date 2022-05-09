<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title"><span class="iconify" data-icon="ph:users-four-duotone"></span> Data Akun Siswa</h2>
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
                <button type="button" data-toggle="modal" data-target="#exampleModalAkun" class="btn btn-primary btn-sm"><span class="iconify" data-icon="akar-icons:plus"></span> Input Akun</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once "app/admin/modal/modalAkun.php";
?>
<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>username</th>
                    <th>Level</th>
                    <th>Delete Akun</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = table('tbl_akun');
                $no = 1;
                while ($row = fetch($data)) {
                    echo '<tr>
                        <td>' . $no . '</td>
                        <td>' . $row['username'] . '</td>
                        <td>' . $row['level'] . '</td>
                        <td>' . delete('delete', 'id_akun', $row['id_akun'], 'tbl_akun', 'akun') . '</td>
                    </tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>