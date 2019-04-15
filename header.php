<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri() . '/img/favicon.ico'); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/img/favicon.ico'); ?>" type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">
<div class="wrapper">

    <header class="header">
        <div class="header-pre">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-7 header-phones">
                       <?php /*
                        <a href="tel:<?php the_phone_number('+380950074210') ?>" class="header-phone">
                            <img src="<?php echo get_template_directory_uri() . '/img/vodafone.png'; ?>" alt="<?php _e('Vodafone number', 'brainworks'); ?>">
                            +38 (095) 007 42 10
                        </a>
                        <a href="tel:<?php the_phone_number('+380938803081') ?>" class="header-phone">
                            <img src="<?php echo get_template_directory_uri() . '/img/lifecell.png'; ?>" alt="<?php _e('Lifecell number', 'brainworks'); ?>">
                            +38 (093) 880 30 81
                        </a>
                        */ ?>
                        <a href="tel:<?php the_phone_number('+380937501310') ?>" class="header-phone">
                            <img src="<?php echo get_template_directory_uri() . '/img/lifecell.png'; ?>" alt="<?php _e('lifecell number', 'brainworks'); ?>">
                            +38 (093) 750 13 10
                        </a>
                           <a href="tel:<?php the_phone_number('+380937501310') ?>" class="header-phone">
                            (Viber, WhatsApp, Telegram)
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-3 header-menu">
        <nav class="second-menu">
          <?php wp_nav_menu( array(
            'theme_location' => 'second-menu',
            'container'      => false,
            'menu_class'     => 'menu',
            'menu_id'        => '',
            'fallback_cb'    => 'wp_page_menu',
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'          => 1
          ) ); ?>
        </nav>                
                    </div>
                    <div class="col-xs-12 col-md-2 text-right header-social">
                        <ul class="social">
                            <li class="social-item"><a href="https://www.facebook.com/velosklad.kiev/" class="social-link" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a href="https://www.instagram.com/velosklad.com.ua/" class="social-link" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <!--<li class="social-item"><a href="#" class="social-link" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>-->
                            <li class="social-item"><a href="https://www.youtube.com/channel/UCwBdeE_8KaaTtHEHZdItYxg" class="social-link" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="container">
                <div class="header-item">
                    <div class="logo">
                        <?php if ( has_custom_logo() ) {
                            the_custom_logo();
                        } else { ?>
                            <a class="logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img class="logo-img" src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="header-item">
                    <?php if (function_exists('get_product_search_form')) {
                        get_product_search_form();
                    } else {
                        get_search_form();
                    } ?>
                </div>
                <div class="header-item text-uppercase text-center">
                    <span class="bold"><?php _e('График работы:', 'brainworks'); ?></span>
                    <br>
                    <?php _e('вс-чт с 11.00-19.00 пт с 11.00-17.00', 'brainworks'); ?>
                </div>
                <div class="header-item text-right">
                    <button class="button-medium text-nowrap js-callback"><?php _e('Обратный звонок', 'brainworks'); ?></button>
                </div>
            </div>
        </div>
    </header>
    <?php if(has_nav_menu('main-nav')) { ?>
        <nav class="nav">
            <?php wp_nav_menu( array(
                'theme_location' => 'main-nav',
                'container'      => false,
                'menu_class'     => 'menu container',
                'menu_id'        => '',
                'fallback_cb'    => 'wp_page_menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'          => 3
            ) ); ?>
        </nav>
    <?php } ?>

    <div class="page-wrapper container">
