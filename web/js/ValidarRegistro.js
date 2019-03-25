function validarPasswd(p1, p2){
    //COMPROBAR LAS CONTRASEÑAS
    var espacios = false;
    var cont = 0;
    var exp_reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if(exp_reg.test(p1)){
	    while (!espacios && (cont < p1.length)) {
		    if (p1.charAt(cont) == " ")
		        espacios = true;
		        cont++;
	    }
	    if(espacios){
	        return false;
	    }
	    if(p1 != p2){
	        return false;
	    }
	        return true;
    }else{
        return false;
	}
}

$(document).ready(function(){
	/**
	 * PARTE DEL ALIAS. Tiene que ser único.
	 */
	var res_alias = $("#alias").on("blur",function(){
		let alias = $(this).val();
		if(alias == "" || alias == " "){
			return false;
		} else {
			//comprobar por ajax la disponibilidad del alias
			$.get("http://teachtag.loc/index.php?r=user/comprobar-alias",{
				alias: alias,
			}, "JSON")

			.done(function(data){
				//Devuelve true si no hay ninguna coincidencia.
				return data;

			})

		}
	})
	$("#alias").keypress(function(e, solicitar){
		//-----------------------
        //CAMBIAR LA PRIMERA LETRA A MAYÚSCULA
        //Leo la tecla que estoy pulsando
        var e;
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        console.log(solicitar);
        //Expresión regular para decir que la
        //primera letra sea mayúscula
        patron =/[\D\s]/;
        te = String.fromCharCode(tecla);
        //Comprueba si la palabra empieza en mayúscula
        //Si no lo está, la cambia.
        //Además, comprueba que no tenga ningún espacio
        if (!patron.test(te)) return false;
        txt = $(this).val();
        if(txt.length==0 && te==' ') return false;
        if (txt.length==0 || txt.substr(txt.length-1,1)==' ') {
            $(this).val(txt+te.toUpperCase());
            return false;
    	}
    })
	/*-----------------*/

	/**
	 * PARTE DEL PASSWORD. Tienen que ser iguales.
	 */
	//Más adelante recibe true o false dependiendo del regex 
	//y las condiciones del validarPasswd()
	var res_pass;
	var pass1;
	$("#psswd1").on("blur",function(){
		pass1 = $(this).val();
		res_pass = validarPasswd();
	})
	var pass2;
	$("#psswd2").on("blur",function(){
		pass2 = $(this).val();
		res_pass = validarPasswd(pass1, pass2);
	})
    /*---------------*/

    /**
     * PARTE DEL NOMBRE. Puede haber más de un nombre igual, 
     * así que solamente se comprueba que no sea vacío
     */
	var nombre = $("#nombre").on("blur",function(){
		let nombre = $(this).val();
		if(nombre == "" || nombre == " "){
			return false;
		}
		return true;
	})
	$("#nombre").keypress(function(e, solicitar){
		//-----------------------
        //CAMBIAR LA PRIMERA LETRA A MAYÚSCULA
        //Leo la tecla que estoy pulsando
        var e;
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        console.log(solicitar);
        //Expresión regular para decir que la
        //primera letra sea mayúscula
        patron =/[\D\s]/;
        te = String.fromCharCode(tecla);
        //Comprueba si la palabra empieza en mayúscula
        //Si no lo está, la cambia.
        //Además, comprueba que no tenga ningún espacio
        if (!patron.test(te)) return false;
        txt = $(this).val();
        if(txt.length==0 && te==' ') return false;
        if (txt.length==0 || txt.substr(txt.length-1,1)==' ') {
            $(this).val(txt+te.toUpperCase());
            return false;
    	}
    })

	/**
	 * Parte del email. El email tiene que ser único
	 */
	var email = $("#mail").on("blur",
		function(){
			var correo = $(this).val();
			var emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	        if (emailRegex.test(correo)){
	        	//comprobar por ajax la disponibilidad del correo
	            $.get("http://teachtag.loc/index.php?r=user/comprobar-correo",{
					correo: correo,
				}, "JSON")

				.done(function(data){
					//Devuelve true si no hay ninguna coincidencia.
					return data;

				})
	        } else if(correo == ""){
	            return false;
	        } else {
	            return false;
	        }
		}
	)

	/*---------------*/
	var birthday;
	$("#brthd").on("blur",function(){
		birthday = $(this).val();
	})
	var centerCode = $("#centerCode").on("blur",function(){
		let centerCode = $(this).val();
		if(centerCode.length == 0 && centerCode == ' ') {
			return false;
		} else {
			$.get("http://teachtag.loc/index.php?r=center/comprobar-codigo",{
					codigo: centerCode,
				}, "JSON")

			.done(function(data){
				//Devuelve true si hay existe alguna coincidencia.
				console.log(data);
				return data;

			})
		}

	})
	var verificationCode;
	$("#mailCode").on("blur",function(){
		verificationCode = $(this).val();
	})


});