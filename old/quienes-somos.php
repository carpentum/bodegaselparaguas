<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <?php
        include_once("templates/metas.php");
        $id_pag = "quienes-somos";
        include_once("templates/recuperarGet.php");
        if (isset($idioma))
            setcookie("lan", $idioma, time() + 60 * 60 * 24 * 30);
        include_once("variables.php");
        include_once("templates/getLanguage.php");
        include("textos_" . $idioma . ".php");
        $titleString = T_QUIENES;
        include("widgets/title.php");
        $menuOption = 1;
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
$estasen .= T_QUIENES;
include("widgets/estasen.php");
?>
                    <div id="contenidoTxt">
                        <!-- <div id="nota">
                                <h1 class="txtcentrado"><?php echo T_QUIENES_PREMIO_TITLE; ?></h1>
                                <span id="notatxt"><?php echo T_QUIENES_PREMIO_TXT; ?></span>
                        </div> -->
                        <!-- <h2 class="textogriscorp"><?php echo T_QUIENES; ?></h2> -->
                        <div style="width:290px;float:left;">
                            <div class="h1pages h1quienes"><?php echo T_MARCIAL;?></div>
                            <span style="line-height:20px;color:#777;"><?php echo T_MARCIAL_PARR1 . "&nbsp;&nbsp;<a href='" . $urlpath . "marcial-pita.php' title='" . LEER_MAS . "' style='font-size:11px;color:#BCA426;text-decoration:none;'>" . LEER_MAS . "</a>"; ?></span>
                        </div>
                        <div style="width:440px;float:left;">
                            <img src="<?php echo $urlpath ?>images/pequenas_400px/_MG_4423.jpg" alt="Marcial Pita" style="float: left;padding:0 10px 10px 10px;margin:0px 30px 10px 10px;" />
                        </div>
                        <div style="width:290px;float:left;">
                            <div class="h1pages h1quienes"><?php echo T_FELI;?></div>
                            <span style="line-height:20px;color:#777;"><?php echo T_FELI_PARR1 . "&nbsp;&nbsp;<a href='" . $urlpath . "felicisimo-pereira.php' title='" . LEER_MAS . "' style='font-size:11px;color:#BCA426;text-decoration:none;'>" . LEER_MAS . "</a>"; ?></span>
                        </div>
                        <br class="clear" />
                    </div>
                </div>
<?php include_once("widgets/footer.php"); ?>
            </div>
        </div>
    </body>
</html>