<?php
/**
* Template Name: Company
 */
get_header(); ?>
 <?php 
    $innerImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    $bannerEditor = get_field('banner_editor');
    //echo($innerImage);

    $left_image = get_field('left_image');
    $right_image = get_field('right_image');
    $full_image = get_field('full_image');
    $who_we_are = get_field('who_we_are_text');
    $mission_vission = get_field('mission_vission');
					
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
    <div id="about" class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="about-img mb-55">
                        <img src="<?php echo $left_image['url']; ?>" alt="<?php echo $left_image['alt']; ?>">
                    </div>
                    <div class="about-title-section about-title-section-2 mb-30">
                        <h2 class="">Who We Are</h2>
                        <p><?php echo $who_we_are; ?></p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about-img mb-55">
                        <img src="<?php echo $right_image['url']; ?>" alt="<?php echo $right_image['alt']; ?>">
                    </div>
                    <div class="about-title-section about-title-section-2 mb-30">
                        <h2>Our MIssion Vission</h2>
                        <p><?php echo $mission_vission; ?></p>
                    </div>
                </div>
            </div>
          <div class="row mt-60">
                <div class="col-xl-12">
                    <div class="university-banner mb-30">
                        <img src="<?php echo $full_image['url']; ?>" alt="<?php echo $full_image['alt']; ?>">
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

<!-- testimonials start -->
    <div class="testimonilas-area pt-100 pb-90 gray-bg">
	    <?php echo do_shortcode('[sc name="testimonials"]'); ?>
    </div>
<!-- testimonials end -->

<!-- brand start -->
    <div class="brand-area pt-80 pt-80 pb-80">
        <?php echo do_shortcode('[sc name="brand"]'); ?>
    </div>
<!-- brand end -->

<?php get_footer(); ?>
