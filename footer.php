</div>

<div id="temp_load" style="text-align:center"><img src="/wp-content/themes/MR-Portfolio/images/ajax-loader.gif" /></div>
<div id="topPage" style="text-align:center"><img src="/wp-content/themes/MR-Portfolio/images/topPage.png" /></div>
<div class="wrapper-footer">
    <div class="footer" align="center">
        <?php
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_widget')):
            endif;
        ?>
        <div class="clearfix"></div>
        <div class="copyright">
            <p>© Copyright <?php echo date("Y"); ?> | MR Portfolio. All Rights Reserved. </p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
