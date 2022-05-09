<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Data Nilai </h2>
    </div>
    <div class="col-auto">

        <div class="form-group d-none d-lg-inline">
            <label for="reportrange" class="sr-only">Date Ranges</label>
            <div id="reportrange" class="px-2 py-2 text-muted">
                <span class="small"></span>
            </div>
        </div>
        <div class="form-group">
            <form action="" method="POST">
                <select name="id_kelas" id="" class="form-control" onchange="this.form.submit();">
                    <option value=""> -- Pilih Kelas -- </option>
                    <?php echo selectOptionId('kelas', 'kelas', 'id_kelas'); ?>
                </select>
            </form>
            <!-- <button type="button" data-toggle="modal" data-target="#exampleModalGuru" class="btn btn-primary btn-sm"><span class="iconify" data-icon="akar-icons:plus"></span> Input</button> -->
        </div>

    </div>
</div>

<?php
if (isset($_POST['id_kelas'])) {
    $id_kelas = $_POST['id_kelas'];
    echo 'Hasil Pencarian Kelas: ' . tableNameFieldId("kelas", "id_kelas", $_POST['id_kelas'], "kelas");
    echo '<br>';
    echo '<a href="index.php?viewAdmin=nilai" class="btn btn-success btn-sm"><span class="iconify" data-icon="cil:reload"></span> Reload</a>';
    echo '<br><br>';
} else {
    $id_kelas = 1;
}
?>

<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Kelas</th>
                    <th colspan="<?php echo rowStableId('tbl_mapel', 'id_kelas', $id_kelas); ?>">
                        <center>
                            Mata Pelajaran
                        </center>
                    </th>
                    <th rowspan="2">Menu</th>
                </tr>
                <tr>
                    <?php
                    $mapel = tableId('tbl_mapel', 'id_kelas', $id_kelas);
                    while ($rowMap = fetch($mapel)) {
                        echo '<th>' . $rowMap['mapel'] . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = tableId('siswa', 'kelompokKelas', $id_kelas);
                $no = 1;
                while ($row = fetch($data)) {
                    echo '<tr>
                    <td>' . $no . '</td>
                    <td>' . $row['nama'] . '</td>
                    <td>' . tableNameFieldId("kelas", "id_kelas", $row['id_kelas'], "kelas") . '</td>';
                    $mapel = tableId('tbl_mapel', 'id_kelas', $id_kelas);
                    while ($rowMap = fetch($mapel)) {
                        echo '<td>' . tableIdAndField('tbl_nilai', 'id_mapel', $rowMap['id_mapel'], 'id_siswa', $row['id_siswa'], 'nilai') . '</td>';
                    }
                    echo '<td>';
                    if ($_SESSION['level'] == "guru") {
                        echo '<a href="index.php?viewAdmin=nilai_siswa&&id=' . $row['id_siswa'] . '" class="btn btn-success btn-sm">
                    <span class="iconify" data-icon="bi:pencil-square"></span>
                     Nilai
                     </a>';
                    }
                    echo '</td>
                    </tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>