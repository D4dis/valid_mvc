<?php

$title = 'One Day One Job';

// print_r($_POST);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="icon" href="assets/img/boutique.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-up">
      <form action="" method="post">
        <h1>Créer un compte</h1>
        <span>ou utilisez votre email pour vous enregistrer</span>
        <div class="d-flex radioGroupe">
          <label for="entreprise">Entreprise</label>
          <input type="radio" id="entreprise" name="type" value="entreprise">
          <label for="etudiant">Etudiant</label>
          <input type="radio" id="etudiant" name="type" value="etudiant">
        </div>
        <input type="text" name="nameSignUp" id="nameSignUp" placeholder="Nom">
        <input type="email" name="emailSignUp" id="emailSignUp" placeholder="Email">
        <input type="password" name="pwdSignUp" id="pwdSignUp" placeholder="Mot de passe">
        <input type="password" name="ConfpwdSignUp" id="ConfpwdSignUp" placeholder="Confirmer le mot de passe">
        <button type="submit">S'enregistrer</button>
      </form>
    </div>
    <div class="form-container sign-in">
      <form action="" method="post">
        <h1>Se connecter</h1>
        <span>Utilisez votre email et mot de passe</span>
        <input type="email" name="emailSignIn" placeholder="Email">
        <input type="password" name="pwdSignIn" placeholder="Mot de passe">
        <button type="submit">Se connecter</button>
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Content de vous revoir !</h1>
          <p>Entrez vos identifiants pour utiliser toutes les fonctionnalités du site</p>
          <button class="hidden" id="login">Se connecter</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Bonjour, Bienvenue !</h1>
          <p>Inscrivez-vous pour utiliser toutes les fonctionnalités du site</p>
          <button class="hidden" id="register">S'enregistrer</button>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/script.js"></script>
</body>

</html>