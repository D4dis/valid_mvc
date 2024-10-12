<nav class="navbar">
  <div class="container-nav">
    <a href="index.php">One Day One Job</a>
    <div class="icons">
      <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
      <a href="<?php if (isset($_SESSION) && !empty($_SESSION['user_id'])) echo 'index.php?route=user';
                else {
                  echo 'index.php?route=login';
                } ?>"><i class="fa-solid fa-user"></i></a>
      <a href="index.php?route=logout">Se deconnecter</a>
    </div>
  </div>
</nav>