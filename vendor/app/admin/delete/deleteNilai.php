<?php
// echo $_GET['id'];
// echo $_GET['id_siswa'];
$conn = mysqli_connect('localhost', 'root', '', 'angkasa_penfui');
$del = mysqli_query($conn, "DELETE FROM `tbl_nilai` WHERE id_nilai='$_GET[id]' AND jenisNilai='$_GET[jenisNilai]' ");
if ($del) {
    echo "<script>
    alert('Berhasil Menghapus Data Nilai !!');document.location.href='index.php?viewAdmin=nilai_siswa&&id=" . $_GET['id_siswa'] . "';
    </script>";
} else {
    echo "<script>
    alert('Gagal Menghapus Data Nilai !!');document.location.href='index.php?viewAdmin=nilai_siswa&&id=" . $_GET['id_siswa'] . "';
    </script>";
}
