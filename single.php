<?php get_header(); ?>

<div class="wrapper-content">
    <div class="main-content">
        <?php get_sidebar(); ?>
        <div class="right-page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="blog-page-content">
                    <?php if (has_post_thumbnail()) : ?>
                        <figure class="article-full-image">
                            <?php the_post_thumbnail('full'); ?>
                        </figure>
                    <?php else : ?>
                    <?php endif; ?>
                        <h2 class="inner-title"><?php the_title(); ?></h2>
                            <div class="category-post">
                                <h6 class="article-meta-extra">
                                    Posted on <?php the_date(get_option('date_format')); ?> at <?php the_time(get_option('time_format')); ?> | <?php the_category('  |  '); ?> | <?php the_author_posts_link(); ?>
                                </h6>
                            </div>
                    <?php the_content(); ?>
                    <!--div class="social-share clearfix">
                        <div class="share-icons col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <a href="http://www.facebook.com/sharer.php?u=<?php echo the_permalink(); ?>&t=<?php echo the_title(); ?>" title=”Facebook share button” target=”blank”><img src="<?php echo get_template_directory_uri(); ?>/images/facebook_share.png" alt="share this article" /></a>
                        </div>
                        <div class="share-icons col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <a href="http://twitter.com/share?url=<?php echo urlencode(get_permalink($post->ID)); ?>" target=”blank”><img src="<?php echo get_template_directory_uri(); ?>/images/twitter_share.png" alt="tweet this article" /></a>
                        </div>
                        <div class="share-icons col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <a href="mailto:enter_recipient?subject=enter+subject&body=<?php echo urlencode(get_permalink($post->ID)); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/email_share.png" alt="email this article" /></a>
                        </div>
                        <div class="share-icons col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <a href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink($post->ID)); ?>" target=”blank”><img src="<?php echo get_template_directory_uri(); ?>/images/googleplus_share.png" alt="google plus" /></a>
                        </div>
                    </div>
                    <div class="author-box">
                            <div class="author-image col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <?php echo get_avatar( get_the_author_meta('email')); ?>
                            </div>
                            <div class="author-info col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <h5 class="author-name">Author: <?php echo get_the_author_meta('display_name'); ?></h5>
                                <p><?php echo get_the_author_meta('description'); ?></p>
                                <h6>Website: <a href="<?php echo get_the_author_meta('user_url'); ?>" title=""><?php echo get_the_author_meta('user_url'); ?></a></h6>
                            </div>
                        <div class='clearfix'></div>
                    </div-->
        <?php endwhile; ?>
        <?php else : ?>
                <article class="no-posts">
                    <h1>No Posts Were Found</h1>
                </article>
        <?php endif; ?>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>
