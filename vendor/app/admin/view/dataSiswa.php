<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Data Pembayaran SPP Siswa / Kelas <?php echo tableNameFieldId("kelas", "id_kelas", $_GET['id'], "kelas"); ?> / Bulan [<?php echo tableNameFieldId("tbl_bulan", "id_bulan", month(), "bulan"); ?> / <?php echo year(); ?>]</h2>
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
                <button type="button" class="btn btn-sm mr-2"><span class="fe fe-filter fe-16 text-muted"></span></button>
                <button type="button" data-toggle="modal" data-target="#exampleModalPembayaran" class="btn btn-primary btn-sm"><span class="iconify" data-icon="akar-icons:plus"></span> Input</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once "app/admin/modal/modalPembayaran.php";
include_once "app/admin/modal/bayarSpp.php";
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
                    <th>Pembayaran [<?php echo tableNameFieldId("tbl_bulan", "id_bulan", month(), "bulan"); ?>]</th>
                    <th>Tanggal Bayar</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = tableId('siswa', 'id_kelas', $_GET['id']);
                $no = 1;
                while ($row = mysqli_fetch_array($data)) {
                    $pembayaran = tableIdThree("pembayaran", 'id_siswa', $row['id_siswa'], 'bulan', month(), 'tahun', year());
                    if (mysqli_num_rows($pembayaran) > 0) {
                        $statusPembayaran = "Lunas";
                        $dataPem = mysqli_fetch_array($pembayaran);
                        $tggalPembayaran = $dataPem['tgglPembayaran'];
                        $menu = '';
                    } else {
                        $statusPembayaran = "Belum";
                        $tggalPembayaran = '';
                        $menu = '' . bayarSpp("#bayar_spp", $row['id_siswa']) . '';
                    }
                    echo '<tr>
                        <td>' . $no . '</td>
                        <td>' . $row['nisn'] . '</td>
                        <td>' . $row['nama'] . '</td>
                        <td>' . tableNameFieldId("kelas", "id_kelas", $row['id_kelas'], "kelas") . '</td>
                        <td>' . $statusPembayaran . '</td>
                        <td>' . $tggalPembayaran . '</td>
                        <td>' . $menu . '</td>
                    </tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="app/admin/js/bayar_spp.js"></script>