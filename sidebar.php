<div class="left-page-content">
    <div class="sidebar">
        <div class="logo">
            <a href='/' title="MR Portfolio"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_header.png" alt="logo" /></a>
        </div>
        <div class="sidebar-search">
            <div class="sidebar-search-form"> <?php include(TEMPLATEPATH . "/searchform.php"); ?></div>
        </div>
        <div class="sidebar-content">
            <div class="wrapper-navigation">
                <div class="navigation">
                    <div class="sidebar-title">SECTIONS</div>
                    <br>
                    <ul>
                    <?php
                        $output = '';
                        $args = array(
                            'order'                    => 'DESC',
                            'orderby'                  => 'count'
                        );
                        $categories = get_categories($args);
                        if($categories){
                            foreach( $categories as $category ) {
                                $output .= '<li><a alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '" class="grid-filter" id="grid-filter-' . $category->term_id . '" title="/ ' . strtolower( $category->name ) . '" value="' . $category->term_id . '">' . esc_html( $category->name ) . '<span class="category-count">(' . $category->count . ')</span></a></li>';
                            }
                            echo $output;
                        }
                    ?>
                    <li><a class="grid-filter-all">see all posts</a></li>
                    <hr>
                    <li><a href="/about/">About me</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar-content">
            <div class="wrapper-navigation">
                <div class="navigation">
                    <div class="sidebar-title">RECENT POSTS</div>
                    <br>
                    <ul>
                    <?php
                        $args = array( 'numberposts' => '5' );
                        $recent_posts = wp_get_recent_posts( $args );
                        foreach( $recent_posts as $recent ){
                            echo '<hr><li><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"].'<br>';
                            $cat_arr = get_the_category( $recent["ID"] );
                            foreach ($cat_arr as $cat) {
                                 echo '<h6 class="article-meta-extra">' . $cat->name . ' | ' . $recent["post_date"] . '</h6></a> </li>';
                            }
                        }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('page_sidebar')): endif; ?-->
    </div>
</div>
