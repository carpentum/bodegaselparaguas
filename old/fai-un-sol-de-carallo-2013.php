<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <?php
        include_once("templates/metas.php");
        $id_pag = "el-paraguas-atlantico-2013";
        include_once("templates/recuperarGet.php");
        include_once("variables.php");
        include_once("templates/getLanguage.php");
        include("textos_" . $idioma . ".php");
        $titleString = "Fai un Sol de Carallo 2013";
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
                    $estasen .= T_FAIUNSOL2013;
                    include("widgets/estasen.php");
                    ?>
                    <div id="contenidoTxt">
                        <!--<div class="h1pages" id="h1vinedobodega" style="text-align: center;"><?php echo T_PROXIMAMENTE;?></div>-->
                        <div id="h1vinoclubamigos" class="h1pages"><?php echo T_FAIUNSOL2013; ?></div>
                        <br class="clear noseve" />
                        <div id="txtalladoimgvino">
                            <?php echo "<span id=\"txtalladoimgvinedobodega\">" . T_FAIUNSOL2013_FICHA_INFOBASICA . "<br /><br />" . T_FAIUNSOL2013_FICHA_HISTORIA . "<br /><br />" . T_FAIUNSOL2013_FICHA_ELABORACION . "<br /><br />" . T_FAIUNSOL2013_FICHA_ANALISIS . "<br /><br />" . T_FAIUNSOL2013_FICHA_CONSUMO . "<br /><br />" . T_FAIUNSOL2013_FICHA_INFOADICIONAL . "<br /><br />" . T_FAIUNSOL2013_FICHA_VALORACIONES . "</span>"; ?>
                        </div>
                        <div id="imgvino">
                            <img id="imgvino" src="<?php echo $urlpath ?>images/Fai_un_sol_de_carallo_2013.jpg" alt="<?php echo T_FAIUNSOL2013; ?>" /><br class="clear" />
                            <a class="linksinsubrayar" href="<?php echo $urlpath; ?>pdfs/<?php echo T_FAIUNSOL2013_DESCARGAR_FICHA_NOMBRE_ARCHIVO; ?>" title="<?php echo T_VINO_DESCARGAR_FICHA; ?>" target="_blank"><div class="pdf_link down"><?php echo T_VINO_DESCARGAR_FICHA; ?></div></a>
                        </div>
                        <br class="clear" />
                    </div>
                </div>
                <?php include_once("widgets/footer.php"); ?>
            </div>
        </div>
    </body>
</html>