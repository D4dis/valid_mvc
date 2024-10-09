<?php

$title = 'Offer Page';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/offerPage.css">
  <link rel="stylesheet" href="../assets/css/nav.css">
</head>

<body>

  <?php include 'partials/navbar.php'; ?>

  <div class="container">
    <div class="left">
      <div class="type">CDI</div>
      <h1>Titre de l'offre</h1>
      <div class="spec"></div>
      <div class="line"></div>
      <h3>Description du poste</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia nihil natus veniam numquam alias quisquam dolor voluptates assumenda culpa quam! Illo aut perferendis maxime ab sit repellat voluptatem, provident dicta.</p>
    </div>
    <div class="right">
      <h2>Nom entreprise</h2>
      <div class="line"></div>
      <div class="type">CDI</div>
      <h1>Titre de l'offre</h1>
      <div class="icon"><i class="fa-solid fa-location-dot"></i>Montpellier</div>
      <div class="icon"><i class="fa-solid fa-briefcase"></i>Design</div>
      <div class="icon"><i class="fa-solid fa-tag"></i>2024-10-08</div>
      <a href="">Postuler</a>
    </div>
  </div>

</body>

</html>