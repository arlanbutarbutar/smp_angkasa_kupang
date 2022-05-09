<div class="card shadow">
    <div class="card-header">
        <strong class="card-title">Profile Sekolah</strong>
        <a class="float-right small text-muted" href="#!">View all</a>
    </div>
    <div class="card-body my-n2">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <input type="hidden" name="id_sekolah" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'id_sekolah'); ?>">
                    <!-- one -->
                    <div class="form-group">
                        <label for="">Kementerian</label>
                        <input type="text" name="kementerian" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'kementerian'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">unit / Organisasi</label>
                        <input type="text" name="unitOrganisasi" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'unitOrganisasi'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Provinsi / Kabupaten / Kota</label>
                        <div class="input-group">
                            <input type="text" name="provinsi" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'provinsi'); ?>" class="form-control">
                            <input type="text" name="kabupaten" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'kabupaten'); ?>" aria-label="First name" class="form-control">
                            <input type="text" name="kota" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'kota'); ?>" aria-label="Last name" class="form-control">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="">NSS</label>
                        <input type="text" name="nss" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'nss'); ?>" class="form-control">
                    </div>
                     <div class="form-group">
                        <label for="">NPSN</label>
                        <input type="text" name="npsn" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'npsn'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'alamat'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Telp</label>
                        <input type="text" name="telp" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'telp'); ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <!-- two -->
                    <div class="form-group">
                        <label for="">Status Sekolah</label>
                        <input type="text" name="statussekolah" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'statussekolah'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Daerah</label>
                        <input type="text" name="daerah" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'daerah'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kode Poss</label>
                        <input type="text" name="kodepos" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'kodepos'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Akreditasi</label>
                        <input type="text" name="akreditasi" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'akreditasi'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tahun berdiri</label>
                        <input type="text" name="tahunberdiri" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'tahunberdiri'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Luas Gedung</label>
                        <input type="text" name="luasgedung" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'luasgedung'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Luas Tanah</label>
                        <input type="text" name="luastanah" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'luastanah'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Status Tanah</label>
                        <input type="text" name="statustanah" value="<?php echo tableNameFieldId('sekolah', 'id_sekolah', '1', 'statustanah'); ?>" class="form-control">
                    </div>
                    <button onclick="return confirm('Yakin Menyimpan Data??')" type="submit" name="simpanProfile" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>