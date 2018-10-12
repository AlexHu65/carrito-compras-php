//Template

var pathFrontEnd = $('#pathFrontEnd').val();


// Herramienta TOOLTIP
$('[data-toggle="tooltip"]').tooltip();

// Template style request

$.ajax({

    url: pathFrontEnd + 'ajax/templateAjax.php',
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

for (var i = 0; i < btnList.length; i++) {

    $("#btnGrid" + i).click(function () {

        var numero = $(this).attr("id").substr(-1);

        $(".list" + numero).hide("slow");
        $(".grid" + numero).show("slow");

        $("#btnGrid" + numero).addClass("active");
        $("#btnList" + numero).removeClass("active");

    });

    $("#btnList" + i).click(function () {

        var numero = $(this).attr("id").substr(-1);

        $(".list" + numero).show();
        $(".grid" + numero).hide("slow");

        $("#btnGrid" + numero).removeClass("active");
        $("#btnList" + numero).addClass("active");

    });

}

/*=============================================
 EFECTOS CON EL SCROLL
 =============================================*/

$(window).scroll(function () {

    var scrollY = window.pageYOffset;

    if (window.matchMedia("(min-width:768px)").matches) {

        //$(".barraSuperior").css("margin-top" , scrollY);

        if($(".banner").html() != null){

            if (scrollY < ($(".banner").offset().top) - 150) {


                $(".banner img").css({"margin-top": -scrollY / 3 + "px"})

            } else {


                scrollY = 0;
            }

        }



        $.scrollUp({

            scrollText: "",
            scrollSpeed: 2000,
            easingType: "easeOutQuint"

        });
    }


});


/*Breadcrumbs*/


var activePage = $(".paginaActiva").html();

if (activePage) {

    var regActivePage = activePage.replace(/-/g, " ");

    $(".paginaActiva").html(regActivePage);
}


/*Pagination*/

var url = window.location.href;

var indice = url.split("/");

var pagActual = indice.pop();

if(isNaN(pagActual)){

    $("#item1").addClass("active");

}else{

    $("#item"+pagActual).addClass("active");
}

$('#searchModal').on('shown.bs.modal', function() {
    $(this).find('input:first').focus();
});

