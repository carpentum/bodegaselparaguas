<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <?php
        include_once("templates/metas.php");
        $id_pag = "condiciones";
        include_once("templates/recuperarGet.php");
        include_once("variables.php");
        include_once("templates/getLanguage.php");
        include("textos_" . $idioma . ".php");
        $titleString = T_CONDICIONES;
        include("widgets/title.php");
        $menuOption = 5;
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
$estasen .= "<a href='" . $urlpath . "club-de-amigos.php' title='" . T_CLUB . "'>" . T_CLUB . "</a> > ";
$estasen .= T_CONDICIONES;
include("widgets/estasen.php");
?>
                    <div id="contenidoTxt">
                        <div id="h1vinoclubamigos" class="h1pages"><?php echo T_CONDICIONES_H1; ?></div>
                        <img src="<?php echo $urlpath ?>images/pequenas_400px/_MG_4413.jpg" alt="<?php echo T_CONDICIONES_H1; ?>" style="float: left;padding:10px;margin:10px 30px 10px 10px;" />
<?php echo "<div style='padding-right:30px;color:#777777;'><br /><br />" . T_CONDICIONES_PARR1 . "<br /><br /><br />" . T_CONDICIONES_PARR2 . "<br /><br /><br />" . T_CONDICIONES_PARR3 . "</div>"; ?>
                        <br class="clear" />
                    </div>
                </div>
<?php include_once("widgets/footer.php"); ?>
            </div>
        </div>
    </body>
</html>