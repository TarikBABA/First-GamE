<?php
if (!isset(($_GET)["name"])) {
    //header('location: game.php');
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


// $result = 'equality';
// $result1 = 'ZzzzZZzz tu perds';
// $result2 = 'You win';

// if (isset($_GET['submit'])) {
//     $elephantChoose = $elephantTab[rand(0, 2)];
//     if ($deevChoose === $elephantChoose) {
//         return $result;
//     } elseif ($deevChoose == '0' && $elephantChoose == '1') {
//         return $result1;
//     } elseif ($deevChoose == '0' && $elephantChoose == '2') {
//         return $result2;
//     } elseif ($deevChoose == '1' && $elephantChoose == '0') {
//         return $result2;
//     } elseif ($deevChoose == '1' && $elephantChoose == '2') {
//         return $result1;
//     } elseif ($deevChoose == '2' && $elephantChoose == '0') {
//         return $result1;
//     } elseif ($deevChoose == '2' && $elephantChoose == '1') {
//         return $result1;
//     } else {
//         echo "Sélectionner une stratégie et appuyer sur Jouer";
//     }
//     if ($deevChoose === "3") {
//         echo 'Humain=Pierre Ordinateur=Pierre Résultat=Égalité
//                     Humain=Papier Ordinateur=Pierre Résultat=Tu gagnes
//                     Humain=Ciseaux Ordinateur=Pierre Résultat=Tu perds
//                     Humain=Pierre Ordinateur=Papier Résultat=Tu perds
//                     Humain=Papier Ordinateur=Papier Résultat=Égalité
//                     Humain=Ciseaux Ordinateur=Papier Résultat=Tu gagnes
//                     Humain=Pierre Ordinateur=Ciseaux Résultat=Tu gagnes
//                     Humain=Papier Ordinateur=Ciseaux Résultat=Tu perds
//                     Humain=Ciseaux Ordinateur=Ciseaux Résultat=Égalité';
//     }
// }




$win = '';

function pfc($deev, $elephant)
{
    $win = '<img src="./children-640.jpg" alt="">';
    if ($deev === $elephant) {
        return "equality . $win";
    } elseif ($deev == '0' && $elephant == '1') {
        return "ZzzzZZzz tu perds ";
    } elseif ($deev == '0' && $elephant == '2') {
        return "You win";
    } elseif ($deev == '1' && $elephant == '0') {
        return "You win";
    } elseif ($deev == '1' && $elephant == '2') {
        return "ZzzzZZzz tu perds";
    } elseif ($deev == '2' && $elephant == '0') {
        return "ZzzzZZzz tu perds";
    } elseif ($deev == '2' && $elephant == '1') {
        return "You win";
    }
}

$result = '';

// if ($deevChoose === '0' || $deevChoose === '1' || $deevChoose === '2') {
if (isset($deevChoose)) {
    $elephantChoose = $elephantTab[rand(0, 2)];
    $result = pfc($deevChoose, $elephantChoose);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Game</title>
</head>

<body>
    <div class="title">
        <h2>pierre papier ciseaux</h2>
    </div>
    <div class="title-underline"></div>
    <form class="form" method="POST">

        <label class="form-label" for="choix">Bienvenue :<?= ucfirst($name) ?> </label>

        <select class="form-input" name="choose" id="choix" required>
            <option value="-1">Sélectionner</option>
            <option value="0">pierre</option>
            <option value="1">feuille</option>
            <option value="2">ciseaux</option>
            <option value="3">test</option>
        </select>
        <div class="form-btn" style="margin-top:15px">
            <button type="submit" name="submit" class="btn" id="btn-1">jouer</button>
            <button class="btn" name="out"> se deconnecter </button>
        </div>
    </form>





    <pre class="title form-input">
        <?php if ($result) {
            echo "Deev={$choice[$deevChoose]} PHP={$choice[$elephantChoose]} Résultat=$result <br>";
            echo "<br>";

        ?>
    </pre>
    <pre class="center">
                <?php
                if ($win) {
                    echo $win;
                }
            }
                ?>
    </pre>




























    <pre>
            <?php
            // if ($deevChoose === "test") {
            //     for ($c = 0; $c < 3; $c++) {
            //         for ($h = 0; $h < 3; $h++) {
            //             $r = pfc($h, $c);
            //             echo "Deev=$choice[$h] elephant=$choice[$c] Result=$r\n";
            //         }
            //     }
            // } else if ($result) {
            //     echo "Deev={$choice[$deevChoose]} elephant={$choice[$elephantChoose]} Result=$result";
            // } else {
            //     echo "Sélectionner une stratégie et appuyer sur Jouer";
            // }
            ?>
        </pre>
</body>

</html>