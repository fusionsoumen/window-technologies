<?php
/**
* Template Name: Home Template
 */
get_header(); ?>

	<section class="home-banner">
		<?php echo do_shortcode("[shortcode-banner]"); ?>
	</section>

	 <!-- about start -->
	<div id="about" class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="about-title-section mb-30">
						<?php if( have_rows('about_section') ): ?>
                            <?php while( have_rows('about_section') ): the_row(); 
                                // Get sub field values.
                                $editor = get_sub_field('text_editor');
                        	?>
                                
                           <?php  echo $editor; ?>
                                
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="about-right-img mb-30">
						<?php if( have_rows('about_section') ): ?>
                            <?php while( have_rows('about_section') ): the_row(); 
                                // Get sub field values.
                                $image = get_sub_field('about_image');
								//print_r($image);
                        	?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

							<?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- about end -->

	<!-- What We Do -->
    <div id="courses" class="courses-area courses-bg-height gray-bg pt-100 pb-70">
        <div class="container">
		
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <div class="section-title-heading mb-20">
                            <h2 class="primary-color">What We Do</h2>
                        </div>
                        <div class="section-title-para">
                            <p><?php the_field('small_heading'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="courses-list">
                <div class="row">
				<?php if( have_rows('what_we_do') ): ?>
							<?php while( have_rows('what_we_do') ): the_row(); 
							// Get sub field values.
							//$small_heading = get_sub_field('small_heading');
							$thumb_image = get_sub_field('thumb_image');
							$title = get_sub_field('title');
							$description = get_sub_field('description');
							$view_link = get_sub_field('view_link');
							
						?>
                    <div class="col-xl-3 col-lg-3 col-md-6">
						
                        <div class="courses-wrapper courses-wrapper-3 mb-30">
                            <div class="courses-thumb">
                                <a href="<?php echo $view_link; ?>">
									<img src="<?php echo $thumb_image['url']; ?>" alt="<?php echo $thumb_image['alt']; ?>">
								</a>
                            </div>
                            <div class="courses-content courses-content-3 clearfix">
                                <div class="courses-heading mt-25 d-flex">
                                    <div class="course-title-3">
                                        <h3><a href="<?php echo $view_link; ?>"><?php echo $title; ?></a></h3>
                                    </div>

                                </div>
                                <div class="courses-para mt-15">
                                    <p><?php echo $description; ?></p>
                                </div>
                                <div class="courses-wrapper-bottom clearfix mt-35">
                                    <div class="courses-button">
                                        <a href="<?php echo $view_link; ?>">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
						</div>
						<?php endwhile; ?>
            			<?php endif; ?>
                    
                   
                </div>

            </div>
				
        </div>
    </div>
    <!-- What We Do end -->

	<!-- testimonials start -->
	<div class="testimonilas-area pt-100 pb-90">
	<?php echo do_shortcode('[sc name="testimonials"]'); ?>
    </div>
    <!-- testimonials end -->

	<!-- HOW WE WORK  -->
    <div class="about-area gray-bg pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <div class="section-title-heading mb-20">
                            <h2 class="primary-color">How We Work </h2>
                        </div>
                        <div class="section-title-para">
                            <p class="gray-color"><?php the_field('how_we_work_small_text'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if( have_rows('how_we_work') ): ?>
                    <?php while( have_rows('how_we_work') ): the_row(); 
                    // Get sub field values.
                    //$small_heading = get_sub_field('small_heading');
                    $title = get_sub_field('title');
                    $number = get_sub_field('number_count');
                    $description = get_sub_field('description');
                    
                ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="feature-wrapper mb-30">
                        <div class="feature-title-heading">
                            <h3><?php echo $title; ?></h3>
                            <span><?php echo  $number; ?></span>
                        </div>
                        <div class="feature-text">
                            <p><?php echo   $description; ?></p>
                        </div>
                    </div>
                </div>

                <?php endwhile; ?>
            <?php endif; ?>
                
            </div>
        </div>
    </div>
    <!-- HOW WE WORK  end -->

     <!-- counter start -->
     <div class="counter-area primary-bg">
        <?php echo do_shortcode('[sc name="counter"]'); ?>
    </div>
    <!-- counter end -->


     <!-- latest_news start -->
     <div id="blog" class="latest_news-area gray-bg pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="section-title mb-50 text-center">
                        <div class="section-title-heading mb-20">
                            <h2 class="primary-color">Latest News</h2>
                        </div>
                        <div class="section-title-para">
                            <p class="gray-color"><?php the_field('latest_news_small_text'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo do_shortcode('[latest-news]'); ?>
        </div>
    </div>
    <!-- latest_blog end -->

    <!-- brand start -->
    <div class="brand-area pt-80 pt-80 pb-80">
    
    <?php echo do_shortcode('[sc name="brand"]'); ?>
    </div>
    <!-- brand end -->

<?php get_footer(); ?>
