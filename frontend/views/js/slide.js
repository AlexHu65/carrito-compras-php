/*Objects slide*/
var item = 0;
var paginacion = $("#paginacion #item-pagination");
var controls = $("#play span");
var imgProduct = $(".imgProducto");
var toggle = false;

/*Control slide*/
var interruptSlide = false;
var pauseSlide = false;
var play = true;


/*Start animation*/
$(imgProduct[item]).animate({"top": -10 + "%", "opacity": 0}, 100);
$(imgProduct[item]).animate({"top": 30 + "px", "opacity": 1}, 600);

$("#slide ul li").css({"width": 100 / $("#slide ul li").length + "%"});
$("#slide ul").css({"width": $("#slide ul li").length * 100 + "%"});


//Pagination
$("#paginacion #item-pagination").click(function () {

    if (play) {
        stopSlide();
    }

    item = $(this).attr("item") - 1;
    movimientoSlide(item);
});


/*Move the slides*/
function avanzar() {

    if (!play) {
        stopSlide();
    }

    if (item == $("#slide ul li").length - 1) {
        item = 0;
    } else {
        item++;
    }
    movimientoSlide(item);
}

/*Arrow avanza*/
$("#slide #avanzar").click(function () {

    if (!play) {
        stopSlide();
    }
    avanzar();

});


/*Arrow retroceder*/
$("#slide #retroceder").click(function () {

    if (!play) {
        stopSlide();
    }

    if (item == 0) {
        item = $("#slide ul li").length - 1;
    } else {
        item--;
    }
    movimientoSlide(item);

});

/* Move the slide */
function movimientoSlide(item) {


    $("#slide ul").animate({"left": item * -100 + "%"}, 1000, "easeOutQuart");
    $("#paginacion li").css({"opacity": .5});
    $(paginacion[item]).css({"opacity": 1});

    interruptSlide = true;

    $(imgProduct[item]).animate({"top": -10 + "%", "opacity": 0}, 100);
    $(imgProduct[item]).animate({"top": 30 + "px", "opacity": 1}, 600);
}


/*Controls stop and play*/

$("#play").click(function () {
    stopSlide();

});

/*Pause function controls*/

function stopSlide() {

    if (play) {
        $(controls).removeClass("fa fa-pause-circle-o");
        $(controls).addClass("fa fa-play-circle-o");

        play = false;
    } else {

        $(controls).removeClass("fa fa-play-circle-o");
        $(controls).addClass("fa fa-pause-circle-o");


        play = true;

    }

}

/*Se interval play button*/
setInterval(function () {

    if (interruptSlide) {

        interruptSlide = false;
    } else {

        if (play && !pauseSlide) {
            avanzar();
        }
    }


}, 3000);

/*Show arrows*/

$('#slide').mousemove(function () {


    pauseSlide = true;

    $("#slide #retroceder").css({
        "opacity": 1,
        "transition": ".5s",
        "-webkit-transition": ".5s",
        "-moz-transition": ".5s"
    });
    $("#slide #avanzar").css({
        "opacity": 1,
        "transition": ".5s",
        "-webkit-transition": ".5s",
        "-moz-transition": ".5s"
    });



});


$('#slide').mouseout(function () {

    pauseSlide = false;

    $("#slide #retroceder").css({
        "opacity": 0,
        "transition": ".5s",
        "-webkit-transition": ".5s",
        "-moz-transition": ".5s"
    });

    $("#slide #avanzar").css({
        "opacity": 0,
        "transition": ".5s",
        "-webkit-transition": ".5s",
        "-moz-transition": ".5s"
    });




});


/*Hide slide*/

$("#btnSlide").click(function () {

    if (!toggle) {
        toggle = true;
        $("#slide").slideUp("fast");
        $("#btnSlide").html('<i class="fa fa-angle-down"></i>');

    } else {
        $("#slide").slideDown("fast");
        $("#btnSlide").html('<i class="fa fa-angle-up"></i>');

        toggle = false;
    }

});








