<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $cekLogin = tableIdAnd("tbl_akun", "username", $username, "password", $password);
    if (mysqli_num_rows($cekLogin) > 0) {
        $dataLogin = mysqli_fetch_array($cekLogin);
        $_SESSION['id_siswa'] = $dataLogin['id_siswa'];
        $_SESSION['username'] = $username;
        $_SESSION['level']    = $dataLogin['level'];
        echo "<script>
                alert('Berhasil Masuk Kehalaman $_SESSION[level]');document.location.href='index.php';
            </script>";
    } else {
        echo "<script>
                alert('Gagal Masuk !!');document.location.href='index.php';
            </script>";
    }
} else
if (isset($_POST['simpanKelas'])) {
    $kelas = $_POST['kelas'];
    $kelompok   = $_POST['kelompok'];
    $insert = mysqli_query($conn, "INSERT INTO `kelas`(`kelas`,`kelompok`) 
                                    VALUES ('$kelas','$kelompok')");
    $cekKelas = tableId("kelas", "kelas", $kelas);
    if (mysqli_num_rows($cekKelas) > 0) {
        alert("Data Kelas $kelas Sudah Ada", "kelas");
    } else {
        if ($insert) {
            alert("Berhasil Menyimpan Data Kelas $kelas", "kelas");
        } else {
            alert("terjadi Kesalahan", "kelas");
        }
    }
} else
if (isset($_POST['editKelas'])) {
    $id_kelas   = $_POST['id_kelas'];
    $kelas = $_POST['kelas'];
    $kelompok   = $_POST['kelompok'];
    $update = mysqli_query($conn, "UPDATE `kelas` SET `kelas`='$kelas',`kelompok`='$kelompok' 
                                        WHERE `id_kelas`='$id_kelas'");
    if ($update) {
        alert("Berhasil Mengubah Data Kelas", "kelas");
    } else {
        alert("terjadi Kesalahan", "kelas");
    }
} else
if (isset($_POST['simpanSiswa'])) {
    $nisn   = $_POST['nisn'];
    $password   = md5($_POST['nisn']);
    $nama   = $_POST['nama'];
    $id_kelas   = $_POST['id_kelas'];
    $jk         = $_POST['jk'];
    $tanggalLahir   = $_POST['tanggalLahir'];
    $alamat     = $_POST['alamat'];
    $kelompokKelas = tableNameFieldId('kelas', 'id_kelas', $id_kelas, 'kelompok');
    $cekNisn = tableId("siswa", "nisn", $nisn);
    if (mysqli_num_rows($cekNisn) > 0) {
        alert("Data Nisn $nisn Sudah Ada", "siswa");
    } else {
        $insert = mysqli_query($conn, "INSERT INTO `siswa`( `nisn`, `nama`, `id_kelas`, `tanggalLahir`, `alamat`,`kelompokKelas`,`jk`,`informasi`) 
                                        VALUES ('$nisn','$nama','$id_kelas','$tanggalLahir','$alamat','$kelompokKelas','$jk','')");
        if ($insert) {
            alert("Berhasil Menyimpan Data siswa $nama", "siswa");
            $id_siswa = tableNameFieldId('siswa', 'nisn', $nisn, 'id_siswa');
            $creatAkun = mysqli_query($conn, "INSERT INTO `tbl_akun`(`username`, `password`, `level`,`id_siswa`) 
                                                                VALUES ('$nama','$password','siswa','$id_siswa')");
        } else {
            alert("terjadi Kesalahan", "siswa");
        }
    }
} else
if (isset($_POST['editSiswa'])) {
    $id_siswa = $_POST['id_siswa'];
    $nisn   = $_POST['nisn'];
    $password   = md5($_POST['nisn']);
    $nama   = $_POST['nama'];
    $id_kelas   = $_POST['id_kelas'];
    $jk         = $_POST['jk'];
    $tanggalLahir   = $_POST['tanggalLahir'];
    $alamat     = $_POST['alamat'];
    $kelompokKelas = tableNameFieldId('kelas', 'id_kelas', $id_kelas, 'kelompok');
    $update = mysqli_query($conn, "UPDATE `siswa` SET `nisn`='$nisn',`nama`='$nama',`id_kelas`='$id_kelas',`tanggalLahir`='$tanggalLahir',
                                `alamat`='$alamat',`kelompokKelas`='$kelompokKelas',`jk`='$jk' 
                                                WHERE `id_siswa`='$id_siswa'");
    if ($update) {
        if ($_SESSION['level'] == "admin") {
            alert("Berhasil Mengubah Data Siswa", "siswa");
        } else {
            alert("Berhasil Mengubah Data Siswa", "biodata");
        }
    } else {
        alert("terjadi Kesalahan", "siswa");
    }
} else
if (isset($_POST['inputSpp'])) {
    $biaya   = $_POST['biaya'];
    $kelompokKelas  = $_POST['kelompokKelas'];
    $tahun    = $_POST['tahun'];
    $cekSpp = tableIdAnd("spp", "kelompokKelas", $kelompokKelas, "tahun", $tahun);
    if (mysqli_num_rows($cekSpp) > 0) {
        alert("Maaf Data Spp Pada Tahun $tahun Sudah Terinput DI Kelas $kelompokKelas", "setting");
    } else {
        $insert = mysqli_query($conn, "INSERT INTO `spp`(`biaya`, `kelompokKelas`, `tahun`) 
                                                VALUES ('$biaya','$kelompokKelas','$tahun')");
        if ($insert) {
            alert("Berhasil Menyimpan Data SPP Pada Kelas $kelompokKelas Tahun $tahun", "setting");
        } else {
            alert("terjadi Kesalahan", "setting");
        }
    }
} else
if (isset($_POST['editSpp'])) {
    $id_spp  = $_POST['id_spp'];
    $biaya   = $_POST['biaya'];
    $update  = mysqli_query($conn, "UPDATE `spp` SET `biaya`='$biaya' 
                                        WHERE `id_spp`='$id_spp'");
    if ($update) {
        alert("Berhasil Mengubah data", "setting");
    } else {
        alert("terjadi Kesalahan", "setting");
    }
} else
if (isset($_POST['simpanPembayaran'])) {
    $id_siswa   = $_POST['id_siswa'];
    $bulan      = $_POST['bulan'];
    $tahun      = $_POST['tahun'];
    $id_kelas = tableNameFieldId("siswa", "id_siswa", $id_siswa, "id_kelas");
    $cekPembayaran = "";
    $insert = mysqli_query($conn, "INSERT INTO `pembayaran`(`id_siswa`, `bulan`, `tahun`,`id_kelas`,`tgglPembayaran`) 
                                    VALUES ('$id_siswa','$bulan','$tahun','$id_kelas','" . dateNow() . "')");
    if ($insert) {
        alert("Berhasil Menyimpan Data Pembayaran Bulan $bulan / Tahun $tahun", "spp");
    } else {
        alert("terjadi Kesalahan", "spp");
    }
} else
if (isset($_POST['simpanKas'])) {
    $tanggal    = $_POST['tanggal'];
    $kode       = $_POST['kode'];
    $noBukti    = $_POST['noBukti'];
    $uraiian    = $_POST['uraiian'];
    $jenis      = $_POST['jenis'];
    $nominal    = $_POST['nominal'];
    //cacah isi tanggal
    $bulan = substr($tanggal, 5, 2);
    $tahun = substr($tanggal, 0, 4);
    $saldo = totalfieldOneSUM("kas", "jenis", "masuk", "nominal");
    if ($jenis == "masuk") {
        $sisa = tambah($saldo, $nominal);
    } else {
        $sisa = minus($saldo, $nominal);
    }
    if ($nominal > $saldo) {
        alert("Maaf Data Saldo Kas Tidak Mencukupi", "kas");
    } else {
        $insert = mysqli_query($conn, "INSERT INTO `kas`(`tanggal`, `bulan`, `tahun`, `kode`, `noBukti`, `uraiian`, `jenis`, `nominal`,`saldo`) 
                                VALUES ('$tanggal','$bulan','$tahun','$kode','$noBukti','$uraiian','$jenis','$nominal','$sisa')");
        if ($insert) {
            alert("Berhasil Menyimpan Data Kas $jenis", "kas");
        } else {
            alert("terjadi Kesalahan", "kas");
        }
    }
} else
    if (isset($_POST['editKas'])) {
    $id_kas     = $_POST['id_kas'];
    $nominal    = $_POST['nominal'];
    $jenis      = $_POST['jenis'];
    $saldo = totalFieldTwoSumNot("kas", "jenis", "masuk", 'id_kas', $id_kas, "nominal");
    // $cekSaldoTetap = tableNameFieldId($table, $get, $id, $field);
    if ($jenis == "masuk") {
        $sisa = tambah($saldo, $nominal);
    } else {
        $sisa = minus($saldo, $nominal);
    }
    $update = mysqli_query($conn, "UPDATE `kas` SET `nominal`='$nominal',`saldo`='$sisa' 
                                            WHERE `id_kas`='$id_kas'");
    if ($update) {
        alert("Berhasil Mengubah Data Kas $jenis", "kas");
    } else {
        alert("terjadi Kesalahan", "kas");
    }
} else
if (isset($_POST['inputGuru'])) {
    $nip    = $_POST['nip'];
    $nama   = $_POST['nama'];
    $id_kelas   = $_POST['id_kelas'];
    $check = tableIdAnd('guru', 'nip', $nip, 'id_kelas', $id_kelas);
    if (row($check) > 0) {
        alert("Kelas Tersebut Sudah Ada Wali Kelas", "guru");
    } else {
        $input = mysqli_query($conn, "INSERT INTO `guru`(`nip`, `nama`, `id_kelas`) 
                                VALUES ('$nip','$nama','$id_kelas')");
        if ($input) {
            alert("Berhasil Menambah Data", "guru");
        } else {
            alert("terjadi Kesalahan", "guru");
        }
    }
} else
if (isset($_POST['editGuru'])) {
    $id_guru    = $_POST['id_guru'];
    $nip    = $_POST['nip'];
    $nama   = $_POST['nama'];
    $id_kelas   = $_POST['id_kelas'];
    $update = mysqli_query($conn, "UPDATE `guru` SET `nip`='$nip',`nama`='$nama',`id_kelas`='$id_kelas' 
                                                    WHERE `id_guru`='$id_guru'");
    if ($update) {
        alert("Berhasil Mengubah Data", "guru");
    } else {
        alert("terjadi Kesalahan", "guru");
    }
} else
if (isset($_POST['input_mapel'])) {
    $mapel    = $_POST['mapel'];
    $id_kelas = $_POST['id_kelas'];

    //cek double maple
    $cek_mapel = mysqli_query($conn, "select * from tbl_mapel where mapel='$mapel' and id_kelas='$id_kelas' ");
    if (mysqli_num_rows($cek_mapel) > 0) {
        $pesan = "Maaf mapel $mapel Sudah Ada ";
    } else {
        //insert kedatabase
        $insert_mapel = mysqli_query($conn, "INSERT INTO tbl_mapel (mapel,id_kelas)
                              values('$mapel','$id_kelas') ");
        if ($insert_mapel) {
            alert('Berhasil Menambahkan Data', 'mapel');
        } else {
            alert('Terjadi Kesalahan', 'mapel');
        }
    }
} else
if (isset($_POST['edit_mapel'])) {
    $id_mapel = $_POST['id_mapel'];
    $mapel = $_POST['mapel'];
    $id_kelas = $_POST['id_kelas'];

    //edit mapel
    $edit_mapel = mysqli_query($conn, "UPDATE `tbl_mapel` SET `mapel`='$mapel', id_kelas='$id_kelas' 
                          WHERE id_mapel='$id_mapel' ");
    if ($edit_mapel) {
        alert('Berhasil Mengubah Data', 'mapel');
    } else {
        alert('Terjadi Kesalahan', 'mapel');
    }
} else
if (isset($_POST['input_nilai'])) {
    $id_siswa = $_POST['id_siswa'];
    $id_mapel         = $_POST['id_mapel'];
    $jenis_kelompok   = "";
    $nilai            = $_POST['nilai'];
    $jenisNilai       = $_POST['jenisNilai'];

    $cek_nilai = tableIdThree('tbl_nilai', 'id_siswa', $id_siswa, 'id_mapel', $id_mapel, 'jenisNilai', $jenisNilai);
    //jika nilai sudah terinput maka ubah saja nilai ny
    if (row($cek_nilai) > 0) {
        //ubah nilai
        $update_nilai = mysqli_query($conn, "UPDATE `tbl_nilai` SET `nilai`='$nilai'
                                              WHERE `id_siswa`='$id_siswa' and id_mapel='$id_mapel' and jenis_kelompok='$jenis_kelompok' ");
        if ($update_nilai) {
            alert('Berhasil Mengupdate Data Nilai', 'nilai_siswa&&id=' . $id_siswa . '');
        } else {
            alert('Terjadi kesalahan', 'nilai_siswa&&id=' . $id_siswa . '');
        }
    } else {
        //insert kedatabase
        $input_nilai = mysqli_query($conn, "insert into tbl_nilai (id_siswa,id_mapel,jenis_kelompok,nilai,jenisNilai)
            values('$id_siswa','$id_mapel','$jenis_kelompok','$nilai','$jenisNilai')");
        if ($input_nilai) {
            alert('Berhasil Menginput Data Nilai', 'nilai_siswa&&id=' . $id_siswa . '');
        } else {
            alert('Terjadi kesalahan', 'nilai_siswa&&id=' . $id_siswa . '');
        }
    }
} else
if (isset($_POST['createAkunGuru'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level    = $_POST['level'];
    $id_akun  = $_POST['id_akun'];
    $insert = mysqli_query($conn, "INSERT INTO `tbl_akun`(`username`, `password`, `level`, `id_siswa`) 
                                        VALUES ('$username','$password','$level','$id_akun')");
    if ($insert) {
        alert('Berhasil Membuat akun', 'guru');
    } else {
        alert('Terjadi Kesalahan', 'guru');
    }
} else
if (isset($_POST['createAkunSiswa'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level    = $_POST['level'];
    $id_akun  = $_POST['id_akun'];
    // check
    $check = tableIdAnd('tbl_akun', 'level', $level, 'id_siswa', $id_akun);
    if (row($check) > 0) {
        alert('Akun Telah Dibuat', 'akun');
    } else {
        $insert = mysqli_query($conn, "INSERT INTO `tbl_akun`(`username`, `password`, `level`, `id_siswa`) 
                                        VALUES ('$username','$password','$level','$id_akun')");
        if ($insert) {
            alert('Berhasil Membuat akun', 'akun');
        } else {
            alert('Terjadi Kesalahan', 'akun');
        }
    }
}
if (isset($_POST['Inputabsensi'])) {
    $id_guru    = $_POST['id_guru'];
    $id_siswa   = $_POST['id_siswa'];
    $id_mapel   = $_POST['id_mapel'];
    $hari       = $_POST['hari'];
    $tanggal    = $_POST['tanggal'];
    $status     = $_POST['status'];
    //cacah isi tanggal
    $bulan = substr($tanggal, 5, 2);
    $tahun = substr($tanggal, 0, 4);
    $id_kelas = tableNameFieldId('siswa', 'id_siswa', $id_siswa, 'id_kelas');
    // chek data 
    $check =  tableIdFour('absensi', 'id_guru', $id_guru, 'id_siswa', $id_siswa, 'id_mapel', $id_mapel, 'tanggal', $tanggal);
    if (row($check) > 0) {
        $update = mysqli_query($conn, "UPDATE `absensi` SET `status`='$status' 
                                WHERE `id_guru`='$id_guru' AND `id_siswa`='$id_siswa' AND `id_mapel`='$id_mapel' AND `tanggal`='$tanggal' ");
        if ($update) {
            alert("Berhasil Mengubah Absen", "masukJadwal&&id='.$id_mapel.'");
        } else {
            alert("terjadi Kesalahan", "masukJadwal&&id='.$id_mapel.'");
        }
    } else {
        $input = mysqli_query($conn, "INSERT INTO `absensi`(`id_guru`, `id_siswa`, `id_mapel`, `hari`, `tanggal`, `status`,`id_kelas`,`bulan`, `tahun`) 
                                                    VALUES ('$id_guru','$id_siswa','$id_mapel','$hari','$tanggal','$status','$id_kelas','$bulan','$tahun')");
        if ($input) {
            alert("Berhasil Menginput Absen", "masukJadwal&&id='.$id_mapel.'");
        } else {
            alert("terjadi Kesalahan", "masukJadwal&&id='.$id_mapel.'");
        }
    }
} else
if (isset($_POST['inputJadwal'])) {
    $id_mapel = $_POST['id_mapel'];
    $id_kelas = $_POST['id_kelas'];
    $ruang      = $_POST['ruang'];
    $id_guru    = $_POST['id_guru'];
    $lama_mengajar  = $_POST['lama_mengajar'];
    $hari       = $_POST['hari'];
    $jam = $_POST['jam'];
    $input = mysqli_query($conn, "INSERT INTO `jadwal`(`id_mapel`, `id_kelas`, `ruang`, `id_guru`, `lama_mengajar`, `hari`, `jam`) 
                                                VALUES ('$id_mapel','$id_kelas','$ruang','$id_guru','$lama_mengajar','$hari','$jam')");
    if ($input) {
        alert("Berhasil Menginput Jadwal", "jadwal");
    } else {
        alert("terjadi Kesalahan", "jadwal");
    }
} else
if (isset($_POST['inputBerita'])) {
    $judul      = $_POST['judul'];
    $deskripsi  = $_POST['deskripsi'];
    $kategori   = $_POST['kategori'];
    $ekstensi_diperbolehkan    = array('png', 'jpg');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if ($ukuran < 104400070) {
        move_uploaded_file($file_tmp, 'app/admin/file/' . $nama);
        $query = mysqli_query($conn, " INSERT INTO `tbl_berita`(`judul`, `gambar`, `deskripsi`,`pembuat`,`kategori`) 
            VALUES ('$judul','$nama','$deskripsi','Admin','$kategori')");
        if ($query) {
            alert("Berhasil Mengupload Data Berita", "berita");
        } else {
            alert("GAGAL MENGUPLOAD GAMBAR", "berita");
        }
    } else {
        alert("UKURAN FILE TERLALU BESAR", "berita");
    }
} else
if (isset($_POST['editBerita'])) {
    $id_berita  = $_POST['id_berita'];
    $judul      = $_POST['judul'];
    $deskripsi  = $_POST['deskripsi'];
    $kategori   = $_POST['kategori'];
    $ekstensi_diperbolehkan    = array('png', 'jpg');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if ($ukuran < 1044070) {
        if (!empty($nama)) {
            move_uploaded_file($file_tmp, 'pagesAdmin/file/' . $nama);
            $query = mysqli_query($conn, "UPDATE `tbl_berita` SET `judul`='$judul', `deskripsi`='$deskripsi', gambar='$nama',`pembuat`='Admin',`kategori`='$kategori' 
                                        WHERE id_berita='$id_berita'");
        } else {
            $query = mysqli_query($conn, "UPDATE `tbl_berita` SET `judul`='$judul',`pembuat`='Admin',`kategori`='$kategori' 
                                        WHERE id_berita='$id_berita'");
        }
        if ($query) {
            alert("Berhasil Mengedit Berita", "berita");
        } else {
            alert("GAGAL MENGUPLOAD GAMBAR", "berita");
        }
    } else {
        alert("UKURAN FILE TERLALU BESAR", "berita");
    }
} else
if (isset($_POST['simpanKonfirmasi'])) {
    $id_kelas   = $_POST['id_kelas'];
    $status     = $_POST['status'];
    $update = mysqli_query($conn, "UPDATE `konfirmasi` SET `status`='$status' 
                                WHERE `id_kelas`='$id_kelas'");
    if ($update) {
        alert("Berhasil Mengirim Konfirmasi", "nilaiSiswa");
    } else {
        alert("Gagal Mengirim Konfirmasi", "nilaiSiswa");
    }
} else
if (isset($_POST['simpanProfile'])) {
    $id_sekolah         = $_POST['id_sekolah'];
    $kementerian        = $_POST['kementerian'];
    $unitOrganisasi     = $_POST['unitOrganisasi'];
    $provinsi           = $_POST['provinsi'];
    $kabupaten          = $_POST['kabupaten'];
    $kota               = $_POST['kota'];
    $nss                = $_POST['nss'];
    $npsn               = $_POST['npsn'];
    $alamat             = $_POST['alamat'];
    $telp               = $_POST['telp'];
    $statussekolah      = $_POST['statussekolah'];
    $daerah             = $_POST['daerah'];
    $kodepos            = $_POST['kodepos'];
    $akreditasi         = $_POST['akreditasi'];
    $tahunberdiri       = $_POST['tahunberdiri'];
    $luasgedung         = $_POST['luasgedung'];
    $luastanah          = $_POST['luastanah'];
    $statustanah        = $_POST['statustanah'];
    $update = mysqli_query($conn, "UPDATE `sekolah` SET `kementerian`='$kementerian',`unitOrganisasi`='$unitOrganisasi',
                                                `provinsi`='$provinsi',`kabupaten`='$kabupaten',`kota`='$kota',
                                                `nss`='$nss', `npsn`='$npsn',`alamat`='$alamat',`telp`='$telp',
                                                `statussekolah`='$statussekolah',`daerah`='$daerah',`kodepos`='$kodepos',
                                                `akreditasi`='$akreditasi',`tahunberdiri`='$tahunberdiri',`luasgedung`='$luasgedung',`luastanah`='$luastanah',`statustanah`='$statustanah' 
                        WHERE `id_sekolah`='$id_sekolah'");
    if ($update) {
        alert("Berhasil Mengubah Profile", "profile");
    } else {
        alert("terjadi Kesalahan", "profile");
    }
}
