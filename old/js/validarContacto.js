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

function validarEmail(texto){
	var reMail=/^\D+([\.-a-z0-9]+)*@\D+([\.-a-z0-9]+)*(\.\D{2,3})+$/;
	if(!reMail.exec(texto)) return false;
	return true;
}

///(^([0-5]{1}[1-9]{1})|^([1-5]{1}[0-9]{1}))[0-9]{3}$/
function validarCp(texto) {
	var reCp=/^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$/;
	if (!reCp.exec(texto))return (false);
	return (true);
}

function validarFecha(texto) {
	var reFecha=/^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
	if (!reFecha.exec(texto))return (false);
	return (true);
}

function validarTfno(texto) {
	var reTfno=/^[0-9]{2,3}-? ?[0-9]{6,7}$/;
	//var reTfno=/^\d{9}$/;
	if (!reTfno.exec(texto))return (false);
	return (true);
}

function validarPoliticaPrivacidad(acepto_politica) {
	if (!acepto_politica.checked)return (false);
	return (true);
}
	
function ValidaContacto(form, idioma){
	if(idioma == "es"){
		var cadena = "Se han producido los siguientes errores:";
	}else if (idioma == "en"){
		var cadena = "Some errors ocurred:";
	}else if (idioma == "ga"){
		var cadena = "Producíronse os seguintes erros:";
	}else cadena = "No hay idioma";
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
			}else if(idioma == "en"){
				cadena+="\n - The phone number you introduced is not correct.";
			}else if(idioma == "ga"){
				cadena+="\n - O número de teléfono introducido non é correcto.";
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
			}else if(idioma == "en"){
				cadena+="\n - The email address introduced is not correct.";
			}else if(idioma == "ga"){
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
	if (!form.acepto_politica.checked) {
		if(idioma == "es"){
			cadena+="\n - Debes aceptar nuestra política de privacidad.";
		}else if(idioma == "en"){
			cadena+="\n - You must accept our privacy policy.";
		}else if(idioma == "ga"){
			cadena+="\n - Debes aceptr a nosa política de privacidade.";
		}
		var hayErrores=1;
	}
	
	if(hayErrores==1){
		alert(cadena);
		
		if (form.nombre.value == ""){	// Si no hay nombre
			form.nombre.focus();
		}else	if (form.telefono.value!="" && !validarTfno(form.telefono.value)){	// Si es incorrecto sintacticamente
			form.telefono.select();
		}else	if (form.email.value == ""){	// Si no hay email
			form.email.focus();
		}else	if (!validarEmail(form.email.value)){	// Si es incorrecto sintacticamente
			form.email.select();
		}else if (form.consulta.value == ""){	// Si no hay consulta
			form.consulta.focus();
		}else if (!form.acepto_politica.checked){	// Si no hay consulta
			form.acepto_politica.focus();
		}
		return(false);
	}else{
		//alert("El formulario es correcto.");
		return(true);
	}
//	//form.submit(); //<input type="button" name="Guardar" onClick="Valida(this.form)">
}
	
function ValidaSolicitud(form, idioma){
	
	if(idioma == "es"){
		var cadena = "Se han producido los siguientes errores:";
	}else if (idioma == "en"){
		var cadena = "Some errors ocurred:";
	}else if (idioma == "ga"){
		var cadena = "Ocurriron os seguintes erros:";
	}else cadena = "No hay idioma";
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
	
	if (form.dni.value == "") {
		if(idioma == "es"){
			cadena+="\n - Debes introducir un DNI/NIF válido.";
		}else if(idioma == "en"){
			cadena+="\n - You must introduce a valid DNI/NIF.";
		}else if(idioma == "ga"){
			cadena+="\n - Debes introducir un DNI/NIF válido.";
		}
			var hayErrores=1;
	}
	if (form.dni.value != "") {
		if(!validarDni(form.dni.value)){
			if(idioma == "es"){
				cadena+="\n - El DNI/NIF introducido no es correcto.";
			}else if(idioma == "en"){
				cadena+="\n - The DNI/NIF introduced is not correct.";
			}else if(idioma == "ga"){
				cadena+="\n - O DNI/NIF introducido non é correcto.";
			}
			var hayErrores=1;
		}
	}
	
	if (form.direccion.value == "") {
		if(idioma == "es"){
			cadena+="\n - Debes introducir una dirección postal.";
		}else if(idioma == "en"){
			cadena+="\n - You must introduce an address.";
		}else if(idioma == "ga"){
			cadena+="\n - Debes introducir unha dirección.";
		}
			var hayErrores=1;
	}
	
	if (form.ciudad.value == "") {
		if(idioma == "es"){
			cadena+="\n - Debes introducir una ciudad.";
		}else if(idioma == "en"){
			cadena+="\n - You must introduce a city.";
		}else if(idioma == "ga"){
			cadena+="\n - Debes introducir unha cidade.";
		}
			var hayErrores=1;
	}
	
	if (form.cp.value == "") {
		if(idioma == "es"){
			cadena+="\n - Debes introducir un código postal.";
		}else if(idioma == "en"){
			cadena+="\n - You must introduce a zip code.";
		}else if(idioma == "ga"){
			cadena+="\n - Debes introducir un código postal.";
		}
			var hayErrores=1;
	}
	
	if (form.telefono.value == "") {
		if(idioma == "es"){
			cadena+="\n - Debes introducir un número de teléfono.";
		}else if(idioma == "en"){
			cadena+="\n - You must introduce a phone number.";
		}else if(idioma == "ga"){
			cadena+="\n - Debes introducir un número de teléfono.";
		}
			var hayErrores=1;
	}
	if (form.telefono.value != "") {
		if(!validarTfno(form.telefono.value)){
			if(idioma == "es"){
				cadena+="\n - El número de teléfono introducido no es correcto.";
			}else if(idioma == "en"){
				cadena+="\n - The phone number introduced is not correct.";
			}else if(idioma == "ga"){
				cadena+="\n - O número de teléfono introducido non é correcto.";
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
			cadena+="\n - Debes introducir unha dirección de correo eletrónico.";
		}
		var hayErrores=1;
	}
	if (form.email.value != "") {
		if(!validarEmail(form.email.value)){
			if(idioma == "es"){
				cadena+="\n - La dirección de correo electrónico introducida no es correcta.";
			}else if(idioma == "en"){
				cadena+="\n - The email address introduced is not correct.";
			}else if(idioma == "ga"){
				cadena+="\n - A dirección de correo electrónico introducida non é correcta.";
			}
			var hayErrores=1;
		}
	}
	if (!form.acepto_politica.checked) {
		if(idioma == "es"){
			cadena+="\n - Debes aceptar nuestra política de privacidad.";
		}else if(idioma == "en"){
			cadena+="\n - You must accept our privacy policy.";
		}else if(idioma == "ga"){
			cadena+="\n - Debes aceptr a nosa política de privacidade.";
		}
		var hayErrores=1;
	}
	
	if(hayErrores==1){
		alert(cadena);
		
		if (form.nombre.value == ""){	// Si no hay nombre
			form.nombre.focus();
		}else if (form.dni.value == ""){	// Si no hay nombre
			form.dni.focus();
		}else	if (form.dni.value!="" && !validarDni(form.dni.value)){	// Si es incorrecto sintacticamente
			form.dni.select();
		}else	if (form.telefono.value == ""){	// Si no hay telefono
			form.telefono.focus();
		}else	if (form.telefono.value!="" && !validarTfno(form.telefono.value)){	// Si es incorrecto sintacticamente
			form.telefono.select();
		}else	if (form.direccion.value == ""){	// Si no hay direccion
			form.direccion.focus();
		}else	if (form.ciudad.value == ""){	// Si no hay ciudad
			form.ciudad.focus();
		}else	if (form.cp.value == ""){	// Si no hay direccion
			form.cp.focus();
		}else	if (form.cp.value!="" && !validarCp(form.cp.value)){	// Si es incorrecto sintacticamente
			form.cp.select();
		}else	if (form.email.value == ""){	// Si no hay email
			form.email.focus();
		}else	if (!validarEmail(form.email.value)){	// Si es incorrecto sintacticamente
			form.email.select();
		}else if (!form.acepto_politica.checked){	// Si no hay consulta
			form.acepto_politica.focus();
		}
		return(false);
	}else{
		//alert("El formulario es correcto.");
		return(true);
	}
//	//form.submit(); //<input type="button" name="Guardar" onClick="Valida(this.form)">
}