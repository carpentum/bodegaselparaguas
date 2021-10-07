function objetoAjax(){
		var xmlhttp=false;
		try {
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
				try {
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (E) {
						xmlhttp = false;
				}
		}
		if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
				xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
}

/*function eliminarInstancia(idInstancia){
	alert("hola");
   //donde se mostrará el resultado de la eliminacion
   divResultado = document.getElementById('contenidoBusqueda');
   
   //usaremos un cuadro de confirmacion 
   var eliminar = confirm("De verdad desea eliminar este dato?")
   if ( eliminar ) {
		   //instanciamos el objetoAjax
		   ajax=objetoAjax();
		   //uso del medotod GET
		   //indicamos el archivo que realizará el proceso de eliminación
		   //junto con un valor que representa el id del empleado
		   ajax.open("GET", "eliminarInstancia.php?id="+idInstancia));
   }
}*/

function cargarPagina(idPagina){
	//donde se mostrará el resultado de la eliminacion
	divResultado = document.getElementById('contenidoppal');
	
	//usaremos un cuadro de confirmacion 
	var eliminar = confirm("¿De verdad desea cargar esta página?")
	if (eliminar) {
	   //instanciamos el objetoAjax
	   ajax = objetoAjax();
	   
	   //Comprobamos si existe cada variable y la metemos en el String que compondrá la URL
	   var txturl = "cargarPagina.php?id="+idPagina;
	   //if (typeof year != "undefined" && year != "") txturl +="&year="+year;
	   alert(txturl);
	   
	   //uso del medotod GET
	   //indicamos el archivo que realizará el proceso de eliminación
	   //junto con un valor que representa el id del empleado
	   ajax.open("GET", txturl);	
	   ajax.onreadystatechange = function() {
			   if (ajax.readyState == 4) {
					   //mostrar resultados en esta capa
					   cadenafinal = ajax.responseText.replace("é", "&eacute;");
					   divResultado.innerHTML = cadenafinal;
			   }
	   }
	   //como hacemos uso del metodo GET
	   //colocamos null
	   ajax.send(null)
	}
}
