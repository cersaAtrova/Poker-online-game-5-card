<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="style.css">

</head>
<div class="home-body-cover">

    <div style="padding-top: 100px;">
        <table class="result">

            <tr>
                <td>Your Balance</td>
                <td><?php echo $_SESSION['poker']['amount']; ?></td>
            </tr>
            <tr>
                <td>Bought Chips</td>
                <td><?php echo $_SESSION['poker']['buying_chips']; ?></td>
            </tr>
            <tr>
                <td>Times You win</td>
                <td><?php echo $_SESSION['poker']['win']; ?></td>
            </tr>
            <tr>
                <td>Times You lose</td>
                <td><?php echo $_SESSION['poker']['not_win']; ?></td>
            </tr>
            <tr>
                <td>Maximum Win Record</td>
                <td><?php echo $_SESSION['poker']['max-win']; ?></td>
            </tr>
            <tr>
                <td>Minimum</td>
                <td><?php echo $_SESSION['poker']['min-win']; ?> 
            </td>
            </tr>

       
        </table>
    </div>
    <div class="submit play-game">
        <a class="play btn-game" href="index.php">Back to Main page</a>
    </div>



</div>

<body>

</body>

</html>