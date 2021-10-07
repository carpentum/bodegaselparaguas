<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <?php
        include_once("templates/metas.php");
        $id_pag = "inscripcion-contacto";
        include_once("variables.php");
        $titleString = "Inscripción y contacto";
        include("widgets/title.php");
        include_once("widgets/recuperarGet.php");
        ?>
        <link rel="stylesheet" href="<?php echo($urlpath); ?>css/css.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo($urlpath); ?>css/coltipog.css" type="text/css" />

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
                    <div id="contenidoppal">
<?php
$estasen = "<a href='" . $urlpath . "'>Ferrol Surf School</a> > ";
if (!isset($e))
    $estasen .= "Inscripción y contacto";
else if ($e == 0)
    $estasen .= "Mensaje no enviado";
else if ($e == 1)
    $estasen .= "Mensaje enviado";
include("widgets/estasen.php");
?>
                        <div id="contenidoTxt">
                            <h2 class="textoverdehercules">Inscripción y contacto</h2>
<?php
if (!isset($e)) {
    ?>
                                    <!--<p class="right">(*) Campos Obligatorios</p>-->
                                <form id="contacto" action="enviarContacto.php" method="post" onsubmit="return ValidaContacto(this);">
                                    <div class="fila">
                                        <label for="nombre" class="anchofijo">Nombre</label>
                                        <input id="nombre" name="nombre" class="inputbox" size="101" maxlength="128" value="" />
                                    </div>

                                    <div class="fila">
                                        <label for="dni" class="anchofijo">DNI</label>
                                        <input id="dni" name="dni" class="inputbox" size="10" maxlength="9" value="" />
                                    </div>

                                    <div class="fila">
                                        <label for="nombrepadre" class="anchofijo">Nombre del padre</label>
                                        <input id="nombrepadre" name="nombrepadre" class="inputbox" size="101" maxlength="128" value="" />
                                    </div>

                                    <div class="fila">
                                        <label for="nombremadre" class="anchofijo">Nombre de la madre</label>
                                        <input id="nombremadre" name="nombremadre" class="inputbox" size="101" maxlength="128" value="" />
                                    </div>

                                    <div class="fila">
                                        <label for="direccion" class="anchofijo">Dirección</label>
                                        <input id="direccion" name="direccion" class="inputbox" size="101" maxlength="128" value="" />
                                    </div>

                                    <div class="fila">
                                        <label for="cp" class="anchofijo">Código postal</label>
                                        <input id="cp" name="cp" class="inputbox" size="6" maxlength="5" value="" />
                                    </div>

                                    <div class="fila">
                                        <label for="ciudad" class="anchofijo">Ciudad</label>
                                        <input id="ciudad" name="ciudad" class="inputbox" size="101" maxlength="128" value="" />
                                    </div>

                                    <div class="fila">
                                        <label for="fechanac" class="anchofijo">Fecha de nacimiento</label>
                                        <input id="fechanac" name="fechanac" class="inputbox" size="11" maxlength="10" value="">
                                    </div>

                                    <div class="fila">
                                        <label for="telefono" class="anchofijo">Teléfono</label>
                                        <input id="telefono" name="telefono" class="inputbox" size="14" maxlength="13" value="">
                                    </div>

                                    <div class="fila">
                                        <label for="email" class="anchofijo">Email</label>
                                        <input id="email" name="email" class="inputbox" size="101" maxlength="128" value="">
                                    </div>

                                    <div class="fila">
                                        <label for="mensaje">Mensaje</label>
                                        <textarea id="mensaje" name="mensaje" class="inputbox" cols="60" rows="3"></textarea>
                                    </div>
                                    <h6>Datos para la clase:</h6>

                                    <div class="fila">
                                        <label for="peso" class="anchofijo">Peso</label>
                                        <input id="peso" name="peso" class="inputbox" size="101" maxlength="128" value="">
                                    </div>

                                    <div class="fila">
                                        <label for="estatura" class="anchofijo">Estatura</label>
                                        <input id="estatura" name="estatura" class="inputbox" size="101" maxlength="128" value="">
                                    </div>

                                    <div class="fila">
                                        <label for="talla" class="anchofijo">Talla de pie</label>
                                        <input id="talla" name="talla" class="inputbox" size="101" maxlength="128" value="">
                                    </div>

                                    <div class="fila">
                                        <label for="nivel" class="anchofijo">Nivel</label>
                                        <select name="nivel">
                                            <option value="-" selected="selected">Seleccionar</option>
                                            <option value="1">Inicial</option>
                                            <option value="2">Intermedio</option>
                                        </select>
                                    </div>

                                    <div class="fila">
                                        <label for="tumaterial" class="anchofijo">¿Traes tu material?</label>
                                        <select name="tumaterial">
                                            <option value="-" selected="selected">Seleccionar</option>
                                            <option value="1">Sí</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>

                                    <div class="textopequeño">Según la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal, Hércules Proyectos y Estudios le informa que los datos personales que proporcione serán incorporados a un fichero, del cual es titular y cuya finalidad es mantener relaciones comerciales o contractuales con su empresa, tratamiento que autoriza. Hércules Proyectos y Estudios le reconoce la posibilidad de ejercitar de forma gratuita los derechos de acceso, rectificación, cancelación y oposición, en los términos previstos en la Ley Orgánica 15/1999, mediante escrito dirigido al Responsable de Seguridad que podrá ser presentado directamente en el domicilio de la empresa o remitido por correo certificado a Hércules Proyectos y Estudios (Riego de Agua nº16, 1º Dcha, 15001 A Coruña). Asimismo el interesado autoriza a Hércules Proyectos y Estudios para que sus datos sean utilizados con el objeto de realizarle comunicaciones informativas, comerciales y de promoción de la empresa que podrán realizarse por cualquier medio, incluido el correo electrónico.</div>

                                    <div id="lopd">
                                        <input id="lopd" name="lopd" value="1" type="checkbox" /><label for="lopd"> Acepto los términos de la cláusula LOPD</label>
                                    </div>
                                    <br class="clear" />
                                    <div id="botones">
                                        <input value="Enviar" class="button" type="submit" />
                                        <input value="Borrar campos" class="button" type="reset" />
                                    </div>
                                </form>
                                <?php
                            } else if ($e == 1) {
                                ?>
                                <div class="msgcontacto">
                                    <h2 class="textocentrado textoverde">El formulario se ha enviado correctamente</h2>
                                    <span><a href="<?php echo $urlpath ?>" title="Volver a la página principal">Volver a la página principal</a></span>
                                </div>

    <?php
} else if ($e == 0) {
    ?>
                                <div class="msgcontacto">
                                    <h2 class="textocentrado textorojo">Formulario no enviado. Escriba a <?php echo $emailCorporativo; ?>.</h2>
                                    <span><a href="<?php echo $urlpath ?>" title="Volver a la página principal">Volver a la página principal</a></span>
                                </div>
    <?php
}
?>
                        </div>
                    </div>
                </div>
<?php include_once("widgets/footer.php"); ?>
            </div>
        </div>
    </body>
</html>