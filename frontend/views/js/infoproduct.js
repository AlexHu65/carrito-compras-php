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

$(".flexslider ul li img").click(function () {

    var capturaIndice = $(this).attr("value");

    $(".infoproducto figure.visor img").hide();

    $("#lupa" + capturaIndice).show();
});


/*Efecto lupa */

$(".infoproducto figure.visor img").mouseover(function (event) {

    var captureImg = $(this).attr("src");

    $(".lupa img").attr("src", captureImg);

    $(".lupa").fadeIn("fast");

    $(".lupa").css({

        "height": $(".visorImg").height() + "px",
        "background": "#eeee",
        "width": "100%"
    });


});


$(".infoproducto figure.visor img").mouseout(function (event) {

    var captureImg = $(this).attr("src");

    $(".lupa img").attr("src", captureImg);

    $(".lupa").fadeOut("fast");

});


$(".infoproducto figure.visor img").mousemove(function (event) {

    var posX = event.offsetX;
    var posY = event.offsetY;

    $(".lupa img").css({

        "margin-left": -posX + "px",
        "margin-top": -posY + "px"

    })

});

//View count

var cont = 0;

$(window).on("load", function () {

    //Actual views
    var views = $("span.views").html();

    //Price of the product
    var price = $("span.views").attr("price");

    //Get product id
    var id = $("span.views").attr("product-id");


    //Cont views
    cont = Number(views) + 1;

    //Update html

    $("span.views").html(cont);

    if (price == 'free') {

        var item = 'vistasGratis';

    } else {

        var item = 'vistas';
    }

    var data = new FormData();

    data.append("value", cont);
    data.append("item", item);
    data.append("id", id);


    $.ajax({
        url: pathFrontEnd + "ajax/productAjax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType:false,
        processData:false,
        success: function (response) {
            console.log("response", response);
        }
    });


});

