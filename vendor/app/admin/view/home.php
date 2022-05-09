<div class="row justify-content-center">
    <div class="col-12">
        <div class="row align-items-center mb-2">
            <div class="col">
                <h1 class="h3 text-center text-info font-weight-bold"><center><marquee direction="up" scrollamount="2" align="center" behavior="alternate" width="90%"><marquee direction="right" behavior="alternate"> Welcome to | Admin :)</marquee></marquee></center></h1> 
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
                        <!-- <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                        <button type="button" class="btn btn-sm mr-2"><span class="fe fe-filter fe-16 text-muted"></span></button> -->
                    </div>
                </form>
            </div>
        </div>
        <div class="mb-2 align-items-center">
            <div class="card shadow mb-4">
                <div class="card-body bg-secondary">
                    <div class="row mt-1 align-items-center">
                        <div class="col-6 col-lg-2 text-center pl-4">
                            <p class="mb-1 small text-white">Data Siswa Keseluruhan</p>
                            <span class="h3"><?php echo rowStable('siswa'); ?> Siswa</span>
                            <span class="fe fe-arrow-up text-success fe-12"></span>
                        </div>
                        <div class="col-6 col-lg-2 text-center py-4">
                            <p class="mb-1 small text-white">Data Guru </p>
                            <span class="h3"><?php echo rowStable('guru'); ?> Guru</span>
                            <span class="fe fe-arrow-up text-success fe-12"></span>
                        </div>
                        <div class="col-6 col-lg-2 text-center py-4">
                            <p class="mb-1 small text-white">Mata pelajaran</p>
                             <span class="h3"><?php echo rowStable('tbl_mapel'); ?> Mapel</span>
                            <span class="fe fe-arrow-up text-success fe-12"></span>
                        </div>
                        <div class="col-6 col-lg-2 text-center py-4">
                            <p class="mb-1 small text-white">Kelas</p>
                            <span class="h3"><?php echo rowStable('kelas'); ?> Kelas</span>
                            <span class="fe fe-arrow-up text-success fe-12"></span>
                        </div>
                        <div class="col-6 col-lg-2 text-center py-4">
                            <p class="mb-1 small text-white"> Jumlah Akun</p>
                            <span class="h3"><?php echo rowStable('tbl_akun'); ?> Akun</span>
                            <span class="fe fe-arrow-up text-success fe-12"></span>
                        </div>
                    </div>
                    <div class="chartbox mr-4">
                        <!-- <div id="areaChart"></div> -->
                    </div>
                </div> <!-- .card-body -->
            </div> <!-- .card -->
        </div>