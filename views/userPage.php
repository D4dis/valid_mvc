<?php

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= ucfirst($title) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="views/partials/navbar/assets/css/nav.css">
</head>

<body>

  <?php include 'partials/navbar/navbar.php'; ?>


  <div class="container mt-5" style="margin-top: 100px !important;">
    <h1 class="mb-5">Bonjour, <?= ucfirst($_SESSION['user_name']) ?></h1>
    <div class="d-flex flex-column gap-5">
      <h5 class="card-title"><i class="fa-solid fa-envelope"></i> <?= $_SESSION['user_email'] ?></h5>
      <h5 class="card-title"><i class="fa-solid fa-location-dot"></i> <?= (isset($_SESSION['user_city']) && !empty($_SESSION['user_city'])) ? $_SESSION['user_city'] : 'Non renseigné' ?></h5>
      <h5 class="card-title"><i class="fa-solid fa-briefcase"></i> <?= (isset($_SESSION['user_skill']) && !empty($_SESSION['user_skill'])) ? $_SESSION['user_skill'] : 'Non renseigné' ?></h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary w-25">Modifier mes informations</a>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>