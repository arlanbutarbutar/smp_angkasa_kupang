<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="h5 page-title">Biodata [<?php echo tableNameFieldId('guru', 'id_guru', $_SESSION['id_siswa'], 'nama'); ?>]</h2>
    </div>

</div>
<?php
$id_kelas = tableNameFieldId('guru', 'id_guru', $_SESSION['id_siswa'], 'id_kelas');
?>
<div class="card shadow">
    <div class="card-body">
        <div class="form-group">
            <label for="">Nip</label>
            <input type="text" name="nip" value="<?php echo tableNameFieldId('guru', 'id_guru', $_SESSION['id_siswa'], 'nip'); ?>" class="form-control" required />
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" value="<?php echo tableNameFieldId('guru', 'id_guru', $_SESSION['id_siswa'], 'nama'); ?>" class="form-control" required />
        </div>
        <div class="form-group">
            <label for="">Wali Kelas</label>
            <select name="id_kelas" id="" class="form-control">
                <?php
                echo '<option value="' . tableNameFieldId('kelas', 'id_kelas', $id_kelas, 'kelas') . '">' . tableNameFieldId('kelas', 'id_kelas', $id_kelas, 'kelas') . '</option>';
                ?>
            </select>
        </div>
    </div>
</div>