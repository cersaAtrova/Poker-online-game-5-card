<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet"> 
</head>

<body>
     <?php if(!isset($_GET['submit'])) : ?>
        <!-- Create the home page -->
      <div class="body">
         
      <img class="logo" src="images/logo.png" alt="dice logo">
        <form action="index.php" method="GET">
            <div class="submit">
            <input type="submit" value="Play Now" name="submit" class="play">
            </div>
        </form>
        <!-- Shows the best records of the player -->
        <p><?php echo "Your Best Record is: $record" ;  ?></p>
    </div>
            <?php endif ?>

</body>

</html>