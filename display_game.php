<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>5 Card Poker</title>
   
    <link rel="stylesheet" href="style.css">
    <!-- font awesome library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

<body>
    <section class="game-body-cover">
        <!-- //information button on the top right -->
        <div class="info">
            <a href="#"><i class="fa fa-info-circle" style="color: blue; font-size: 4rem "></i></a>
        </div>
        <!-- Button Fast Cash . on click add 100 chip on total amount of player chip -->
        <form action="display_game.php" method="GET" id="frm-fast-cash">
            <div class="submit">
                <input type="submit" value="Fast Cash" name="submit" class="fast-cash">
            </div>
        </form>
        <!-- display the amount of the player -->
        <p class="player-amount"><i class="fa fa-usd" aria-hidden="true"></i><?php echo $amount ?></p>
        <!-- close the game and print the result on a record on homepage -->
        <form action="index.php" method="GET" id="frm-cash-out">
            <div class="submit">
                <input type="submit" value="Cash out" name="submit" class="cash-out">
            </div>
        </form>

        <div class="game-inner">
            <!-- here is draw casino table -->
            <div class="poker-table"></div>
            <!-- here is all casino chips from 5 to 100  -->
            <div class="poker-chips-box">
                <!-- casino chip rate of 100$ -->
                <img class="chip" src="images/100.png" alt="chip 100">
                <!-- casino chip rate of 50$ -->
                <img class="chip" src="images/50.png" alt="chips 50">
                <!-- casino chip rate of 20$ -->
                <img class="chip" src="images/20.png" alt="chip 20" >
                <!-- casino chip rate of 10$ -->
                <img class="chip" src="images/10.png" alt="chip 10" >
                <!-- casino chip rate of 5$ -->
                <img class="chip" src="images/5.png" alt="chip 5" >
            </div>

            <!-- button of deal and showdown -->
            <form action="display_game.php" method="GET" class="frm-deal">
                <div class="form-cotainer-submit">
                    <div class="submit">
                        <input type="submit" value="Showdown" name="showdown" class="btn-game showdown">
                    </div>
                    <div class="submit">
                        <input type="submit" value="Deal" name="deal" class="btn-game deal">
                    </div>
                </div>
            </form>

        </div>
        <div class="history">
            <h3>Game history</h3>
            <p class="game-hand">
                <?php echo $hand_history; ?>
            </p>
        </div>



    </section>
</body>

</html>