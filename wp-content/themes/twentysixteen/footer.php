<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

</div><!-- .site-content -->

<div class="row">
    <div class="col-md-12 separator-header-line separator-header-line-gruesa"></div>
</div>
<footer id="colophon" class="site-footer row" role="contentinfo">
    <?php if (has_nav_menu('primary')) : ?>
        <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Primary Menu', 'twentysixteen'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'primary-menu',
            ));
            ?>
        </nav><!-- .main-navigation -->
    <?php endif; ?>

    <?php if (has_nav_menu('social')) : ?>
        <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Social Links Menu', 'twentysixteen'); ?>">
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

    <div class="site-info">
        <?php
        /**
         * Fires before the twentysixteen footer text for footer customization.
         *
         * @since Twenty Sixteen 1.0
         */
        do_action('twentysixteen_credits');
        ?>
        <span class="site-footer-companyinfo"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a> &copy;<?= date("Y");?>) | Lugar de Aldea, 135 - 15594 - Cobas, Ferrol (A Coruña) | Tfno.: <a href="tel:+34636161479">+34 636 161 479</a> | <a href="/politica-de-privacidad">
                <?php if(get_bloginfo("language") == "gl-ES"){?>
                    Política de privacidade
                <?php } else if(get_bloginfo("language") == "en-GB"){?>
                    Privacy policy
                <?php } else {?>
                    Política de privacidad
                <?php }?>
            </a></span>
        <!--<a href="<?php echo esc_url(__('https://wordpress.org/', 'twentysixteen')); ?>"><?php printf(__('Proudly powered by %s', 'twentysixteen'), 'WordPress'); ?></a>-->
    </div><!-- .site-info -->
</footer><!-- .site-footer -->
</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
