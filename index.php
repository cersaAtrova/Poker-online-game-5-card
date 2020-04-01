<?php
session_start();
$_SESSION = array();
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Asso Trantana - Casino</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Create the home page -->
    <div class="home-body-cover">

        <img class="logo" src="images/logo.png" alt="dice logo">
        <div class="submit play-game">
            <a class="play btn-game" href="display_game.php?&click_button=Show down&amount=0&bool=true">Play Now</a>
        </div>

        <!-- Shows the best records of the player -->
        <?php if (!empty($_SESSION['poker']['record'])) {
            echo  "<p class='record'>Your Best Record is: {$_SESSION['poker']['record']} </p>";
        }
        ?>

    </div>







</body>

</html>