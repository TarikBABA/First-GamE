<!-- 
      if (isset($_POST['cancel'])) {
        header('location: ./index.php');
        return;
      }
      // var_dump($_POST);

      $salt = 'XyZzy12*_';
      // echo hash("md5", "$salt" . "php123");
      $strored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';


      $message = "";
      // if ((isset($_POST['who']) && strlen($login) < 1)
      //   && (isset($_POST['pass']) && strlen($pass) < 1)){ 
      if (isset($_POST['who']) && isset($_POST['pass'])) {
        $login = $_POST['who'];
        $pass = $_POST['pass'];
        $code = hash('md5', $salt . $pass);

        if ((strlen($login) < 1) && (strlen($pass) < 1)) {
          $message = "Le Nom d'utilisateur ou votre mot de passe est manquant";
        } else if (!password_verify($strored_hash, $code)) {
          $message = 'Votre mot de passe est faux !';
        } else {
          header('Location: game.php?name=' . urldecode($login));
          exit();
        }
      } -->

<?php
var_dump($_POST);

if (isset($_POST['cancel'])) {
  header('location: ./index.php');
  return;
}
$code = password_hash('php123', PASSWORD_DEFAULT);
$message = "";


if (isset($_POST['who']) && isset($_POST['pass'])) {
  $login = $_POST['who'];
  $pass = $_POST['pass'];

  if ((strlen($login) < 1) && (strlen($pass) < 1)) {
    $message = "Le Nom d'utilisateur ou votre mot de passe est manquant";
  } else if (!password_verify($_POST['pass'], $code)) {
    $message = 'Votre mot de passe est faux !';
  } else {
    header('Location: game.php?name=' . urldecode($login));
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/styles.css">
  <title>page de connexion</title>
</head>

<body>
  <form class="form" method="POST" action="login.php" style="background-color: tan;">
    <h3> Se connecter </h3>
    <div class="alert-danger">
      <?php echo $message ?>

    </div>
    <label class="form-label" for="login">login</label>
    <input type="text" name="who" id="login" />

    <label class="form-label" for="pass">Mot de passe</label>
    <input type="password" name="pass" id="pass" />

    <div class="form-btn">
      <button type="submit" name="submit" class="btn" id="btn-1">Valider</button>
      <button name="cancel" class="btn" id="btn-2">Annuler</button>
    </div>
  </form>
  <section class="title">
    <p>
      Pour un indice sur le mot de passe, regarder le code source et trouver l'indice dans les commentaires HTML
    </p>
  </section>
  <footer>
    <button class="btn">
      <a href="./index.php">Back To Home</a>
    </button>
  </footer>
</body>

</html>