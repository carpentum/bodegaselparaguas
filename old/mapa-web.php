<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <?php
        include_once("templates/recuperarGet.php");
        $id_pag = "mapa-web";
        include_once("variables.php");
        include_once("templates/getLanguage.php");
        include("textos_" . $idioma . ".php");
        $titleString = "Mapa web";
        include("widgets/title.php");
        include_once("templates/cssJsPagsPpales.php");
        ?>
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
$estasen .= "Mapa web";
include("widgets/estasen.php");
?>
                    <div id="contenidoTxt">
                        <h2 class="textogriscorp">Mapa web</h2>
                        <ul id="mapaweb">
                            <li><a href="<?php echo $urlpath; ?>" title="<?php echo $nombreBodega; ?> - P�gina principal"><?php echo $nombreBodega; ?> - P�gina principal</a></li>
                            <li><a href="<?php echo $urlpath; ?>quienes-somos.php" title="<?php echo $nombreBodega; ?> - Quienes somos"><?php echo $nombreBodega; ?> - Quienes somos</a></li>
                            <li><a href="<?php echo $urlpath; ?>vinedo.php" title="<?php echo $nombreBodega; ?> - Vi�edo"><?php echo $nombreBodega; ?> - Vi�edo</a></li>
                            <li><a href="<?php echo $urlpath; ?>bodega.php" title="<?php echo $nombreBodega; ?> - Bodega"><?php echo $nombreBodega; ?> - Bodega</a></li>
                            <li><a href="<?php echo $urlpath; ?>vino.php" title="<?php echo $nombreBodega; ?> - Vino"><?php echo $nombreBodega; ?> - Vino</a></li>
                            <li><a href="<?php echo $urlpath; ?>club-de-socios.php" title="<?php echo $nombreBodega; ?> - Club de socios"><?php echo $nombreBodega; ?> - Club de socios</a></li>
                            <li><a href="<?php echo $urlpath; ?>prensa.php" title="<?php echo $nombreBodega; ?> - Prensa"><?php echo $nombreBodega; ?> - Prensa</a></li>
                            <li><a href="<?php echo $urlpath; ?>contacto.php" title="<?php echo $nombreBodega; ?> - Contacto"><?php echo $nombreBodega; ?> - Contacto</a></li>
                            <li><a href="<?php echo $urlpath; ?>aviso-legal.php" title="<?php echo $nombreBodega; ?> - Aviso legal"><?php echo $nombreBodega; ?> - Aviso legal</a></li>
                            <li><a href="<?php echo $urlpath; ?>mapa-web.php" title="<?php echo $nombreBodega; ?> - Mapa web"><?php echo $nombreBodega; ?> - Mapa web</a></li>
                        </ul>
                        <br class="clear" />
                    </div>
                </div>
<?php include_once("widgets/footer.php"); ?>
            </div>
        </div>
    </body>
</html>