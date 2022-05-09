<br><br>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0">
                <img src="app/home/images/course_3.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 mr-auto align-self-center order-2 order-lg-1">
                <h2 class="section-title-underline mb-5">
                    <span>
                        <span class="iconify" data-icon="noto:man-student-light-skin-tone"></span>
                        Data Siswa
                    </span>
                </h2>
                <ol class="ul-check primary list-unstyled">
                    <?php
                    $data = table('kelas');
                    while ($row = mysqli_fetch_array($data)) {
                        echo '<li>' . $row['kelas'] . ' : / ' . rowStableId('siswa', 'id_kelas', $row['id_kelas']) . ' Siswa</li>';
                    }
                    ?>
                </ol>
            </div>
        </div>
    </div>
</div>