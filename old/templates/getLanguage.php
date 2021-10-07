<?php
//Si hay una cookie de idioma, �se ser� en principio el idioma
$idioma = isset($_COOKIE['lan']) ? $_COOKIE['lan'] : "";

//Si viene de la p�gina inicio y le asigna un idioma, �se tendr� preferencia
$idioma = isset($_GET['idioma']) ? $_GET['idioma'] : $idioma;

if ($idioma == ""){
	$idioma = (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) ? $_SERVER['HTTP_ACCEPT_LANGUAGE']: "";
	$idioma = (isset($idioma) && $idioma != "") ? substr($idioma, 0, 2) : "";

	// Miramos si el usuario ha definido un idioma por defecto en su navegador
	// Si es as�, miramos que idiomas ha definido:
	if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
		$idiomas = explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']); # Convertimos HTTP_ACCEPT_LANGUAGE en array
		    
		/* Recorremos el array hasta que encontramos un idioma del visitante que coincida con los idiomas en que est� disponible nuestra web */
		for ($i=0; $i<count($idiomas); $i++){
			// Si a�n no hemos definido la variable $idioma...
			if (!isset($idioma)){
				/* Miramos si tiene alg�n idioma de los disponibles entre sus favoritos.
				Empezando por su primer favorito y acabando por su �ltimo favorito */
				if (substr($idiomas[$i], 0, 2) == "es"){$idioma = "es";}
				if (substr($idiomas[$i], 0, 2) == "en"){$idioma = "en";}
				if (substr($idiomas[$i], 0, 2) == "ga"){$idioma = "ga";}
			}
		}
	}
}

if ($idioma == "en")include($urlpath."textos_en.php");
else if ($idioma == "ga")include($urlpath."textos_ga.php");
else include($urlpath."textos_es.php");
?>