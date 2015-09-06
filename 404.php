<?php get_header(); ?>

<div class="wrapper-content">
    <div class="main-content">
        <?php get_sidebar(); ?>
        <div class="right-page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <h2 class="not-found-title">404 Error: Page not Found!</h2>
            <h2 class='not-found-alert'>Something went a little wrong. Let's find you a solution!</h2>
            <p class="not-found-paragraph">To help you find what you are looking for simply use the navigation above or search for what you are looking for below.
            <div class="search-form-404"> <?php include(TEMPLATEPATH . "/searchform.php"); ?></div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<?php get_footer(); ?>
