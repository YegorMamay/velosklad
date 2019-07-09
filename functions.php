<?php
/*
All the functions are in the PHP pages in the `functions/` folder.
*/
//show_admin_bar(false);

require_once locate_template('/functions/helpers.php');
require_once locate_template('/functions/admin.php');
require_once locate_template('/functions/login.php');
require_once locate_template('/functions/customizer.php');

require_once locate_template('/functions/index-pagination.php');
require_once locate_template('/functions/breadcrumbs.php');
require_once locate_template('/functions/cleanup.php');
require_once locate_template('/functions/custom-logo.php');
require_once locate_template('/functions/setup.php');
require_once locate_template('/functions/enqueues.php');
require_once locate_template('/functions/navbar.php');
require_once locate_template('/functions/widgets.php');
require_once locate_template('/functions/split-post-pagination.php');
require_once locate_template('/functions/feedback.php');
require_once locate_template('/functions/custom-post-types.php');
require_once locate_template('/functions/meta-boxes.php');
require_once locate_template('/functions/shortcodes.php');

function brainworks_breadcrumbs_localization($l10n) {
  return array(
    'home'       => __('Front page', 'brainworks'),
    'paged'      => __('Page %d', 'brainworks'),
    '_404'       => __('Error 404', 'brainworks'),
    'search'     => __('Search results by query - <b>%s</b>', 'brainworks'),
    'author'     => __('Author archve: <b>%s</b>', 'brainworks'),
    'year'       => __('Archive by <b>%d</b> year', 'brainworks'),
    'month'      => __('Archive by: <b>%s</b>', 'brainworks'),
    'day'        => '',
    'attachment' => __('Media: %s', 'brainworks'),
    'tag'        => __('Posts by tag: <b>%s</b>', 'brainworks'),
    'tax_tag'    => __('%1$s from "%2$s" by tag: <b>%3$s</b>', 'brainworks'),  );
}

add_filter('kama_breadcrumbs_default_loc', 'brainworks_breadcrumbs_localization', 10, 1);


remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering',  30); 
add_action( 'woocommerce_archive_description', 'woocommerce_catalog_ordering',  40); 
add_filter( 'loop_shop_per_page', function ( $cols ) {
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    return 21;
}, 20 );

/*
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count',  20); 





function woo_1_start() {
    echo '<div class="woocommerce-ordering">';
};
add_action( 'woocommerce_archive_description', 'woo_1_start',  34); 

add_action( 'woocommerce_archive_description', 'woocommerce_result_count',  35); 

function woo_1_end() {
    echo '</div> <!-- woof_container -->';
};
add_action( 'woocommerce_archive_description', 'woo_1_end',  36); 

*/

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

function bw_woocommerce_template_loop_product_title() {
	echo '<div class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'h3 woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</div>';
}
add_action( 'woocommerce_shop_loop_item_title', 'bw_woocommerce_template_loop_product_title', 10 );
