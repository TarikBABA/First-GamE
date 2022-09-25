<?php

if (!isset(($_GET)["name"])) {
    header('location: game.php');
    die("Le paramètre name est manquant");
}
if (isset(($_POST)['out'])) {
    header('location: index.php');
    return;
}


$name = strtoupper($_GET["name"]) ?? '';

$userChoose = $_POST["choose"] ?? '';

$devTab = ['0', '1', '2'];

$choice = ["pierre", "feuille", "ciseaux"];
function pfc($dev, $user)
{


    if ($user === $dev) {
        return " <span>Equality</span> <span class='emoji' style='font-size:100px;'>&#129309;</span> <br>";
    } elseif ($user == '0' && $dev == '1') {
        return "<span>You Are The Winner</span> <span class='emoji' style='font-size:100px;'>&#128533;</span> <br> ";
    } elseif ($user == '0' && $dev == '2') {
        return " <span> I Am The Winner</span> <span class='emoji' style='font-size:100px;'>&#128540;</span> <br>";
    } elseif ($user == '1' && $dev == '0') {
        return " <span> I Am The Winner</span> <span class='emoji' style='font-size:100px;'>&#129323;</span> <br>";
    } elseif ($user == '1' && $dev == '2') {
        return "<span>You Are The Winner</span> <span class='emoji' style='font-size:100px;'>&#128544;</span> <br>";
    } elseif ($user == '2' && $dev == '0') {
        return "<span>You Are The Winner</span> <span class='emoji' style='font-size:100px;'>&#128562;</span> <br>";
    } elseif ($user == '2' && $dev == '1') {
        return " <span> I Am The Winner</span> <span class='emoji' style='font-size:100px;'>&#128513;</span> <br>";
    }
}

$result = '';

if (isset($userChoose)) {
    $devChoose = $devTab[rand(0, 2)];
    $result = pfc($userChoose, $devChoose);
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles/bootstrap.min.css" />
    <link rel="stylesheet" href="./styles/styles.css">
    <title>Game</title>
</head>

<body>
    <div class="center-all">
        <header>
            <!-- <h2>pierre papier ciseaux</h2> -->
            <h1 class="form-label" for="choix">Bienvenue : <?= $name ?> </h1>
        </header>
        <div class="result">

            <?php if ($result) {
                echo "<span class='resultat'> $result </span> Tarik a choisi   {$choice[$devChoose]}  <span style='font-size:25px;'>&#127386;</span> {$choice[$userChoose]} pour $name ";
            }
            ?>
        </div>
        <div class="form-group">
            <form class="form" method="POST" action="">
                <div class="form-btns" role="group" aria-label="Basic radio toggle button group" name="choose"
                    id="choix">
                    <input type="radio" class="btn-check" id="btnradio1" autocomplete="off" name="choose" value="0">
                    <label class="btn  text-bg-info" for="btnradio1">Pierre</label>
                    <input type="radio" class="btn-check" id="btnradio2" autocomplete="off" name="choose" value="1">
                    <label class="btn ml-2 text-bg-secondary" for="btnradio2">Feuille</label>
                    <input type="radio" class="btn-check" id="btnradio3" autocomplete="off" name="choose" value="2">
                    <label class="btn ml-2 text-bg-danger text-capitalize" for="btnradio3">Ciseaux</label>
                </div>
                <div class="form-btn mt-4 text-center ">
                    <button class="btn text-bg-dark" name="out"> Se Deconnecter </button>
                    <button type="submit" name="submit" class="btn text-bg-success" id="btn-1">Jouer</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>