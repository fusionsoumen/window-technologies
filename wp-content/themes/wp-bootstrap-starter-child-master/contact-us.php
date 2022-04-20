<?php
/**
* Template Name: Contact Us
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

<div class="advisors-area gray-bg pt-95 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 offset-md-1 ml-md-auto">
                    <div class="contact-info-text">
                        <div class="section-title mb-20">
                            <?php
                            $welcome_text_editor = get_field('welcome_text_editor');
                           echo $welcome_text_editor; ?>
                        </div>
                    </div>
                    <div class="contact-info mb-50 wow fadeInRight" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                        <ul>
                        <?php if( have_rows('info_box') ): ?>
                            <?php while( have_rows('info_box') ): the_row(); 
                                $info_editor = get_sub_field('info_editor');
                            ?>
                            <li>
                                <?php echo $info_editor; ?>
                            </li>
                            <?php endwhile; ?>
            			<?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-10 offset-md-1 ml-md-auto">
                    <div class="events-details-form faq-area-form mb-30 p-0">
                        <?php echo do_shortcode('[contact-form-7 id="173" title="Contact form 1"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- map start -->
     <div class="map-area">
     <?php
        $map = get_field('map');
        echo $map; ?>
     
    </div>
    <!-- map end -->

<?php get_footer(); ?>
