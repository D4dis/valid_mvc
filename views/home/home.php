<?php

$title = 'Acceuil';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="views/home/assets/css/index.css">
  <link rel="stylesheet" href="views/partials/navbar/assets/css/nav.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <?php include __DIR__ . '/../partials/navbar/navbar.php'; ?>

  <div class="container">
    <div class="top">
      <h1>One Day One Job</h1>
      <p><?= isset($_SESSION) && !empty($_SESSION['user_id']) ?  $_SESSION['user_id'] : '' ?></p>
      <p><?= isset($_SESSION) && !empty($_SESSION['user_name']) ?  $_SESSION['user_name'] : '' ?></p>
      <p><?= isset($_SESSION) && !empty($_SESSION['connected']) ?  $_SESSION['connected'] : '' ?></p>
    </div>
    <div class="mid">
      <form method="get">
        <li class="search-group">
          <div class="search-bar">
            <div class="row">
              <div class="rowJob">
                <div class="container-searchJob"><input type="text" class="searchJob" name="searchJob" id="searchJob" autocomplete="off" placeholder="Métiers"></div>
                <div class="result-box-job">
                </div>
              </div>
              <div class="line"></div>
              <div class="container-searchLoc"><input type="text" name="searchLoc" id="searchLoc" autocomplete="off" placeholder="Localisation"></div>
              <button type="submit">Filtrer</button>
            </div>
          </div>
        </li>
      </form>
    </div>
    <div class="bot">
      <a href="">
        <div class="card">
          <div class="card-top">
            <h2>Titre</h2>
            <h2>Nom entreprise</h2>
          </div>
          <div class="card-bot">
            <div class="type">CDI</div>
            <div class="location"><i class="fa-solid fa-location-dot"></i>Montpellier</div>
            <div class="categorie"><i class="fa-solid fa-briefcase"></i>Design</div>
          </div>
        </div>
      </a>
    </div>
  </div>

</body>

<script src="views/home/assets/js/index.js"></script>

</html>