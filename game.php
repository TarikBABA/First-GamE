<?php

if (!isset(($_GET)["name"])) {
    header('location: game.php');
    die("Le paramètre name est manquant");
}
if (isset(($_POST)['out'])) {
    header('location: index.php');
    return;
}


$name = $_GET["name"] ?? '';

$deevChoose = $_POST["choose"] ?? '';

$elephantTab = ['0', '1', '2'];

$choice = ["pierre", "feuille", "ciseaux"];

$win = '';
$lose = '';
$equal = '';

function pfc($deev, $elephant)
{

    $win = '<img src="./images/children-winners.png" alt="">';
    $equal = '<img src="./images/virtual-Fair-Play.jpg" alt=""> ';
    $lose = '<img src="./images/m.png" alt="">';
    if ($deev === $elephant) {
        return " <span>Equality</span> <div class='image'> $equal</div>";
    } elseif ($deev == '0' && $elephant == '1') {
        return "<span>You Are The Winner</span> <div class='image'>$lose</div> ";
    } elseif ($deev == '0' && $elephant == '2') {
        return " <span> I Am The Winner</span> <div class='image'>$win</div>";
    } elseif ($deev == '1' && $elephant == '0') {
        return " <span> I Am The Winner</span> <div class='image'>$win</div>";
    } elseif ($deev == '1' && $elephant == '2') {
        return "<span>You Are The Winner</span> <div class='image'>$lose</div>";
    } elseif ($deev == '2' && $elephant == '0') {
        return "<span>You Are The Winner</span> <div class='image'>$lose</div>";
    } elseif ($deev == '2' && $elephant == '1') {
        return " <span> I Am The Winner</span> <div class='image'>$win</div>";
    }
}

$result = '';

if (isset($deevChoose)) {
    $elephantChoose = $elephantTab[rand(0, 2)];
    $result = pfc($deevChoose, $elephantChoose);
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
            <h1 class="form-label" for="choix">Bienvenue : <?= ($name) ?> </h1>
        </header>
        <div class="result">

            <?php if ($result) {
                echo " Tarik a choisi   {$choice[$deevChoose]} --Vs-- {$choice[$elephantChoose]} pour $name <br>  $result";
            }
            ?>
        </div>
        <div class="form-group games">
            <form class="form game" method="POST" action="">
                <div class="btn-group form-btns" role="group" aria-label="Basic radio toggle button group" name="choose"
                    id="choix">
                    <input type="radio" class="btn-check" id="btnradio1" autocomplete="off" name="choose" value="0">
                    <label class="btn  text-bg-info" for="btnradio1">Pierre</label>
                    <input type="radio" class="btn-check" id="btnradio2" autocomplete="off" name="choose" value="1">
                    <label class="btn  text-bg-secondary" for="btnradio2">Feuille</label>
                    <input type="radio" class="btn-check" id="btnradio3" autocomplete="off" name="choose" value="2">
                    <label class="btn  text-bg-danger text-capitalize" for="btnradio3">Ciseaux</label>
                </div>
                <div class="form-btn mt-3 text-center ">
                    <button class="btn text-bg-dark" name="out"> Se Deconnecter </button>
                    <button type="submit" name="submit" class="btn text-bg-success" id="btn-1">Jouer</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>