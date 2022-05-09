<?php require_once('../controller/script.php');
if($_SESSION['page-to']=="berita.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    $query="SELECT * FROM tbl_berita WHERE judul LIKE '%$key%' ORDER BY id_berita DESC";
    $tableBerita=mysqli_query($conn, $query);
  } 
  $no=1; if(mysqli_num_rows($tableBerita)==0){
?>
  <tr>
    <th class="text-dark font-weight-bold" colspan="8">Belum ada data</th>
  </tr>
<?php }else if(mysqli_num_rows($tableBerita)>0){while($row=mysqli_fetch_assoc($tableBerita)){?>
  <tr>
    <td class="text-dark font-weight-bold"><?= $no;?></td>
    <td><?= $row['judul']?></td>
    <td><img src='../assets/images/berita/<?= $row['gambar']?>' width='130px' height='130px'></td>
    <td><?= strip_tags($row['deskripsi'])?></td>
    <td><?= $row['pembuat']?></td>
    <td><?= $row['kategori']?></td>
    <td><a href="edit-berita.php?id=<?= $row['id_berita']?>" class="btn btn-warning btn-sm">Ubah</a></td>
    <td>
      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $row['id_berita']?>">Hapus</button>
      <div class="modal fade" id="hapus<?= $row['id_berita']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?= $row['judul']?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                Anda yakin ingin hapus <?= $row['judul']?>?
              </div>
              <div class="modal-footer justify-content-center">
                <input type="hidden" name="id-berita" value="<?= $row['id_berita']?>">
                <input type="hidden" name="img-beritaOld" value="<?= $row['gambar']?>">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" name="hapusBerita" class="btn btn-danger btn-sm">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
  </tr>
<?php $no++; }}}
if($_SESSION['page-to']=="setting.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    // $query="SELECT * FROM tbl_berita WHERE judul LIKE '%$key%' ORDER BY id_berita DESC";
    // $tableBerita=mysqli_query($conn, $query);
  }
?>
<?php }
if($_SESSION['page-to']=="kelas.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    $query="SELECT * FROM kelas WHERE kelas LIKE '%$key%' ORDER BY id_kelas DESC";
    $tableKelas=mysqli_query($conn, $query);
  } 
  $no=1; if(mysqli_num_rows($tableKelas)==0){
?>
  <tr>
    <th colspan="5">Belum ada data</th>
  </tr>
<?php }else if(mysqli_num_rows($tableKelas)>0){while($row=mysqli_fetch_assoc($tableKelas)){?>
  <tr>
    <td class="text-dark font-weight-bold"><?= $no;?></td>
    <td><?= $row['kelas']?></td>
    <?php $id_kelas=$row['id_kelas'];
      $checkSiswa=mysqli_query($conn, "SELECT * FROM siswa WHERE id_kelas='$id_kelas'");
      $arraySiswa=mysqli_num_rows($checkSiswa);
    ?>
    <td><?= $arraySiswa;?></td>
    <td>
      <button type="button" data-toggle="modal" data-target="#ubahKelas<?= $row['id_kelas']?>" class="btn btn-warning btn-sm">Ubah</button>
      <div class="modal fade" id="ubahKelas<?= $row['id_kelas']?>" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ubah Kelas</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label for="kelas">Kelas Baru</label>
                  <input type="text" name="kelas" value="<?= $row['kelas']?>" id="kelas" class="form-control" required>
                </div>
              </div>
              <div class="modal-footer justify-content-center">
                <input type="hidden" name="id-kelas" value="<?= $row['id_kelas']?>">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" name="ubahKelas" class="btn btn-warning btn-sm">Ubah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
    <td>
      <button type="button" data-toggle="modal" data-target="#hapusKelas<?= $row['id_kelas']?>" class="btn btn-danger btn-sm">Hapus</button>
      <div class="modal fade" id="hapusKelas<?= $row['id_kelas']?>" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Hapus Kelas</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                Anda yakin ingin hapus kelas <?= $row['kelas']?>?
              </div>
              <div class="modal-footer justify-content-center">
                <input type="hidden" name="id-kelas" value="<?= $row['id_kelas']?>">
                <input type="hidden" name="kelas" value="<?= $row['kelas']?>">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" name="hapusKelas" class="btn btn-danger btn-sm">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
  </tr>
<?php $no++; }}}
if($_SESSION['page-to']=="mapel.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    $query="SELECT * FROM tbl_mapel JOIN kelas ON tbl_mapel.id_kelas=kelas.id_kelas WHERE tbl_mapel.mapel LIKE '%$key%' OR kelas.kelas LIKE '%$key%' ORDER BY tbl_mapel.id_mapel DESC";
    $tableMapel=mysqli_query($conn, $query);
  } 
  $no=1; if(mysqli_num_rows($tableMapel)==0){
?>
  <tr>
    <th class="text-dark font-weight-bold" colspan="5">Belum ada data</th>
  </tr>
<?php }else if(mysqli_num_rows($tableMapel)>0){while($row=mysqli_fetch_assoc($tableMapel)){?>
  <tr>
    <th class="text-dark font-weight-bold"><?= $no;?></th>
    <td><?= $row['mapel']?></td>
    <td><?= $row['kelas']?></td>
    <td>
      <button type="button" data-toggle="modal" data-target="#ubahMapel<?= $row['id_mapel']?>" class="btn btn-warning btn-sm">Ubah</button>
      <div class="modal fade" id="ubahMapel<?= $row['id_mapel']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Mapel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label for="mapel">Mata Pelajaran</label>
                  <input type="text" name="mapel" value="<?= $row['mapel']?>" id="mapel" class="form-control" placeholder="Mata Pelajaran" required>
                </div>
                <div class="form-group">
                  <label for="id_kelas">Kelas</label>
                  <select name="id-kelas" id="id_kelas" class="form-control">
                    <?php foreach($selectKelas as $rowSK):?>
                    <option value="<?= $rowSK['id_kelas']?>"><?= $rowSK['kelas']?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="modal-footer justify-content-center">
                <input type="hidden" name="id-mapel" value="<?= $row['id_mapel']?>">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" name="ubahMapel" class="btn btn-warning btn-sm">Ubah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
    <td>
      <button type="button" data-toggle="modal" data-target="#hapusMapel<?= $row['id_mapel']?>" class="btn btn-danger btn-sm">Hapus</button>
      <div class="modal fade" id="hapusMapel<?= $row['id_mapel']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Mapel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post">
              <div class="modal-body">
                Anda yakin ingin menghapus mata pelajaran <?= $row['mapel']?>?
              </div>
              <div class="modal-footer justify-content-center">
                <input type="hidden" name="id-mapel" value="<?= $row['id_mapel']?>">
                <input type="hidden" name="mapel" value="<?= $row['mapel']?>">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" name="hapusMapel" class="btn btn-danger btn-sm">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
  </tr>
<?php $no++; }}}
if($_SESSION['page-to']=="guru.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    $query="SELECT * FROM guru JOIN kelas ON guru.id_kelas=kelas.id_kelas JOIN status_guru ON guru.id_status=status_guru.id_status JOIN tbl_mapel ON guru.id_mapel=tbl_mapel.id_mapel WHERE guru.nip LIKE '%$key%' ORDER BY guru.id_guru DESC";
    $tableGuru=mysqli_query($conn, $query);
  } $no=1; if(mysqli_num_rows($tableGuru)==0){
?>
    <tr>
      <th class="text-dark font-weight-bold" colspan="15">Belum ada data</th>
    </tr>
<?php }else if(mysqli_num_rows($tableGuru)>0){while($row=mysqli_fetch_assoc($tableGuru)){?>
  <tr>
    <td class="text-dark font-weight-bold"><?= $no;?></td>
    <td><?= $row['nip']?></td>
    <td><?= $row['nama']?></td>
    <td><?= $row['jenis_kelamin']?></td>
    <td><?= $row['alamat']?></td>
    <td><?= $row['tempat_lahir']." ".$row['tgl_lahir']?></td>
    <td><?= $row['agama']?></td>
    <td><?= $row['status_aktif']?></td>
    <td><?= $row['mapel']?></td>
    <td><img src="../assets/images/guru/<?= $row['foto']?>" style="width: 150px;height: 150px;object-fit: cover;" class="rounded-circle" alt="<?= $row['nama']?>"></td>
    <td><?= $row['kelas']?></td>
    <td><?= $row['status']?></td>
    <td>
      <?php $nip=$row['nip']; 
        $checkNIP=mysqli_query($conn, "SELECT * FROM tbl_akun WHERE nip='$nip'");
        if(mysqli_num_rows($checkNIP)==0){
      ?>
        <button type="button" data-toggle="modal" data-target="#akunGuru<?= $row['id_guru']?>" class="btn btn-primary btn-sm"><i class="fas fa-user"></i> Buat Akun</button>
        <div class="modal fade" id="akunGuru<?= $row['id_guru']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="POST">
                <div class="modal-body">
                  Anda yakin ingin membuat akun guru <?= $row['nama']?>?
                </div>
                <div class="modal-footer justify-content-center">
                  <input type="hidden" name="nip" value="<?= $row['nip']?>">
                  <input type="hidden" name="nama" value="<?= $row['nama']?>">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                  <button type="submit" name="akunGuru" class="btn btn-primary btn-sm">Buat Sekarang</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php }?>
    </td>
    <td>
      <button type="button" data-toggle="modal" data-target="#ubahGuru<?= $row['id_guru']?>" class="btn btn-warning btn-sm">Ubah</button>
      <div class="modal fade" id="ubahGuru<?= $row['id_guru']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $row['nama']?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label for="nip">Nip</label>
                  <input type="number" name="nip" value="<?= $row['nip']?>" id="nip" class="form-control" required />
                </div>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" value="<?= $row['nama']?>" id="nama" class="form-control" required />
                </div>
                <div class="form-group">
                  <label for="jenis-kelamin">Jenis Kelamin</label>
                  <select name="jenis-kelamin" id="jenis-kelamin" class="form-control" required>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="address" name="alamat" value="<?= $row['alamat']?>" id="alamat" class="form-control" required/>
                </div>
                <div class="form-group">
                  <label for="tempat-lahir">Tempat Lahir</label>
                  <input type="text" name="tempat-lahir" value="<?= $row['tempat_lahir']?>" id="tempat-lahir" class="form-control" required/>
                </div>
                <div class="form-group">
                  <label for="tgl-lahir">Tgl Lahir</label>
                  <input type="date" name="tgl-lahir" value="<?= $row['tgl_lahir']?>" id="tgl-lahir" class="form-control" required/>
                </div>
                <div class="form-group">
                  <label for="agama">Agama</label>
                  <input type="text" name="agama" value="<?= $row['agama']?>" id="agama" class="form-control" required/>
                </div>
                <div class="form-group">
                  <label for="status-aktif">Status Aktif</label>
                  <select name="status-aktif" id="status-aktif" class="form-control" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="mapel">Mata Pelajaran</label>
                  <select name="id-mapel" id="id-mapel" class="form-control" required>
                    <?php foreach($selectMapel as $rowSM):?>
                    <option value="<?= $rowSM['id_mapel']?>"><?= $rowSM['mapel']?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="id-kelas">Wali Kelas</label>
                  <select name="id-kelas" id="id-kelas" class="form-control" required>
                    <?php foreach($selectKelas as $rowSK):?>
                    <option value="<?= $rowSK['id_kelas']?>"><?= $rowSK['kelas']?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="id-status">Status Jabatan</label>
                  <select name="id-status" id="id-status" class="form-control" required>
                    <?php foreach($selectStatusGuru as $rowSSG):?>
                    <option value="<?= $rowSSG['id_status']?>"><?= $rowSSG['status']?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="img-guru">Profile Guru</label>
                  <div class="custom-file">
                    <input type="file" name="img-guru" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-center">
                <input type="hidden" name="id-guru" value="<?= $row['id_guru']?>">
                <input type="hidden" name="img-guruOld" value="<?= $row['foto']?>">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" name="ubahGuru" class="btn btn-warning btn-sm">Ubah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
    <td>
      <button type="button" data-toggle="modal" data-target="#hapusGuru<?= $row['id_guru']?>" class="btn btn-danger btn-sm"><i class="fas fa-user"></i> Hapus</button>
      <div class="modal fade" id="hapusGuru<?= $row['id_guru']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Guru</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                Anda yakin ingin menghapus guru <?= $row['nama']?>?
              </div>
              <div class="modal-footer justify-content-center">
                <input type="hidden" name="id-guru" value="<?= $row['id_guru']?>">
                <input type="hidden" name="nip" value="<?= $row['nip']?>">
                <input type="hidden" name="nama" value="<?= $row['nama']?>">
                <input type="hidden" name="img-guruOld" value="<?= $row['foto']?>">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" name="hapusGuru" class="btn btn-danger btn-sm">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
  </tr>
<?php $no++; }}}
if($_SESSION['page-to']=="siswa.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    $query="SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE siswa.nisn LIKE '%$key%' ORDER BY siswa.id_siswa DESC";
    $tableSiswa=mysqli_query($conn, $query);
  }$no=1; if(mysqli_num_rows($tableSiswa)==0){
?>
    <tr>
      <th class="text-dark font-weight-bold" colspan="9">Belum ada data</th>
    </tr>
<?php }else if(mysqli_num_rows($tableSiswa)>0){while($row=mysqli_fetch_assoc($tableSiswa)){?>
  <tr>
    <td class="text-dark font-weight-bold"><?= $no;?></td>
    <td><?= $row['nisn']?></td>
    <td><?= $row['nama']?></td>
    <td><?= $row['kelas']?></td>
    <td><?= $row['jk']?></td>
    <td><?= $row['tanggalLahir']?></td>
    <td><?= $row['alamat']?></td>
    <td>
      <button type="button" data-toggle="modal" data-target="#informasiSiswa<?= $row['id_siswa']?>" class="btn btn-link btn-sm">Lihat</button>
      <div class="modal fade" id="informasiSiswa<?= $row['id_siswa']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Informasi Siswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?= $row['informasi']?>
            </div>
          </div>
        </div>
      </div>
    </td>
    <td>
      <?php $nisn=$row['nisn']; 
        $checkNISN=mysqli_query($conn, "SELECT * FROM tbl_akun WHERE nisn='$nisn'");
        if(mysqli_num_rows($checkNISN)==0){
      ?>
        <button type="button" data-toggle="modal" data-target="#akunSiswa<?= $row['id_siswa']?>" class="btn btn-primary btn-sm"><i class="fas fa-user"></i> Buat Akun</button>
        <div class="modal fade" id="akunSiswa<?= $row['id_siswa']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Akun Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="POST">
                <div class="modal-body">
                  Anda yakin ingin membuat akun siswa <?= $row['nama']?>?
                </div>
                <div class="modal-footer justify-content-center">
                  <input type="hidden" name="nisn" value="<?= $row['nisn']?>">
                  <input type="hidden" name="nama" value="<?= $row['nama']?>">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                  <button type="submit" name="akunSiswa" class="btn btn-primary btn-sm">Buat Sekarang</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php }?>
    </td>
    <td>
      <button type="button" data-toggle="modal" data-target="#ubahSiswa<?= $row['id_siswa']?>" class="btn btn-warning btn-sm">Ubah</button>
      <div class="modal fade" id="ubahSiswa<?= $row['id_siswa']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $row['nama']?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="nisn">Nisn</label>
                      <input type="number" name="nisn" value="<?= $row['nisn']?>" id="nisn" class="form-control" required />
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" name="nama" value="<?= $row['nama']?>" id="nama" class="form-control" required />
                    </div>
                    <div class="form-group">
                      <label for="id-kelas">Kelas</label>
                      <select name="id-kelas" id="id-kelas" class="form-control" required>
                        <?php foreach($selectKelas as $rowSK):?>
                        <option value="<?= $rowSK['id_kelas']?>"><?= $rowSK['kelas']?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea name="alamat" id="alamat" cols="5" rows="5" class="form-control" required><?= $row['alamat']?></textarea>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="jk">Jenis Kelamin</label>
                      <select name="jk" id="jk" class="form-control" required>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="tanggalLahir">Tanggal Lahir</label>
                      <input type="date" name="tanggalLahir" value="<?= $row['tanggalLahir']?>" id="tanggalLahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="informasi">Informasi</label>
                      <textarea name="informasi" id="informasi" cols="5" rows="9" class="form-control"><?= $row['informasi']?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer justify-content-center">
                <input type="hidden" name="id-siswa" value="<?= $row['id_siswa']?>">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" name="ubahSiswa" class="btn btn-warning btn-sm">Ubah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
    <td>
      <button type="button" data-toggle="modal" data-target="#hapusSiswa<?= $row['id_siswa']?>" class="btn btn-danger btn-sm"><i class="fas fa-user"></i> Hapus</button>
      <div class="modal fade" id="hapusSiswa<?= $row['id_siswa']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Siswa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                Anda yakin ingin menghapus siswa <?= $row['nama']?>?
              </div>
              <div class="modal-footer justify-content-center">
                <input type="hidden" name="id-siswa" value="<?= $row['id_siswa']?>">
                <input type="hidden" name="nisn" value="<?= $row['nisn']?>">
                <input type="hidden" name="nama" value="<?= $row['nama']?>">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" name="hapusSiswa" class="btn btn-danger btn-sm">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
  </tr>
<?php $no++; }}}
if($_SESSION['page-to']=="absen.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    if($_SESSION['level']=="admin"){
      $query="SELECT * FROM tbl_mapel JOIN kelas ON tbl_mapel.id_kelas=kelas.id_kelas WHERE tbl_mapel.mapel LIKE '%$key%' OR kelas.kelas LIKE '%$key%' ORDER BY tbl_mapel.id_mapel DESC";
    }else if($_SESSION['level']=="guru"){
      $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-user']))));
      $checkNIP=mysqli_query($conn, "SELECT * FROM tbl_akun JOIN guru ON tbl_akun.nip=guru.nip WHERE tbl_akun.id_akun='$id_user'");
      $row_checkNIP=mysqli_fetch_assoc($checkNIP);
      $id_guru=$row_checkNIP['id_guru'];
      $query="SELECT * FROM guru JOIN tbl_mapel ON guru.id_mapel=tbl_mapel.id_mapel JOIN kelas ON guru.id_kelas=kelas.id_kelas WHERE guru.id_guru='$id_guru' AND tbl_mapel.mapel LIKE '%$key%' OR kelas.kelas LIKE '%$key%' ORDER BY tbl_mapel.id_mapel DESC";
    }
    $tableCheckAbsensi=mysqli_query($conn, $query);
  }$no=1; if(mysqli_num_rows($tableCheckAbsensi)==0){
?>
  <tr>
    <th class="text-dark font-weight-bold" colspan="4">Belum ada data</th>
  </tr>
<?php }else if(mysqli_num_rows($tableCheckAbsensi)>0){while($row=mysqli_fetch_assoc($tableCheckAbsensi)){?>
  <tr>
    <td class="text-dark font-weight-bold"><?= $no;?></td>
    <td><?= $row['mapel']?></td>
    <td><?= $row['kelas']?></td>
    <td><a href="isi-absen.php?id_mapel=<?= $row['id_mapel']?>&id_kelas=<?= $row['id_kelas']?>" class="btn btn-primary btn-sm">Cek Absen</a></td>
    <?php if($_SESSION['level']=="guru"){?>
      <td><a href="absen-terisi.php?id_mapel=<?= $row['id_mapel']?>&id_kelas=<?= $row['id_kelas']?>" class="btn btn-success btn-sm">Lihat Absen</a></td>
    <?php }?>
  </tr>
<?php $no++; }}}
if($_SESSION['page-to']=="jadwal.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    if($_SESSION['level']=="admin"){
      $query="SELECT * FROM jadwal JOIN tbl_mapel ON jadwal.id_mapel=tbl_mapel.id_mapel JOIN kelas ON jadwal.id_kelas=kelas.id_kelas JOIN guru ON jadwal.id_guru=guru.id_guru WHERE tbl_mapel.mapel LIKE '%$key%'";
    }else if($_SESSION['level']=="guru"){
      $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-user']))));
      $checkNIP=mysqli_query($conn, "SELECT * FROM tbl_akun JOIN guru ON tbl_akun.nip=guru.nip WHERE tbl_akun.id_akun='$id_user'");
      $row_checkNIP=mysqli_fetch_assoc($checkNIP);
      $id_guru=$row_checkNIP['id_guru'];
      $query="SELECT * FROM jadwal JOIN tbl_mapel ON jadwal.id_mapel=tbl_mapel.id_mapel JOIN kelas ON jadwal.id_kelas=kelas.id_kelas JOIN guru ON jadwal.id_guru=guru.id_guru WHERE jadwal.id_guru='$id_guru' AND tbl_mapel.mapel LIKE '%$key%'";
    }
    $tableJadwal=mysqli_query($conn, $query);
  }if(mysqli_num_rows($tableJadwal)==0){
?>
  <tr>
    <th class="text-dark font-weight-bold" colspan="<?php if($_SESSION['level']=="guru"){echo "7";}else if($_SESSION['level']=="admin"){echo "8";}?>">Belum ada data</th>
  </tr>
<?php }else if(mysqli_num_rows($tableJadwal)>0){while($row=mysqli_fetch_assoc($tableJadwal)){?>
  <tr>
    <td><?= $row['mapel']?></td>
    <td><?= $row['nama']?></td>
    <td><?= $row['kelas']?></td>
    <td><?= $row['ruang']?></td>
    <td><?= $row['lama_mengajar']."/jam"?></td>
    <td><?= $row['hari']?></td>
    <td><?= $row['jam']?></td>
    <?php if($_SESSION['level']=="admin"){?>
    <td>
      <button type="button" data-toggle="modal" data-target="#hapusJadwal<?= $row['id_jadwal']?>" class="btn btn-danger btn-sm">Hapus</button>
      <div class="modal fade" id="hapusJadwal<?= $row['id_jadwal']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Jadwal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                Anda yakin ingin menghapus jadwal <?= $row['mapel']?>?
              </div>
              <div class="modal-footer justify-content-center">
                <input type="hidden" name="id-jadwal" value="<?= $row['id_jadwal']?>">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" name="hapusJadwal" class="btn btn-danger btn-sm">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
    <?php }?>
  </tr>
<?php }}}
if($_SESSION['page-to']=="akun.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    $query="SELECT * FROM tbl_akun WHERE id_akun!='$id_user' AND email LIKE '%$key%' ORDER BY id_akun DESC";
    $tableAkun=mysqli_query($conn, $query);
  } $no=1; if(mysqli_num_rows($tableAkun)==0){
?>
  <tr>
    <th class="text-dark font-weight-bold" colspan="4">Belum ada data</th>
  </tr>
<?php }else if(mysqli_num_rows($tableAkun)>0){while($row=mysqli_fetch_assoc($tableAkun)){?>
  <tr>
    <td><?= $no;?></td>
    <td><?= $row['email']?></td>
    <td><?= $row['level']?></td>
    <td>
      <button type="button" data-toggle="modal" data-target="#hapusAkun<?= $row['id_akun']?>" class="btn btn-danger btn-sm"><i class="fas fa-user"></i> Hapus</button>
      <div class="modal fade" id="hapusAkun<?= $row['id_akun']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                Anda yakin ingin menghapus akun <?= $row['email']?>?
              </div>
              <div class="modal-footer justify-content-center">
                <input type="hidden" name="id-akun" value="<?= $row['id_akun']?>">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" name="hapusAkun" class="btn btn-danger btn-sm">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
  </tr>
<?php $no++; }}}
if($_SESSION['page-to']=="nilaiSiswa.php"){
  if(isset($_GET['key'])&&$_GET['key']!=""){
    $key=addslashes(trim($_GET['key']));
    $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['id-user']))));
    $checkNIP=mysqli_query($conn, "SELECT * FROM tbl_akun JOIN guru ON tbl_akun.nip=guru.nip WHERE tbl_akun.id_akun='$id_user'");
    $row_checkNIP=mysqli_fetch_assoc($checkNIP);
    $id_guru=$row_checkNIP['id_guru'];
    $query="SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN guru ON siswa.id_kelas=guru.id_kelas WHERE guru.id_guru='$id_guru' AND siswa.nama LIKE '%$key%' ORDER BY siswa.id_siswa DESC";
    $tableCheckNilai=mysqli_query($conn, $query);
  } $no=1; if(mysqli_num_rows($tableCheckNilai)==0){
?>
  <tr>
    <th class="text-dark font-weight-bold" colspan="4">Belum ada data</th>
  </tr>
<?php }else if(mysqli_num_rows($tableCheckNilai)>0){while($row=mysqli_fetch_assoc($tableCheckNilai)){?>
  <tr>
    <td class="text-dark font-weight-bold"><?= $no;?></td>
    <td><?= $row['nama']?></td>
    <td><?= $row['kelas']?></td>
    <td><a href="isi-nilai.php?id_siswa=<?= $row['id_siswa']?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Nilai</a></td>
  </tr>
<?php $no++; }}}
?>