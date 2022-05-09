<nav class="topnav navbar navbar-light shadow">
  <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
    <i class="fas fa-bars"></i>
  </button>
  <ul class="nav">
    <li class="nav-item dropdown">
      <a class="nav-link text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="../assets/images/la.png" alt="..." class="rounded-circle" style="width: 45px;">
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
        <?php if($_SESSION['level']=="admin"){?>
          <a class="dropdown-item" href="berita.php">Berita</a>
          <a class="dropdown-item" href="profile.php">Profile</a>
          <a class="dropdown-item" href="setting.php">Settings</a>
        <?php }?>
        <a onclick="return confirm('Yakin ingin keluar dari dashboard?')" class="dropdown-item" href="../auth/logout.php">Logout</a>
      </div>
    </li>
  </ul>
</nav>