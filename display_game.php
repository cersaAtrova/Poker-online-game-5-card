<?php
require 'method.php';
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
if ($_GET['bool'] == 'false') {
    $display_chips_on_screen = 'none';
} else {
    $display_chips_on_screen = 'block';
}





?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>5 Card Poker</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->
    <link rel="stylesheet" href="style.css">
    <!-- font awesome library -->

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>

    <script src="script.js"></script>
</head>

<body>
    <section class="game-body-cover">
        <!-- //information button on the top right -->
        <div class="info">
            <a href="#" id="myBtn"><i class="fas fa-info-circle" style="color: blue; font-size: 4rem "></i></a>
        </div>
        <!-- deck of card on table -->
        <div class="deck_of_card">
            <img src="images/deck_of_card.png" alt="deck_of_card">
        </div>

        <!-- 5 card on table -->

        <!-- Button Fast Cash . on click add 100 chip on total amount of player chip -->
        <div id="frm-fast-cash">
            <div class="submit">
                <a class="fast-cash">Fast Cash</a>
            </div>
        </div>
        <!-- display the amount of the player -->
        <p class="player-amount"><i class="fas fa-euro-sign"></i><span id="amount"><?php echo $amount; ?></span></p>

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
            <div class="poker-chips-box" style="display: <?php echo $display_chips_on_screen; ?>">
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
                        <a class="showdown"><?php echo $_GET['click_button']; ?></a>
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
                <?php echo $hand_history;
                $e=new Card_deck();
                $e->start_the_game();
                echo'faces/'.$e->deck[6]->getSuit().'_'. $e->deck[6]->getFace();
             
                  ?>
                <?php
              


                ?>

            </p>
        </div>



        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>HAND RANKINGS</h2>
                </div>
                <div class="modal-body">
                    <p>
                        <table style="font-size: 2rem">
                            <tr>
                                <td>Royal Flush</td>
                                <td><span>10 <i class='fa fa-heart color red'></i></span>
                                    <span>J <i class='fa fa-heart color red'></i></span>
                                    <span>Q <i class='fa fa-heart color red'></i></span>
                                    <span>K <i class='fa fa-heart color red'></i></span>
                                    <span>A <i class='fa fa-heart color red'></i></span>
                                </td>
                                <td><span class="red-dark">250/1</span></td>
                            </tr>
                            <tr>
                                <td>Straight Flush</td>
                                <td><span>A <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>2 <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>3 <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>4 <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>5 <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                </td>
                                <td><span class="red-dark">50/1</span></td>
                            </tr>
                            <tr>
                                <td>Four of a King</td>
                                <td><span>K <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>K <i class='fa fa-heart color red'></i></span>
                                    <span>K <img src="https://img.icons8.com/metro/32/000000/spades.png" /></span>
                                    <span>K <img src="https://img.icons8.com/color/32/000000/kite-shape.png" /></span>

                                </td>
                                <td><span class="red-dark">25/1</span></td>
                            </tr>
                            <tr style="width: 100%">
                                <td>Full House</td>

                                <td><span>A <i class='fa fa-heart color red'></i></span>
                                    <span>A <i class='fa fa-heart color red'></i></span>
                                    <span>K <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>K <i class='fa fa-heart color red'></i></span>
                                    <span>K <img src="https://img.icons8.com/metro/32/000000/spades.png" /></span>


                                </td>
                                <td><span class="red-dark">25/1</span></td>
                            </tr>
                            <tr>
                                <td>Flush</td>
                                <td><span>A <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>K <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>10 <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>9 <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>7 <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                </td>
                                <td><span class="red-dark">15/1</span></td>
                            </tr>
                            <tr style="width: 100%">
                                <td>Straight</td>
                                <td><span>7 <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>8 <img src="https://img.icons8.com/ios-filled/32/000000/spades.png" /></span>
                                    <span>9 <img src="https://img.icons8.com/ios-filled/32/000000/spades.png" /></span>
                                    <span>10 <i class='fa fa-heart color red'></i></span>
                                    <span>J <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                </td>
                                <td><span class="red-dark">9/1</span></td>
                            </tr>
                            <tr>
                                <td>Three of a King</td>
                                <td><span>K <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>K <i class='fa fa-heart color red'></i></span>
                                    <span>K <img src="https://img.icons8.com/metro/32/000000/spades.png" /></span>
                                </td>
                                <td><span class="red-dark">6/1</span></td>
                            </tr>
                            <tr>
                                <td>Two pairs</td>
                                <td><span>K <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>K <img src="https://img.icons8.com/metro/32/000000/spades.png" /></span>
                                    <span>Q <i class='fa fa-heart color red'></i></span>
                                    <span>Q <img src="https://img.icons8.com/metro/32/000000/spades.png" /></span>
                                </td>
                                <td><span class="red-dark">3/1</span></td>
                            </tr>
                            <tr>
                                <td>One pair</td>
                                <td><span>K <img src="https://img.icons8.com/ios-filled/32/000000/clubs.png" /></span>
                                    <span>K <img src="https://img.icons8.com/metro/32/000000/spades.png" /></span>
                                </td>
                                <td><span class="red-dark">2/1</span></td>
                            </tr>
                        </table>

                    </p>
                </div>
                <div class="modal-footer">
                    <h3>Asso Trantana Casino</h3>
                </div>
            </div>
            <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal 
                btn.onclick = function() {
                    modal.style.display = "block";
                }
                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
        </div>
        <!-- show the table card only the guest atart thr game -->
        <?php if ($_GET['bool'] == "false") : ?>
            <?php 
                 $e->new_game($first_card,$second_card,$third_card,$fourth_card,$fifth_card);
                 var_dump($fourth_card); ?>
               
            <div class="game-start-shown-card">
                <div class="hover panel">
                    <div class="front">
                        <div class="pad">
                            <img src="images/faces/back.png" alt="logo back" />
                        </div>
                    </div>
                    <div class="back">
                        <div class="pad">
                            <img src="images/<?php echo $first_card ?>.png"  alt="logo front" />
                        </div>
                    </div>
                </div>

                <div class="hover panel">
                    <div class="front">
                        <div class="pad">
                            <img src="images/faces/back.png" alt="logo back" />
                        </div>
                    </div>
                    <div class="back">
                        <div class="pad">

                            <img src="images/<?php echo $second_card ?>.png"  alt="logo front" />
                        </div>
                    </div>
                </div>

                <div class="hover panel">
                    <div class="front">
                        <div class="pad">
                            <img src="images/faces/back.png" alt="logo back" />
                        </div>
                    </div>
                    <div class="back">
                        <div class="pad">
                            <img src="images/<?php echo $third_card ?>.png"  alt="logo front" />
                        </div>
                    </div>
                </div>

                <div class="hover panel">
                    <div class="front">
                        <div class="pad">
                            <img src="images/faces/back.png" alt="logo back" />
                        </div>
                    </div>
                    <div class="back">
                        <div class="pad">
                            <img src="images/<?php echo $fourth_card ?>.png"  alt="logo front" />
                        </div>
                    </div>
                </div>

                <div class="hover panel">
                    <div class="front">
                        <div class="pad">
                            <img src="images/faces/back.png" alt="logo back" />
                        </div>
                    </div>
                    <div class="back">
                        <div class="pad">

                            <img src="images/<?php echo $fifth_card ?>.png" alt="logo front" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- <?php endif; ?> -->
    </section>
</body>

</html>