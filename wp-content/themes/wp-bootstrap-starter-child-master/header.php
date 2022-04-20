<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="home" class="white-bg" role="banner">
        <div class="header-area header-sticky">
            <div class="header-bottom-area header-sticky" style="transition: .6s;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                            <div class="logo">
                                <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                                    <a href="<?php echo esc_url( home_url( '/' )); ?>">
                                        <img src="<?php echo esc_attr(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                    </a>
                                <?php else : ?>
                                    <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-6 col-6">
                            <div class="main-menu f-right">
                                <nav id="mobile-menu" style="display: block;">
                                    <?php
                                   
                                   wp_nav_menu( array(
                                       'container' => '',
                                       'theme_location' => 'primary'
                                   ) );
                                    ?>
                                </nav>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
	</header><!-- #masthead -->
    
	<div id="content" class="site-content-wrap">
		
                <?php endif; ?>