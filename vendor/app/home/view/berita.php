<br><br><br>
<div class="site-section">
    <div class="container">


        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline mb-3">
                    <span>Berita</span>
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="owl-slide-3 owl-carousel">
                    <?php
                    $data = table('tbl_berita');
                    while ($row = fetch(($data))) {
                        echo '<div class="course-1-item">
                        <figure class="thumnail">
                            <a href="course-single.html">
                            <img src="app/admin/file/' . $row['gambar'] . '" alt="Image" class="img-fluid"></a>
                            <div class="category">
                                <h3>' . $row['judul'] . '</h3>
                            </div>
                        </figure>
                        <div class="course-1-content pb-4">
                            <p class="desc mb-4">
                            ' . potongString($row['deskripsi']) . '
                            </p>
                            <p><a href="index.php?viewHome=detailBerita&&id=' . $row['id_berita'] . '" class="btn btn-primary rounded-0 px-4">Detail</a></p>
                        </div>
                    </div>';
                    }
                    ?>

                </div>

            </div>
        </div>

    </div>
</div>