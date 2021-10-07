<?php
include("variables.php");
include("templates/recuperarPost.php");

//$to = "ramon.mosquera@coaxialinformatica.com";
$to = "info@bodegaselparaguas.com";
//$to = "Marcial Pita :: Bodegas El Paraguas <marcial@bodegaselparaguas.com>";
$subject = 'Formulario de contacto Bodegas El Paraguas';

// The message
$message = (isset($nombre) && $nombre != "")?"Nombre: ".$nombre."\r\n":"";
$message .= (isset($direccion) && $direccion != "")?"Dirección: ".$direccion."\r\n":"";
$message .= (isset($ciudad) && $ciudad != "")?"Ciudad: ".$ciudad."\r\n":"";
$message .= (isset($cp) && $cp != "")?"Código postal: ".$cp."\r\n":"";
$message .= (isset($telefono) && $telefono != "")?"Teléfono: ".$telefono."\r\n":"";
$message .= (isset($email) && $email != "")?"Correo electrónico: ".$email."\r\n":"";
$message .= (isset($consulta) && $consulta != "")?"Consulta: ".$consulta."\r\n":"";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70);
//echo $message;die;

// Headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers = 'From: Contacto bodegaselparaguas.com <'.$email.'>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
$headers .= 'Reply-To: '.$email. "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$enviado = (mail($to, $subject, $message, $headers))?1:0;
//$enviado = 0;

/*$datosPost = "enviado=".$enviado;*/

?>

<script LANGUAGE="javascript">
    location.href = "contacto.php?e=<?php echo $enviado;?>";
</script>