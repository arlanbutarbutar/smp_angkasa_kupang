<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('app/home/images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0">Admissions</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Profil</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <img src="app/home/images/course_6.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 ml-auto align-self-center">
                <h2 class="section-title-underline mb-5">
                    <span><span class="iconify" data-icon="bxs:school"></span>Profil Sekolah</span>
                </h2>
                <p><?php echo tableNameField('sekolah', 'kementerian'); ?></p>
                <p><?php echo tableNameField('sekolah', 'unitOrganisasi'); ?></p>
                <ol class="ul-check primary list-unstyled">
                    <li>Provinsi    : <?php echo tableNameField('sekolah', 'provinsi'); ?></li>
                    <li>Kabupaten   :<?php echo tableNameField('sekolah', 'kabupaten'); ?> </li>
                    <li>Kota        : <?php echo tableNameField('sekolah', 'kota'); ?></li>
                    <li>NSS         : <?php echo tableNameField('sekolah', 'nss'); ?></li>
                    <li>NPSN : <?php echo tableNameField('sekolah', 'npsn'); ?></li>
                    <li>Alamat :<?php echo tableNameField('sekolah', 'alamat'); ?> </li>
                    <li>Tlpn : <?php echo tableNameField('sekolah', 'telp'); ?></li>
                    <li>Status Sekolah : <?php echo tableNameField('sekolah', 'statussekolah'); ?></li>
                    <li>Daerah : <?php echo tableNameField('sekolah', 'daerah'); ?></li>
                    <li>Kode Pos :<?php echo tableNameField('sekolah', 'kodepos'); ?> </li>
                    <li>Akreditasi : <?php echo tableNameField('sekolah', 'akreditasi'); ?></li>
                    <li>Tahun Berdiri : <?php echo tableNameField('sekolah', 'tahunberdiri'); ?></li>
                    <li>Luas Gedung :<?php echo tableNameField('sekolah', 'luasgedung'); ?> </li>
                    <li>Luas Tanah : <?php echo tableNameField('sekolah', 'luastanah'); ?></li>
                    <li>Status Tanah : <?php echo tableNameField('sekolah', 'statustanah'); ?></li>
                </ol>

            </div>
        </div>
    </div>
</div>