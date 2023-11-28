<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();
?>
<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="row">
                <div class="col-md-10 col-sm-12 col-xs-12">

                    <?php if (have_posts()) : ?>

                        <?php if (is_home() && !is_front_page()) : ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                            </header>
                        <?php endif; ?>

                        <?php
                        $contador = 1;
                        echo "<div class='row'>";
                        // Start the loop.
                        while (have_posts()) : the_post();
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            if ($contador == 1 || $contador == 2) {
                                echo "<div class='col-md-12 col-sm-12 col-xs-12 page-responsivetxt' style='margin-bottom:30px;'>";
                                get_template_part('template-parts/content', get_post_format());
                                echo "</div>";
                            } else {
                                echo "<div class='col-md-3 col-md-offset-0 col-sm-4 col-sm-offset-1 col-xs-12 small-entry page-responsivetxt' style='margin-bottom:20px;'>";
                                get_template_part('template-parts/content_rest', get_post_format());
                                echo "</div>";
                            }
                            $contador++;
                        // End the loop.
                        endwhile;
                        echo "</div>";  //Cerramos <div class="row"> si no lo hemos hecho antes
// Previous/next page navigation.
                        the_posts_pagination(array(
                            'prev_text' => __('Previous page', 'twentysixteen'),
                            'next_text' => __('Next page', 'twentysixteen'),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'twentysixteen') . ' </span>',
                        ));

                    // If no content, include the "No posts found" template.
                    else :
                        get_template_part('template-parts/content', 'none');

                    endif;
                    ?>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12" style="margin-bottom:10px">
                    <h3 style="text-align: center;margin-bottom: 20px;">Newsletters</h5>
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-12 newsletters">
                            <div class="newsletter">
                                <a href="/newsletter/2023_diciembre.html" title="Diciembre 2023">
                                    <img src="/newsletter/img/202312/screenshot.png" alt="Diciembre 2023">
                                    <h5>Diciembre 2023</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2023_septiembre.html" title="Septiembre 2023">
                                    <img src="/newsletter/img/202309/screenshot.png" alt="Septiembre 2023">
                                    <h5>Septiembre 2023</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2023_junio.html" title="Junio 2023">
                                    <img src="/newsletter/img/202306/screenshot.png" alt="Junio 2023">
                                    <h5>Junio 2023</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2023_marzo.html" title="Marzo 2023">
                                    <img src="/newsletter/img/202303/screenshot.png" alt="Marzo 2023">
                                    <h5>Marzo 2023</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2022_diciembre.html" title="Diciembre 2022">
                                    <img src="/newsletter/img/202212/screenshot.png" alt="Diciembre 2022">
                                    <h5>Diciembre 2022</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2022_septiembre.html" title="Septiembre 2022">
                                    <img src="/newsletter/img/202209/screenshot.png" alt="Septiembre 2022">
                                    <h5>Septiembre 2022</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2022_junio.html" title="Junio 2022">
                                    <img src="/newsletter/img/202206/screenshot.png" alt="Junio 2022">
                                    <h5>Junio 2022</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2022_marzo.html" title="Marzo 2022">
                                    <img src="/newsletter/img/202203/screenshot.png" alt="Marzo 2022">
                                    <h5>Marzo 2022</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2021_diciembre.html" title="Diciembre 2021">
                                    <img src="/newsletter/img/202112/screenshot.png" alt="Diciembre 2021">
                                    <h5>Diciembre 2021</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2021_septiembre.html" title="Septiembre 2021">
                                    <img src="/newsletter/img/202109/screenshot.png" alt="Septiembre 2021">
                                    <h5>Septiembre 2021</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2021_junio.html" title="Junio 2021">
                                    <img src="/newsletter/img/202106/screenshot.png" alt="Junio 2021">
                                    <h5>Junio 2021</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2021_marzo.html" title="Marzo 2021">
                                    <img src="/newsletter/img/202103/screenshot.png" alt="Marzo 2021">
                                    <h5>Marzo 2021</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2020_diciembre.html" title="Diciembre 2020">
                                    <img src="/newsletter/img/202012/screenshot.png" alt="Diciembre 2020">
                                    <h5>Diciembre 2020</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2020_septiembre.html" title="Septiembre 2020">
                                    <img src="/newsletter/img/202009/screenshot.png" alt="Septiembre 2020">
                                    <h5>Septiembre 2020</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2020_junio.html" title="Junio 2020">
                                    <img src="/newsletter/img/202006/screenshot.png" alt="Junio 2020">
                                    <h5>Junio 2020</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2020_marzo.html" title="Marzo 2020">
                                    <img src="/newsletter/img/202003/screenshot.png" alt="Marzo 2020">
                                    <h5>Marzo 2020</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2019_diciembre.html" title="Diciembre 2019">
                                    <img src="/newsletter/img/201912/screenshot.png" alt="Diciembre 2019">
                                    <h5>Diciembre 2019</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2019_septiembre.html" title="Septiembre 2019">
                                    <img src="/newsletter/img/201909/screenshot.png" alt="Septiembre 2019">
                                    <h5>Septiembre 2019</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2019_junio.html" title="Junio 2019">
                                    <img src="/newsletter/img/201906/screenshot.png" alt="Junio 2019">
                                    <h5>Junio 2019</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2019_marzo.html" title="Marzo 2019">
                                    <img src="/newsletter/img/201903/screenshot.png" alt="Marzo 2019">
                                    <h5>Marzo 2019</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2018_diciembre.html" title="Diciembre 2018">
                                    <img src="/newsletter/img/201812/screenshot.png" alt="Diciembre 2018">
                                    <h5>Diciembre 2018</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2018_septiembre.html" title="Septiembre 2018">
                                    <img src="/newsletter/img/201809/screenshot.png" alt="Septiembre 2018">
                                    <h5>Septiembre 2018</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2018_junio.html" title="Junio 2018">
                                    <img src="/newsletter/img/201806/screenshot.png" alt="Junio 2018">
                                    <h5>Junio 2018</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2018_marzo.html" title="Marzo 2017">
                                    <img src="/newsletter/img/201803/screenshot.png" alt="Marzo 2018">
                                    <h5>Marzo 2018</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2017_diciembre.html" title="Diciembre 2017">
                                    <img src="/newsletter/img/201712/screenshot.png" alt="Diciembre 2017">
                                    <h5>Diciembre 2017</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2017_septiembre.html" title="Septiembre 2017">
                                    <img src="/newsletter/img/201709/screenshot.png" alt="Septiembre 2017">
                                    <h5>Septiembre 2017</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2017_junio.html" title="Junio 2017">
                                    <img src="/newsletter/img/201706/screenshot.png" alt="Junio 2017">
                                    <h5>Junio 2017</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2017_marzo.html" title="Marzo 2017">
                                    <img src="/newsletter/img/201703/screenshot.png" alt="Marzo 2017">
                                    <h5>Marzo 2017</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2016_diciembre.html" title="Diciembre 2016">
                                    <img src="/newsletter/img/201612/screenshot.png" alt="Diciembre 2016">
                                    <h5>Diciembre 2016</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2016_septiembre.html" title="Septiembre 2016">
                                    <img src="/newsletter/img/201609/screenshot.png" alt="Septiembre 2016">
                                    <h5>Septiembre 2016</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2016_junio.html" title="Junio 2016">
                                    <img src="/newsletter/img/201606/screenshot.png" alt="Junio 2016">
                                    <h5>Junio 2016</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2016_marzo.html" title="Marzo 2016">
                                    <img src="/newsletter/img/201603/screenshot.png" alt="Marzo 2016">
                                    <h5>Marzo 2016</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2015_diciembre.html" title="Diciembre 2015">
                                    <img src="/newsletter/img/201512/screenshot.png" alt="Diciembre 2015">
                                    <h5>Diciembre 2015</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2015_septiembre.html" title="Septiembre 2015">
                                    <img src="/newsletter/img/201509/screenshot.png" alt="Septiembre 2015">
                                    <h5>Septiembre 2015</h5>
                                </a>
                            </div>
                            <div class="newsletter">
                                <a href="/newsletter/2015_junio.html" title="Junio 2015">
                                    <img src="/newsletter/img/201506/screenshot.png" alt="Junio 2015">
                                    <h5>Junio 2015</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </main><!-- .site-main -->
    </div><!-- .content-area -->
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
