<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>

    <!-- footer start -->
<footer id="contact">
        <div class="footer-area primary-bg pt-80">
            <div class="container">
                <div class="footer-top pb-35">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="footer-widget mb-30">
                                <div class="footer-logo">
                                <a href="'.home_url().'"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo/footer-logo.png" alt="Footer Logo"></a>
                                </div>
                                <?php dynamic_sidebar( 'footer-item1' ); ?>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <?php dynamic_sidebar( 'footer-item2' ); ?>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <?php dynamic_sidebar( 'footer-item3' ); ?>
                        </div>
                       
                        <div class="col-xl-3 col-lg-4  col-md-6">
                            <?php dynamic_sidebar( 'footer-item4' ); ?>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom pt-25 pb-25">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="footer-copyright text-center">
                                    <span>Copyright &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>. All rights reserved</span>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->


<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>