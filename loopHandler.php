<div class="grid-sizer"></div>
<div class="gutter-sizer"></div>
<?php

define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 0;
$page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
$catPosts = (isset($_GET['catPosts'])) ? $_GET['catPosts'] : 0;

if($catPosts == null){
    query_posts(array(
           'posts_per_page' => $numPosts,
           'paged'          => $page,
    ));
}else{
    query_posts(array(
           'posts_per_page' => $numPosts,
           'paged'          => $page,
           'cat'            => $catPosts
    ));
}

if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="grid-item _<?php
    $category = get_the_category( $post );
    echo $category[0]->cat_name; ?>" onclick="window.location.href = '<?php the_permalink(); ?>';">
        <div class="article-preview">
            <?php if (has_post_thumbnail()) : ?>
                <figure class="article-preview-image">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('custom-blog-thumb'); ?></a>
                </figure>
            <?php else : ?>
            <?php endif; ?>
                <div class="article-txt">
                    <h2><a href="<?php the_permalink(); ?>" class="category-title-link"><?php the_title(); ?></a></h2>
                    <div class="category-post article-preview-txt">
                        <h6 class="article-meta-extra">
                                <?php if (has_category() && !has_category('Uncategorized')) : ?>
                                    <?php
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) {
                                        echo '<a href="/?c=' . $categories[0]->term_id . '">' . $categories[0]->name . '</a>';
                                    }
                                    ?> |
                                <?php else : ?>
                                <?php endif; ?>
                                    <?php the_date(get_option('date_format')); ?>
                        </h6>
                       <?php the_excerpt(); ?>
                    </div>

                    <div class="read-more-wrapper">
                        <a href="<?php the_permalink(); ?>" class="read-more">See More</a>
                    </div>
                </div>
        </div>
    </div>
<?php endwhile; ?>

<?php endif;

wp_reset_query();

?>




