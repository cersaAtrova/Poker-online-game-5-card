<?php
session_start();

if (!isset($_SESSION['poker'])) {
    $_SESSION['poker'] = array();
    $amount = 0;
} else {
    if (isset($_GET['amount'])) {
        $_SESSION['poker']['amount'] = $_GET['amount'];
        $amount = $_SESSION['poker']['amount'];
    } else {
        $amount = $_SESSION['poker']['amount'];
    }
}



?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>5 Card Poker</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->
    <link rel="stylesheet" href="style.css">
    <!-- font awesome library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js"></script>
</head>

<body>
    <section class="game-body-cover">
        <!-- //information button on the top right -->
        <div class="info">
            <a href="#"><i class="fa fa-info-circle" style="color: blue; font-size: 4rem "></i></a>
        </div>
        <!-- Button Fast Cash . on click add 100 chip on total amount of player chip -->
        <div id="frm-fast-cash">
            <div class="submit">
                <a class="fast-cash">Fast Cash</a>
            </div>
        </div>  
        <!-- display the amount of the player -->
        <p class="player-amount"><i class="fa fa-usd"></i><span id="amount"><?php echo $amount; ?></span></p>

        <!-- close the game and print the result on a record on homepage -->
        <form action="index.php" method="GET" id="frm-cash-out">
            <div class="submit">
                <input type="submit" value="Cash out" name="cash_out" class="cash-out">
            </div>
        </form>


        <div class="game-inner">
            <!-- here is draw casino table -->
            <div class="poker-table"></div>
            <!-- here is all casino chips from 5 to 100  -->
            <div class="poker-chips-box" data-chip-accept="<?php echo $_SESSION['accept-chip']; ?>">
                <!-- casino chip rate of 100$ -->
                <a class="select-chip" data-value="100"> <img class="chip" src="images/100.png" alt="chip 100"></a>
                <!-- casino chip rate of 50$ -->
                <a class="select-chip" data-value="50"><img class="chip" src="images/50.png" alt="chips 50"></a>
                <!-- casino chip rate of 20$ -->
                <a class="select-chip" data-value="20"><img class="chip" src="images/20.png" alt="chip 20"></a>
                <!-- casino chip rate of 10$ -->
                <a class="select-chip" data-value="10"><img class="chip" src="images/10.png" alt="chip 10"></a>
                <!-- casino chip rate of 5$ -->
                <a class="select-chip" data-value="5"><img class="chip" src="images/5.png" alt="chip 5"></a>
            </div>

            <!-- button of deal and showdown -->
            <form action="display_game.php" method="GET" class="frm-deal">
                <div class="form-cotainer-submit">
                        <div class="submit">
                            <a class="showdown">Show down</a>
                        </div>
                        <div class="submit">
                            <a class="deal">Draw</a>
                        
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