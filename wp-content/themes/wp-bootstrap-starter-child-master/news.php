<?php
/*
 * Template Name: Blog List
*/

get_header(); ?>

<?php $args = array(
	'base'               => '%_%',
	'format'             => '?paged=%#%',
	'total'              => 1,
	'current'            => 0,
	'show_all'           => false,
	'end_size'           => 1,
	'mid_size'           => 2,
	'prev_next'          => true,
	'prev_text'          => __('? Previous'),
	'next_text'          => __('Next ?'),
	'type'               => 'plain',
	'add_args'           => false,
	'add_fragment'       => '',
	'before_page_number' => '',
	'after_page_number'  => ''
); ?>

<?php 
    $innerImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    $bannerEditor = get_field('banner_editor');
					
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



<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
<?php query_posts("showposts=3&paged=$paged"); ?>
<div class="blog-grid-area gray-bg pt-100 pb-70">
        <div class="container">
            <div class="blog-grid-list">
                <div class="row">
                    <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();?>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="blog-wrapper mb-30">
                            <div class="blog-thumb mb-25">
                                <?php if ( has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                <?php endif; ?>
                                <span class="blog-category">
                                    <?php $cat = get_the_category(); echo $cat[0]->cat_name; ?>
                                </span>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span><?php echo get_the_date(); ?> </span>
                                </div>
                                <h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                                <?php
                                    // Making an excerpt of the blog post content
                                    $excerpt = strip_tags($post->post_content);
                                    if (strlen($excerpt) > 100) {
                                    $excerpt = substr($excerpt, 0, 100);
                                    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));
                                    $excerpt .= '...';
                                    }
                                ?>
                                <p><?php echo $excerpt ?></p>
                                <div class="read-more-btn">
                                    <a href="<?php the_permalink(); ?>">Read more</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    
                    <?php endwhile;
					?>
                    </div>
                </div>
            </div>
        </div>
    
<?php /* <div class="navigation">
<span class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">?</span> Older <span>posts</span>', 'matala' ) ); ?></span>
<span class="nav-next"><?php previous_posts_link( __( 'Newer <span>posts</span> <span class="meta-nav">?</span>', 'matala' ) ); ?></span>
</div> */ ?>
    
    <?php echo paginate_links(); ?>



<?php get_footer(); ?>