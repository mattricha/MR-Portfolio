<div class="left-page-content col-lg-3 col-md-3 hidden-sm hidden-xs">
    <div class="sidebar">
        <div class="logo">
            <a href='/' title="MR Portfolio"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_header.png" alt="logo" /></a>
        </div>
        <br>
        <div class="sidebar-content">
            <div class="search-form-sidebar"> <?php include(TEMPLATEPATH . "/searchform.php"); ?></div>
        </div>
        <div class="sidebar-content">
            <div class="wrapper-navigation">
                <div class="navigation">
                    <div class="sidebar-title">SECTIONS</div>
                    <br>
                    <ul>
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
                    <li><a class="grid-filter-all">see all posts</a></li>
                    <hr>
                    <li><a href="">About me</a></li>
                    <li><a href="">Contact</a></li>
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
