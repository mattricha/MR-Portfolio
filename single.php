<?php get_header(); ?>

<div class="wrapper-content">
    <div class="main-content">
        <?php get_sidebar(); ?>
        <div class="right-page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="container">
                <div class="header-title-3">/ <?php the_title(); ?></div>
            </div>
            <div class="blog-page-container">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="blog-page-content">
                        <?php if (has_post_thumbnail()) : ?>
                            <section id="slide" class="homeSlide">
                                <div class="bcg" data-center="background-position: 50% -200px;" data-top-bottom="background-position: 50% -300px;" data-anchor-target="#slide" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID )); ?>')">
                                    <div class="hsContainer">
                                        <div class="hsContent" data-center="bottom: 200px" data-top="bottom: 1200px; opacity: 0.5" data-bottom="opacity: 1" data-anchor-target="#slide h1">
                                            <h1></h1>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php else : ?>
                        <?php endif; ?>
                            <div class="blog-page-content-txt">
                                <div class="category-post">
                                    <h6 class="article-meta-extra">
                                        <?php if (has_category() && !has_category('Uncategorized')) : ?>
                                        <?php
                                        $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            echo '<a href="/?c=' . $categories[0]->term_id . '">' . $categories[0]->name . '</a>';
                                        }
                                        ?>
                                        <?php else : ?>
                                        <?php endif; ?> | Posted on <?php the_date(get_option('date_format')); ?> at <?php the_time(get_option('time_format')); ?>
                                    </h6>
                                </div>
                                <br>
                                <div class="article-description">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                <?php endwhile; ?>
                <?php else : ?>
                    <article class="no-posts">
                        <h1>No Posts Were Found</h1>
                    </article>
                <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>
