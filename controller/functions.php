<?php 
if(!isset($_SESSION['id-user'])){
  function login($data){global $conn;
    $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['email']))));
    $password=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['password']))));
    $users=mysqli_query($conn, "SELECT * FROM tbl_akun WHERE email='$email' OR nip='$email' OR nisn='$email'");
    if(mysqli_num_rows($users)==0){
      echo "<script>
        alert('Maaf, akun yang Anda masukkan belum terdaftar.');
      </script>";
      return false;
    }else if(mysqli_num_rows($users)>0){
      $row=mysqli_fetch_assoc($users);
      if(password_verify($password, $row['password'])){
        $_SESSION['id-user']=$row['id_akun'];
        $_SESSION['level']=$row['level'];
        return mysqli_affected_rows($conn);
      }else{
        echo "<script>
          alert('Maaf, kata sandi yang Anda masukkan tidak cocok.');
        </script>";
        return false;
      }
    }
  }
  // function ___($data){global $conn;}
}else if(isset($_SESSION['id-user'])){
  if($_SESSION['level']=="admin"){
    function img_berita(){;
      $namaFile=$_FILES["img-berita"]["name"];
      $ukuranFile=$_FILES["img-berita"]["size"];
      $error=$_FILES["img-berita"]["error"];
      $tmpName=$_FILES["img-berita"]["tmp_name"];
      if($error===4){
        echo "<script>
          alert('Pilih gambar terlebih dahulu!');
          document.location.href='".$_SESSION['page-to']."';
        </script>";}
      $ekstensiGambarValid=['jpg','png','jpeg','heic'];
      $ekstensiGambar=explode('.',$namaFile);
      $ekstensiGambar=strtolower(end($ekstensiGambar));
      if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo "<script>
          alert('Maaf, file kamu bukan gambar!');
          document.location.href='".$_SESSION['page-to']."';
        </script>";}
      if($ukuranFile>2000000){
        echo "<script>
          alert('Maaf, ukuran gambar terlalu besar! (2 MB)');
          document.location.href='".$_SESSION['page-to']."';
        </script>";}
      $namaFile_encrypt=crc32($namaFile);
      $encrypt=$namaFile_encrypt.".".$ekstensiGambar;
      move_uploaded_file($tmpName,'../assets/images/berita/'.$encrypt);
      return $encrypt;
    }
    function img_guru(){;
      $namaFile=$_FILES["img-guru"]["name"];
      $ukuranFile=$_FILES["img-guru"]["size"];
      $error=$_FILES["img-guru"]["error"];
      $tmpName=$_FILES["img-guru"]["tmp_name"];
      if($error===4){
        echo "<script>
          alert('Pilih gambar terlebih dahulu!');
          document.location.href='".$_SESSION['page-to']."';
        </script>";}
      $ekstensiGambarValid=['jpg','png','jpeg','heic'];
      $ekstensiGambar=explode('.',$namaFile);
      $ekstensiGambar=strtolower(end($ekstensiGambar));
      if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo "<script>
          alert('Maaf, file kamu bukan gambar!');
          document.location.href='".$_SESSION['page-to']."';
        </script>";}
      if($ukuranFile>2000000){
        echo "<script>
          alert('Maaf, ukuran gambar terlalu besar! (2 MB)');
          document.location.href='".$_SESSION['page-to']."';
        </script>";}
      $namaFile_encrypt=crc32($namaFile);
      $encrypt=$namaFile_encrypt.".".$ekstensiGambar;
      move_uploaded_file($tmpName,'../assets/images/guru/'.$encrypt);
      return $encrypt;
    }
    function inputBerita($data){global $conn;
      $judul=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['judul']))));
      $kategori=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kategori']))));
      $deskripsi=addslashes($data['deskripsi']);
      $img_berita=img_berita();
      if(!$img_berita){return false;}
      mysqli_query($conn, "INSERT INTO tbl_berita(judul,gambar,deskripsi,kategori) VALUES('$judul','$img_berita','$deskripsi','$kategori')");
      return mysqli_affected_rows($conn);
    }
    function ubahBerita($data){global $conn;
      $id_berita=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-berita']))));
      $judul=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['judul']))));
      $kategori=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kategori']))));
      $deskripsi=addslashes($data['deskripsi']);
      $img_beritaOld=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['img-beritaOld']))));
      $namaFile=$_FILES["img-berita"]["name"];
      if(!empty($namaFile)){
        $img_berita=img_berita();
        if(!$img_berita){return false;}
        unlink('../assets/images/berita/'.$img_beritaOld);
        mysqli_query($conn, "UPDATE tbl_berita SET judul='$judul', gambar='$img_berita', deskripsi='$deskripsi', kategori='$kategori' WHERE id_berita='$id_berita'");
      }else{
        mysqli_query($conn, "UPDATE tbl_berita SET judul='$judul', deskripsi='$deskripsi', kategori='$kategori' WHERE id_berita='$id_berita'");
      }
      return mysqli_affected_rows($conn);
    }
    function hapusBerita($data){global $conn;
      $id_berita=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-berita']))));
      $img_beritaOld=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['img-beritaOld']))));
      unlink('../assets/images/berita/'.$img_beritaOld);
      mysqli_query($conn, "DELETE FROM tbl_berita WHERE id_berita='$id_berita'");
      return mysqli_affected_rows($conn);
    }
    function simpanProfile($data){global $conn;
      $id_sekolah=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id_sekolah']))));
      $kementerian=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kementerian']))));
      $unitOrganisasi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['unitOrganisasi']))));
      $provinsi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['provinsi']))));
      $kabupaten=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kabupaten']))));
      $kota=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kota']))));
      $nss=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nss']))));
      $npsn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['npsn']))));
      $alamat=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['alamat']))));
      $telp=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['telp']))));
      $statussekolah=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['statussekolah']))));
      $daerah=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['daerah']))));
      $kodepos=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kodepos']))));
      $akreditasi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['akreditasi']))));
      $tahunberdiri=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tahunberdiri']))));
      $luasgedung=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['luasgedung']))));
      $luastanah=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['luastanah']))));
      $statustanah=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['statustanah']))));
      mysqli_query($conn, "UPDATE sekolah SET kementerian='$kementerian', unitOrganisasi='$unitOrganisasi', provinsi='$provinsi', kabupaten='$kabupaten', kota='$kota', nss='$nss', npsn='$npsn', alamat='$alamat', telp='$telp', statussekolah='$statussekolah', daerah='$daerah', kodepos='$kodepos', akreditasi='$akreditasi', tahunberdiri='$tahunberdiri', luasgedung='$luasgedung', luastanah='$luastanah', statustanah='$statustanah' WHERE id_sekolah='$id_sekolah'");
      return mysqli_affected_rows($conn);
    }
    function simpanKelas($data){global $conn;
      $kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kelas']))));
      mysqli_query($conn, "INSERT INTO kelas(kelas) VALUES('$kelas')");
      return mysqli_affected_rows($conn);
    }
    function ubahKelas($data){global $conn;
      $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
      $kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['kelas']))));
      mysqli_query($conn, "UPDATE kelas SET kelas='$kelas' WHERE id_kelas='$id_kelas'");
      return mysqli_affected_rows($conn);
    }
    function hapusKelas($data){global $conn;
      $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
      mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");
      return mysqli_affected_rows($conn);
    }
    function inputMapel($data){global $conn;
      $mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['mapel']))));
      $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
      mysqli_query($conn, "INSERT INTO tbl_mapel(mapel,id_kelas) VALUES('$mapel','$id_kelas')");
      return mysqli_affected_rows($conn);
    }
    function ubahMapel($data){global $conn;
      $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
      $mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['mapel']))));
      $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
      mysqli_query($conn, "UPDATE tbl_mapel SET mapel='$mapel', id_kelas='$id_kelas' WHERE id_mapel='$id_mapel'");
      return mysqli_affected_rows($conn);
    }
    function hapusMapel($data){global $conn;
      $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
      mysqli_query($conn, "DELETE FROM tbl_mapel WHERE id_mapel='$id_mapel'");
      return mysqli_affected_rows($conn);
    }
    function akunGuru($data){global $conn;
      $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
      $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
      $level="guru";
      $password=password_hash($nip, PASSWORD_DEFAULT);
      mysqli_query($conn, "INSERT INTO tbl_akun(email,password,level,nip) VALUES('$nama','$password','$level','$nip')");
      return mysqli_affected_rows($conn);
    }
    function inputGuru($data){global $conn;
      $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
      $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
      $jenis_kelamin=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jenis-kelamin']))));
      $alamat=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['alamat']))));
      $tempat_lahir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tempat-lahir']))));
      $tgl_lahir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl-lahir']))));
      $tgl_lahir=date_create($tgl_lahir);
      $tgl_lahir=date_format($tgl_lahir, 'd M Y');
      $agama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['agama']))));
      $status_aktif=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['status-aktif']))));
      $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
      $takeKelas=mysqli_query($conn, "SELECT * FROM tbl_mapel WHERE id_mapel='$id_mapel'");
      $row=mysqli_fetch_assoc($takeKelas);
      $id_kelas=$row['id_kelas'];
      $id_status=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-status']))));
      $img_guru=img_guru();
      if(!$img_guru){return false;}
      mysqli_query($conn, "INSERT INTO guru(nip,nama_guru,jenis_kelamin,alamat,tempat_lahir,tgl_lahir,agama,status_aktif,id_mapel,foto,id_kelas,id_status) VALUES('$nip','$nama','$jenis_kelamin','$alamat','$tempat_lahir','$tgl_lahir','$agama','$status_aktif','$id_mapel','$img_guru','$id_kelas','$id_status')");
      return mysqli_affected_rows($conn);
    }
    function ubahGuru($data){global $conn;
      $id_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-guru']))));
      $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
      $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
      $jenis_kelamin=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jenis-kelamin']))));
      $alamat=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['alamat']))));
      $tempat_lahir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tempat-lahir']))));
      $tgl_lahir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tgl-lahir']))));
      $tgl_lahir=date_create($tgl_lahir);
      $tgl_lahir=date_format($tgl_lahir, 'd M Y');
      $agama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['agama']))));
      $status_aktif=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['status-aktif']))));
      $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
      $takeKelas=mysqli_query($conn, "SELECT * FROM tbl_mapel WHERE id_mapel='$id_mapel'");
      $row=mysqli_fetch_assoc($takeKelas);
      $id_kelas=$row['id_kelas'];
      $id_status=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-status']))));
      $img_guruOld=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['img-guruOld']))));
      $namaFile=$_FILES["img-guru"]["name"];
      if(!empty($namaFile)){
        $img_guru=img_guru();
        if(!$img_guru){return false;}
        unlink("../assets/images/guru/".$img_guruOld);
        mysqli_query($conn, "UPDATE guru SET nip='$nip', nama_guru='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', agama='$agama', status_aktif='$status_aktif', id_mapel='$id_mapel', foto='$img_guru', id_kelas='$id_kelas', id_status='$id_status' WHERE id_guru='$id_guru'");
      }else{
        mysqli_query($conn, "UPDATE guru SET nip='$nip', nama_guru='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', agama='$agama', status_aktif='$status_aktif', id_mapel='$id_mapel', id_kelas='$id_kelas', id_status='$id_status' WHERE id_guru='$id_guru'");
      }
      return mysqli_affected_rows($conn);
    }
    function hapusGuru($data){global $conn;
      $id_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-guru']))));
      $nip=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nip']))));
      $img_guruOld=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['img-guruOld']))));
      if($img_guruOld!="user.png"){
        unlink("../assets/images/guru/".$img_guruOld);
      }
      $checkNIP=mysqli_query($conn, "SELECT * FROM tbl_akun WHERE nip='$nip'");
      if(mysqli_num_rows($checkNIP)>0){
        mysqli_query($conn, "DELETE FROM tbl_akun WHERE nip='$nip'");
      }
      mysqli_query($conn, "DELETE FROM guru WHERE id_guru='$id_guru'");
      return mysqli_affected_rows($conn);
    }
    function akunSiswa($data){global $conn;
      $nisn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nisn']))));
      $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
      $level="siswa";
      $password=password_hash($nisn, PASSWORD_DEFAULT);
      mysqli_query($conn, "INSERT INTO tbl_akun(email,password,level,nisn) VALUES('$nama','$password','$level','$nisn')");
      return mysqli_affected_rows($conn);
    }
    function inputSiswa($data){global $conn;
      $nisn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nisn']))));
      $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
      $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
      $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
      $tanggalLahir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tanggalLahir']))));
      $alamat=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['alamat']))));
      $informasi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['informasi']))));
      mysqli_query($conn, "INSERT INTO siswa(nisn,nama,id_kelas,jk,tanggalLahir,alamat,informasi) VALUES('$nisn','$nama','$id_kelas','$jk','$tanggalLahir','$alamat','$informasi')");
      return mysqli_affected_rows($conn);
    }
    function ubahSiswa($data){global $conn;
      $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
      $nisn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nisn']))));
      $nama=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nama']))));
      $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
      $jk=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jk']))));
      $tanggalLahir=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['tanggalLahir']))));
      $alamat=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['alamat']))));
      $informasi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['informasi']))));
      mysqli_query($conn, "UPDATE siswa SET nisn='$nisn', nama='$nama', id_kelas='$id_kelas', jk='$jk', tanggalLahir='$tanggalLahir', alamat='$alamat', informasi='$informasi' WHERE id_siswa='$id_siswa'");
      return mysqli_affected_rows($conn);
    }
    function hapusSiswa($data){global $conn;
      $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
      $nisn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nisn']))));
      mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa='$id_siswa'");
      mysqli_query($conn, "DELETE FROM tbl_akun WHERE nisn='$nisn'");
      return mysqli_affected_rows($conn);
    }
    function inputJadwal($data){global $conn;
      $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
      $takeKelas=mysqli_query($conn, "SELECT * FROM tbl_mapel WHERE id_mapel='$id_mapel'");
      $row=mysqli_fetch_assoc($takeKelas);
      $id_kelas=$row['id_kelas'];
      $ruang=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['ruang']))));
      $takeGuru=mysqli_query($conn, "SELECT * FROM guru WHERE id_mapel='$id_mapel' AND id_kelas='$id_kelas'");
      if(mysqli_num_rows($takeGuru)==0){
        echo "<script>
          alert('Mata Pelajaran yang anda pilih belum memiliki guru pengajar!');
          document.location.href='".$_SESSION['page-to']."';
        </script>";
      }else if(mysqli_num_rows($takeGuru)>0){
        $row=mysqli_fetch_assoc($takeGuru);
        $id_guru=$row['id_guru'];
      }
      $lama_mengajar=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['lama-mengajar']))));
      $hari=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['hari']))));
      $jam=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jam']))));
      mysqli_query($conn, "INSERT INTO jadwal(id_mapel,id_kelas,ruang,id_guru,lama_mengajar,hari,jam) VALUES('$id_mapel','$id_kelas','$ruang','$id_guru','$lama_mengajar','$hari','$jam')");
      return mysqli_affected_rows($conn);
    }
    function hapusJadwal($data){global $conn;
      $id_jadwal=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-jadwal']))));
      mysqli_query($conn, "DELETE FROM jadwal WHERE id_jadwal='$id_jadwal'");
      return mysqli_affected_rows($conn);
    }
    function hapusAkun($data){global $conn;
      $id_akun=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-akun']))));
      mysqli_query($conn, "DELETE FROM tbl_akun WHERE id_akun='$id_akun'");
      return mysqli_affected_rows($conn);
    }
    // function __($data){global $conn;}
  }
  if($_SESSION['level']=="guru"){
    function tidakHadir($data){global $conn;
      $id_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-guru']))));
      $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
      $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
      $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
      $status="Tidak Hadir";
      $hari=array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
      $hari=$hari[date('N')];
      $tanggal=date('d M Y');
      mysqli_query($conn, "INSERT INTO absensi(id_guru,id_siswa,id_mapel,hari,tanggal,status,id_kelas) VALUES('$id_guru','$id_siswa','$id_mapel','$hari','$tanggal','$status','$id_kelas')");
      return mysqli_affected_rows($conn);
    }
    function hadir($data){global $conn;
      $id_guru=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-guru']))));
      $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
      $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
      $id_kelas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-kelas']))));
      $status="Hadir";
      $hari=array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
      $hari=$hari[date('N')];
      $tanggal=date('d M Y');
      mysqli_query($conn, "INSERT INTO absensi(id_guru,id_siswa,id_mapel,hari,tanggal,status,id_kelas) VALUES('$id_guru','$id_siswa','$id_mapel','$hari','$tanggal','$status','$id_kelas')");
      return mysqli_affected_rows($conn);
    }
    function inputNilai($data){global $conn;
      $nilai=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['nilai']))));
      if($nilai<75){
        $statusNilai="Tidak Tuntas";
      }else if($nilai>=75){
        $statusNilai="Tuntas";
      }
      $jenisNilai=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['jenisNilai']))));
      $id_siswa=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-siswa']))));
      $id_mapel=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-mapel']))));
      $checkJenisNilai=mysqli_query($conn, "SELECT * FROM tbl_nilai WHERE id_mapel='$id_mapel' AND id_siswa='$id_siswa' AND jenisNilai='$jenisNilai'");
      if(mysqli_num_rows($checkJenisNilai)==0){
        mysqli_query($conn, "INSERT INTO tbl_nilai(id_mapel,nilai,id_siswa,jenisNilai,statusNilai) VALUES('$id_mapel','$nilai','$id_siswa','$jenisNilai','$statusNilai')");
      }else if(mysqli_num_rows($checkJenisNilai)>0){
        mysqli_query($conn, "UPDATE tbl_nilai SET nilai='$nilai', statusNilai='$statusNilai' WHERE id_mapel='$id_mapel' AND id_siswa='$id_siswa' AND jenisNilai='$jenisNilai'");
        return mysqli_affected_rows($conn);
      }
      return mysqli_affected_rows($conn);
    }
    function hapusNilai($data){global $conn;
      $id_nilai=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $data['id-nilai']))));
      mysqli_query($conn, "DELETE FROM tbl_nilai WHERE id_nilai='$id_nilai'");
      return mysqli_affected_rows($conn);
    }
    // function __($data){global $conn;}
  }
  if($_SESSION['level']=="siswa"){
    // function ___($data){global $conn;}
  }
}