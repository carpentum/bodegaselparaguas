<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <?php
        include_once("templates/metas.php");
        $id_pag = "contacto";
        include_once("templates/recuperarGet.php");
        include_once("variables.php");
        include_once("templates/getLanguage.php");
        include("textos_" . $idioma . ".php");
        $titleString = T_CONTACTO;
        include("widgets/title.php");
        $menuOption = 7;
        include_once("templates/cssJsPagsPpales.php");
        ?>
        <script type="text/javascript" src="<?php echo($urlpath); ?>js/validarContacto.js"></script>
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-42481105-1', 'bodegaselparaguas.com');
            ga('send', 'pageview');

        </script>
    </head>
    <body>
        <div id="body">
            <div id="cajagrande">
                    <?php include_once("widgets/cabecera.php"); ?>
                <div id="contenido">
<?php
$estasen = "<a href='" . $urlpath . "' title='Bodegas El Paraguas'>Bodegas El Paraguas</a> > ";
if (!isset($e))
    $estasen .= T_CONTACTO;
else if ($e == 0)
    $estasen .= T_CONTACTO_NO_ENVIADO;
else if ($e == 1)
    $estasen .= T_CONTACTO_ENVIADO;
include("widgets/estasen.php");
?>
                    <div id="contenidoppalcontacto">
                        <div id="contenidoTxt">
                            <div class="h1pages"><?php echo T_CONTACTO; ?></div>
<?php
if (!isset($e)) {
    ?>
                                <div id="contactoizqda" style="float:left;width:450px;">
                                    <img src="<?php echo $urlpath ?>images/pequenas_400px/_MG_4440.jpg" alt="<?php echo T_CONTACTO; ?>" style="padding:10px;margin:10px 30px 10px 10px;" />
                                    <div style="margin:0 auto;width:400px;text-align:center;color:#777;">
                                        BODEGAS EL PARAGUAS S.L.<br />
                                        <div style="float:right;width:180px;">
    <?php echo T_CONTACTO_BODEGA; ?>:<br />
                                            C/ Salgado Moscoso, 20<br />
                                            Ribadavia, 32400<br />
                                            Ourense<br />
                                            Visitas bajo cita previa.<br />
                                            (0034) 616 482 854
                                        </div>
                                        <div style="float:left;width:180px;">
    <?php echo T_CONTACTO_OFICINA; ?>: <br />
                                            Lugar de Esmelle, 111.<br />
                                            Ferrol, 15594<br />
                                            A Coruña<br />
                                            (0034) 636 161 479
                                        </div>
                                        <br class="clear" /><br />
                                        Contacto online:<br />
                                        <a href="mailto:info@bodegaselparaguas.com">info@bodegaselparaguas.com</a><br /><br />
                                        <a href="http://www.facebook.com/pages/Bodegas-El-Paraguas/269228339785798" title="Bodegas El Paraguas en Facebook" target="_blank"><img src="<?php echo $urlpath ?>images/logo_facebook.jpg" alt="Síguenos en Facebook" /></a>
                                        <a href="https://twitter.com/bodegelparaguas" title="Bodegas El Paraguas en Twitter" target="_blank"><img src="<?php echo $urlpath ?>images/logo_twitter.jpg" alt="Síguenos en Twitter" /></a>
                                        <a href="https://plus.google.com/100047185169661231444/posts?hl=es" title="Bodegas El Paraguas en Google+" target="_blank"><img src="<?php echo $urlpath ?>images/logo_google+_36x36.jpg" alt="Síguenos en Google+" /></a>


                                    </div>
                                </div>
                                <div id="contactodcha" style="float:left;width:540px;">	
                                        <!--<p class="right">(*) Campos Obligatorios</p>-->
                                    <form class="cleanform formcontacto" id="contacto" action="enviarContacto.php" method="post" onsubmit="return ValidaContacto(this, '<?php echo $idioma; ?>');">
                                        <div class="formInfo">
                                            <h2 style="color:#000;"><?php echo T_CONTACTO_FORM; ?></h2>
                                            <p><?php echo T_CONTACTO_PARR1; ?></p>
                                        </div>
                                        <fieldset>
                                            <legend><?php echo T_CONTACTO_DETAILS; ?>:</legend>
                                            <label for="nombre" ><?php echo T_CONTACTO_NOMBRE; ?> <span class="required">(required)</span></label>
                                            <input name="nombre" id="nombre" type="text" value="" />
                                            <label for="direccion" ><?php echo T_CONTACTO_DIRECCION; ?></label>
                                            <input name="direccion" id="direccion" type="text" value="" />
                                            <label for="ciudad" ><?php echo T_CONTACTO_CIUDAD; ?></label>
                                            <input name="ciudad" id="ciudad" type="text" value="" />
                                            <label for="cp" ><?php echo T_CONTACTO_CP; ?></label>
                                            <input name="cp" id="cp" type="text" value="" />
                                            <label for="telefono" ><?php echo T_CONTACTO_TELEFONO; ?></label>
                                            <input name="telefono" id="telefono" type="text" value="" />
                                            <label for="email"><?php echo T_CONTACTO_EMAIL; ?> <span class="required">(required)</span></label>
                                            <input name="email" id="email" type="text" value="" />
                                        </fieldset>
                                        <fieldset>
                                            <legend><?php echo T_CONTACTO_CONSULTA; ?></legend>
                                            <label for="consulta"></label>
                                            <textarea name="consulta" id="consulta" rows="10" cols="50"></textarea>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="acepto_politica">
                                            <label for="acepto_politica" id="label_acepto_politica"><?php echo T_CONTACTO_ACEPTO_POLITICA;?></label>
                                        </fieldset>
                                        <p><button type="submit"><?php echo T_CONTACTO_ENVIAR; ?></button></p>
                                    </form>
                                </div>
                                <?php
                            } else if ($e == 1) {
                                ?>
                                <div class="msgcontacto">
                                    <h2 class="textocentrado textoverde"><?php echo T_CONTACTO_ENVIADO_TEXTO; ?></h2>
                                    <span><a href="<?php echo $urlpath ?>" title="<?php echo T_VOLVER_PAGINA_PRINCIPAL ?>"><?php echo T_VOLVER_PAGINA_PRINCIPAL ?></a></span>
                                </div>

    <?php
} else if ($e == 0) {
    ?>
                                <div class="msgcontacto">
                                    <h2 class="textocentrado textorojo"><?php echo T_CONTACTO_NO_ENVIADO_TEXTO; ?></h2>
                                    <span><a href="<?php echo $urlpath ?>" title="<?php echo T_VOLVER_PAGINA_PRINCIPAL ?>"><?php echo T_VOLVER_PAGINA_PRINCIPAL ?></a></span>
                                </div>
    <?php
}
?>
                            <br class="clear" />
                        </div>
                    </div>
                </div>
<?php include_once("widgets/footer.php"); ?>
            </div>
        </div>
    </body>
</html>