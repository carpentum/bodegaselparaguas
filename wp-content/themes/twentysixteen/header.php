<?php
//OBTENER LENGUAJE
//OBTENER IDIOMA
//echo get_bloginfo("language");
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <div class="site-inner container-fluid">
                <?php if (has_nav_menu('primary') || has_nav_menu('social')) : ?>
                    <!--<button id="menu-toggle" class="menu-toggle"><?php _e('Menu', 'twentysixteen'); ?></button>-->
                    <div class="row header">
                        <div id="site-header-menu" class="site-header-menu col-md-3 col-sm-3 hidden-xs">
                            <?php if (function_exists('mltlngg_display_switcher')) mltlngg_display_switcher(); ?>
                            <div class="header-rrss">
                                <a href="https://www.instagram.com/bodegaselparaguas/" title="Bodegas El Paraguas en Instagram" target="_blank"><img src="/wp-content/uploads/2022/08/logo_instagram.png" alt="Instagram"></a><a href="https://twitter.com/bodegelparaguas" title="Bodegas El Paraguas en Twitter" target="_blank"><img src="/wp-content/uploads/2017/12/logo_twitter.png" alt="Twitter"></a><a href="https://www.youtube.com/channel/UC848NZFFcvO_u9u-GH74mvg" title="Bodegas El Paraguas en Youtube" target="_blank"><img src="/wp-content/uploads/2022/08/logo-youtube.png" alt="Youtube"></a>
                            </div>
                            <?php if (has_nav_menu('primary')) : ?>
                                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Menu', 'twentysixteen'); ?>">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary',
                                        'menu_class' => 'primary-menu',
                                    ));
                                    ?>
                                    <ul>
                                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-5505"><a href="https://tienda.bodegaselparaguas.com">
                                            <?php
                                            if(get_locale() == "es_ES"){
                                                ?>
                                                Tienda
                                                <?php
                                            } else if (get_locale() == "en_GB"){
                                                ?>
                                                Shop
                                                <?php
                                            } else if (get_locale() == "gl_ES"){
                                                ?>
                                                Tenda
                                                <?php
                                            }
                                            ?>
                                        </a></li>
                                    </ul>
                                    
                                </nav><!-- .main-navigation -->
                            <?php endif; ?>

                            <?php if (has_nav_menu('social')) : ?>
                                <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Social Links Menu', 'twentysixteen'); ?>">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'social',
                                        'menu_class' => 'social-links-menu',
                                        'depth' => 1,
                                        'link_before' => '<span class="screen-reader-text">',
                                        'link_after' => '</span>',
                                    ));
                                    ?>
                                </nav><!-- .social-navigation -->
                            <?php endif; ?>
                        </div><!-- .site-header-menu -->
                        <?php
                        if(get_bloginfo("language") == "en-GB"){
                        ?>
                        <script>
                            jQuery("#menu-item-6 a").text("Press");
                        </script>
                        <?php
                        }
                        
                        /*if(get_bloginfo("language") == "es-ES"){
                            $header_txt_1 = "Si lloviera vino, no nos llamaríamos ";
                            $header_txt_2 = "Bodegas el Paraguas";
                        } else if (get_bloginfo("language") == "en-GB"){
                            $header_txt_1 = "If it rained wine, our name wouldn't be ";
                            $header_txt_2 = "Bodegas el Paraguas";
                        } else if (get_bloginfo("language") == "gl-ES"){
                            $header_txt_1 = "Se chovera viño, non nos chamaríamos ";
                            $header_txt_2 = "Bodegas El Paraguas";
                        }*/
                        ?>
                        
                               
        <!-- Static navbar -->
        <nav class="navbar navbar-default responsive-menu visible-xs" style="display:none;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo WP_HOME?>">
                        <img src="<?= twentysixteen_the_custom_logo_url(); ?>" alt="Logo <?php bloginfo('name'); ?>">
                        <span>
                            <?php bloginfo('name'); ?>
                        </span>
                    </a>
                    <span class="header-txt-container">
                        <?php
                        if(get_locale() == "es_ES"){
                            ?>
                            <img src="/wp-content/uploads/2018/09/banner_animado_es.gif" class="img-responsive" style="margin-top:45px;">
                            <?php
                        } else if (get_locale() == "en_GB"){
                            ?>
                            <img src="/wp-content/uploads/2018/09/banner_animado_en.gif" class="img-responsive" style="margin-top:45px;">
                            <?php
                        } else if (get_locale() == "gl_ES"){
                            ?>
                            <img src="/wp-content/uploads/2018/09/banner_animado_ga.gif" class="img-responsive" style="margin-top:45px;">
                            <?php
                        }
                        ?>

                        <?php
                        /*echo $header_txt_1;
                        ?>
                        <span class="header_new_line"><br></span>
                        <?php
                        echo $header_txt_2;*/
                        ?>
                    </span>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <?php if (function_exists('mltlngg_display_switcher')) mltlngg_display_switcher(); ?>
                    <div class="header-rrss">
                        <a href="http://www.facebook.com/pages/Bodegas-El-Paraguas/269228339785798" title="Bodegas El Paraguas en Facebook" target="_blank"><img src="/wp-content/uploads/2017/12/logo_facebook.png" alt="Facebook"></a><a href="https://twitter.com/bodegelparaguas" title="Bodegas El Paraguas en Twitter" target="_blank"><img src="/wp-content/uploads/2017/12/logo_twitter.png" alt="Twitter"></a><a href="https://plus.google.com/100047185169661231444/posts?hl=es" title="Bodegas El Paraguas en Google+" target="_blank"><img src="/wp-content/uploads/2017/12/logo_google_35x35.jpg" alt="Google+"></a>
                    </div>
                    <?php
                    wp_nav_responsive_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'primary-menu',
                    ));
                    ?>
                    <ul class="nav navbar-nav shop-menu-item" style="margin-top:0">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="https://tienda.bodegaselparaguas.com">
                            <?php
                            if(get_locale() == "es_ES"){
                                ?>
                                Tienda
                                <?php
                            } else if (get_locale() == "en_GB"){
                                ?>
                                Shop
                                <?php
                            } else if (get_locale() == "gl_ES"){
                                ?>
                                Tenda
                                <?php
                            }
                            ?>
                        </a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
                        
                        
                    <?php endif; ?>
                    <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'twentysixteen'); ?></a>

                    <div class="col-md-6 col-sm-6 col-sm-offset-0 hidden-xs header-txt-container">
                        <?php
                        if(get_locale() == "es_ES"){
                            ?>
                            <img src="/wp-content/uploads/2018/09/banner_animado_es.gif" class="img-responsive">
                            <?php
                        } else if (get_locale() == "en_GB"){
                            ?>
                            <img src="/wp-content/uploads/2018/09/banner_animado_en.gif" class="img-responsive">
                            <?php
                        } else if (get_locale() == "gl_ES"){
                            ?>
                            <img src="/wp-content/uploads/2018/09/banner_animado_ga.gif" class="img-responsive">
                            <?php
                        }
                        ?>
                        <?php
                        //echo $header_txt_1 . $header_txt_2;
                        ?>
                    </div>
                    <header id="masthead" class="site-header col-md-2 col-md-offset-1 col-sm-3" role="banner">
                        <div class="site-header-main">
                            <div class="site-branding">
                                <?php twentysixteen_the_custom_logo(); ?>

                                <?php if (is_front_page() && is_home()) : ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                                <?php else : ?>
                                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                                <?php
                                endif;

                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) :
                                    ?>
                                    <p class="site-description"><?php echo $description; ?></p>
                                <?php endif; ?>
                            </div><!-- .site-branding -->
                        </div><!-- .site-header-main -->

                        <?php if (get_header_image()) : ?>
                            <?php
                            /**
                             * Filter the default twentysixteen custom header sizes attribute.
                             *
                             * @since Twenty Sixteen 1.0
                             *
                             * @param string $custom_header_sizes sizes attribute
                             * for Custom Header. Default '(max-width: 709px) 85vw,
                             * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
                             */
                            $custom_header_sizes = apply_filters('twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px');
                            ?>
                            <div class="header-image">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <img src="<?php header_image(); ?>" srcset="<?php echo esc_attr(wp_get_attachment_image_srcset(get_custom_header()->attachment_id)); ?>" sizes="<?php echo esc_attr($custom_header_sizes); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                                </a>
                            </div><!-- .header-image -->
                        <?php endif; // End header image check.  ?>
                    </header><!-- .site-header -->
                </div>
                <div class="row">
                    <div class="col-md-12 separator-header-line separator-header-line-gruesa"></div>
                </div>

                <div id="content" class="site-content row">
