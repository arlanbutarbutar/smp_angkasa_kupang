<aside class="sidebar-left border-right shadow" style="background-color: #145f98;">
  <nav class="vertnav navbar navbar-light">
    <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="home.php">
        <img src="../assets/images/la.png" alt="Logo" style="width: 75px;">
      </a>
    </div>
    <ul class="navbar-nav flex-fill w-100 mb-4">
      <li class="nav-item">
        <a href="home.php">
          <span class="text-white">Dashboard</span>
        </a>
      </li>
    </ul>
    <?php if($_SESSION['level']=="admin"){?>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="kelas.php">Data Kelas</a>
        </li>
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="mapel.php">Mata Pelajaran</a>
        </li>
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="guru.php">Data Guru</a>
        </li>
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="siswa.php">Data Siswa</a>
        </li>
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="absen.php">Absensi Siswa</a>
        </li>
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="jadwal.php">Jadwal</a>
        </li>
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="akun.php">Akun</a>
        </li>
      </ul>
    <?php }else if($_SESSION['level']=="guru"){?>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="biodataGuru.php">Biodata Guru</a>
        </li>
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="jadwal.php">Jadwal</a>
        </li>
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="absen.php">Absensi</a>
        </li>
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="nilaiSiswa.php">Nilai Siswa</a>
        </li>
      </ul>
    <?php }else if($_SESSION['level']=="siswa"){?>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="jadwal.php">Jadwal</a>
        </li>
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="absen.php">Absen</a>
        </li>
        <li class="nav-item mb-3">
          <a class="pl-3 text-white text-decoration-none" href="nilaiSiswa.php">Nilai</a>
        </li>
      </ul>
    <?php }?>
  </nav>
</aside>