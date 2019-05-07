var res_alias;
var res_pass;
var res_nombre;
var res_fecha;
var res_correo;
var res_centro;

$(document).ready(function(){
	$("#prep1").on("click",function(){
		$("#p2").css("display","none");
		$("#p1").css("display","block");
	});

	$("#prep2").on("click",function(){
		$("#p3").css("display","none");
		$("#p2").css("display","block");
	});

	$("#alias").on("change keyup paste",function(){
		
		res_alias = comprobarAlias();

		if(res_alias && res_pass){
			$("#subp1").removeAttr("disabled");
		} else if(!res_alias || !res_pass) {
			$("#subp1").attr("disabled", "disabled");
		}
	})

	$("#psswd1, #psswd2").on("change keyup paste",function(){
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
	
	$("#p2").change(function(){
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

	$("#mail").on("change keyup paste",function(){
		res_correo = validarEmail();
		if(res_centro && res_correo){
			$("#registrar").removeAttr("disabled");
		} else {
			$("#registrar").attr("disabled", "disabled");
		}
	})

	$("#centerCode").on("change keyup paste",function(){
		res_centro = validarCodigo();
		if(res_centro && res_correo){
			$("#registrar").removeAttr("disabled");
		} else {
			$("#registrar").attr("disabled", "disabled");
		}
	})


	function validarPasswd(){
	    //COMPROBAR LAS CONTRASEÑAS
	    p1 = $("#psswd1").val();
	    p2 = $("#psswd2").val();
	    var espacios = false;
	    var cont = 0;
	    var exp_reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
	    if(exp_reg.test(p1)){
	    	if($("#pass1_error").length){
		    		/*Si existe el mensaje de error de psswd1, lo borro*/
		    		$("#psswd1").css("border","1px solid #e6ecf5");
		    		$("#pass1_error").remove();
		    }
		    while (!espacios && (cont < p1.length)) {
			    if (p1.charAt(cont) == " ")
			        espacios = true;
			        cont++;
		    }
		    if(espacios){
		        return false;
		    }
		    if(p1 != p2){
		    	if(!$("#pass2_error").length){
				   	$("#psswd2").after("<div id='pass2_error' class='error-registro'>Las contraseñas deben coincidir </div>");
				   	$("#psswd2").css("border","1px solid red");
				}
		        return false;
		    }

		    	if($("#pass2_error").length){
		    		/*Si existe el mensaje de error de psswd1, lo borro*/
		    		$("#pass2_error").remove();
		    	}
		    	$("#psswd1").css("border","1px solid #e6ecf5");
		    	$("#psswd2").css("border","1px solid #e6ecf5");
		        return true;
	    }else{
	    	/*Si no existe el mensaje de error de psswd1, lo añado*/
	    	if(!$("#pass1_error").length){
			   	$("#psswd1").after("<div id='pass1_error' class='error-registro'>La contraseña debe contener mínimo 8 caracteres alfanuméricos. </div>");
			   	$("#psswd1").css("border","1px solid red");
			}
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
			    	$("#alias").css("border","1px solid #e6ecf5");
			    	$("#alias_error").remove();
			    }else {
			    	$("#subp1").attr("disabled", "disabled");
			    	/*Si el alias ya existe, error*/
			    	$("#alias").css("border","1px solid red");
			    	if(!$("#alias_error").length){
			    		$("#alias").after("<div id='alias_error' class='error-registro'>El alias ya existe</div>");
			    	}

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
		//COMPROBAR FECHA DE NACIMIENTO
		let birthday = $("#user-birthday").val();
		if(birthday == "" || birthday == " "){
			//Comprueba que no esté vacía
			res_fecha = false;
			$("#subp2").attr("disabled", "disabled");
		}else {
			res_fecha = true;
		}
		
		return res_fecha;
	}

	function validarEmail(){
		//COMPROBAR CORRERO
		var correo = $("#mail").val();
		var emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
		//comprobar por ajax la que el correo no exista. Si es así, devuelve true.
		if(emailRegex.test(correo)){
			/*Si existe el mensaje de error del regex, lo elimina*/
			if($("#email_error2").length){
			    $("#email_error2").remove();
			}
			$.ajax({
			  url: "http://teachtag.loc/index.php?r=user/comprobar-correo",
			  data: {correo: correo},
			  dataType: 'JSON',
			  cache: false,
			  success: function( data ) {
			    if(data == true){
			    	res_correo = true;
			    	$("#registrar").attr("activo", "activo");
			    	$("#mail").css("border","1px solid #e6ecf5");
			    	/*Se borrar el mensaje de error*/
			    	if($("#email_error1").length){
			    		$("#email_error1").remove();
			    	}
			    }
			    else {
			    	res_correo = false;
			    	/*Error si el correo introducido ya existe*/
			    	$("#registrar").attr("disabled", "disabled");
			    	$("#mail").css("border","1px solid red");
			    	if(!$("#email_error1").length){
			    		$("#mail").after("<div id='email_error1' class='error-registro'>El email introducido ya existe</div>");
			    	}
			    }
			  }
			});
		} else {
			res_correo = false;
			$("#registrar").attr("disabled", "disabled");
			$("#mail").css("border","1px solid red");
			/*Si el email no cumple con el regex, error*/
			if(!$("#email_error2").length){
			   	$("#mail").after("<div id='email_error2' class='error-registro'>Introduzca un email válido</div>");
			}
		}
		return res_correo;
	}

	function validarCodigo(){
		var centerCode = $("#centerCode").val();
		//COMPROBAR CÓDIGO DEL CENTRO
		if(centerCode !== "" || centerCode !== " "){
			//Si el código existe, devuelve true
			$.get("http://teachtag.loc/index.php?r=center/comprobar-codigo", { codigo: centerCode } )
			.done(function( data ) {
				if(data == true){
					res_centro = true;
					$("#registrar").attr("activo", "activo");
					/*Si existe el div del mensaje de error, lo elimina*/
					$("#centerCode").css("border","1px solid #e6ecf5");
					if($("#center_error").length){
			    		$("#center_error").remove();
			    	}
				}else {
					res_centro = false;
					$("#registrar").attr("disabled", "disabled");
					/*Error si el código no es válido*/
					$("#centerCode").css("border","1px solid red");
					if(!$("#center_error").length){
					   	$("#centerCode").after("<div id='center_error' class='error-registro'>Código no válido</div>");
					}
				}
			}, "JSON");
		} else {
			res_centro = false;
			$("#registrar").attr("disabled", "disabled");
		}
		return res_centro;
	}

});

