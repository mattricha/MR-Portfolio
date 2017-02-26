<?php get_header(); ?>

<div class="wrapper-page-title">
    <div class="page-title">
        <h1 class="page-content-title"><?php the_title(); ?></h1>
        <div class="clearfix"></div>
    </div>
</div>

<div class="wrapper-content">
    <div class="main-content">
        <?php get_sidebar(); ?>
        <div class="right-page-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="page-content">
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

<?php get_footer(); ?>
