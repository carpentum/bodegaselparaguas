<?php

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function newtemplate_widgets_init() {
    register_sidebar(array(
        'name' => __('Widget Area', 'twentyfifteen'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'twentyfifteen'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'newtemplate_widgets_init');

if (!function_exists('newtemplate_fonts_url')) :

    /**
     * Register Google fonts for Twenty Fifteen.
     *
     * @since Twenty Fifteen 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function newtemplate_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Sans, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Noto Sans font: on or off', 'twentyfifteen')) {
            $fonts[] = 'Noto Sans:400italic,700italic,400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Serif, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Noto Serif font: on or off', 'twentyfifteen')) {
            $fonts[] = 'Noto Serif:400italic,700italic,400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Inconsolata, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Inconsolata font: on or off', 'twentyfifteen')) {
            $fonts[] = 'Inconsolata:400,700';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen');

        if ('cyrillic' == $subset) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ('greek' == $subset) {
            $subsets .= ',greek,greek-ext';
        } elseif ('devanagari' == $subset) {
            $subsets .= ',devanagari';
        } elseif ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                    ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function newtemplate_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'newtemplate_javascript_detection', 0);

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function newtemplate_scripts() {
    // Add custom fonts, used in the main stylesheet.
    //funcion_que_encola('nombre_que_ponemos_a_este_encolado_para_posterior_gestion(p.ej.: wp_style_is())', ruta, 'array_con_encolados_que_son_dependencias', 'media_en_la_que_se_aplica'
    wp_enqueue_style('newtemplate-fonts', newtemplate_fonts_url(), array(), null);

    // Add Genericons, used in the main stylesheet.
    wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2');

    // Load our main stylesheet.
    wp_enqueue_style('newtemplate-style', get_stylesheet_uri());

    // Load the Internet Explorer specific stylesheet.
    wp_enqueue_style('newtemplate-ie', get_template_directory_uri() . '/css/ie.css', array('newtemplate-style'), '20141010');
    wp_style_add_data('newtemplate-ie', 'conditional', 'lt IE 9');

    // Load the Internet Explorer 7 specific stylesheet.
    wp_enqueue_style('newtemplate-ie7', get_template_directory_uri() . '/css/ie7.css', array('newtemplate-style'), '20141010');
    wp_style_add_data('newtemplate-ie7', 'conditional', 'lt IE 8');

    wp_enqueue_script('newtemplate-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('newtemplate-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20141010');
    }

    wp_enqueue_script('newtemplate-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20150330', true);
    wp_localize_script('newtemplate-script', 'screenReaderText', array(
        'expand' => '<span class="screen-reader-text">' . __('expand child menu', 'twentyfifteen') . '</span>',
        'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'twentyfifteen') . '</span>',
    ));
}

add_action('wp_enqueue_scripts', 'newtemplate_scripts');    //En default-filters.php se añade a wp_head

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Fifteen 1.7
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function newtemplate_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'newtemplate-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		} else {
			$urls[] = 'https://fonts.gstatic.com';
		}
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'newtemplate_resource_hints', 10, 2 );
?>