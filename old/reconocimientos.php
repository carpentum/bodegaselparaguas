<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <?php
        include_once("templates/metas.php");
        $id_pag = "reconocimientos";
        include_once("templates/recuperarGet.php");
        if (isset($idioma))
            setcookie("lan", $idioma, time() + 60 * 60 * 24 * 30);
        include_once("variables.php");
        include_once("templates/getLanguage.php");
        include("textos_" . $idioma . ".php");
        $titleString = T_RECONOCIMIENTOS;
        include("widgets/title.php");
        $menuOption = 8;
        include_once("templates/cssJsPagsPpales.php");
        ?>
    </head>
    <body>
        <div id="body">
            <div id="cajagrande">
                <?php include_once("widgets/cabecera.php"); ?>
                <div id="contenido">
                    <?php
                    $estasen = "<a href='" . $urlpath . "' title='Bodegas El Paraguas'>Bodegas El Paraguas</a> > ";
                    $estasen .= T_RECONOCIMIENTOS;
                    include("widgets/estasen.php");
                    ?>
                    <div id="contenidoTxt">
                        <div id="h1vinoclubamigos" class="h1pages">
                            <?php echo T_RECONOCIMIENTOS_H1; ?>
                        </div>
                        <div id="imgvinedobodega">
                            <img id="imgvinedobodega" src="<?php echo $urlpath ?>images/galardon_sombra.jpg" alt="<?php echo T_RECONOCIMIENTOS; ?>" />
                            <div class="txtreconocimientosbajofoto" style="padding-bottom:0px!important">
                                <span id="txtalladoimgvinedobodega"><?php echo T_RECONOCIMIENTOS_RESTAURANTES . T_RECONOCIMIENTOS_CONTACTENOS; ?></span>
                            </div>
                        </div>
                        <div id="txtalladoimgvinedobodega" style="padding-bottom:0px!important">
                            <br />
                            <span id="txtalladoimgvinedobodega">
                                <?php echo T_RECONOCIMIENTOS_PARR1 . "<br /><br />" . T_RECONOCIMIENTOS_PARR2 . "<br />" . T_RECONOCIMIENTOS_PARR3 ?>
                            </span>
                        </div>
                        <br class="clear" />
                    </div>
                </div>
                <?php include_once("widgets/footer.php"); ?>
            </div>
        </div>
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
    </body>
</html>