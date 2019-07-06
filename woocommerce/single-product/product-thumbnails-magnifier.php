<?php
/**
 * Single Product Image
 *
 * @author        YIThemes
 * @package       YITH_Magnifier/Templates
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/** @var WC_Product $product */
global $post, $product, $woocommerce;

$enable_slider = get_option('yith_wcmg_enableslider') == 'yes' ? true : false;

$attachment_ids = $product->get_gallery_image_ids();
if (!empty($attachment_ids)) array_unshift($attachment_ids, get_post_thumbnail_id());

//  make sure attachments ids are unique
$attachment_ids = array_unique($attachment_ids);
if ($attachment_ids) {
    ?>
    <div class="thumbnails <?php echo $enable_slider ? 'slider' : 'noslider' ?>">
        <ul class="yith_magnifier_gallery">
            <?php
            $loop = 0;
            $columns = apply_filters('woocommerce_product_thumbnails_columns', get_option('yith_wcmg_slider_items', 3));

            if (!isset($columns) || $columns == null) $columns = 3;

            $counter = 2;

            foreach ($attachment_ids as $attachment_id) {
                $classes = array('yith_magnifier_thumbnail');

                if ($loop == 0 || $loop % $columns == 0) {
                    $classes[] = 'first';
                }

                if (($loop + 1) % $columns == 0) {
                    $classes[] = 'last';
                }

                $image = wp_get_attachment_image($attachment_id, apply_filters('single_product_small_thumbnail_size', 'shop_thumbnail'), false, '', $product->get_name().' Фото '.$counter);
                $counter++;
                $image_class = esc_attr(implode(' ', $classes));
                $image_title = apply_filters( 'ywcmg_get_image_title', esc_attr(get_the_title($attachment_id) ), $attachment_id);

                list($thumbnail_url, $thumbnail_width, $thumbnail_height) = wp_get_attachment_image_src($attachment_id, apply_filters('yith_zoom_magnifier_thumbnail_size', "shop_single"));
                list($magnifier_url, $magnifier_width, $magnifier_height) = wp_get_attachment_image_src($attachment_id, "shop_magnifier");

                echo apply_filters('woocommerce_single_product_image_thumbnail_html', sprintf('<li class="%s"><a href="%s" class="%s" title="%s" data-small="%s">%s</a></li>', $image_class, $magnifier_url, $image_class, $image_title, $thumbnail_url, $image), $attachment_id, $post->ID, $image_class);

                $loop++;
            }
            ?>
        </ul>

        <?php if ($enable_slider && (count($attachment_ids) > $columns)) : ?>
            <div id="slider-prev"></div>
            <div id="slider-next"></div>
        <?php endif; ?>
    </div>
    <?php
}
?>