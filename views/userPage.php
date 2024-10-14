<?php

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<pre>";
var_dump($user);
echo "</pre>";

$title = $user->getName() . ' - Page';
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
    <h1 class="mb-5">Bonjour, <?= ucfirst($user->getName()) ?></h1>
    <div class="d-flex flex-column gap-5">
      <h5 class="card-title"><i class="fa-solid fa-envelope"></i> <?= $user->getLogin() ?></h5>
      <h5 class="card-title"><i class="fa-solid fa-location-dot"></i> <?= !empty($user->getCity()) ? $user->getCity() : 'Non renseigné' ?></h5>
      <h5 class="card-title"><i class="fa-solid fa-briefcase"></i> <?= !empty($user->getSkills()) ? $user->getSkill() : 'Non renseigné' ?></h5>
      <button type="button" class="btn btn-primary w-25 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
              <form action="index.php?ctrl=userPage&action=update&id=<?= $user->getId() ?>" method="post">
                <input class="form-control mb-3" type="text" name="nameUpd" id="name" placeholder="Nom" autocomplete="off">
                <input class="form-control mb-3" type="email" name="emailUpd" id="email" placeholder="Email">
                <input class="form-control mb-3" type="text" name="cityUpd" id="city" placeholder="Ville">
                <?php if ($user->getIdFk() == 3) : ?>
                  <input class="form-control mb-3" type="text" name="siretUpd" id="siret" placeholder="Siret">
                <?php endif; ?>
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

    <?php if ($user->getIdFk() == 3) : ?>
      <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#exampleModal1">
        Creer une nouvelle offre d'emploi
      </button>

      <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Nouvelle offre d'emploi</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="post">
                <input class="form-control mb-3" type="text" name="nameOffre" id="name" placeholder="Nom du poste">
                <input class="form-control mb-3" type="text" name="salaireOffre" id="name" placeholder="Salaire du poste">
                <input class="form-control mb-3" type="text" name="cityOffre" id="city" placeholder="Ville du poste">
                <select class="form-select mb-3" name="skillOffre" id="skill">
                  <option disabled selected>Compétences du poste</option>
                  <option value="1">PHP</option>
                  <option value="2">JavaScript</option>
                  <option value="3">Python</option>
                </select>
                <div class="form-floating">
                  <textarea class="form-control" placeholder="Description de l'offre" id="floatingTextarea2" style="height: 100px; resize: none;" name="descOffre"></textarea>
                  <label for="floatingTextarea2">Description</label>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>