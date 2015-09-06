<?php get_header(); ?>

    <div class="wrapper-content">
        <div class="main-content">
            <?php get_sidebar(); ?>
            <div class="right-page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="container">

                    <div id="masonry-grid" class="transitions-enabled fluid masonry js-masonry grid">

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

        </div>
    </div>

<?php get_footer(); ?>

