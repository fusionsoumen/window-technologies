<?php
/**
* Template Name: Career
 */
get_header(); ?>
 <?php 
    $innerImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    $bannerEditor = get_field('banner_editor');
    //echo($innerImage);

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

   <!-- courses start -->
   <div class="advisors-area gray-bg pt-95 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="events-details-form faq-area-form mb-30 p-0">
                       
                            
                                <div class="col-xl-8 offset-xl-2">
                                    <div class="events-form-title text-center mb-30">
                                    <?php
                                        $welcome_text_editor = get_field('welcome_text_editor');
                                        echo $welcome_text_editor; 
                                    ?>
                                    </div>
                                </div>
                                <?php echo do_shortcode('[contact-form-7 id="190" title="Career"]'); ?>
                          
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- courses end -->


<?php get_footer(); ?>
