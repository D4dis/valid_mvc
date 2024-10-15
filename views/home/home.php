<?php

$title = 'Acceuil';

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<pre>";
var_dump($cards);
echo "</pre>";

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

  <?php include 'views/partials/navbar/navbar.php'; ?>

  <div class="container">
    <div class="top">
      <h1>One Day One Job</h1>
    </div>
    <div class="mid">
      <form action="" method="get">
        <li class="search-group">
          <div class="search-bar">
            <div class="row">
              <div class="container-searchJob"><input type="text" class="searchJob" name="searchJob" id="searchJob" autocomplete="off" placeholder="Métiers"></div>
              <div class="line"></div>
              <div class="container-searchLoc"><input type="text" name="searchLoc" id="searchLoc" autocomplete="off" placeholder="Localisation"></div>
              <button type="submit">Filtrer</button>
            </div>
          </div>
        </li>
      </form>
    </div>
    <div class="bot">
      <?php foreach ($cards as $card) : ?>
        <a href="">
          <div class="card">
            <div class="card-top">
              <h2><?= $card->getTitle() ?></h2>
              <h2><?= ucfirst($card->getName()) ?></h2>
            </div>
            <div class="card-bot">
              <div class="type">CDI</div>
              <div class="location"><i class="fa-solid fa-location-dot"></i><?= ucfirst($card->getCity()) ?></div>
              <div class="categorie"><i class="fa-solid fa-briefcase"></i><?= ucfirst($card->getRequirement()) ?></div>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

</body>


</html>