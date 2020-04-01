var flip = (function () {
    $('.hover').addClass('flip');
});


$(document).ready(function () {
    var count_buying_chips = 0;
    var value = 0;
    var card_selected = null;
    //on every click Add 100 chips to amount
    $("#frm-fast-cash").click(function () {
        var amount = 100 + parseInt($("#amount").text());
        count_buying_chips++;
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
        value = $(this).attr("data-value");
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
                    var hrefAttr = "display_game.php?chip=" + value + '&buying=' + count_buying_chips + "&bool=false" + "&start_game=y" + "&amount=" + $('#amount').text() + "&click_button=" + $(".showdown").text("Show down").text();
                    window.location = hrefAttr;
                    //alert('finished');
                }
            });
        }
    });
    $('.showdown').click(function () {


        if ($('.showdown').text() == "Show down") {
            var hrefAttr = "display_game.php?&buying=" + count_buying_chips + "&bool=false" + '&game_finish=true' + "&start_game=n" + "&amount=" + $('#amount').text() + "&click_button=" + $(".showdown").text("New game").text();
            window.location = hrefAttr;
        } else {
            var hrefAttr = "display_game.php?&buying=" + count_buying_chips + "&bool=true" + '&game_finish=false' + "&amount=" + $('#amount').text() + "&click_button=" + $(".showdown").text("Show down").text();
            window.location = hrefAttr;

        }
    });
    setInterval(() => {
        flip();
    }, 1500);

    $(".back .pad img").click(function () {
        if ($('.back .pad img').hasClass('selected_card')) {
            if (!$(this).hasClass('selected_card')) {
                $(".back .pad img").removeClass('selected_card');
                $(this).addClass('selected_card');

                card_selected = $(this).attr('data-card-position');
            } else {
                $(".back .pad img").removeClass('selected_card');
            }

        } else {
            $(this).addClass('selected_card');
            card_selected = $(this).attr('data-card-position');
        }
    });
    $('.deal').click(function () {
        if (card_selected != null) {
            var hrefAttr = "display_game.php?chip=" + value +"&card_selected="+card_selected+ 
            '&buying=' + count_buying_chips + "&bool=false" + 
             "&amount=" + $('#amount').text() + "&click_button=" + $(".showdown").text("Show down").text();
            window.location = hrefAttr;
      
        }

    });

});