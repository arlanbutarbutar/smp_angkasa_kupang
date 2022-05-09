<?php if(!isset($_SESSION[''])){session_start();}
  require_once("db_connect.php"); require_once("functions.php");
  $dataSekolah=mysqli_query($conn, "SELECT * FROM sekolah");
  if(mysqli_num_rows($dataSekolah)>0){
    $row_dataSekolah=mysqli_fetch_assoc($dataSekolah);
  }else{
    $row_dataSekolah="";
  }
  $dataGuru=mysqli_query($conn, "SELECT * FROM guru JOIN kelas ON guru.id_kelas=kelas.id_kelas");
  $dataBerita=mysqli_query($conn, "SELECT * FROM tbl_berita");
  if(isset($_POST['login'])){
    if(login($_POST)>0){
      header("Location: ../views/route.php");exit();
    }
  }
  if(isset($_SESSION['id-user'])){
    $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-user']))));
    $dataSiswa=mysqli_query($conn, "SELECT * FROM siswa");
    $array_dataSiswa=mysqli_num_rows($dataSiswa);
    $dataGuru=mysqli_query($conn, "SELECT * FROM guru");
    $array_dataGuru=mysqli_num_rows($dataGuru);
    $dataMapel=mysqli_query($conn, "SELECT * FROM tbl_mapel");
    $array_dataMapel=mysqli_num_rows($dataMapel);
    $dataKelas=mysqli_query($conn, "SELECT * FROM kelas");
    $array_dataKelas=mysqli_num_rows($dataKelas);
    $dataAkun=mysqli_query($conn, "SELECT * FROM tbl_akun");
    $array_dataAkun=mysqli_num_rows($dataAkun);
    if($_SESSION['level']=="admin"){
      $tableBerita=mysqli_query($conn, "SELECT * FROM tbl_berita ORDER BY id_berita DESC");
      $selectKategori=mysqli_query($conn, "SELECT * FROM tbl_kategori");
      if(isset($_POST['inputBerita'])){
        if(inputBerita($_POST)>0){
          echo "<script>
            alert('Berhasil Mengupload Data Berita!');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['ubahBerita'])){
        if(ubahBerita($_POST)>0){
          echo "<script>
            alert('Berhasil Mengubah Data Berita!');
            document.location.href='berita.php';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['hapusBerita'])){
        if(hapusBerita($_POST)>0){
          echo "<script>
            alert('Berhasil Menghapus Data Berita!');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya data sedang digunakan!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      $formSekolah=mysqli_query($conn, "SELECT * FROM sekolah");
      if(isset($_POST['simpanProfile'])){
        if(simpanProfile($_POST)>0){
          echo "<script>
            alert('Berhasil Mengubah Profile!');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      $tableKelas=mysqli_query($conn, "SELECT * FROM kelas ORDER BY id_kelas DESC");
      if(isset($_POST['simpanKelas'])){
        if(simpanKelas($_POST)>0){
          echo "<script>
            alert('Berhasil Menyimpan Data Kelas ".$_POST['kelas']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['ubahKelas'])){
        if(ubahKelas($_POST)>0){
          echo "<script>
            alert('Berhasil Mengubah Data Kelas ".$_POST['kelas']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['hapusKelas'])){
        if(hapusKelas($_POST)>0){
          echo "<script>
            alert('Berhasil Menghapus Data Kelas ".$_POST['kelas']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya data sedang digunakan!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      $tableMapel=mysqli_query($conn, "SELECT * FROM tbl_mapel JOIN kelas ON tbl_mapel.id_kelas=kelas.id_kelas ORDER BY tbl_mapel.id_mapel DESC");
      $selectKelas=mysqli_query($conn, "SELECT * FROM kelas");
      if(isset($_POST['inputMapel'])){
        if(inputMapel($_POST)>0){
          echo "<script>
            alert('Berhasil Menambahkan Data Mata Pelajaran ".$_POST['mapel']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['ubahMapel'])){
        if(ubahMapel($_POST)>0){
          echo "<script>
            alert('Berhasil Mengubah Data Mata Pelajaran ".$_POST['mapel']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['hapusMapel'])){
        if(hapusMapel($_POST)>0){
          echo "<script>
            alert('Berhasil Menghapus Data Mata Pelajaran ".$_POST['mapel']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya data sedang digunakan!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      $tableGuru=mysqli_query($conn, "SELECT * FROM guru JOIN kelas ON guru.id_kelas=kelas.id_kelas JOIN status_guru ON guru.id_status=status_guru.id_status JOIN tbl_mapel ON guru.id_mapel=tbl_mapel.id_mapel ORDER BY guru.id_guru DESC");
      $selectMapel=mysqli_query($conn, "SELECT * FROM tbl_mapel JOIN kelas ON tbl_mapel.id_kelas=kelas.id_kelas");
      $selectStatusGuru=mysqli_query($conn, "SELECT * FROM status_guru");
      if(isset($_POST['akunGuru'])){
        if(akunGuru($_POST)>0){
          echo "<script>
            alert('Berhasil Membuat akun guru ".$_POST['nama']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['inputGuru'])){
        if(inputGuru($_POST)>0){
          echo "<script>
            alert('Berhasil Menambahkan Data Guru ".$_POST['nama']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['ubahGuru'])){
        if(ubahGuru($_POST)>0){
          echo "<script>
            alert('Berhasil Mengubah Data Guru ".$_POST['nama']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['hapusGuru'])){
        if(hapusGuru($_POST)>0){
          echo "<script>
            alert('Berhasil Menghapus Data Guru ".$_POST['nama']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya data sedang digunakan!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      $tableSiswa=mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas ORDER BY siswa.id_siswa DESC");
      if(isset($_POST['akunSiswa'])){
        if(akunSiswa($_POST)>0){
          echo "<script>
            alert('Berhasil Membuat akun siswa ".$_POST['nama']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['inputSiswa'])){
        if(inputSiswa($_POST)>0){
          echo "<script>
            alert('Berhasil Menambahkan Data Siswa ".$_POST['nama']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['ubahSiswa'])){
        if(ubahSiswa($_POST)>0){
          echo "<script>
            alert('Berhasil Mengubah Data Siswa ".$_POST['nama']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['hapusSiswa'])){
        if(hapusSiswa($_POST)>0){
          echo "<script>
            alert('Berhasil Menghapus Data Siswa ".$_POST['nama']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya data sedang digunakan!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      $tableCheckAbsensi=mysqli_query($conn, "SELECT * FROM tbl_mapel JOIN kelas ON tbl_mapel.id_kelas=kelas.id_kelas");
      $tableJadwal=mysqli_query($conn, "SELECT * FROM jadwal JOIN tbl_mapel ON jadwal.id_mapel=tbl_mapel.id_mapel JOIN kelas ON jadwal.id_kelas=kelas.id_kelas JOIN guru ON jadwal.id_guru=guru.id_guru ORDER BY jadwal.id_jadwal DESC");
      if(isset($_POST['inputJadwal'])){
        if(inputJadwal($_POST)>0){
          echo "<script>
            alert('Berhasil Menambahkan Data Jadwal');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['hapusJadwal'])){
        if(hapusJadwal($_POST)>0){
          echo "<script>
            alert('Berhasil Menghapus Data Jadwal');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya data sedang digunakan!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      $tableAkun=mysqli_query($conn, "SELECT * FROM tbl_akun WHERE id_akun!='$id_user'");
      if(isset($_POST['hapusAkun'])){
        if(hapusAkun($_POST)>0){
          echo "<script>
            alert('Berhasil Menghapus Data Akun ".$_POST['email']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya data sedang digunakan!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
    }
    if($_SESSION['level']=="guru"){
      $checkNIP=mysqli_query($conn, "SELECT * FROM tbl_akun JOIN guru ON tbl_akun.nip=guru.nip WHERE tbl_akun.id_akun='$id_user'");
      $row_checkNIP=mysqli_fetch_assoc($checkNIP);
      $id_guru=$row_checkNIP['id_guru'];
      $cardAkun=mysqli_query($conn, "SELECT * FROM guru JOIN tbl_mapel ON guru.id_mapel=tbl_mapel.id_mapel JOIN kelas ON guru.id_kelas=kelas.id_kelas JOIN status_guru ON guru.id_status=status_guru.id_status WHERE guru.id_guru='$id_guru'");
      $tableCheckAbsensi=mysqli_query($conn, "SELECT * FROM guru JOIN tbl_mapel ON guru.id_mapel=tbl_mapel.id_mapel JOIN kelas ON guru.id_kelas=kelas.id_kelas WHERE guru.id_guru='$id_guru'");
      if(isset($_POST['tidakHadir'])){
        if(tidakHadir($_POST)>0){
          echo "<script>
            alert('Berhasil Mengabsen Siswa ".$_POST['nama']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['hadir'])){
        if(hadir($_POST)>0){
          echo "<script>
            alert('Berhasil Mengabsen Siswa ".$_POST['nama']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      $tableJadwal=mysqli_query($conn, "SELECT * FROM jadwal JOIN tbl_mapel ON jadwal.id_mapel=tbl_mapel.id_mapel JOIN kelas ON jadwal.id_kelas=kelas.id_kelas JOIN guru ON jadwal.id_guru=guru.id_guru WHERE jadwal.id_guru='$id_guru' ORDER BY jadwal.id_jadwal DESC");
      $tableCheckNilai=mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN guru ON siswa.id_kelas=guru.id_kelas WHERE guru.id_guru='$id_guru'");
      if(isset($_POST['inputNilai'])){
        if(inputNilai($_POST)>0){
          echo "<script>
            alert('Berhasil Menambahkan Nilai ".$_POST['jenisNilai']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      if(isset($_POST['hapusNilai'])){
        if(hapusNilai($_POST)>0){
          echo "<script>
            alert('Berhasil Menghapus Nilai ".$_POST['jenisNilai']."');
            document.location.href='".$_SESSION['page-to']."';
          </script>";
        }else{
          if(!isset($_SESSION['message-danger'])){
            echo "<script>
              alert('Maaf, sepertinya ada kesalahan pada saat menghubungkan ke database!');
              document.location.href='".$_SESSION['page-to']."';
            </script>";
          }
        }
      }
      function fetch($data){
        return mysqli_fetch_array($data);
      }
      function row($data){
        return mysqli_num_rows($data);
      }
      function tableId($table, $get, $id){global $conn;
        $data = mysqli_query($conn, "SELECT * FROM `$table` WHERE $get='$id' ");
        return $data;
      }
      function tableIdThree($table, $getOne, $idOne, $getTwo, $idTwo, $getThree, $idThree){global $conn;
        return mysqli_query($conn, "SELECT * FROM `$table` WHERE $getOne='$idOne' AND $getTwo='$idTwo' AND $getThree='$idThree' ");
      }
      function tableIdAndField($table, $getOne, $idOne, $getTwo, $idTwo, $field){global $conn;
        $data = mysqli_query($conn, "SELECT * FROM `$table` WHERE $getOne='$idOne' AND $getTwo='$idTwo' ");
        $row = mysqli_fetch_array($data);
        return $row[$field];
      }
      function tableIdAndStatus($table, $getOne, $idOne, $getTwo, $idTwo, $getThree, $idThree, $field){global $conn;
        $data = mysqli_query($conn, "SELECT * FROM `$table` WHERE $getOne='$idOne' AND $getTwo='$idTwo' AND $getThree='$idThree'");
        $row = mysqli_fetch_array($data);
        return $row[$field];
      }
      function tableIdThreeField($table, $getOne, $idOne, $getTwo, $idTwo, $getThree, $idThree, $field){
        global $conn;
        $data = mysqli_query($conn, "SELECT * FROM `$table` WHERE $getOne='$idOne' AND $getTwo='$idTwo' AND $getThree='$idThree' ");
        $row = fetch($data);
        return $row[$field];
      }
    }
    if($_SESSION['level']=="siswa"){
      $checkNISN=mysqli_query($conn, "SELECT * FROM tbl_akun JOIN siswa ON tbl_akun.nisn=siswa.nisn WHERE tbl_akun.id_akun='$id_user'");
      $row_checkNISN=mysqli_fetch_assoc($checkNISN);
      $id_siswa=$row_checkNISN['id_siswa'];
      $cardSiswa=mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE siswa.id_siswa='$id_siswa'");
      $tableJadwal=mysqli_query($conn, "SELECT * FROM jadwal JOIN tbl_mapel ON jadwal.id_mapel=tbl_mapel.id_mapel JOIN kelas ON jadwal.id_kelas=kelas.id_kelas JOIN guru ON jadwal.id_guru=guru.id_guru JOIN siswa ON jadwal.id_kelas=siswa.id_kelas WHERE siswa.id_siswa='$id_siswa' ORDER BY jadwal.id_jadwal DESC");
      $tableCheckAbsensi=mysqli_query($conn, "SELECT * FROM absensi JOIN siswa ON absensi.id_siswa=siswa.id_siswa JOIN tbl_mapel ON absensi.id_mapel=tbl_mapel.id_mapel JOIN kelas ON absensi.id_kelas=kelas.id_kelas JOIN guru ON absensi.id_guru=guru.id_guru WHERE siswa.id_siswa='$id_siswa' ORDER BY absensi.id_absen DESC");
      $tableCheckNilai=mysqli_query($conn, "SELECT * FROM siswa JOIN tbl_mapel ON siswa.id_kelas=tbl_mapel.id_kelas JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN guru ON siswa.id_kelas=guru.id_kelas WHERE siswa.id_siswa='$id_siswa'");
      $tableNilai=mysqli_query($conn, "SELECT * FROM siswa JOIN guru ON siswa.id_kelas=guru.id_kelas WHERE siswa.id_siswa='$id_siswa'");
    }
  }