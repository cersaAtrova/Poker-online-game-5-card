var flip=(function() {
    $('.hover').addClass('flip');
});
$(document).ready(function() {
  
    //on every click Add 100 chips to amount
    $("#frm-fast-cash").click(function() {
        var amount = 100 + parseInt($("#amount").text());
        $({
            countNum: $('#amount').html() //starting point of existing cache
        }).animate({
            countNum: amount //ending
        }, {
            duration: 400,
            easing: 'swing',
            step: function() {
                $('#amount').html(Math.ceil(this.countNum));
            },
            complete: function() {
                $('#amount').html(amount);
                //alert('finished');
            }
        });
        //saveAsNewName(amount)
    });
    //remove the chip amount from the total amount
    $(".select-chip").click(function() {
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
                step: function() {
                    $('#amount').html(Math.floor(this.countNum));
                },
                complete: function() {
                    $('#amount').html(amount);
                    var hrefAttr = "display_game.php?chip=" + value + "&bool=false" + "&amount=" + $('#amount').text()+"&click_button=" +$(".showdown").text("Show down").text();
                    window.location = hrefAttr;
                    //alert('finished');
                }
            });
        }
    });
$('.showdown').click(function(){
    
    if($('.showdown').text() =="Show down"){
        var hrefAttr = "display_game.php?&bool=true" + "&amount=" + $('#amount').text()+"&click_button=" +$(".showdown").text("Deal").text();
        window.location = hrefAttr;
    }else{
        var hrefAttr = "display_game.php?&bool=true" + "&amount=" + $('#amount').text()+"&click_button=" +$(".showdown").text("Show down").text();
        window.location = hrefAttr;

    }
});
setInterval(() => {
   flip(); 
}, 500);

 // set up hover panels
                // although this can be done without JavaScript, we've attached these events
                // because it causes the hover to be triggered when the element is tapped on a touch device
                // $('.hover').click(function() {
                //     $(this).addClass('flip');
                // }, function() {
                //      $(this).removeClass('flip');
                // });
});
