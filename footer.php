  </div><!-- .page-wrapper end-->

  <footer class="footer">
    <?php if (is_active_sidebar('footer-widget-area')) : ?>
      <div class="pre-footer">
        <div class="container">
          <div class="row">
            <?php dynamic_sidebar('footer-widget-area'); ?>
          </div>
        </div>
      </div><!-- .pre-footer end-->
    <?php endif; ?>

    <div class="copyright">
      <p class="container">
        <a href="/sitemap/" class="sitemap_href">Карта сайта</a>
        <noindex>
        <?php _e('Developed by', 'brainworks') ?> <a rel="nofollow" href="https://brainworks.pro/" target="_blank">BRAIN WORKS</a> &copy; 2017
        </noindex>
        <span xmlns:v="http://rdf.data-vocabulary.org/#" style="margin-left: 80px">
          <span typeof="v:Breadcrumb">
          <a href="https://velosklad.com.ua/" rel="v:url" property="v:title">Интернет-магазин Велосклад</a> ›› </span>
          <span typeof="v:Breadcrumb">
          <a href="https://velosklad.com.ua/#Велосипеды" rel="v:url" property="v:title">Велосипеды</a>
          </span>
        </span>
      </p>
    </div>
  </footer>

</div><!-- .wrapper end-->

<?php scroll_top(); ?>

<?php if ( is_customize_preview() ) { ?>
  <button class="button-small customizer-edit" data-control='{ "name":"bw_scroll_top_display" }'>
    <?php esc_html_e( 'Edit Scroll Top', 'brainworks' ); ?>
  </button>
  <button class="button-small customizer-edit" data-control='{ "name":"bw_analytics_google_placed" }'>
    <?php esc_html_e( 'Edit Analytics Tracking Code', 'brainworks' ); ?>
  </button>
  <button class="button-small customizer-edit" data-control='{ "name":"bw_login_logo" }'>
    <?php esc_html_e( 'Edit Login Logo', 'brainworks' ); ?>
  </button>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>
