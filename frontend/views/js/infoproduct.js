/**
 * Created by alejandro.chavez on 10/9/2018.
 */

$(".flexslider").flexslider({

    animation: "slide",
    controlNav: true,
    animationLoop: false,
    slideshow: false,
    itemWidth: 100,
    itemMargin: 5

});

$(".flexslider ul li img").click(function(){

    var capturaIndice = $(this).attr("value");

    $(".infoproducto figure.visor img").hide();

    $("#lupa"+capturaIndice).show();
});


/*Efecto lupa */

$(".infoproducto figure.visor img").mouseover(function (event) {

    var captureImg = $(this).attr("src");

    $(".lupa img").attr("src" , captureImg);

    $(".lupa").fadeIn("fast");

    $(".lupa").css({

        "height": $(".visorImg").height()+"px",
        "background" : "#eeee",
        "width" : "100%"
    });



});


$(".infoproducto figure.visor img").mouseout(function (event) {

    var captureImg = $(this).attr("src");

    $(".lupa img").attr("src" , captureImg);

    $(".lupa").fadeOut("fast");

});


$(".infoproducto figure.visor img").mousemove(function(event){

    var posX = event.offsetX;
    var posY = event.offsetY;

    $(".lupa img").css({

        "margin-left":-posX+"px",
        "margin-top":-posY+"px"

    })

});

//View count

