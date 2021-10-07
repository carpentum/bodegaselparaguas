<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <meta name="robots" content="index,follow"></meta>
        <?php
        include_once("templates/metas.php");
        $id_pag = "index";
        include_once("variables.php");
        include_once("templates/getLanguage.php");
        include_once("templates/recuperarGet.php");
        include("widgets/title.php");
        ?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
        <script type = 'text/javascript' src = '<?php echo $urlpath; ?>js/jquery.cookie.js' ></script>
        <script type='text/javascript' src='<?php echo $urlpath; ?>js/changeLang.js'></script>

        <link rel="stylesheet" href="<?php echo($urlpath); ?>css/css.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo($urlpath); ?>css/coltipog.css" type="text/css" />
        <style>
            #cajagrande{height:700px;}
        </style>
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
        <div id="cajagrande">
            <div style="text-align:center;">
                <img style="margin:0 auto" src="<?php echo $urlpath ?>images/presentacion_web2.jpg" alt="La nueva embajadora de los blancos atlánticos" usemap="#bodegamap" />

                <map name="bodegamap">
                    <area shape="rect" coords="413,452,451,483" alt="Bodegas El Paraguas en galego" href="<?php echo $urlpath ?>reconocimientos.php?idioma=ga" title="Bodegas El Paraguas en galego" />
                    <area shape="rect" coords="492,452,529,483" alt="Bodegas El Paraguas en español" href="<?php echo $urlpath ?>reconocimientos.php?idioma=es" title="Bodegas El Paraguas en español"  />
                    <area shape="rect" coords="570,452,607,483" alt="Bodegas El Paraguas in english" href="<?php echo $urlpath ?>reconocimientos.php?idioma=en" title="Bodegas El Paraguas in english" />

                    <area shape="rect" coords="460,658,494,683" alt="Bodegas El Paraguas en Facebook" href="http://www.facebook.com/pages/Bodegas-El-Paraguas/269228339785798" target="_blank"  />
                    <area shape="rect" coords="499,658,525,683" alt="Bodegas El Paraguas en Twitter" href="https://twitter.com/bodegelparaguas" target="_blank" />
                    <area shape="rect" coords="530,658,557,683" alt="Bodegas El Paraguas en Google+" href="https://plus.google.com/100047185169661231444/posts?hl=es" target="_blank" />
                </map>
            </div>
            <img src="<?php echo $urlpath?>images/logo_wim_bordeaux_130x40.jpg" style="float:left;">
        </div>
        <script>
            $(document).ready(function() {
                jQuery.fn.center = function() {
                    this.css("position", "absolute");
                    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                            $(window).scrollTop()) + "px");
                    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                            $(window).scrollLeft()) + "px");
                    return this;
                }

                $('#cajagrande').center();
            });
        </script>
    </body>
</html>