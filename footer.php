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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63550778-2', 'auto');
  ga('send', 'pageview');
</script>

<?php wp_footer(); ?>

</body>
</html>
