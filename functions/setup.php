<?php

function brainworks_setup() {
  //Translate Theme
  load_theme_textdomain( 'brainworks', get_template_directory().'/languages' );

  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
  add_theme_support('widgets');
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( "title-tag" );
  add_theme_support( "custom-header" );
  add_theme_support( "custom-background" );
  add_theme_support( 'woocommerce' );

  add_editor_style('theme/css/editor-style.css');

  update_option('thumbnail_size_w', 170);
  update_option('medium_size_w', 470);
  update_option('large_size_w', 970);
}

add_action('after_setup_theme', 'brainworks_setup');

if (! isset($content_width))
	$content_width = 600;

function brainworks_excerpt_readmore() {
	//return '&nbsp; <a href="'. get_permalink() . '">' . '&hellip;' . '<div class="button-small text-center">' . __('Read more', 'brainworks') . ' <i class="fa fa-arrow-right"></i></div>' . '</a></p>';
    return '&nbsp; <a href="'. get_permalink() . '">' . '&hellip;' . ' <i class="fa fa-arrow-right button-style"></i>' . '</a>';
}

add_filter('excerpt_more', 'brainworks_excerpt_readmore');

function page_excerpt() {
  add_post_type_support('page', array('excerpt'));
}

add_action('init', 'page_excerpt');

// Add post formats support. See http://codex.wordpress.org/Post_Formats
add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

function brainworks_wp_nav_menu_args( $args ) {
    $args['container'] = '';

    return $args;
}

//add_filter( 'wp_nav_menu_args', 'brainworks_wp_nav_menu_args' );

function brainworks_nav_menu_css_class( $classes, $item, $args, $depth ) {

    if ( $item->current ) {
        foreach ( $classes as $key => $class ) {
            if ( $class === 'current-menu-item' ) {
                $classes[ $key ] .= ' menu-item-current';
            }
        }
    }

    if ( $depth > 0 ) {
        foreach ( $classes as $key => $class ) {
            $classes[ $key ] = 'sub-' . $class;
        }
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'brainworks_nav_menu_css_class', 10, 4 );

function brainworks_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
    //$atts['itemprop'] = 'url';
    $atts['class'] = $depth > 0 ? 'sub-menu-link' : 'menu-link';

    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'brainworks_nav_menu_link_attributes', 10, 4 );

/** Woocommerce */
// Override theme default specification for product # per row
if (!function_exists('brainworks_loop_shop_columns')) {
    function brainworks_loop_shop_columns($columns) {

        if (is_shop() || is_product_category() || is_product_tag()) {
            $columns = 3; // 3 products per row
        }

        return $columns;
    }
}

add_filter('loop_shop_columns', 'brainworks_loop_shop_columns', 5);

if(function_exists('is_shop') && function_exists('is_product_taxonomy')) {
  function brainworks_body_class($classes) {
    $classes = (array)$classes;

    // is_woocommerce() // is_shop() || is_product_taxonomy() || is_product()
    if ( is_shop() || is_product_taxonomy()) {
      $classes[] = 'columns-3';
    }

    return $classes;
  }

  add_filter( 'body_class', 'brainworks_body_class' );
}

function brainworks_loop_shop_per_page( $cols ) {
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    $cols = 12;
    return $cols;
}

add_filter( 'loop_shop_per_page', 'brainworks_loop_shop_per_page', 20 );

// Remove notice-error about license YITH WooCommerce Zoom Magnifier Premium
if (class_exists('YIT_Plugin_Licence')) {
  $yit_plugin_licence = YIT_Plugin_Licence();
  remove_action('admin_notices', array($yit_plugin_licence, 'activate_license_notice'), 15);
}
