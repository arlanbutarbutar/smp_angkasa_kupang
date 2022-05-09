<!-- Modal -->
<div class="modal fade" id="editNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $mapel = table('tbl_mapel');
                while ($row_mapel = fetch($mapel)) {
                    echo "
                <div class='form-group'>
                <label for='exampleFormControlFile1'><h3>$row_mapel[mapel]</h3></label>
                ";
                    //cek nilai
                    $cek_nilai = tableId('tbl_nilai', 'id_siswa', $_GET['id']);
                    $cek_nilai_kl3 = tableIdThree('tbl_nilai', 'id_siswa', $_GET['id'], 'id_mapel', $row_mapel['id_mapel'], 'jenis_kelompok', 'KL.3');
                    $cek_nilai_kl4 = tableIdThree('tbl_nilai', 'id_siswa', $_GET['id'], 'id_mapel', $row_mapel['id_mapel'], 'jenis_kelompok', 'KL.4');
                    if (mysqli_num_rows($cek_nilai) > 0) {
                        $row_nilai_kl3 = row($cek_nilai_kl3);
                        $row_nilai_kl4 = row($cek_nilai_kl4);
                        echo "<br><form action='' method='post'>
                        <label><b>KL.3</b></label>
                        <input type='hidden' name='id_mapel' id='id_mapel' value='$row_mapel[id_mapel]'>
                        <input type='hidden' name='jenis_kelompok' id='jenis_kelompok' value='KL.3'>
                        <input type='hidden' name='id_siswa' id='id_siswa' value='$_GET[id]'>
                        <div class='input-group mb-3'>
                            <input type='text' name='nilai' id='nilai' value='$row_nilai_kl3[nilai]' class='form-control'>
                            <div class='input-group-append'>
                            <button onclick=\"return confirm('Yakin Mengedit Nilai?')\" type='submit' name='edit_nilai' class='btn btn-success'>Edit</button>
                            </div>
                        </div>
                        </form>";
                        echo "<form action='' method='post'>
                        <label><b>KL.4</b></label>
                        <input type='hidden' name='id_mapel' id='id_mapel' value='$row_mapel[id_mapel]'>
                        <input type='hidden' name='jenis_kelompok' id='jenis_kelompok' value='KL.4'>
                        <input type='hidden' name='id_siswa' id='id_siswa' value='$_GET[id]'>
                        <div class='input-group mb-3'>
                            <input type='text' name='nilai' id='nilai' value='$row_nilai_kl4[nilai]' class='form-control'>
                            <div class='input-group-append'>
                            <button type='submit' name='edit_nilai' class='btn btn-success'>Edit</button>
                            </div>
                        </div>";
                    } else {
                    }
                    echo "</div>
                </form>";
                }
                ?>
            </div>
        </div>
    </div>
</div>