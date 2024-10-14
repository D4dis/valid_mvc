<nav class="navbar">
  <div class="container-nav">
    <a href="index.php">One Day One Job</a>
    <div class="icons">
      <!-- <a href=""><i class="fa-solid fa-magnifying-glass"></i></a> -->
      <a href="index.php?ctrl=userPage&id=<?= (isset($_SESSION['id'])&& !empty($_SESSION['id'])) ? $_SESSION['id'] : '' ?>" id="icon"><i class="fa-solid fa-user"></i></a>
      <a href="index.php?ctrl=user&action=logout">Se deconnecter</a>
    </div>
  </div>
</nav>