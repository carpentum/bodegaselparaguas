<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <?php
        include_once("templates/metas.php");
        $id_pag = "hagase-socio";
        include_once("templates/recuperarGet.php");
        include_once("variables.php");
        include_once("templates/getLanguage.php");
        include("textos_" . $idioma . ".php");
        $titleString = T_SOCIO;
        include("widgets/title.php");
        $menuOption = 5;
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
                    $estasen .= "<a href='" . $urlpath . "club-de-amigos.php' title='" . T_CLUB . "'>" . T_CLUB . "</a> > ";
                    if (!isset($e))
                        $estasen .= T_SOCIO;
                    else if ($e == 0)
                        $estasen .= T_SOCIO_NO_ENVIADO;
                    else if ($e == 1)
                        $estasen .= T_SOCIO_ENVIADO;
                    include("widgets/estasen.php");
                    ?>
                    <div id="contenidoppalcontacto">
                        <div id="contenidoTxt">
                            <div id="h1vinoclubamigos" class="h1pages"><?php echo T_SOCIO; ?></div>
                    <!-- <h2 class="textogriscorp"><?php echo T_SOCIO; ?></h2> -->
                            <?php
                            if (!isset($e)) {
                                ?>
                                <div style="width:100%;float:left;color:#777;">
                                    <div class="formInfo" style="width:32%;float:left;margin-left:30px;color:#777;">
                                        <img src="<?php echo $urlpath ?>images/pequenas_400px/_MG_4425.jpg" alt="<?php echo T_SOCIO; ?>" style="width: 200px; float: left;padding:0 10px 10px;margin:0 30px 10px 10px;" />
                                    </div>
                                    <div class="formInfo" style="width:58%;float:left;padding-left:30px;color:#777;">
                                        <p><?php echo T_SOCIO_PARR1 . "<br /><br />" . T_SOCIO_PARR2; ?></p>
                                    </div>
                                    <br class="clear">
                    <!--<p class="right">(*) Campos Obligatorios</p>-->
                                    <form class="cleanform" id="contacto" action="enviarSolicitud.php" method="post" onsubmit="return ValidaSolicitud(this, '<?php echo $idioma; ?>');">
                                        <fieldset>
                                            <legend><?php echo T_CONTACTO_DETAILS; ?>:</legend>
                                            <label for="nombre" ><?php echo T_CONTACTO_NOMBRE; ?> <span class="required">(required)</span></label>
                                            <input name="nombre" id="nombre" type="text" value="" />
                                            <div style="width:49%;float:left">
                                                <label for="dni" ><?php echo T_SOCIO_DNI; ?> <span class="required">(required)</span></label>
                                                <input name="dni" id="dni" type="text" value="" />
                                            </div>
                                            <div style="width:49%;float:right;margin-right:5px;">
                                                <label for="telefono" ><?php echo T_CONTACTO_TELEFONO; ?> <span class="required">(required)</span></label>
                                                <input name="telefono" id="telefono" type="text" value="" />
                                            </div>
                                            <label for="direccion" ><?php echo T_CONTACTO_DIRECCION; ?> <span class="required">(required)</span></label>
                                            <input name="direccion" id="direccion" type="text" value="" />
                                            <div style="width:49%;float:left">
                                                <label for="ciudad" ><?php echo T_CONTACTO_CIUDAD; ?> <span class="required">(required)</span></label>
                                                <input name="ciudad" id="ciudad" type="text" value="" />
                                            </div>
                                            <div style="width:49%;float:right;margin-right:5px;">
                                                <label for="cp" ><?php echo T_CONTACTO_CP; ?> <span class="required">(required)</span></label>
                                                <input name="cp" id="cp" type="text" value="" />
                                            </div>
                                            <label for="direccionEnvio" ><?php echo T_SOCIO_DIRECCION_ENVIO; ?></label>
                                            <input name="direccionEnvio" id="direccionEnvio" type="text" value="" />
                                            <div style="width:49%;float:left">
                                                <label for="ciudadEnvio" ><?php echo T_SOCIO_CIUDAD_ENVIO; ?></label>
                                                <input name="ciudadEnvio" id="ciudadEnvio" type="text" value="" />
                                            </div>
                                            <div style="width:49%;float:right;margin-right:5px;">
                                                <label for="cpEnvio" ><?php echo T_SOCIO_CP_ENVIO; ?></label>
                                                <input name="cpEnvio" id="cpEnvio" type="text" value="" />
                                            </div>
                                            <div style="width:49%;float:left">
                                                <label for="email"><?php echo T_CONTACTO_EMAIL; ?> <span class="required">(required)</span></label>
                                                <input name="email" id="email" type="text" value="" />
                                            </div>
                                            <div style="width:49%;float:right;margin-right:5px;">
                                                <label for="profesion"><?php echo T_SOCIO_PROFESION; ?></label>
                                                <input name="profesion" id="profesion" type="text" value="" />
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend><?php echo T_SOCIO_DATOS_INTERES; ?></legend>
                                            <label for="relacion"><?php echo T_SOCIO_RELACION; ?></label>
                                            <textarea name="relacion" id="relacion" rows="10" cols="50"></textarea>
                                            <label for="interes"><?php echo T_SOCIO_INTERES; ?></label>
                                            <textarea name="interes" id="interes" rows="10" cols="50"></textarea>
                                        </fieldset>
                                        <fieldset>
                                            <input type="checkbox" id="acepto_politica">
                                                <label for="acepto_politica" id="label_acepto_politica"><?php echo T_CONTACTO_ACEPTO_POLITICA; ?></label>
                                        </fieldset>
                                        <p><button type="submit"><?php echo T_CONTACTO_ENVIAR; ?></button></p>
                                    </form>
                                </div>
                                <br class="clear" />
                                <?php
                            } else if ($e == 1) {
                                ?>
                                <div class="msgcontacto">
                                    <h2 class="textocentrado textoverde"><?php echo T_SOCIO_ENVIADO_TEXTO; ?></h2>
                                    <span><a href="<?php echo $urlpath ?>" title="<?php echo T_VOLVER_PAGINA_PRINCIPAL ?>"><?php echo T_VOLVER_PAGINA_PRINCIPAL ?></a></span>
                                </div>

                                <?php
                            } else if ($e == 0) {
                                ?>
                                <div class="msgcontacto">
                                    <h2 class="textocentrado textorojo"><?php echo T_SOCIO_NO_ENVIADO_TEXTO; ?></h2>
                                    <span><a href="<?php echo $urlpath ?>" title="<?php echo T_VOLVER_PAGINA_PRINCIPAL ?>"><?php echo T_VOLVER_PAGINA_PRINCIPAL ?></a></span>
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