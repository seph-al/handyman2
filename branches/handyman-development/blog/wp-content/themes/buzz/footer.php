    </div>    
        <div class="under-footer">
            <div class="large-4 small-12 columns footer-widget">
                <?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-left' ); ?>
                <?php endif; ?>
            </div>
            <div class="large-4 small-12 columns footer-widget">
                <?php if ( is_active_sidebar( 'footer-center' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-center' ); ?>
                <?php endif; ?>
            </div>
            <div class="large-4 small-12 columns footer-widget">
                <?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-right' ); ?>
                <?php endif; ?>
            </div>
            <div class="clear"></div> 
            <div class="lcorner"></div>
            <div class="rcorner"></div>
        </div>
        
        <footer>
            <div class="large-4 small-12 columns copyrights">
                <p><?php echo get_option('buzz_copyright'); ?></p>
                <p>
                    <?php esc_attr_e('Powered by', 'phoenix'); ?> 
                    <a href="<?php echo esc_url('http://wordpress.org/'); ?>" title="<?php esc_attr_e('WordPress', 'phoenix'); ?>"><?php printf('WordPress'); ?></a><br/>
                    <?php esc_attr_e('Theme by', 'phoenix'); ?> 
                    <a href="<?php echo esc_url('http://freethemesnow.net/'); ?>" title="<?php esc_attr_e('freethemesnow', 'phoenix'); ?>"><?php printf('freethemesnow'); ?>
                </p>
            </div>
            <div class="large-8 small-12 columns text-right footer-nav">
                <?php wp_nav_menu( array(
                'theme_location' => 'footer',
                'container' => '',
                'menu_class' => '',
                'menu_id' => 'footer-nav',
                'fallback_cb' => 'wp_page_menu'
                )); ?>
            </div>
            <div class="clear"></div>
        </footer>
    </div>
    <?php wp_footer(); ?>
</body>
</html>