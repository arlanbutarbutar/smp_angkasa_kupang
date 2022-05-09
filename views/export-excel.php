<?php require_once("../controller/script.php");
  require_once("../controller/session_users.php");
  if(!isset($_GET['id'])){
    header("Location: cek-mapel.php?id_siswa=".$_GET['id']);exit();
  }else if(isset($_GET['id'])){
    $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['id']))));
    $takeSiswaExport=mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa='$id_siswa'");
    $row=mysqli_fetch_assoc($takeSiswaExport);
    $id_kelas=$row['id_kelas'];
    $filename=$row['nama'];
  }
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=$filename.xls");
?>
<center>
  <h3>Data Nilai</h3>
  <h5><?= $row['nama'];?></h5>
</center>
<table border="1">
  <thead>
    <tr>
      <th>Mata Pelajaran</th>
      <?php
        $jenisNilai = ['Nilai Harian', 'Nilai Tugas 1', 'Nilai Tugas 2', 'Nilai Tugas 3', 'Nilai Ulangan 1', 'Nilai Ulangan 2', 'Nilai Ulangan 3', 'Nilai MID', 'Nilai Semester'];
        foreach ($jenisNilai as $jn) {
          echo '<th>' . $jn . '</th>';
        }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php
      $data = tableId('tbl_mapel', 'id_kelas', $id_kelas);
      while ($row = fetch($data)) {
        echo '<tr>
          <td>' . $row['mapel'] . '</td>';
        $jenisNilai = ['Nilai Harian', 'Nilai Tugas 1', 'Nilai Tugas 2', 'Nilai Tugas 3', 'Nilai Ulangan 1', 'Nilai Ulangan 2', 'Nilai Ulangan 3', 'Nilai Mith', 'Nilai Semester'];
        foreach($jenisNilai as $jn){
          $check = tableIdThree('tbl_nilai', 'id_siswa', $_GET['id'], 'id_mapel', $row['id_mapel'], 'jenisNilai', $jn);
          if(row($check)>0){
            $id_nilai = tableIdAndField('tbl_nilai', 'id_siswa', $_GET['id'], 'id_mapel', $row['id_mapel'], 'id_nilai');
            $nilai = tableIdAndField('tbl_nilai', 'id_siswa', $_GET['id'], 'id_mapel', $row['id_mapel'], 'nilai');
            $jenisNilai = tableIdAndField('tbl_nilai', 'id_siswa', $_GET['id'], 'id_mapel', $row['id_mapel'], 'jenisNilai');
            $statusNilai = tableIdAndField('tbl_nilai', 'id_siswa', $_GET['id'], 'id_mapel', $row['id_mapel'],'statusNilai');
            $statusNilai="(".$statusNilai.")";
            $del = '<a href="index.php?deleteAdmin=deleteNilai&&id=' . $id_nilai . '&&id_siswa=' . $_GET['id'] . '&&jenisNilai=' . $jn . '" class="badge badge-danger">Delete </a>';
          }else{
            $id_nilai = '';
            $nilai = '';
            $jenisNilai = '';
            $statusNilai = '';
            $del = '';
          }
          echo "<td>".$nilai." ".$statusNilai."</td>";
        }
        echo '</tr>';
      }
    ?>
  </tbody>
</table>