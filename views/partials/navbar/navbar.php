<nav class="navbar">
  <div class="container-nav">
    <a href="index.php">One Day One Job</a>
    <div class="icons">
      <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
      <a href="index.php?route=<?= $userController->is_connected ? 'user' : 'login' ?>"><i class="fa-solid fa-user"></i></a>
      <a href="index.php?route=logout">Se deconnecter</a>
    </div>
  </div>
</nav>