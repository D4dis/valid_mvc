<nav class="navbar">
  <div class="container-nav">
    <a href="index.php">One Day One Job</a>
    <div class="icons">
      <!-- <a href=""><i class="fa-solid fa-magnifying-glass"></i></a> -->
      <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])): ?>
        <a href="index.php?route=userPage"><i class="fa-solid fa-user"></i></a>
        <a href="index.php?route=logout">Se deconnecter</a>
      <?php else: ?>
        <a href="index.php?route=login"><i class="fa-solid fa-user"></i></a>
      <?php endif; ?>
    </div>
  </div>
</nav>
