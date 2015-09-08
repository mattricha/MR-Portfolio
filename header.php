<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php wp_title(); ?> | <?php bloginfo('name'); ?></title>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="Revisit-After" content="7 Days">
    <meta name="robots" content="index,follow">
    <?php wp_head(); ?>
</head>

<body>
    <div class="wrapper-header">
        <div class="header">
            <div class="header-left">
                <div class="logo-xs">
                    <a href='/' title="MR Portfolio"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_sm.png" alt="logo" /></a>
                </div>
            </div>
            <div class="header-right">
                <ul>
                    <li class="dropdown">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-list"></i>&nbsp;Menu <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <?php
                                $output = '';
                                $categories = get_categories();
                                if($categories){
                                    foreach( $categories as $category ) {
                                        $output .= '<li><a alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '" class="grid-filter" value="' . $category->term_id . '">' . esc_html( $category->name ) . '</a></li>';
                                    }
                                    echo $output;
                                }
                            ?>
                            <li><a class="grid-filter-all">all</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/about/">About me</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
