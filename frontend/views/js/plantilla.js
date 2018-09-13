//Template

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