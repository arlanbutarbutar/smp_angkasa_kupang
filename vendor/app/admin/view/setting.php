<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Data Biaya SPP / <?php echo year(); ?></h2>
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
                <button type="button" data-toggle="modal" data-target="#exampleModalSpp" class="btn btn-primary btn-sm"><span class="iconify" data-icon="akar-icons:plus"></span> Input</button>
            </div>
        </form>
    </div>
</div>
<?php
include_once "app/admin/modal/modalSpp.php";
include_once "app/admin/modal/editSpp.php";
?>
<div class="card shadow">
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Biaya Spp / Bulan</th>
                    <th>Kelompok Kelas</th>
                    <th>Tahun / Ajaran</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = table('spp');
                $no = 1;
                while ($row = mysqli_fetch_array($data)) {
                    echo '<tr>
                        <td>' . $no . '</td>
                        <td>' . rupiah($row['biaya']) . '</td>
                        <td>' . $row['kelompokKelas'] . '</td>
                        <td>' . $row['tahun'] . '</td>
                        <td>' . edit('#editSpp', $row['id_spp']) . '</td>
                    </tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="app/admin/js/editSpp.js"></script>