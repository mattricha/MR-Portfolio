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
        <div class="blog-page-content">
            <?php if (has_post_thumbnail()) : ?>
                <figure class="article-preview-image">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('custom-blog-thumb'); ?></a>
                </figure>
            <?php else : ?>
            <?php endif; ?>
                <h2><a href="<?php the_permalink(); ?>" class="category-title-link"><?php the_title(); ?></a></h2>
                <div class="category-post">
                    <h6 class="article-meta-extra">
                            <?php if (has_category() && !has_category('Uncategorized')) : ?>
                                <?php the_category('  |  '); ?> |
                            <?php else : ?>
                            <?php endif; ?>
                        Posted on <?php the_date(get_option('date_format')); ?> at <?php the_time(get_option('time_format')); ?> by <?php the_author_posts_link(); ?>
                    </h6>
                   <?php the_excerpt(); ?>
                </div>
                <?php if (has_tag()) : ?>
                    <p class="tags"><?php the_tags('', ' '); ?></p>
                <?php else : ?>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-blue btn-block">Read More</a>
        </div>
    </div>
<?php endwhile; ?>

<?php endif;

wp_reset_query();

?>




