<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Data Mapel</h2>
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
                <button type="button" data-toggle="modal" data-target="#inputMapel" class="btn btn-primary btn-sm"><span class="iconify" data-icon="akar-icons:plus"></span> Input</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once "app/admin/modal/modalMapel.php";
?>
<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                <tr>
                    <td>No</td>
                    <td>MataPelajaran</td>
                    <td>Kelas</td>
                    <td>Menu</td>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php
                $mapel = table('tbl_mapel');
                $no = 1;
                while ($row = fetch($mapel)) {
                    echo '<tr>
                <td>' . $no . '</td>
                <td>' . $row['mapel'] . '</td>
                <td>' . tableNameFieldId('kelas', 'id_kelas', $row['id_kelas'], 'kelas') . '</td>';
                    echo "<td><a href='index.php?viewAdmin=edit_mapel&&id=$row[id_mapel]' class='btn btn-success btn-sm'><i class='fa fa-edit'></i> Edit</a> 
                        <a href='index.php?viewAdmin=hapus_mapel&&id=$row[id_mapel]' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> Delete</a></td>
                </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>