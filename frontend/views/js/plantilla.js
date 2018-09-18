
//Template

// Herramienta TOOLTIP
$('[data-toggle="tooltip"]').tooltip();



$.ajax({


    url: 'ajax/templateAjax.php',
    success: function (response) {

        var colorFondo = JSON.parse(response).colorFondo;
        var colorTexto = JSON.parse(response).colorTexto;
        var barraSuperior = JSON.parse(response).barraSuperior;
        var textoSuperior = JSON.parse(response).textoSuperior;


        $(".backColor, .backColor a").css({
            "background": colorFondo,
            "color": colorTexto
        });

        $(".barraSuperior , .barraSuperior a").css({
            "background": barraSuperior,
            "color": textoSuperior
        });
    }
});



var btnList = $(".btnList");

for(var i = 0; i < btnList.length; i++){

    $("#btnGrid"+i).click(function(){

        var numero = $(this).attr("id").substr(-1);

        $(".list"+numero).hide();
        $(".grid"+numero).show();

        $("#btnGrid"+numero).addClass("backColor");
        $("#btnList"+numero).removeClass("backColor");

    })

    $("#btnList"+i).click(function(){

        var numero = $(this).attr("id").substr(-1);

        $(".list"+numero).show();
        $(".grid"+numero).hide();

        $("#btnGrid"+numero).removeClass("backColor");
        $("#btnList"+numero).addClass("backColor");

    })

}

/*=============================================
 EFECTOS CON EL SCROLL
 =============================================*/

$(window).scroll(function(){

    var scrollY = window.pageYOffset;

    if(window.matchMedia("(min-width:768px)").matches){

        if(scrollY < ($(".banner").offset().top)-150){

            $(".banner img").css({"margin-top":-scrollY/3+"px"})

        }else{

            scrollY = 0;
        }

    }

    $.scrollUp({

        scrollText:"",
        scrollSpeed: 2000,
        easingType: "easeOutQuint"

    });

});


