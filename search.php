<?php get_header(); ?>

<div class="wrapper-page-title">
    <div class="page-title">
        <?php if (have_posts()) : ?>
        <div class="clearfix"></div>
    </div>
</div>
    <div class="wrapper-content">
        <div class="main-content">
            <?php get_sidebar(); ?>
            <div class="right-page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="container">
                    <div id="masonry-search-grid">
                        <?php while (have_posts()) : the_post(); ?>
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
                                                Posted on <?php the_date(get_option('date_format')); ?> at <?php the_time(get_option('time_format')); ?>
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
                        <?php else : ?>
                        <article class="no-posts">
                            <h1>No posts were found.</h1>
                        </article>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="article-nav clearfix">
                    <p class="article-nav-next pull-right"><?php previous_posts_link(__('Newer Posts »')); ?></p>
                    <p class="article-nav-prev pull-left"><?php next_posts_link(__('« Older Posts')); ?></p>
                </div>

                <div class="clearfix"></div>

            </div>
            <div class="clearfix"></div>

        </div><!-- END MAIN-CONTENT -->
    </div><!-- END wrap_1280 -->

<?php get_footer(); ?>
