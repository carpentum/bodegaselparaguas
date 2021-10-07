<?php
include("variables.php");
include("templates/recuperarPost.php");

//$to = "ramon.mosquera@coaxialinformatica.com";
$to = "info@bodegaselparaguas.com";
//$to = "Marcial Pita :: Bodegas El Paraguas <marcial@bodegaselparaguas.com>";
$subject = 'Solicitud de socio bodegaselparaguas.com';

// The message
$message = (isset($nombre) && $nombre != "")?"Nombre: ".$nombre."\r\n":"";
$message .= (isset($dni) && $dni != "")?"DNI: ".$dni."\r\n":"";
$message .= (isset($direccion) && $direccion != "")?"Dirección: ".$direccion."\r\n":"";
$message .= (isset($ciudad) && $ciudad != "")?"Ciudad: ".$ciudad."\r\n":"";
$message .= (isset($cp) && $cp != "")?"Código postal: ".$cp."\r\n":"";
$message .= (isset($direccionEnvio) && $direccionEnvio != "")?"Dirección de envío: ".$direccionEnvio."\r\n":"";
$message .= (isset($ciudadEnvio) && $ciudadEnvio != "")?"Ciudad de envío: ".$ciudadEnvio."\r\n":"";
$message .= (isset($cpEnvio) && $cpEnvio != "")?"Código postal de envío: ".$cpEnvio."\r\n":"";
$message .= (isset($telefono) && $telefono != "")?"Telefono: ".$telefono."\r\n":"";
$message .= (isset($email) && $email != "")?"Correo electrónico: ".$email."\r\n":"";
$message .= (isset($profesion) && $profesion != "")?"Profesión: ".$profesion."\r\n":"";
$message .= (isset($relacion) && $relacion != "")?"Relación con el mundo del vino o con Bodegas El Paraguas: ".$relacion."\r\n":"";
$message .= (isset($interes) && $interes != "")?"Intereses como socio: ".$interes."\r\n":"";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70);
//echo $message;die;

// Headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers = 'From: Solicitud de socio bodegaselparaguas.com <'.$email.'>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
$headers .= 'Reply-To: '.$email. "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$enviado = (mail($to, $subject, $message, $headers))?1:0;
//$enviado = 0;

/*$datosPost = "enviado=".$enviado;*/

?>

<script LANGUAGE="javascript">
    location.href = "hagase-socio.php?e=<?php echo $enviado;?>";
</script>