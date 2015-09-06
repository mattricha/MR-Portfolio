<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php wp_title(); ?> | <?php bloginfo('name'); ?></title>
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="Revisit-After" content="7 Days"><!-- Useful for search engines -->
        <meta name="robots" content="index,follow"><!-- Useful for search engines -->
        <?php wp_head(); ?>
    </head>

    <body>
        <!--div class="wrapper-header">
            <div class="header">
                <div class="logo">
                    <a href='/' title="MR Portfolio"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_header.png" alt="logo" /></a>
                </div>
                <div class="social-icons-header">
                    <div class="social-wrap pull-right">
                        <div class="social-icons"><a href='https://www.facebook.com' target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook_icon.png" width="32" height="32" alt="WordPress Development Solutions Facebook" /></a></div>
                        <div class="social-icons"><a href='https://twitter.com' target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.jpg" width="32" height="32" alt="WordPress Development Solutions Twitter" /></a></div>
                        <div class="social-icons"><a href="https://plus.google.com/104168601045265342740" rel="publisher" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/googleplus.jpg" width="32" height="32" alt="WordPress Development Solutions Google+" /></a></div>
                        <div class="social-icons"><a href='http://wpdevsolutions.tumblr.com/' target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/tumblr.jpg" width="32" height="32" alt="WordPress Development Solutions Tumblr" /></a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="wrapper-navigation">
            <div class="navigation">
                <?php if ( !wp_is_mobile() ) { ?>
                        <div class="menu-wrapper col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php wp_nav_menu(array('theme_location' => 'top-menu')); ?>
                        </div>
                <?php } else { ?>
                        <div class="toggle"><a href="#" id="responsive-top-nav-button">MENU</a></div>
                        <div class="responsive-top-navigation"><?php wp_nav_menu(array('theme_location' => 'mobile-menu')); ?></div>
                        <div class="clearfix"></div>
                <?php }?>
            </div>
            <div class="clearfix"></div>
        </div-->
