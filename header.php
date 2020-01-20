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
    <div class="header-large">
        <div class="wrapper-header">
            <div class="header">
                <div class="logo">
                    <a href='/' title="MR Portfolio"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_xs.png" alt="logo" /></a>
                </div>
                <?php
                    $output = '';
                    $args = array(
                        'order'                    => 'DESC',
                        'orderby'                  => 'count'
                    );
                    $categories = get_categories($args);
                    if($categories){
                        foreach( $categories as $category ) {
                            $output .= '<a class="grid-filter nav-link" alt="' . esc_attr( $category->name ) . '" data-title="/ ' . strtolower( $category->name ) . '" id="grid-filter-' . $category->term_id . '" value="' . $category->term_id . '"><p>' . esc_html( $category->name ) . '</p></a>';
                        }
                        echo $output;
                    }
                ?>
                <a href="/skills" class="info-link">
                    <p>Skills</p>
                </a>
                <a href="/info" class="info-link">
                    <p>Info</p>
                </a>
                <div class="sidebar-search-form">
                    <?php include(TEMPLATEPATH . "/searchform.php"); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="header-mobile">
        <div class="wrapper-header">
            <div class="header">
                <div class="logo">
                    <a href='/' title="MR Portfolio"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_xs.png" alt="logo" /></a>
                </div>
                <i class="toggle-dropdown glyphicon glyphicon-menu-hamburger"></i>
            </div>
        </div>

        <div class="header-dropdown">
            <?php
                $output = '';
                $args = array(
                    'order'                    => 'DESC',
                    'orderby'                  => 'count'
                );
                $categories = get_categories($args);
                if($categories){
                    foreach( $categories as $category ) {
                        $output .= '<a class="grid-filter nav-link" alt="' . esc_attr( $category->name ) . '" data-title="/ ' . strtolower( $category->name ) . '" id="grid-filter-' . $category->term_id . '" value="' . $category->term_id . '"><p>' . esc_html( $category->name ) . '</p></a>';
                    }
                    echo $output;
                }
            ?>
            <a href="/competences" class="info-link">
                <p>Competences</p>
            </a>
            <a href="/info" class="info-link">
                <p>Info</p>
            </a>
            <div class="sidebar-search-form">
                <?php include(TEMPLATEPATH . "/searchform.php"); ?>
            </div>
        </div>
    </div>
