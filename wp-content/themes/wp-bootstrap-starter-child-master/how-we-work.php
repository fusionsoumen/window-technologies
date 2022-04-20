<?php
/**
* Template Name: How We Work
 */
get_header(); ?>
 <?php 
    $innerImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    $bannerEditor = get_field('banner_editor');
    //echo($innerImage);
    
    $welcome_text_editor = get_field('welcome_text_editor');
    $welcome_img = get_field('welcome_img');

    $faq_title = get_field('faq_title');
    $faq_description = get_field('faq_description');

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

<!-- faq start -->
<div class="fag-area pt-100 pb-70 mb- ">
    <div class="container">
        <div class="faq-list">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12">
                    <div class="faq-area-title mb-35">
                        <h2 class="mb-15">Frequently Ask Questions :</h2>
                        <p>Will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happi nesso one rejects. </p>
                    </div>
                    <div class="faq-wrapper mb-30 wow fadeInLeft" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                    <?php if(get_field('faq')): $i = 0; ?>
                    <div class="accordion" id="accordion">
                    <?php while(has_sub_field('faq')): $i++; 

                    $faq_title = get_sub_field('faq_title');
                    $faq_description = get_sub_field('faq_description');
                                        
                    ?>
                        <div class="card">
                            <div class="card-header" id="heading<?php echo $i; ?>">
                                <h5 class="mb-0">
                                    <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">
                                        <span class="ti-help-alt"></span>
                                        <?php echo $faq_title; ?>
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse<?php echo $i; ?>" class="collapse <?php if($i ==1){ echo "show";}?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion" style="">
                                <div class="card-body">
                                <?php echo $faq_description; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
