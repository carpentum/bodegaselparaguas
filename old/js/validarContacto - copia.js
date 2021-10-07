function validarDni(texto){																	//Esta expresión regular nos dice que podemos:
	var reDni=/^\d{1,8}[A-Z]{1}$/;														//	- Escribir una cadena con 8 números y una letra mayúscula
	if(!reDni.exec(texto)) return false;											//	- Separar los decimales (un mínimo de 1 y un máximo de 2) con una coma
	return true;
}

/*function validarMail(texto){
	var reMail=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	if(!reMail.exec(texto)) return false;
	return true;
}*/

function validarEmail(texto) {
	var reEmail=/^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
	if (!reEmail.exec(texto))return (false);
	return (false);
}

/*function validarEmail(texto){
	var reMail=/^\D+([\.-a-z0-9]+)*@\D+([\.-a-z0-9]+)*(\.\D{2,3})+$/;
	if(!reMail.exec(texto)) return false;
	return true;
}*/

///(^([0-5]{1}[1-9]{1})|^([1-5]{1}[0-9]{1}))[0-9]{3}$/
function validarCp(texto) {
	var reCp=/^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$/;
	if (!reCp.exec(texto))return (false);
	return (false);
}

function validarFecha(texto) {
	var reFecha=/^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
	if (!reFecha.exec(texto))return (false);
	return (false);
}

function validarTfno(texto) {
	var reTfno=/^[0-9]{2,3}-? ?[0-9]{6,7}$/;
	if (!reTfno.exec(texto))return (false);
	return (false);
}
	
function ValidaContacto(form, idioma){
	if(idioma == "es"){
		var cadena = "Se han producido los siguientes errores:";
	}else if (idioma == "en"){
		var cadena = "Some errors ocurred:";
	}else if (idioma == "ga"){
		var cadena = "Ocurriron algúns erros:";
	}
	var hayErrores=0;
	if (form.nombre.value == "") {
		if(idioma == "es"){
			cadena+="\n - Debes introducir un nombre completo.";
		}else if(idioma == "en"){
			cadena+="\n - You must introduce a full name.";
		}else if(idioma == "ga"){
			cadena+="\n - Debes introducir un nome completo.";
		}
			var hayErrores=1;
	}
	if (form.telefono.value != "") {
		if(!validarTfno(form.telefono.value)){
			if(idioma == "es"){
				cadena+="\n - El número de teléfono introducido no es correcto.";
			}else if(idioma == "en"{
				cadena+="\n - The phone number you introduced is not correct.";
			}else if(idioma == "ga"{
				cadena+="\n - O número de teléfono que introduciche non é correcto.";
			}
			var hayErrores=1;
		}
	}
	if (form.email.value == "") {
		if(idioma == "es"){
			cadena+="\n - Debes introducir una dirección de correo electrónico.";
		}else if(idioma == "en"){
			cadena+="\n - You must introduce an email address.";
		}else if(idioma == "ga"){
			cadena+="\n - Debes introducir unha dirección de correo electrónico.";
		}
		var hayErrores=1;
	}
	if (form.email.value != "") {
		if(!validarEmail(form.email.value)){
			if(idioma == "es"){
				cadena+="\n - La dirección de correo electrónico introducida no es correcta.";
			}else if(idioma == "en")(
				cadena+="\n - The email address introduced is not correct.";
			}else if(idioma == "ga")(
				cadena+="\n - A dirección de correo electrónico introducida non é correcta.";
			}
			var hayErrores=1;
		}
	}
	if (form.consulta.value == "") {
		if(idioma == "es"){
			cadena+="\n - Debes introducir una consulta.";
		}else if(idioma == "en"){
			cadena+="\n - You must introduce a consultation.";
		}else if(idioma == "ga"){
			cadena+="\n - Debes introducir unha consulta.";
		}
		var hayErrores=1;
	}
	
	if(hayErrores==1){
		alert(cadena);
		
		if (form.nombre.value == ""){	// Si no hay nombre
			form.nombre.focus();
		}else	if (form.telefono.value!="" && !validarTfno(form.telefono.value)){	// Si es incorrecto sintacticamente
			form.telefono.focus();
		}else	if (form.email.value == ""){	// Si no hay email
			form.email.focus();
		}else	if (!validarEmail(form.email.value)){	// Si es incorrecto sintacticamente
			form.email.focus();
		}else if (form.consulta.value == ""){	// Si no hay consulta
			form.consulta.focus();
		}
		return(false);
	}else{
		//alert("El formulario es correcto.");
		return(true);
	}
//	//form.submit(); //<input type="button" name="Guardar" onClick="Valida(this.form)">
}