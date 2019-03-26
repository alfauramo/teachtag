var res_alias;
var res_pass;
var res_nombre = "";
var res_fecha = "";
function validarPasswd(){
    //COMPROBAR LAS CONTRASEÑAS
    p1 = $("#psswd1").val();
    p2 = $("#psswd2").val();
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

function comprobarAlias(){
	//COMPROBAR ALIAS
	var alias = $("#alias").val();
	//comprobar por ajax la disponibilidad del alias
	if(alias !== "" || alias !== " "){
		$.get("http://teachtag.loc/index.php?r=user/comprobar-alias", { alias: alias } )
		  .done(function( data ) {
		    if(data == true){
		    	res_alias = true;
		    }else {
		    	$("#subp1").attr("disabled", "disabled");
		    }
		  }, "JSON");
	} else {
		$("#subp1").attr("disabled", "disabled");
	}

	return res_alias;
}

function comprobarNombre(){
	//COMPROBAR NOMBRE
	let nombre = $("#nombre").val();
	//Comprueba que el nombre no esté vacío
	if(nombre == "" || nombre == " "){
		res_nombre = false;
		$("#subp2").attr("disabled", "disabled");
	}else {
		res_nombre = true;
	}
	
	return res_nombre;
}

function comprobarFecha(){
	let birthday = $("#user-birthday").val();
	if(birthday == "" || birthday == " "){
		res_fecha = false;
		$("#subp2").attr("disabled", "disabled");
	}else {
		res_fecha = true;
	}
	
	return res_fecha;
}
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
	
	var verificationCode;
	$("#mailCode").on("blur",function(){
		verificationCode = $(this).val();
	})

$(document).ready(function(){
	
	$("#p1").change(function(){
		res_alias = comprobarAlias();
		res_pass = validarPasswd();
		if(res_alias && res_pass){
			$("#subp1").removeAttr("disabled");
		} else if(!res_alias || !res_pass) {
			$("#subp1").attr("disabled", "disabled");
		}
	})

	$("#subp1").on('click',function(){
		$("#p1").css("display","none");
		$("#p2").css("display","block");
	})
	
	$("#registro").change(function(){
		res_nombre = comprobarNombre();
		res_fecha = comprobarFecha();
		if(res_nombre && res_fecha){
			$("#subp2").removeAttr("disabled");
		} else {
			$("#subp2").attr("disabled", "disabled");
		}
	})

	$("#subp2").on('click',function(){
		$("#p2").css("display","none");
		$("#p3").css("display","block");
	})
});