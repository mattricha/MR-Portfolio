<?php
/*
  Template Name: Competences
 */
?>

<?php get_header(); ?>

<div class="wrapper-content">
    <div class="main-content">
        <div class="blog-page-container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="blog-page-content">
                    <?php if (has_post_thumbnail()) : ?>
                        <section id="slide" class="homeSlide">
                            <div class="bcg" data-center="background-position: 50% 50%;" data-top-bottom="background-position: 50% 10%;" data-anchor-target="#slide" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID )); ?>')">
                                <div class="hsContainer">
                                    <div class="hsContent" data-center="bottom: 200px" data-top="bottom: 1200px; opacity: 0.5" data-bottom="opacity: 1" data-anchor-target="#slide h1">
                                        <h1></h1>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php else : ?>
                    <?php endif; ?>
                        <h1 class="header-title-3"><?php the_title(); ?></h1>
                        <div class="blog-page-content-txt">
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
</div>

<?php get_footer(); ?>
