<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

foreach (get_the_terms( $product->id, 'product_cat' ) as $cat){
if($cat->parent == 0){
$mama = $cat->term_id;
foreach (get_the_terms( $product->id, 'product_cat' ) as $cat2){
if($cat2->parent == $cat->term_id){
$child = $cat2->term_id;
break;
}
}
break;
}
}
$args = array(
'orderby'=>'rand',
'tax_query' => array(
array(
'taxonomy' => 'product_cat',
'terms' => $child,
include_children => false
)
)
);
$childprod = new WP_Query( $args );
$arr = array();
foreach ($childprod->posts as $pid){
array_push($arr, $pid->ID);

}

$args = apply_filters( 'woocommerce_related_products_args', array(
'post_type' => 'product',
'ignore_sticky_posts' => 1,
'no_found_rows' => 1,
'posts_per_page' => $posts_per_page,
'orderby' => $orderby,
'post__in' => $arr,
'post__not_in' => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>
<div class=»related products»>

<?php woocommerce_product_loop_start(); ?>

<?php while ( $products->have_posts() ) : $products->the_post(); ?>

<?php wc_get_template_part( 'content', 'product' ); ?>

<?php endwhile; // end of the loop. ?>

<?php woocommerce_product_loop_end(); ?>

</div>
<?php endif;

wp_reset_postdata();
