<?php
/**
* Template Name: What We Do
 */
get_header(); ?>
 <?php 
    $innerImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    $bannerEditor = get_field('banner_editor');
    //echo($innerImage);

    $welcome_text_editor = get_field('text_editor');
    $welcome_img = get_field('welcome_image');

    $features_title = get_field('features_title');
    $features_description = get_field('features_description');
					
 ?>
<!-- slider-start -->
    <div class="slider-area">
        <div class="page-title">
            <div class="single-slider slider-height slider-height-breadcrumb d-flex align-items-center" style="background-image: url(<?php echo $innerImage; ?>);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700"><?php the_title(); ?></h1>
                                <div class="breadcrumbs-wrap">
                                    <?php echo $bannerEditor; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- slider-end -->

<!-- about start -->
<div id="about" class="about-area pt-100 pb-70 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="about-title-section mb-30">
                        <?php echo $welcome_text_editor; ?>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about-right-img mb-30">
                        <img src="<?php echo $welcome_img['url']; ?>" alt="<?php echo $welcome_img['alt']; ?>">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- about end -->

    <!-- counter start -->
    <div class="counter-area primary-bg">
        <?php echo do_shortcode('[sc name="counter"]'); ?>
    </div>
<!-- counter end -->

    <div class="features-area pt-90 pb-60">
        <div class="container md-full">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="section-title mb-50 text-center">
                    <div class="section-title-heading mb-20">
                        <h2 class="primary-color"><?php echo $features_title ?></h2>
                    </div>
                    <div class="section-title-para">
                        <p class="gray-color"><?php echo $features_description; ?></p>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <?php if( have_rows('box') ): ?>
                    <?php while( have_rows('box') ): the_row(); 
                    // Get sub field values.
                    //$small_heading = get_sub_field('small_heading');
                    $box_editor = get_sub_field('box_editor');
                    
                ?>
                <div class="col-md-4">
                    <?php echo $box_editor; ?>
                </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
	</div>

<?php get_footer(); ?>
