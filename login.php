<?php
if (isset($_POST['cancel'])) {
    header('location: ./index.php');
    return;
}

$code = password_hash('php123', PASSWORD_DEFAULT);
$message = "";


if (isset($_POST['who']) && isset($_POST['pass'])) {
    $login = htmlentities($_POST['who'], ENT_QUOTES, 'UTF-8');
    $pass = htmlentities($_POST['pass'], ENT_QUOTES, 'UTF-8');

    if ((strlen($login) < 1) || (strlen($pass) < 1)) {
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
<html lang="FR-fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles/bootstrap.min.css" />
    <link rel="stylesheet" href="./styles/styles.css">
    <title>Login</title>
</head>

<body>

    <div class="container text-center mt-5">
        <form class="form" method="POST" action="./login.php">
            <div class="alert-danger mb-5">
                <?php echo $message
                ?>
            </div>
            <div class="group-input">
                <div class="divInputLogin">
                    <label class="input mb-2" for="login">Pseudo</label> <br>
                    <input type="text" name="who" id="login" />
                </div>

                <div class="divInputPassword mt-4 mb-4">
                    <label class="form-label" for="pass">Mot de passe</label> <br>
                    <input type="password" name="pass" id="pass" />
                </div>
            </div>

            <div class="group-btn">
                <button name="cancel" class="btn btn-outline-warning mr-2" id="btn-2">Annuler</button>
                <button type="submit" name="submit" class="btn btn-primary btn-outline-primary"
                    id="btn-1">Valider</button>
            </div>
        </form>
        <footer>
            <div class="logOut">
                <a class="btn btn-outline-dark" href="./index.php">Back To Home</a>
            </div>
        </footer>
    </div>
    <!-- Félicitation voici le  Code : php123  -->
</body>

</html>