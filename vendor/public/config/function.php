<?php
ob_start();
session_start();
include "koneksi.php";
function month()
{
    $month = date('m');
    return $month;
}

function year()
{
    return date('Y');
}

function yearPlus()
{
    return year() + 1;
}

function dateNow()
{
    return date("Y-m-d");
}

// day
function day()
{
    $tanggal = dateNow();
    $day = date('D', strtotime($tanggal));
    $dayList = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );
    return $dayList[$day];
}

// expired
function dateExpired()
{
    $date = date('y-m-d');
    return $date;
}

function conn()
{
    global $conn;
}

// --index
function index()
{
    if (dateNow() > dateExpired()) {
    } else {
        // cek session
        if (!empty($_SESSION['username'])) {
            if ($_SESSION['level'] == "kepsek") {
                include_once "app/admin/index.php";
            } else
            if ($_SESSION['level'] == "admin") {
                include_once "app/admin/index.php";
            } else
            if (in_array($_SESSION['level'], ['siswa', 'guru'])) {
                include_once "app/admin/index.php";
            } else {
                include_once "app/home/index.php";
            }
        } else {
            include_once "app/home/index.php";
        }
    }
}

// --name
function name()
{
    if ($_SESSION['level'] == "kepsek") {
        echo $_SESSION['username'];
    } else
    if ($_SESSION['level'] == "admin") {
        echo tableNameField('sekolah', 'satuanKerja');
    } else
    if (in_array($_SESSION['level'], ["guru", "siswa"])) {
        echo $_SESSION['username'];
    }
}

// -- menu
function menu()
{
    if ($_SESSION['level'] == "kepsek") {
        $menu = '<ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
            <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">Data Master</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                    <a class="nav-link pl-3" href="index.php?viewAdmin=verifikasiNilai"><span class="ml-1 item-text">Data Verifikasi Nilai</span>
                    </a>
        </li>
        </ul>
        </ul>';
    }
    if ($_SESSION['level'] == "admin") {
        $menu = '<ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
            <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">Data Master</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                    <a class="nav-link pl-3" href="index.php?viewAdmin=kelas"><span class="ml-1 item-text">Data Kelas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="index.php?viewAdmin=mapel"><span class="ml-1 item-text">Mata Pelajaran</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="index.php?viewAdmin=guru"><span class="ml-1 item-text"><span class="iconify" data-icon="fa-solid:chalkboard-teacher"></span> Data Guru</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="index.php?viewAdmin=siswa"><span class="ml-1 item-text"><span class="iconify" data-icon="ant-design:user-delete-outlined"></span> Data Siswa</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="index.php?viewAdmin=absen"><span class="ml-1 item-text">Absensi Siswa</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link pl-3" href="index.php?viewAdmin=jadwal"><span class="iconify" data-icon="bx:time"></span> Jadwal</span></a>
            </li>
                <li class="nav-item">
                <a class="nav-link pl-3" href="index.php?viewAdmin=akun"><span class="ml-1 item-text"><span class="iconify" data-icon="jam:users"></span> Akun</span></a>
            </li>
            
            </ul>
        </li>
        <!--
        <li class="nav-item dropdown">
            <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-folder fe-16"></i>
                <span class="ml-3 item-text">Laporan</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                <li class="nav-item">
                    <a class="nav-link pl-3" href="index.php?viewAdmin=kasKeluar"><span class="ml-1 item-text">Kas Keluar</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="index.php?viewAdmin=kasMasuk"><span class="ml-1 item-text">Kas Masuk</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link pl-3" href="index.php?viewAdmin=sppBulanan"><span class="ml-1 item-text">Spp Bulanan</span></a>
                </li>
            </ul>
        </li>
        -->
    </ul>';
    } else
    if ($_SESSION['level'] == "guru") {
        $menu = '<ul class="navbar-nav flex-fill w-100 mb-2">
        <!--
        <li class="nav-item">
            <a href="index.php?viewAdmin=absen" class="nav-link">
                <i class="fe fe-info fe-16"></i>
               Absen
            </a>
        </li>
        -->
        <li class="nav-item">
            <a class="nav-link pl-3" href="index.php?viewAdmin=biodataGuru">Biodata Guru</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link pl-3" href="index.php?viewAdmin=siswa"><span class="ml-1 item-text">Siswa</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link pl-3" href="index.php?viewAdmin=jadwal"><span class="iconify" data-icon="bx:time"></span> Jadwal</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link pl-3" href="index.php?viewAdmin=nilaiSiswa"><span class="iconify" data-icon="ant-design:file-outlined"></span> Nilai Siswa</span></a>
        </li>
    </ul>';
    } else
    if ($_SESSION['level'] == "siswa") {
        $menu = '<ul class="navbar-nav flex-fill w-100 mb-2">
        <!-- 
        <li class="nav-item">
            <a href="index.php?viewAdmin=infoSpp" class="nav-link">
                <i class="fe fe-info fe-16"></i>
                <span class="ml-3 item-text">Info SPP</span><span class="sr-only">(current)</span>
            </a>
        </li>
        -->
        <li class="nav-item">
            <a class="nav-link pl-3" href="index.php?viewAdmin=jadwalSiswa"><span class="iconify" data-icon="bx:time"></span> Jadwal</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link pl-3" href="index.php?viewAdmin=absenSiswa"> Absen</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link pl-3" href="index.php?viewAdmin=daftarNilaiSiswa"><span class="iconify" data-icon="ant-design:file-outlined"></span> Nilai</span></a>
        </li>
    </ul>';
    }
    echo $menu;
}

function setting()
{
    if ($_SESSION['level'] == "admin") {
        $menu = '
        <a class="dropdown-item" href="index.php?viewAdmin=berita">Berita</a>
        <a class="dropdown-item" href="index.php?viewAdmin=profile">Profile</a>
        <a class="dropdown-item" href="index.php?viewAdmin=setting">Settings</a>';
    } else
    if (in_array($_SESSION['level'], ["siswa", "guru", "kepsek"])) {
        $menu = '';
    }
    echo $menu;
}

//--level
function level()
{
    $level = $_SESSION['level'];
    return $level;
}

// barcode
function barcode($data)
{
    include "app/admin/phpqrcode/qrlib.php";
    $tempdir = "app/admin/temp/"; //Nama folder tempat menyimpan file qrcode
    if (!file_exists($tempdir)) //Buat folder bername temp
        mkdir($tempdir);

    //isi qrcode jika di scan
    $codeContents = $data;

    //simpan file kedalam folder temp dengan nama 001.png
    QRcode::png($codeContents, $tempdir . "001.png");

    echo '<img src="' . $tempdir . '001.png" />';
}

// -- kelompok jumlah baris -- //
// table amount
function tableAmount($table)
{
    $data = table($table);
    $amount = mysqli_num_rows($data);
    return $amount;
}

// jumlah baris 
function jumlahBaris($data)
{
    return mysqli_num_rows($data);
}

// row table
function rowStable($table)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `$table` ");
    $rows = mysqli_num_rows($data);
    return $rows;
}

// row table id
function rowStableId($table, $get, $id)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `$table` WHERE $get='$id' ");
    return mysqli_num_rows($data);
}

// row table id and
function rowStableIdAnd($table, $getOne, $idOne, $getTwo, $idTwo)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `$table` WHERE $getOne='$idOne' AND $getTwo='$idTwo'");
    $rows = mysqli_num_rows($data);
    return $rows;
}

// rows three
function rowsThree($table, $getOne, $idOne, $getTwo, $idTwo, $getThree, $idThree)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `$table` WHERE $getOne='$idOne' AND $getTwo='$idTwo' AND $getThree='$idThree' ");
    $rows = mysqli_num_rows($data);
    return $rows;
}

// jumlah baris get two
function rowStableGetTwo($table, $getOne, $idOne, $getTwo, $idTwo)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM $table WHERE $getOne='$idOne' AND $getTwo='$idTwo' ");
    $amount = mysqli_num_rows($data);
    return $amount;
}

// jumlah one field table count
function totalfieldOneCount($table, $getOne, $idOne, $field)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT COUNT($field) AS jumlah FROM $table WHERE $getOne='$idOne' ");
    $row = mysqli_fetch_array($data);
    return $row['jumlah'];
}

// jumlah one field table sum
function totalfieldOneSUM($table, $getOne, $idOne, $field)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT SUM($field) AS jumlah FROM $table WHERE $getOne='$idOne' ");
    $row = mysqli_fetch_array($data);
    return $row['jumlah'];
}

// jumlah field table two field
function totalFieldTwoSum($table, $getOne, $idOne, $getTwo, $idTwo, $field)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT SUM($field) AS jumlah FROM $table WHERE $getOne='$idOne' AND $getTwo='$idTwo' ");
    $row = mysqli_fetch_array($data);
    return $row['jumlah'];
}

// jumlah two field table sum not 
function totalFieldTwoSumNot($table, $getOne, $idOne, $getTwo, $idTwo, $field)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT SUM($field) AS jumlah FROM $table WHERE $getOne='$idOne' AND $getTwo!='$idTwo' ");
    $row = mysqli_fetch_array($data);
    return $row['jumlah'];
}


// jumlah field table two field
function totalFieldThreeSum($table, $getOne, $idOne, $getTwo, $idTwo, $getThree, $idThree, $field)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT SUM($field) AS jumlah FROM $table WHERE $getOne='$idOne' AND $getTwo='$idTwo' AND $getThree='$idThree' ");
    $row = mysqli_fetch_array($data);
    return $row['jumlah'];
}

// -- cek spp
function cekSpp($idSiswa, $bulan, $tahun)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `pembayaran` WHERE id_siswa='$idSiswa' AND bulan='$bulan' AND tahun='$tahun' ");
    if (mysqli_num_rows($data) > 0) {
        $status = "Lunas ";
    } else {
        $status = "Belum Lunas";
    }
    return $status;
}

// pesan gagal
function pesanBerhasil($tipe)
{
    $data = '<div class="alert alert-success alert-dismissible fade show" style="position: absolute;margin: 5% 20%;z-index: 999;" role="alert">
  <strong>Berhasil!</strong> ' . $tipe . '.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    return $data;
}

// pesan gagal
function pesanGagal($tipe)
{
    $data = "<div class='alert alert-danger alert-dismissible fade show' style='position: absolute;margin: 5% 20%;z-index: 999;' role='alert'>
    <strong>Maaf !</strong> $tipe.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    return $data;
}

// alert
function alert($message, $header)
{
    if ($_SESSION['level'] == "admin") {
        $get = "viewAdmin";
    } else {
        $get = "viewAdmin";
    }
    echo "<script>
    alert('$message!!');document.location.href='index.php?$get=$header';
    </script>";
}

// table 
function table($table)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `$table` ");
    return $data;
}

// table name field
function tableNameField($table, $field)
{
    $data = table($table);
    $row = mysqli_fetch_array($data);
    return $row[$field];
}

// table name field id
function tableNameFieldId($table, $get, $id, $field)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `$table` WHERE $get='$id' ");
    $row = mysqli_fetch_array($data);
    return $row[$field];
}

// table id
function tableId($table, $get, $id)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `$table` WHERE $get='$id' ");
    return $data;
}

// table not
function tableNot($table, $get, $id)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `$table` WHERE $get!='$id' ");
    return $data;
}

// table name id and 
function tableIdAnd($table, $getOne, $idOne, $getTwo, $idTwo)
{
    global $conn;
    return mysqli_query($conn, "SELECT * FROM `$table` WHERE $getOne='$idOne' AND $getTwo='$idTwo' ");
}

// table idAndName Two
function tableIdAndField($table, $getOne, $idOne, $getTwo, $idTwo, $field)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `$table` WHERE $getOne='$idOne' AND $getTwo='$idTwo' ");
    $row = mysqli_fetch_array($data);
    return $row[$field];
}

// tableIdThree
function tableIdThree($table, $getOne, $idOne, $getTwo, $idTwo, $getThree, $idThree)
{
    global $conn;
    return mysqli_query($conn, "SELECT * FROM `$table` WHERE $getOne='$idOne' AND $getTwo='$idTwo' AND $getThree='$idThree' ");
}

// table id three
function tableIdThreeField($table, $getOne, $idOne, $getTwo, $idTwo, $getThree, $idThree, $field)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM `$table` WHERE $getOne='$idOne' AND $getTwo='$idTwo' AND $getThree='$idThree' ");
    $row = fetch($data);
    return $row[$field];
}

// four
function tableIdFour($table, $getOne, $idOne, $getTwo, $idTwo, $getThree, $idThree, $getFour, $idFour)
{
    global $conn;
    return mysqli_query($conn, "SELECT * FROM `$table` WHERE $getOne='$idOne' AND $getTwo='$idTwo' AND $getThree='$idThree' AND $getFour='$idFour'");
}

// -- delete table id header
function deleteTableId($table, $get, $id, $header)
{
    global $conn;
    $del = mysqli_query($conn, "DELETE FROM `$table` WHERE $get='$id'");
    echo "<script>
            alert('Berhasil Menghapus Data !!');document.location.href='index.php?viewAdmin=$header';
        </script>";
}

// row
function row($data)
{
    return mysqli_num_rows($data);
}

// fetch
function fetch($data)
{
    return mysqli_fetch_array($data);
}

// -- select option -- //
//select option 
function selectOption($table, $field)
{
    $data = table($table);
    while ($row = mysqli_fetch_array($data)) {
        echo '<option value="' . $row[$field] . '">' . $row[$field] . '</option>';
    }
}

//select option id
function selectOptionId($table, $field, $id)
{
    $data = table($table);
    while ($row = mysqli_fetch_array($data)) {
        echo '<option value="' . $row[$id] . '">' . $row[$field] . '</option>';
    }
}

//select option id tableId
function selectOptionIdTableId($table, $field, $id, $get, $idTable)
{
    $data = tableId($table, $get, $idTable);
    while ($row = mysqli_fetch_array($data)) {
        echo '<option value="' . $row[$id] . '">' . $row[$field] . '</option>';
    }
}

// -- link menu -- //
// menu edit 
function edit($get, $id)
{
    $data = '<a class="btn btn-success btn-sm" title="Edit" href="' . $get . '" data-toggle="modal" data-id="' . $id . '"><i class="dw dw-edit2"></i> Edit</a>';
    return $data;
}

// menu input
function input($get, $id)
{
    $data = '<a class="btn btn-success btn-sm" title="Edit" href="' . $get . '" data-toggle="modal" data-id="' . $id . '">
    <span class="iconify" data-icon="heroicons-solid:pencil-alt"></span>
    Input
    </a>';
    return $data;
}

// edit non ajax
function editNoneAjax($get, $id)
{
    $data = '<a href="index.php?viewAdmin=' . $get . '&&id=' . $id . '" class="btn btn-success btn-sm">Edit</a>';
    return $data;
}

// update nilai
function updateNilai($get, $id)
{
    $data = '<a class="btn btn-success btn-sm" title="Edit" href="' . $get . '" data-toggle="modal" data-id="' . $id . '"><span class="iconify" data-icon="bi:pencil-square"></span> Update Nilai</a>';
    return $data;
}

// menu bayar spp
function bayarSpp($get, $id)
{
    $data = '<a class="btn btn-warning btn-sm" title="Bayar Spp" href="' . $get . '" data-toggle="modal" data-id="' . $id . '"><i class="dw dw-edit2"></i> Bayar Spp</a>';
    return $data;
}

// menu input 
function view($get, $id)
{
    if ($_SESSION['level'] == "admin") {
        $getView = "viewAdmin";
    } else {
        $getView = "viewHome";
    }
    $data = '<a class="btn btn-primary btn-sm" title=".." href="index.php?' . $getView . '=' . $get . '&&id=' . $id . '" ><span class="iconify" data-icon="carbon:view"></span></a>';
    return $data;
}

// delete
function delete($get, $getId, $id, $table, $header)
{
    $data = '<a onClick=\'return confirm("Yakin Menghapus Data?")\' href="index.php?deleteAdmin=' . $get . '&&getId=' . $getId . '&&id=' . $id . '&&table=' . $table . '&&header=' . $header . '" class="btn btn-danger btn-sm"><i class="dw dw-delete-3"></i> Delete</a>';
    return $data;
}

// --update 
function updateOneId($table, $setOne, $valueOne, $getOne, $idOne)
{
    global $conn;
    if ($valueOne == "sudah di terima") {
        $update = mysqli_query($conn, "UPDATE `$table` SET `$setOne`='$valueOne', tgglSelesai='" . dateNow() . "'
                        WHERE `$getOne`='$idOne'");
    } else {
        $update = mysqli_query($conn, "UPDATE `$table` SET `$setOne`='$valueOne'
                        WHERE `$getOne`='$idOne'");
    }
    if ($update) {
        alert("Berhasil Mengubah Status Pekerjaan Menjadi $valueOne", "lihatPesanan&&id=$idOne");
    } else {
        alert("Maaf Terjadi Kesalahan", "lihatPesanan&&id=$idOne");
    }
}

// -- rupiah 
// function rupiah($data)
// {
//     $nilai = "Rp" . number_format($data, 0, ".", ".",);;
//     return $nilai;
// }

// -- potong string
function potongString($text)
{
    $num_char = 80;
    $data = substr($text, 0, $num_char) . '...';
    return $data;
}

// -- warna
function warna($data)
{
    $data = '<div style="width: 100px;height: 50px;background-color:' . $data . ';">';
    return $data;
}

// -- image
function image($data)
{
    if (!empty($data)) {
        $data = '<img src="app/admin/file/' . $data . '" width="120px" height="180px" alt="">';
    } else {
        $data = '<img src="app/admin/file/no image.jpg" width="100px" height="150px" alt="">';
    }
    return $data;
}

// -- tambah
function tambah($one, $two)
{
    $total = $one + $two;
    return $total;
}

// -- minus
function minus($one, $two)
{
    $total = $one - $two;
    return $total;
}

// -- kali
function kali($one, $two)
{
    $total = $one * $two;
    return $total;
}

// hari
function hari()
{
    $data = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
    return $data;
}

// kehadiran 
function kehadiran()
{
    $data = ['hadir', 'izin', 'sakit', 'alpha'];
    return $data;
}

// plugin css home
function pluginCssHome()
{
    $data = '';
    echo $data;
}

//plugin css admin
function pluginCssAdmin()
{
    $data = '<!-- Simple bar CSS -->
    <link rel="stylesheet" href="app/admin/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="app/admin/css/feather.css">
    <link rel="stylesheet" href="app/admin/css/select2.css">
    <link rel="stylesheet" href="app/admin/css/dropzone.css">
    <link rel="stylesheet" href="app/admin/css/uppy.min.css">
    <link rel="stylesheet" href="app/admin/css/jquery.steps.css">
    <link rel="stylesheet" href="app/admin/css/jquery.timepicker.css">
    <link rel="stylesheet" href="app/admin/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="app/admin/css/daterangepicker.css">
    <link rel="stylesheet" href="app/admin/css/dataTables.bootstrap4.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="app/admin/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="app/admin/css/app-dark.css" id="darkTheme" disabled>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>';
    echo $data;
}

// plugin js home
function pluginJsHome()
{
    $data = '
    ';
    echo $data;
}

// plugin js admin
function pluginJsAdmin()
{
    $data = '
    <script src="app/admin/js/jquery.min.js"></script>
    <script src="app/admin/js/popper.min.js"></script>
    <script src="app/admin/js/moment.min.js"></script>
    <script src="app/admin/js/bootstrap.min.js"></script>
    <script src="app/admin/js/simplebar.min.js"></script>
    <script src="app/admin/js/daterangepicker.js"></script>
    <script src="app/admin/js/jquery.stickOnScroll.js"></script>
    <script src="app/admin/js/tinycolor-min.js"></script>
    <script src="app/admin/js/config.js"></script>
    <script src="app/admin/js/d3.min.js"></script>
    <script src="app/admin/js/topojson.min.js"></script>
    <script src="app/admin/js/datamaps.all.min.js"></script>
    <script src="app/admin/js/datamaps-zoomto.js"></script>
    <script src="app/admin/js/datamaps.custom.js"></script>
    <script src="app/admin/js/Chart.min.js"></script>
    <script src="app/admin/js/gauge.min.js"></script>
    <script src="app/admin/js/jquery.sparkline.min.js"></script>
    <script src="app/admin/js/apexcharts.min.js"></script>
    <script src="app/admin/js/apexcharts.custom.js"></script>';
    echo "<script src='app/admin/js/jquery.mask.min.js'></script>
    <script src='app/admin/js/select2.min.js'></script>
    <script src='app/admin/js/jquery.steps.min.js'></script>
    <script src='app/admin/js/jquery.validate.min.js'></script>
    <script src='app/admin/js/jquery.timepicker.js'></script>
    <script src='app/admin/js/dropzone.min.js'></script>
    <script src='app/admin/js/uppy.min.js'></script>
    <script src='app/admin/js/quill.min.js'></script>
    ";
    echo $data;
}
