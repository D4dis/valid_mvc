<?php

// echo "<pre>";
// var_dump($userData->debug());
// echo "</pre>";
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

<body style="background-color: #DADADA;">

  <?php include 'partials/navbar/navbar.php'; ?>


  <div class="container mt-5" style="margin-top: 100px !important;">
    <h1 class="mb-5">Bonjour, <?= ucfirst($userData->getNom()) ?></h1>
    <div class="d-flex flex-column gap-5">
      <h5 class="card-title"><i class="fa-solid fa-envelope"></i> <?= $userData->getLogin() ?></h5>
      <h5 class="card-title"><i class="fa-solid fa-location-dot"></i> <?= !empty($userData->getCity()) ? $userData->getCity() : 'Non renseigné' ?></h5>
      <h5 class="card-title"><i class="fa-solid fa-briefcase"></i> <?= !empty($userData->getSkill()) ? $userData->getSkill() : 'Non renseigné' ?></h5>
      <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Modifier mes informations
      </button>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier mes informations</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                <input class="form-control mb-3" type="text" name="nameUpd" id="name" placeholder="Nom">
                <input class="form-control mb-3" type="email" name="emailUpd" id="email" placeholder="Email">
                <input class="form-control mb-3" type="text" name="cityUpd" id="city" placeholder="Ville">
                <select class="form-select mb-3" name="skillUpd" id="skill">
                  <option disabled selected>Compétences</option>
                  <option value="1">PHP</option>
                  <option value="2">JavaScript</option>
                  <option value="3">Python</option>
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>