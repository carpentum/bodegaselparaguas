<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();
?>
<div class="col-md-12">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
            // Start the loop.
            while (have_posts()) : the_post();

                // Include the page content template.
                get_template_part('template-parts/content', 'page');

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }

            // End of the loop.
            endwhile;
            ?>

        </main><!-- .site-main -->

        <?php get_sidebar('content-bottom'); ?>

    </div><!-- .content-area -->
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>



<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 *//*
get_header();
?>
<div class="col-md-12">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <article id="post-14" class="post-14 page type-page status-publish hentry">
                <header class="entry-header">
                    <h1 class="entry-title">Recoñecementos</h1>
                </header><!-- .entry-header -->
                <div class="entry-content">



                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12 menu-lateral">[clubamigos_menu]</div>
                        <div id="clubamigos-txt-container" class="col-md-9 col-sm-9 col-xs-12">
                            <div class="clubamigos-intro clubamigos-txt page-responsivetxt">
                                <h5>Club de amigos</h5>
                                <a href="/wp-content/uploads/2017/11/Club_de_Amigos.jpg" title="Club de amigos"><div class="clubamigos-intro-fixedbg fixedbg"></div></a>
                                <!--<div class="row page-image-xs hidden-sm hidden-md hidden-lg">
                                    <div class="col-xs-12">
                                        <img class="vinedo-txt vinedo-intro img-responsive" alt="Intro">
                                    </div>
                                </div>-->
                                <p><span class="textofuerte">Bodegas El Paraguas</span> ofrece la posibilidad a sus clientes y amigos de formar parte de su Club de Amigos. Si eres aficionado a los vinos de calidad, deseas un contacto directo con los creadores de El Paraguas Atlántico, La Sombrilla y Fai un Sol de Carallo, informarte de sus movimientos o adquirir vinos en unas condiciones especiales, éste es tu club.</p>
                                <p>Únete al Club y bienvenido al mundo de El Paraguas. </p>
                            </div>
                            <div class="clubamigos-condiciones clubamigos-txt page-responsivetxt" style="display: none;">
                                <h5>Condiciones</h5>
                                <a href="/wp-content/uploads/2017/11/Condiciones.jpg" title="Condiciones"><div class="clubamigos-condiciones-fixedbg fixedbg"></div></a>
                                <!--<div class="row page-image-xs hidden-sm hidden-md hidden-lg">
                                    <div class="col-xs-12">
                                        <img class="img-responsive img-con-sombra" src="/wp-content/uploads/2017/11/Condiciones.jpg" alt="Condiciones">
                                    </div>
                                </div>-->
                                <p>El Club de Amigos El Paraguas surge por la necesidad de corresponder a nuestros inquietos clientes en su interés por conocer de primera mano todas las experiencias de la bodega, beneficiándose los mismos de importantes promociones, descuentos en sus compras e entradas gratuitas para los eventos que organiza Bodegas El Paraguas.</p>
                                <p><span class="textofuerte">Información:</span> Los socios del club recibirán, vía correo electrónico o por correo ordinario, información puntual y privilegiada sobre las acciones que desarrolla la bodega. Presentación de nuevas añadas, eventos que organiza Bodegas El Paraguas a los que estará invitado, promociones exclusivas, descuentos en sus compras de un 10% y acceso a la compra de los vinos de la bodega en primicia antes de que los mismos salgan al mercado y se cierre su limitado cupo de distribución son algunas de las propuestas que recibirán los socios.</p>
                                <p><span class="textofuerte">Alta gratuita:</span> Si eres mayor de 18 años y resides en el estado español, estás de enhorabuena, sólo debes cumplimentar el formulario que te facilitamos y te daremos de alta inmediatamente. Sin coste alguno, así de fácil.</p>
                            </div>
                            
                            
                            <div class="clubamigos-ventajas clubamigos-txt page-responsivetxt" style="display: none;">
                                <h5>Ventajas</h5>
                                <a href="/wp-content/uploads/2017/11/Ventajas.jpg" title="Ventajas"><div class="clubamigos-ventajas-fixedbg fixedbg"></div></a>
                                <!--<div class="row page-image-xs hidden-sm hidden-md hidden-lg">
                                    <div class="col-xs-12">
                                        <img class="clubamigos-txt clubamigos-ventajas img-responsive" style="display: none;" src="/wp-content/uploads/2017/11/Ventajas.jpg" alt="Ventajas">
                                    </div>
                                </div>-->
                                <p>Ser socio del Club no te obliga a adquirir los vinos de Bodegas El Paraguas, aunque sí te dará interesantes ventajas si quieres realizar alguna compra.</p>
                                <p>Preferencia en las compras de los productos que saldrán al mercado. Sólo los socios del club podrán beber vinos de Bodegas El Paraguas en rigurosa primicia.</p>
                                <p>10% de descuento permanente en sus compras durante toda su vida como socio, realizadas a través del Club de Amigos de Bodegas El Paraguas. Nos facilita un número de cuenta o le facilitamos el nuestro y una vez que se haya completado el pago del pedido, se lo enviamos de inmediato.</p>
                                <p>Información detallada de los productos que adquiera, con una completa ficha descriptiva del vino y comentarios sobre su elaboración y su época de consumo.</p>
                                <p>Garantizamos nuestra profesionalidad en los envíos, para que los vinos lleguen en perfecto estado a su lugar de destino. Nos comprometemos a cambiar alguno de los vinos si éstos han sufrido algún trastorno durante su transporte.</p>
                                <p>Responderemos a sus dudas en nuestro correo de atención al cliente <a href="mailto:info@bodegaselparaguas.com" title="info@bodegaselparaguas.com">info@bodegaselparaguas.com</a>. Cualquier pregunta que le surja, si está en nuestras manos, le daremos respuesta.</p>
                                <p>Si usted desea darse de baja del club de vinos de Bodegas El Paraguas es sencillo, sólo tiene que mandarnos un correo electrónico a <a href="mailto:info@bodegaselparaguas.com" title="info@bodegaselparaguas.com">info@bodegaselparaguas.com</a> comentándonos su interés por darse de baja como socio.</p>
                            </div>
                            <div class="clubamigos-hagasesocio clubamigos-txt page-responsivetxt" style="display: none;">
                                <h5>Hágase socio</h5>
                                <a href="/wp-content/uploads/2017/11/Hagase_socio.jpg" title="Hágase socio"><div class="clubamigos-hagasesocio-fixedbg fixedbg"></div></a>
                                <!--<div class="row page-image-xs hidden-sm hidden-md hidden-lg">
                                    <div class="col-xs-12">
                                        <img src="/wp-content/uploads/2017/11/Hagase_socio.jpg" class="clubamigos-txt clubamigos-hagasesocio img-responsive" style="display: none;" alt="Hágase socio">
                                    </div>
                                </div>-->
                                <p>¡Bienvenido al Club!</p>
                                <p><span class="textofuerte">Formulario para ser socio</span>
                                De acuerdo con lo establecido por la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal (LOPD), el cliente/usuario queda informado y presta su consentimiento a la incorporación de sus datos a un fichero del que es responsable BODEGAS EL PARAGUAS, S.L. que ha sido debidamente inscrito en la Agencia Española de Protección de Datos con la finalidad de informarle sobre los productos y servicios solicitados, así como el envío de comunicaciones comerciales sobre los mismos. Le informamos también sobre sus derechos de acceso, rectificación, cancelación y oposición, que podrá ejercer en el domicilio social de BODEGAS EL PARAGUAS, S.L., sito en LUGAR ESMELLE, Nº 111 - 15594 FERROL - A CORUÑA.<br>
                                Le informamos también que los datos personales suministrados no serán cedidos ni comunicados, ni siquiera para su conservación, a terceras personas.</p>
                                [contact-form-7 id="209" title="Club de amigos"]
                            </div>
                        </div>
                    </div>





                </div><!-- .entry-content -->
                <footer class="entry-footer"><span class="edit-link"><a class="post-edit-link" href="http://bodegaselparaguas.new/wp-admin/post.php?post=14&#038;action=edit">Edit<span class="screen-reader-text"> "Recoñecementos"</span></a></span></footer><!-- .entry-footer -->
            </article><!-- #post-## -->
        </main><!-- .site-main -->
        <?php get_sidebar('content-bottom'); ?>
    </div><!-- .content-area -->
</div>

<?php get_sidebar(); ?>
<?php get_footer(); */?>