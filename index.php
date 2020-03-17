<?php
session_start();
if (empty($_SESSION)) {
    $_SESSION['poker'] = array();
} else {
    //get the maximum winning record that player Cashout 
    //$_SESSION['poker']['record'] = max($_SESSION['poker']['record']);
}

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Create the home page -->
    <div class="home-body-cover">

        <img class="logo" src="images/logo.png" alt="dice logo">
        <div class="submit play-game">
            <a class="play btn-game" href="display_game.php">Play Now</a>
        </div>

        <!-- Shows the best records of the player -->
        <?php if (!empty($_SESSION['poker']['record'])) {
            echo  "<p class='record'>Your Best Record is: {$_SESSION['poker']['record']} </p>";
        }
        ?>











</body>

</html>