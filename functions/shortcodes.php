<?php

if (!function_exists('bw_reviews_shortcode')) {
    /**
     * Add Shortcode Reviews List
     *
     * @param $atts
     *
     * @return string
     */
    function bw_reviews_shortcode($atts)
    {
        // Attributes
        $atts = shortcode_atts(
            array(),
            $atts
        );

        $output = '';

        $args = array(
            'post_type' => 'reviews',
            'publish_status' => 'publish',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => 'review-display',
                    'value' => '1',
                )
            ),
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {

            $output .= '<div class="review-slider text-center js-reviews">';

            while ($query->have_posts()) {
                $query->the_post();

                $id = get_the_ID();
                $social = array();
                $socials = array(
                    'facebook' => array(
                        'url' => get_post_meta($id, 'review-facebook', true),
                        'icon' => 'fa-facebook-f',
                    ),
                    'twitter' => array(
                        'url' => get_post_meta($id, 'review-instagram', true),
                        'icon' => 'fa-instagram',
                    ),
                );

                foreach ($socials as $item) {
                    if (!empty($item['url'])) {
                        $social['url'] = $item['url'];
                        $social['icon'] = $item['icon'];
                    }
                }

                $post_class = 'class="' . join(' ', get_post_class('review-item', null)) . '"';

                $output .= '<div id="post-' . get_the_ID() . '" ' . $post_class . '>';

                $output .= '<div class="review-client">';
                $output .= get_the_post_thumbnail(null, 'thumbnail', array('class' => 'review-avatar'));
                if (count($social)) {
                    $output .= '<a class="review-social" href="' . esc_url($social['url']) . '" target="_blank" rel="noopener noreferrer">';
                    $output .= '<i class="fa ' . esc_attr($social['icon']) . '" aria-hidden="true"></i>';
                    $output .= '</a>';
                }
                $output .= '</div>';
                $output .= '<div class="review-title text-bold">' . get_the_title() . '</div>';
                $output .= '<div class="review-content">' . get_the_content() . '</div>';

                $output .= '</div>';
            }

            wp_reset_postdata();

            $output .= '</div>';
        }

        return $output;
    }

    add_shortcode('bw-reviews', 'bw_reviews_shortcode');
}
