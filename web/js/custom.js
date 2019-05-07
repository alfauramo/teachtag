var hora = document.getElementById("hora");
$(document).ready(function(){

	//cualquier enlace con la clase fbox va a ser un fancy automático
	$("a.fbox_quick_start").fancybox();
});

var x = 0;
if(hora){

	//Creo un Date con los datos conseguidos de tiempo-inicio.
	var inicio = new Date();

	var h = inicio.getHours();
	var m = inicio.getMinutes();
	var s = inicio.getSeconds();
	if(h < 10) {
		h = "0" + h;
	}

	if(m < 10) {
		m = "0" + m;
	}

	if(s < 10) {
		s = "0" + s;
	}
	
	hora.innerHTML = h + ":" + m + ":" + s;

	
	window.setInterval(function(){
		var inicio = new Date();
		var h = inicio.getHours();
		var m = inicio.getMinutes();
		var s = inicio.getSeconds();
		if(h < 10) {
			h = "0" + h;
		}

		if(m < 10) {
			m = "0" + m;
		}

		if(s < 10) {
			s = "0" + s;
		}
		hora.innerHTML = h + ":" + m + ":" + s;
	},1000);
}
