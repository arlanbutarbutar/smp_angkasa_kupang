<div class="py-2 bg-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-9 d-none d-lg-block">
        <span class="icon-question-circle-o mr-2" style="color: #145f98"> Have a questions?</span>
        <span class="icon-phone2 mr-2" style="color: #145f98">(0380) 882079</span>
        <span class="icon-envelope-o mr-2" style="color: #145f98"> k2.eltarikupang@gmail.com</span>
      </div>
      <div class="col-lg-3 text-right">
        <a href="<?php if(!isset($_SESSION['auth'])==1){echo "auth/";}?>login.php" class="small mr-3" style="color: #145f98"><span class="icon-unlock-alt"></span> Log In</a>
        <a href="<?php if(isset($_SESSION['auth'])==1){echo "../";}?>profil.php" class="small text-light px-4 py-2 rounded-0" style="background-color: #145f98"><span class="iconify" data-icon="bxs:school"></span> Profil</a>
      </div>
    </div>
  </div>
</div>