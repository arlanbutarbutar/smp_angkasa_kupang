<?php
$id_kelas = $_GET['id'];
?>
<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">
            <span class="iconify" data-icon="ant-design:file-outlined"></span>
            Data Nilai Siswa Kelas <?php echo tableNameFieldId('kelas', 'id_kelas', $id_kelas, 'kelas'); ?>
        </h2>
        <?php
        $check = tableId('konfirmasi', 'id_kelas', $id_kelas);
        if (row($check) > 0) {
            $row = fetch($check);
            if ($row['status'] == "proses") {
                $icon = '<span class="iconify" data-icon="eos-icons:loading"></span>';
                $btn = 'warning';
            } else
            if ($row['status'] == "revisi") {
                $icon = '<span class="iconify" data-icon="clarity:cancel-line"></span>';
                $btn = 'danger';
            } else {
                $icon = '<span class="iconify" data-icon="icon-park-outline:database-success"></span>';
                $btn = 'success';
            }
            echo '<a href="" class="btn btn-' . $btn . ' btn-sm">' . $icon . '' . $row['status'] . '</a>';
        }
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
                $menu = ['revisi', 'selesai'];
                foreach ($menu as $m) {
                    echo '<a href="index.php?deleteAdmin=kirimVerivnilai&&id=' . $id_kelas . '&&status=' . $m . '" class="btn btn-primary btns-m">
                    <span class="iconify" data-icon="icon-park:click-tap-two"></span>
                    Kirim ' . $m . '
                </a>
                &nbsp;';
                }
                ?>

            </div>
        </form>
    </div>
</div>

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
                $data = tableId('siswa', 'id_kelas', $id_kelas);
                $no = 1;
                while ($row = fetch($data)) {
                    echo '<tr>
                    <td>' . $no . '</td>
                    <td>' . $row['nama'] . '</td>
                    <td>' . tableNameFieldId('kelas', 'id_kelas', $row['id_kelas'], 'kelas') . '</td>';
                    $mapel = tableId('tbl_mapel', 'id_kelas', $id_kelas);
                    while ($rowMap = fetch($mapel)) {
                        echo '<td>' . tableIdAndField('tbl_nilai', 'id_mapel', $rowMap['id_mapel'], 'id_siswa', $row['id_siswa'], 'nilai') . '</td>';
                    }
                    echo '</tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>