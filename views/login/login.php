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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="views/login/assets/css/login.css">
  <link rel="stylesheet" href="views/partials/navbar/assets/css/nav.css">
</head>

<body>
  <?php if (isset($error) && !empty($error)): ?>
    <div><?php echo $error; ?></div>
  <?php endif; ?>
  <?php if (isset($success) && !empty($success)): ?>
    <div><?php echo $success; ?></div>
  <?php endif; ?>

  <p><?= (isset($_SESSION['error']) && !empty($_SESSION['error'])) ? $_SESSION['error'] : '' ?></p>

  <div class="container" id="container">
    <div class="form-container sign-up">
      <form action="index.php?ctrl=login&action=signUp" method="post">
        <h1>Créer un compte</h1>
        <span>Utilisez votre email pour vous enregistrer</span>
        <div class="d-flex radioGroupe">
          <label for="entreprise">Entreprise</label>
          <input type="radio" id="entreprise" name="role" value="3" required>
          <label for="etudiant">Etudiant</label>
          <input type="radio" id="etudiant" name="role" value="2" required>
        </div>
        <input type="text" name="nameSignUp" id="nameSignUp" placeholder="Nom" required>
        <input type="email" name="emailSignUp" id="emailSignUp" placeholder="Email" required>
        <input type="password" name="pwdSignUp" id="pwdSignUp" placeholder="Mot de passe" required>
        <input type="password" name="ConfpwdSignUp" id="ConfpwdSignUp" placeholder="Confirmer le mot de passe" required>
        <button type="submit" name="signup">S'inscrire</button>
      </form>
    </div>
    <div class="form-container sign-in">
      <form action="index.php?ctrl=login&action=signIn" method="post">
        <h1>Se connecter</h1>
        <span>Utilisez votre email et mot de passe</span>
        <input type="email" name="emailSignIn" placeholder="Email" required>
        <input type="password" name="pwdSignIn" placeholder="Mot de passe" required>
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
  <script src="views/login/assets/js/login.js"></script>
</body>

</html>
