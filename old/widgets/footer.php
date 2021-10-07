<div id="footer">
    <span id="footertxt">
        <?php if (isset($menuOption) || $id_pag == "aviso" || $id_pag == "politica-privacidad") { ?>
            <?php if (isset($idioma) && $idioma != 'es') { ?><a href="" rel="nofollow" title="Ver la web en español" name='cookes'>Ver la web en español</a> |<?php } ?>
            <?php if (isset($idioma) && $idioma != 'en') { ?><a href="" rel="nofollow" title="Read this web in english" name='cooken'>Read this web in english</a> |<?php } ?>
            <?php if (isset($idioma) && $idioma != 'ga') { ?><a href="" rel="nofollow" title="Ler a web en galego" name='cookga'>Ler a web en galego</a> |<?php } ?>
        <?php } ?>
        <a href="<?php echo $urlpath; ?>mapa-web.php" title="Mapa Web">Mapa Web</a>  |  <a href="<?php echo $urlpath; ?>aviso-legal.php" title="Aviso Legal">Aviso Legal</a>  |  <a href="<?php echo $urlpath; ?>politica-de-privacidad.php" title="Política de privacidad">Política de privacidad</a>
    </span>
</div>
<!--<div id="validadores">
    <ul>
        <li><a href="http://validator.w3.org/check/referer" title="XHTML 1.0 Strict"><img src="<?php echo $urlpath ?>images/xhtml10.jpg" alt="XHTML 1.0 Strict" /></a></li>
        <li><a href="http://jigsaw.w3.org/css-validator/" title="CSS 2"><img src="<?php echo $urlpath ?>images/css2.jpg" alt="CSS 2" /></a></li>
    </ul>
</div>-->