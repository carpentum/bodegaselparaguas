<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <?php
        include_once("templates/metas.php");
        include_once("templates/recuperarGet.php");
        include_once("variables.php");
        include_once("templates/getLanguage.php");
        include("textos_" . $idioma . ".php");
        $titleString = T_PRENSA;
        include("widgets/title.php");
        $menuOption = 6;
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
                    $estasen .= T_PRENSA;
                    include("widgets/estasen.php");
                    ?>
                    <div id="contenidoTxt">
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA20_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA20_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/logo_aepev_660x452.jpg"></div>
                            <?php Echo T_PRENSA20_PARR1 . "<br /><br />" . T_PRENSA20_PARR2 . "<br /><br />" . T_PRENSA20_PARR3 . "<br /><br />" . T_PRENSA20_PARR4; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA19_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA19_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/La_Sombrilla_2015_alta_660x495.jpg"></div>
                            <?php Echo T_PRENSA19_PARR1 . "<br /><br />" . T_PRENSA19_PARR2 . "<br /><br />" . T_PRENSA19_PARR3 . "<br /><br />" . T_PRENSA19_PARR4; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA18_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA18_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/Astillero_2015_el_primer_vino_ferrolano_660x440.jpg"></div>
                            <?php Echo T_PRENSA18_PARR1 . "<br /><br />" . T_PRENSA18_PARR2 . "<br /><br />" . T_PRENSA18_PARR3 . "<br /><br />" . T_PRENSA18_PARR4; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA17_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA17_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/el_paraguas_atlantico_2015_660x439.jpg"></div>
                            <?php Echo T_PRENSA17_PARR1 . "<br /><br />" . T_PRENSA17_PARR2 . "<br /><br />" . T_PRENSA17_PARR3; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA16_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA16_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/Foto_Fai_2014_660x439.jpg"></div>
                            <?php Echo T_PRENSA16_PARR1 . "<br /><br />" . T_PRENSA16_PARR2 . "<br /><br />" . T_PRENSA16_PARR3 . "<br /><br />" . T_PRENSA16_PARR4; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <!--<div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA15_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA15_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/Anton_Reixa_con_Marcial_y_Feli_660x370.jpg"></div>
                            <?php Echo T_PRENSA15_PARR1 . "<br /><br />" . T_PRENSA15_PARR2 . "<br /><br />" . T_PRENSA15_PARR3 . "<br /><br />" . T_PRENSA15_PARR4; ?>
                            <br class="clear" />
                        </div>
                        <hr />-->
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA14_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA14_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/Julia_660x440.jpg"></div>
                            <?php Echo T_PRENSA14_PARR1 . "<br /><br />" . T_PRENSA14_PARR2 . "<br /><br />" . T_PRENSA14_PARR3 . "<br /><br />" . T_PRENSA14_PARR4; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA13_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA13_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/Nueva_bodega_en_Cenlle_660x370.jpg"></div>
                            <?php Echo T_PRENSA13_PARR1 . "<br /><br />" . T_PRENSA13_PARR2 . "<br /><br />" . T_PRENSA13_PARR3 . "<br /><br />" . T_PRENSA13_PARR4; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA12_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA12_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/Presentacion_en_A_Gabeira.jpg"></div>
                            <?php Echo T_PRENSA12_PARR1 . "<br /><br />" . T_PRENSA12_PARR2 . "<br /><br />" . T_PRENSA12_PARR3 . "<br /><br />" . T_PRENSA12_PARR4; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA11_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA11_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/Logo-Robert-Parker-WA_660x290.jpg"></div>
                            <?php Echo T_PRENSA11_PARR1 . "<br /><br />" . T_PRENSA11_PARR2 . "<br /><br />" . T_PRENSA11_PARR3; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA10_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA10_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/Fai_un_Sol_de_Carallo_2013_agotado_660x370.jpg"></div>
                            <?php Echo T_PRENSA10_PARR1 . "<br /><br />" . T_PRENSA10_PARR2 . "<br /><br />" . T_PRENSA10_PARR3 . "<br /><br />" . T_PRENSA10_PARR4; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA9_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA9_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/Paraguas_2013_en_Ermita_Santa_Comba_660x495.jpg"></div>
                            <?php Echo T_PRENSA9_PARR1 . "<br /><br />" . T_PRENSA9_PARR2 . "<br /><br />" . T_PRENSA9_PARR3; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA8_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA8_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;padding-bottom: 20px;padding-left:10px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/Esmudiense6_660x495.jpg"></div>
                            <?php Echo T_PRENSA8_PARR1 . "<br /><br />" . T_PRENSA8_PARR2 . "<br /><br />" . T_PRENSA8_PARR3; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA7_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA7_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;height:880px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/Portada_De_Vinos_XII-13.jpg"></div>
                            <?php Echo T_PRENSA7_PARR1 . "<br /><br />" . T_PRENSA7_PARR2 . "<br /><br />" . T_PRENSA7_PARR3; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA6_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA6_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;height:430px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/El_Paraguas_Atlantico_2012_Parker.jpg"></div>
                            <?php Echo T_PRENSA6_PARR1 . "<br /><br />" . T_PRENSA6_PARR2 . "<br /><br />" . T_PRENSA6_PARR3; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA5_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA5_FECHA; ?></span></h2>
                            <div class="imgnoticia" style="float:right;margin-left: 10px;height:430px;"><img class="img-shadow" src="<?php echo $urlpath ?>images/news/el_paraguas_atlantico_2012_se_viste_de_gala_en_su_presentacion.jpg"></div>
                            <?php Echo T_PRENSA5_PARR1 . "<br /><br />" . T_PRENSA5_PARR2 . "<br /><br />" . T_PRENSA5_PARR3; ?>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA4_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA4_FECHA; ?></span></h2>
                            <div class="txtnoticia"><?php Echo T_PRENSA4_PARR1 . "<br /><br />" . T_PRENSA4_PARR2; ?></div>
                            <div class="imgnoticia"><img src="<?php echo $urlpath ?>images/news/paraguas_atlantico_mejor_blanco_espanya.jpg"></div>
                        <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA3_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA3_FECHA; ?></span></h2>
                            <div class="txtnoticia"><?php Echo T_PRENSA3_PARR1 . "<br /><br />" . T_PRENSA3_PARR2 . "<br /><br />" . T_PRENSA3_PARR3; ?></div>
                            <div class="imgnoticia"><img src="<?php echo $urlpath ?>images/news/el_paraguas_vino_recomendado.jpg"></div>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA2_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA2_FECHA; ?></span></h2>
                            <div class="txtnoticia"><?php Echo T_PRENSA2_PARR1 . "<br /><br />" . T_PRENSA2_PARR2 . "<br /><br />" . T_PRENSA2_PARR3; ?></div>
                            <div class="imgnoticia imgnoticia2"><img src="<?php echo $urlpath ?>images/news/paraguas_exito_en_medios.jpg"></div>
                            <br class="clear" />
                        </div>
                        <hr />
                        <div class="noticia">
                            <h2 class="textogriscorp"><?php echo T_PRENSA_H1; ?> - <span class="textopequenogrisdifum"><?php echo T_PRENSA_FECHA; ?></span></h2>
                            <div class="txtnoticia"><?php Echo T_PRENSA_PARR1 . "<br /><br />" . T_PRENSA_PARR2 . "<br /><br />" . T_PRENSA_PARR3; ?></div>
                            <div class="imgnoticia"><img src="<?php echo $urlpath ?>images/news/Felicisimo_y_Marcial_con_paraguas.jpg"></div>
                            <br class="clear" />
                        </div>
                    </div>
                </div>
                <?php include_once("widgets/footer.php"); ?>
            </div>
        </div>
    </body>
</html>