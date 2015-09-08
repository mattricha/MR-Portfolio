<?php get_header(); ?>

<div class="wrapper-content">
    <div class="main-content">
        <?php get_sidebar(); ?>
        <div class="right-page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="blog-page-container">
                <div class="blog-page-content">
                    <section id="slide" class="homeSlide">
                        <div class="bcg" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -200px;" data-anchor-target="#slide" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/logo_header.jpg')">
                            <div class="hsContainer">
                                <div class="hsContent" data-center="bottom: 200px" data-top="bottom: 1200px; opacity: 0.5" data-bottom="opacity: 1" data-anchor-target="#slide h1">
                                    <h1> About me</h1>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="blog-page-content-txt">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        <?php else: ?>
                            <p>No content has been posted to this page.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>

<?php get_footer(); ?>
