/*=============================================
CABEZOTE
=============================================*/

$("#btnCategorias").click(function(){

	if(window.matchMedia("(max-width:767px)").matches){

		$("#btnCategorias").after($("#categorias").slideToggle("fast"))
		//Cuando es un dispositivo movil , aparece debajo del btn categorias

	}else{

		$("#cabezote").after($("#categorias").slideToggle("fast"))
		
	}

		
})