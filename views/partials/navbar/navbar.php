<nav class="navbar">
  <div class="container-nav">
    <a href="index.php">One Day One Job</a>
    <div class="icons">
      <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
      <a href="index.php?route=<?php if (isset($_SESSION) && $_SESSION['connected'] == 1) echo 'user';
        else{
          echo 'login';
        } ?>"><i class="fa-solid fa-user"></i></a>
      <a href="index.php?route=logout">Se deconnecter</a>
    </div>
  </div>
</nav>