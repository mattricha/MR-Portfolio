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
                        <div class="header-img-container">
                            <div class="header-img" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID )); ?>')">
                            </div>
                        </div>
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
