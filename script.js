var flip = (function () {
    $('.hover').addClass('flip');
});


$(document).ready(function () {

    //on every click Add 100 chips to amount
    $("#frm-fast-cash").click(function () {
        var amount = 100 + parseInt($("#amount").text());
        $({
            countNum: $('#amount').html() //starting point of existing cache
        }).animate({
            countNum: amount //ending
        }, {
            duration: 400,
            easing: 'swing',
            step: function () {
                $('#amount').html(Math.ceil(this.countNum));
            },
            complete: function () {
                $('#amount').html(amount);
                //alert('finished');
            }
        });
        //saveAsNewName(amount)
    });
    //remove the chip amount from the total amount
    $(".select-chip").click(function () {
        var value = $(this).attr("data-value")
        var amount = parseInt($("#amount").text()) - value;


        if (amount < 0) {
            alert('Not enough Chips! Please Buy more chip for this Bet!!')
        } else {

            $({
                countNum: $('#amount').html() //starting point of existing cache
            }).animate({
                countNum: amount //ending
            }, {
                duration: 400,
                easing: 'swing',
                step: function () {
                    $('#amount').html(Math.floor(this.countNum));
                },
                complete: function () {
                    $('#amount').html(amount);
                    var hrefAttr = "display_game.php?chip=" + value + "&bool=false"+"&start_game=y" + "&amount=" + $('#amount').text() + "&click_button=" + $(".showdown").text("Show down").text();
                    window.location = hrefAttr;
                    //alert('finished');
                }
            });
        }
    });
    $('.showdown').click(function () {


        if ($('.showdown').text() == "Show down") {
            var hrefAttr = "display_game.php?&bool=false" +"&start_game=n"+ "&amount=" + $('#amount').text() + "&click_button=" + $(".showdown").text("New game").text();
            window.location = hrefAttr;
        } else {
            var hrefAttr = "display_game.php?&bool=true" + "&amount=" + $('#amount').text() + "&click_button=" + $(".showdown").text("Show down").text();
            window.location = hrefAttr;

        }
    });
    setInterval(() => {
        flip();
    }, 1500);

    $(".back .pad img").click(function () {

            $(this).toggleClass('selected_card');

            
    });

});