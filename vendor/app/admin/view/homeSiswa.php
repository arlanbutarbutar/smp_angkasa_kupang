<h2 class="h5 page-title">Welcome To ! <?php name(); ?></h2>
<?php
if ($_SESSION['level'] == "kepsek") {
} else {
?>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mt-1 align-items-center">
                <div class="col-12 col-lg-4 text-left pl-4">
                    <p class="mb-1 small text-muted">Nama Siswa</p>
                    <span class="h3"><?php echo tableNameFieldId('siswa', 'id_siswa', $_SESSION['id_siswa'], 'nama'); ?></span>
                </div>
                <div class="col-6 col-lg-2 text-center py-4 mb-2">
                    <p class="mb-1 small text-muted"><span class="iconify" data-icon="vs:profile"></span> Biodata</p>
                    <span><a href="index.php?viewAdmin=biodata" class="h3">Lihat</a></span><br />
                </div>
            </div>
            <div class="chartbox mr-4">
                <!-- <div id="areaChart"></div> -->
            </div>
        </div> <!-- .card-body -->
    </div>
<?php
}
?>