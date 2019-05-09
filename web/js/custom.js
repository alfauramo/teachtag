var hora = document.getElementById("hora");
$(document).ready(function(){

	//cualquier enlace con la clase fbox va a ser un fancy automático
	$("#abrir.fbox_quick_start").fancybox();

	$("#cuadro").on('click',function(){
		event.preventDefault();
		$('#fantasma').toggle();
	})

	$("#fotillis").on('click',function(){
		event.preventDefault();
		$('#feos').toggle();
	})

	$("#amiguis").on('click',function(){
		event.preventDefault();
		$('#talue').toggle();
	})

	//Aquí hago uso del slider//
        $('.js-zoom-gallery').each(function () {
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                },
                removalDelay: 500, //delay removal by X to allow out-animation
                callbacks: {
                    beforeOpen: function () {
                        // just a hack that adds mfp-anim class to markup
                        this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                        this.st.mainClass = 'mfp-zoom-in';
                    }
                },
                closeOnContentClick: true,
                midClick: true
            });
        });

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
