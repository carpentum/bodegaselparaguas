<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/******* LOCALHOST *******/
// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */


//define('DB_NAME', 'bodegaselparaguas');

/** Tu nombre de usuario de MySQL */
//define('DB_USER', 'root');

/** Tu contraseña de MySQL */
//define('DB_PASSWORD', '123');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
//define('DB_HOST', 'localhost');
/******** END LOCALHOST **********/

/*********** SERVER ***********/
// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('WP_CACHE', true);
define('DB_NAME', 'db708779520');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');
/********* END SERVER ***********/

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'E gA`aYXsuaRD5>&+l<tSD1)<Y ~J*=Fgjkq.yDKD[6ivPOxZfR!@8~QK[K )x2Z');
define('SECURE_AUTH_KEY', '>ls^xIP{4[.iC%d^dHKgNhLi~#?KoBba^boo`Ux:dsc}H3:cSWbg] r]&oY*Bv8H');
define('LOGGED_IN_KEY', 'XX)[@>W*~[a)+;EpqpT#RWsrQqW baGs qL6$$Nc@lL>Bn}8e|v2tae.zcA).[IT');
define('NONCE_KEY', 'mQKKb79KKf>F+(ZR=$0.{tsa5XSQDN67<7Z5<ler6CgL47T(`cB!`@p7-?><8BhF');
define('AUTH_SALT', 'R7jLj*2AbTjhjE+J]LLV3Y9D6{QA<tl~six3=p$]k>tsAyCcJ<x<caej5eIY2/~9');
define('SECURE_AUTH_SALT', '|@S,hsf!8?<G#V4+Q^/;Nh_FPq3)/<(2]r/h1J=xri5;09E+<}4ZuW6=JrF5.p]1');
define('LOGGED_IN_SALT', '0u=`es;:H*U;a)u|b-A6X)E b2foDpj?aL^Ir`bl#2$mm_!=,(SPk=&~*i~-}Vr4');
define('NONCE_SALT', 'm!X|c~U7T3MjUZw@=Ql]mgmAf/UMu-^ed +ddDt@/0l_;!0tGY.S_qCMlzaR-V/g');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('FS_METHOD', 'direct');
define('WP_HOME','http://bodegaselparaguas.local');
define('WP_SITEURL','http://bodegaselparaguas.local');