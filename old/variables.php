<?php

// Turn off all error reporting
//error_reporting(0);

// Report simple running errors
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
// This is the default value set in php.ini
//error_reporting(E_ALL ^ E_NOTICE);

// Report all PHP errors (see changelog)
//error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

// Same as error_reporting(E_ALL);
//ini_set('error_reporting', E_ALL);

?>
<?php
	$filename1 = "./sitio.txt";
	$fh = @fopen($filename1, "r"); 
	$sitio = fread($fh, filesize($filename1));
	fclose($fh);
        $nombreBodega = "Bodegas El Paraguas";
		$emailCorporativo="info@bodegaselparaguas.com";

        //HAY QUE RELLENAR ESTO!!!!!!!!!
        $cifBodega = "";
        $direccionBodega = "";
        $tlfBodega = "";
        $emailBodega = "info@bodegaselparaguas.com";

	if ($sitio == "WORKSTATION") {
		$host="localhost";	//Datos de acceso a la base de datos
		$usuario="root";
		$password="";
		$nomBd="paraguas";
        $rutaDocumentRoot = "bodegaselparaguas/";
		
		$urlpath="http://bodegaselparaguas.local/";
		$nomLugar="Bodegas El Paraguas";
		$preRuta="./";
		$carpetaCvs="cvs/";
	}
	else if($sitio == "DEVELOPMENT"){  // SERVER
		$host="localhost";	//Datos de acceso a la base de datos
		$usuario="root";
		$password="";
		$nomBd="paraguas";
		
		$rutaDocumentRoot = "bodegaselparaguas/";
		
		$urlpath="http://www.coaxialinformatica.com/bodegaselparaguas/";
		$preRuta="./";
		$carpetaCvs="cvs/";
	}
	else {  // SERVER
		$host="localhost";	//Datos de acceso a la base de datos
		$usuario="root";
		$password="";
		$nomBd="paraguas";
		
		$rutaDocumentRoot = "bodegaselparaguas/";
		
		$urlpath="http://www.bodegaselparaguas.com/";
		$preRuta="./";
		$carpetaCvs="cvs/";
	}
	include("widgets/conectar.php");
?>
<!--<link rel="icon" href="<?php echo $urlpath;?>images/animated_favicon1.gif" type="image/x-icon" />-->
<link rel="shortcut icon" href="<?php echo $urlpath;?>images/favicon.ico" type="image/ico" />