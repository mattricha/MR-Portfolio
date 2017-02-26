<?php get_header(); ?>

<div class="wrapper-page-title">
    <div class="page-title">
    </div>
</div>
    <div class="wrapper-content">
        <div class="main-content">
            <h1 class="header-title-2">/ search</h1>
        <?php if (have_posts()) : ?>
            <div id="masonry-search-grid">
                <div class="grid-sizer"></div>
                <?php while (have_posts()) : the_post(); ?>
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
                                    <div class="category-post">
                                        <h6 class="article-meta-extra">
                                                <?php if (has_category() && !has_category('Uncategorized')) : ?>
                                                    <?php the_category('  |  '); ?> |
                                                <?php else : ?>
                                                <?php endif; ?>
                                            Posted on <?php the_date(get_option('date_format')); ?> at <?php the_time(get_option('time_format')); ?>
                                        </h6>
                                       <?php the_excerpt(); ?>
                                    </div>
                                    <?php if (has_tag()) : ?>
                                        <p class="tags"><?php the_tags('', ' '); ?></p>
                                    <?php else : ?>
                                    <?php endif; ?>
                                    <div class="read-more-wrapper">
                                        <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
                <div align="center"><h4>No posts were found.</h4></div>
        <?php endif; ?>
        </div><!-- END MAIN-CONTENT -->
    </div><!-- END wrap_1280 -->

<?php get_footer(); ?>
