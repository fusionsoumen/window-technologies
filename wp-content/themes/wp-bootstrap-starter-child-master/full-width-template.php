<?php
/**
* Template Name: Full Width Template
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

<div class="wp-editor-wrap">
    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/fullwidth', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>
</div>

<?php get_footer(); ?>
