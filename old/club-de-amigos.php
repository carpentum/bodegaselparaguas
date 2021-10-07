<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <?php
        include_once("templates/metas.php");
        $id_pag = "club-de-amigos";
        include_once("templates/recuperarGet.php");
        include_once("variables.php");
        include_once("templates/getLanguage.php");
        include("textos_" . $idioma . ".php");
        $titleString = T_CLUB;
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
                        $estasen .= T_CLUB;
                        include("widgets/estasen.php");
                        ?>
                    <div id="contenidoTxt">
                            <!-- <h2 class="textogriscorp"><?php echo T_CLUB_H1; ?></h2> -->
                        <div id="h1vinoclubamigos" class="h1pages"><?php echo T_CLUB_H1; ?></div>
<?php echo "<div class='txtclubamigos'>" . T_CLUB_PARR1 . "<br />" . T_CLUB_PARR2 . "</div>"; ?>
                        <br class="clear" />
                        <div id="linksclubamigos">
                            <div id="linkdchaclubamigos"><a href="<?php echo $urlpath ?>hagase-socio.php" title="<?php echo T_SOCIO; ?>"><img src="<?php echo $urlpath ?>images/botones_<?php echo $idioma; ?>/hagase_socio.jpg" alt="<?php echo T_SOCIO; ?>" /></a></div>
                            <div id="linkizqdaclubamigos"><a href="<?php echo $urlpath ?>condiciones.php" title="<?php echo T_CONDICIONES; ?>"><img src="<?php echo $urlpath ?>images/botones_<?php echo $idioma; ?>/condiciones.jpg" alt="<?php echo T_CONDICIONES; ?>" /></a></div>
                            <div id="linkcentroclubamigos"><a href="<?php echo $urlpath ?>ventajas.php" title="<?php echo T_VENTAJAS; ?>"><img src="<?php echo $urlpath ?>images/botones_<?php echo $idioma; ?>/ventajas.jpg" alt="<?php echo T_VENTAJAS; ?>" /></a></div>
                        </div>
                        <br />
                        <img src="<?php echo $urlpath ?>images/clubdeamigos.jpg" alt="<?php echo T_CLUB_H1; ?>" />	            
                        <br />
                    </div>
                </div>
                <br class="clear" />
<?php include_once("widgets/footer.php"); ?>
            </div>
        </div>
    </body>
</html>