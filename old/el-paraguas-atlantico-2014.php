<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <?php
        include_once("templates/metas.php");
        $id_pag = "el-paraguas-atlantico-2014";
        include_once("templates/recuperarGet.php");
        include_once("variables.php");
        include_once("templates/getLanguage.php");
        include("textos_" . $idioma . ".php");
        $titleString = "El Paraguas Atlántico 2014";
        include("widgets/title.php");
        $menuOption = 4;
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
                    $estasen .= T_VINO2014;
                    include("widgets/estasen.php");
                    ?>
                    <div id="contenidoTxt">
                        <div id="h1vinoclubamigos" class="h1pages"><?php echo T_VINO2014_H1; ?></div>
                        <br class="clear noseve" />
                        <div id="txtalladoimgvino">
                            <?php echo "<span id=\"txtalladoimgvinedobodega\">" . T_VINO2014_FICHA_INFOBASICA . "<br /><br />" . T_VINO2014_FICHA_ELABORACION . "<br /><br />" . T_VINO2014_FICHA_ANALISIS . "<br /><br />" . T_VINO2014_FICHA_CONSUMO . "<br /><br />" . T_VINO2014_FICHA_INFOADICIONAL . "</span>"; ?>
                        </div>
                        <div id="imgvino">
                            <img id="imgvino" src="<?php echo $urlpath ?>images/El_Paraguas_Atlantico_2014.jpg" alt="<?php echo T_VINO2014; ?>" /><br class="clear" />
                            <a class="linksinsubrayar" href="<?php echo $urlpath; ?>pdfs/<?php echo T_VINO2014_DESCARGAR_FICHA_NOMBRE_ARCHIVO; ?>" title="<?php echo T_VINO_DESCARGAR_FICHA; ?>" target="_blank"><div class="pdf_link down"><?php echo T_VINO_DESCARGAR_FICHA; ?></div></a>
                        </div>
                        <br class="clear" />
                    </div>
                </div>
                <?php include_once("widgets/footer.php"); ?>
            </div>
        </div>
    </body>
</html>