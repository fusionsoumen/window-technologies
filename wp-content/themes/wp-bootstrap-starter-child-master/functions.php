<?php

// Include php files
include get_theme_file_path('/includes/shortcodes.php');

// Enqueue needed scripts
function needed_styles_and_scripts_enqueue() {
    
    // Add-ons

    
    // Custom script
    wp_enqueue_script( 'wpbs-custom-script', get_stylesheet_directory_uri() . '/assets/javascript/script.js' , array( 'jquery' ) );

    // enqueue style
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );


}
add_action( 'wp_enqueue_scripts', 'needed_styles_and_scripts_enqueue' );

function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


add_filter( 'widget_text', 'do_shortcode' );

//Dynamic Year
function site_year(){
	ob_start();
	echo date( 'Y' );
	$output = ob_get_clean();
    return $output;
}
add_shortcode( 'site_year', 'site_year' );

//
// Your code goes below
//


//Add default stylesheet of parent theme

function test_dequeue_styles() {
	// this removes the original style
	wp_dequeue_style( 'start-style' );
	wp_deregister_style( 'start-style' );
}
add_action( 'wp_enqueue_scripts', 'test_dequeue_styles', 200 );

function test_enqueue_styles() {
	// parent style ( this loads the css from the main folder )
	wp_enqueue_style( 'start-parent-style', get_template_directory_uri() .'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'test_enqueue_styles');

function new_enqueue_styles() {
	// child style ( this loads the css from the child folder after parent-style )
	wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() .'/css/bootstrap.min.css' );
    wp_enqueue_style( 'owl.carousel', get_stylesheet_directory_uri() .'/css/owl.carousel.min.css' );
    wp_enqueue_style( 'animate-css', get_stylesheet_directory_uri() .'/css/animate.min.css' );
    wp_enqueue_style( 'magnific-css', get_stylesheet_directory_uri() .'/css/magnific-popup.css' );
    wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() .'/css/fontawesome-all.min.css' );
    wp_enqueue_style( 'themify-icons', get_stylesheet_directory_uri() .'/css/themify-icons.css' );
    wp_enqueue_style( 'meanmenu-css', get_stylesheet_directory_uri() .'/css/meanmenu.css' );
    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() .'/css/slick.css' );
    wp_enqueue_style( 'default', get_stylesheet_directory_uri() .'/css/default.css' );
	wp_enqueue_style( 'start-child-style', get_stylesheet_directory_uri() .'/css/child-style.css', array('bootstrap-css') );
    wp_enqueue_style( 'responsive', get_stylesheet_directory_uri() .'/css/responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'new_enqueue_styles', 999 );


//Add custom javascript
function custom_javasvript() {
	wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/js/vendor/modernizr-3.5.0.min.js' , array(), null, true);
	wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/vendor/jquery-1.12.4.min.js' , array(), null, true);
    wp_enqueue_script('popper', get_stylesheet_directory_uri() . '/js/popper.min.js' , array(), null, true);
    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js' , array(), null, true);

    wp_enqueue_script('owl.carousel', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js' , array(), null, true);
	wp_enqueue_script('isotope', get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js' , array(), null, true);
    wp_enqueue_script('one-page-nav-min', get_stylesheet_directory_uri() . '/js/one-page-nav-min.js' , array(), null, true);
    wp_enqueue_script('slick.min', get_stylesheet_directory_uri() . '/js/slick.min.js' , array(), null, true);
    
    wp_enqueue_script('jquery.meanmenu.min', get_stylesheet_directory_uri() . '/js/jquery.meanmenu.min.js' , array(), null, true);
	wp_enqueue_script('ajax-form', get_stylesheet_directory_uri() . '/js/ajax-form.js' , array(), null, true);
    wp_enqueue_script('wow.min', get_stylesheet_directory_uri() . '/js/wow.min.js' , array(), null, true);
    wp_enqueue_script('jquery.scrollUp', get_stylesheet_directory_uri() . '/js/jquery.scrollUp.min.js' , array(), null, true);

    wp_enqueue_script('jquery.barfiller', get_stylesheet_directory_uri() . '/js/jquery.barfiller.js' , array(), null, true);
	wp_enqueue_script('imagesloaded.pkgd.min', get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.min.js' , array(), null, true);
    wp_enqueue_script('jquery.counterup.min', get_stylesheet_directory_uri() . '/js/jquery.counterup.min.js' , array(), null, true);
    wp_enqueue_script('waypoints.min', get_stylesheet_directory_uri() . '/js/waypoints.min.js' , array(), null, true);

    wp_enqueue_script('jquery.magnific-popup', get_stylesheet_directory_uri() . '/js/jquery.magnific-popup.min.js' , array(), null, true);
	wp_enqueue_script('plugins', get_stylesheet_directory_uri() . '/js/plugins.js' , array(), null, true);
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js' , array(), null, true);
	
}
add_action('wp_enqueue_scripts', 'custom_javasvript');



//Load jquery top of all javascript file
function insert_jquery(){
	wp_enqueue_script('jquery', false, array(), false, false);
	}
    add_filter('wp_enqueue_scripts','insert_jquery',1);


/*** Add Page Name in Body Class ***/

add_filter( 'body_class', 'sk_body_class_for_pages' );
/**
 * Adds a css class to the body element
 *
 * @param  array $classes the current body classes
 * @return array $classes modified classes
 */
function sk_body_class_for_pages( $classes ) {

	if ( is_singular( 'page' ) ) {
		global $post;
		$classes[] = 'page-' . $post->post_name;
	}

	return $classes;

}


/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}
 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="admin.php?action=rd_duplicate_post_as_draft&amp;post=' . $post->ID . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
add_filter('page_row_actions', 'rd_duplicate_post_link', 10, 2);


// home banner shortcode
function home_banner_shortcode($atts){

	if(have_rows('home_banner')):
		$return = '<div class="slider-area pos-relative"><div class="slider-active">';
		while(have_rows('home_banner')) {
			the_row();
			$imageBg = get_sub_field('banner_image'); 
			$bannerEditor = get_sub_field('banner_editor'); 
			//print_r($imageBg);
			$return .= '<div class="single-slider slider-height slider-height-3 d-flex align-items-center justify-content-center" style="background-image: url('. $imageBg .')">';
				$return .= '<div class="container">';
					$return .= '<div class="row">';
						$return .= '<div class="col-xl-8 offset-xl-2">';
							$return .= '<div class="slider-content slider-content-2 slider-content-3 text-center">';
								$return .= '<div class="banner-cont">' . $bannerEditor . '</div>';
							$return .= '</div>';
						$return .= '</div>';
					$return .= '</div>';
				$return .= '</div>';
			$return .= '</div>';
		}
		$return .= '</div><div class="swiper-pagination"></div></div>';
		else :
			$return .= '<p>No slider found.</p>';
			endif;
			return $return;
}
add_shortcode('shortcode-banner', 'home_banner_shortcode');


// latest News shortcode
function latest_news_shortcode($atts){
    $q = new WP_Query(
        array( 'orderby' => 'date', 'category_name' => '', 'posts_per_page' => 3)
    );
   $list = '<div class="row">';
    while($q->have_posts()) : $q->the_post();
        $content = get_the_excerpt();
        $content = strip_tags($content);
        $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        $cat = get_the_category();
  $list .= '<div class="col-xl-4 col-lg-4 col-md-6">';
  $list .= '<div class="blog-wrapper mb-30">';
 
  $list .= '<div class="blog-thumb mb-25">';
  $list .= '<div class="blog_img"><a class="" href="' . get_permalink() . '"><img src="'. $backgroundImg[0].'"></a> </div>';
  $list .= '<span class="blog-category">'. $cat[0]->cat_name .'</span>';
  $list .= '</div>';
  $list .= '<div class="blog-content">';
  $list .= '<div class="blog-meta"> <span>'. get_the_date() . '</span></div>';
  $list .= '<h5><a class="" href="' . get_permalink() . '"> '. get_the_title() . '</a></h5>';
  $list .= '<p>'. $content .'</p>';
  $list .= '<div class="read-more-btn"><a class="text-btn" href="' . get_permalink() . '">Read more</a></div>';
  $list .= '</div>';
  $list .= '</div>';
  $list .= '</div>';
	endwhile;
  $list .= '</div>';
    wp_reset_query();
   return $list . '';
}
add_shortcode('latest-news', 'latest_news_shortcode');

//Footer Item1
if ( function_exists('register_sidebar') )
register_sidebar( array(
    'name' => __('Footer Item1'),
    'id' => 'footer-item1',
    'description' => __( 'An optional widget area for footer', 'window' ),
    'before_widget' => '<div class="footer-item1">',
    'after_widget' => "</div>",
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));

//Footer Item2
if ( function_exists('register_sidebar') )
register_sidebar( array(
    'name' => __('Footer Item2'),
    'id' => 'footer-item2',
    'description' => __( 'An optional widget area for footer', 'window' ),
    'before_widget' => '<div class="footer-item2">',
    'after_widget' => "</div>",
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));

//Footer Item3
if ( function_exists('register_sidebar') )
register_sidebar( array(
    'name' => __('Footer Item3'),
    'id' => 'footer-item3',
    'description' => __( 'An optional widget area for footer', 'window' ),
    'before_widget' => '<div class="footer-item3">',
    'after_widget' => "</div>",
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));

//Footer Item4
if ( function_exists('register_sidebar') )
register_sidebar( array(
    'name' => __('Footer Item4'),
    'id' => 'footer-item4',
    'description' => __( 'An optional widget area for footer', 'window' ),
    'before_widget' => '<div class="footer-item4">',
    'after_widget' => "</div>",
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));


//Custom menu function
function my_wp_nav_menu(){
    register_nav_menus( array(
        'primary' => 'Main Navigation'
    ) );
}
add_action( 'after_setup_theme', 'my_wp_nav_menu' );

//Remove menu li class name
function wp_nav_menu_remove_attributes( $menu ){
    return $menu = preg_replace('/ id=\"(.*)\" class=\"(.*)\"/iU', '', $menu );
}
add_filter( 'wp_nav_menu', 'wp_nav_menu_remove_attributes' );

//Replace menu sub-menu class
function replace_submenu_class($menu) {  
	$menu = preg_replace('/ class="sub-menu"/','/ class="submenu" /',$menu);  
	return $menu;  
  }  
  add_filter('wp_nav_menu','replace_submenu_class'); 




//Register post type leadershipteam

add_action('init', 'leadershipteam');
function leadershipteam() {
    $labels = array(
        'name' => _x('Leader Ship Team', 'Post Type General Name'),
        'singular_name' => _x('leadershipteam', 'Post Type Singular Name'),
        'add_new' => _x('Add New', 'l item'),
        'add_new_item' => __('Add New Item'),
        'edit_item' => __('Edit Item'),
        'new_item' => __('New Item'),
        'view_item' => __('View Item'),
        'search_items' => __('Search Testimonial'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail')
      );
    register_post_type( 'leadershipteam' , $args );
}



//Display leadershipteam

add_shortcode( 'shortcode_leader', 'leader_leader' );
function leader_leader( $atts ){
    global $post;
    $default = array(
        //'type'      => 'post',
        'post_type' => 'leadershipteam',
        'limit'     => -1,
        'status'    => 'publish',
        'order' => 'DESC',
    );

    $r = shortcode_atts( $default, $atts );
    extract( $r );

    if( empty($post_type) )
    $post_type = $type;

    $post_type_ob = get_post_type_object( $post_type );
    if( !$post_type_ob )
    return '<div class="car_manufacturer"><p>No such post type' . $post_type . ' found.</p></div>';
    //$return = '<h3>' . $post_type_ob->name . '</h3>';

    $args = array(
        'post_type'   => $post_type,
        'numberposts' => $limit,
        'post_status' => $status,
		'order' => $order
	);

    $posts = get_posts( $args );
    if( count($posts) ):
    $return .= '<div class="team-list"><div class="row">';
		foreach( $posts as $post ): setup_postdata( $post );
		$bgImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$name = get_field('name'); 
		$designation = get_field('designation'); 
		$linkedin_url = get_field('linkedin_url'); 
		//print_r($url);
		//$content = wp_trim_words(the_content, 30,  '...'); 
		$return .= '<div class="col-xl-4 col-lg-4 col-md-6">';
			$return .= '<div class="team-wrapper mb-30">';
			$return .= '<div class="team-thumb">';
			$return .= '<img src="' . $bgImg[0]. '" alt="'. get_the_title() . '" />';
			$return .= '</div>';

			$return .= '<div class="team-social-info text-center">';
				$return .= '<div class="team-social-para">';
					$return .= '<p>'. get_the_content().'</p>';
				$return .= '</div>';

				$return .= '<div class="team-social-icon-list">';
					$return .= '<ul>';
						$return .= '<li><a class="" href="' . $linkedin_url . '"><span class="ti-linkedin"></span> </a></li>';
					$return .= '</ul>';
				$return .= '</div>';

			$return .= '</div>';

			$return .= '<div class="team-teacher-info text-center">';
				$return .= '<p class="name-cls">'. $name . '</p>';
				$return .= '<p class="des-cls">'. $designation . '</p>';
			$return .= '</div>';
			$return .= '</div>';
		$return .= '</div>';
        endforeach; wp_reset_postdata();
    $return .= '</div></div>';
    else :
    $return .= '<p>No Item found.</p>';
    endif;
    return $return;
}


//Register post type ourteam

add_action('init', 'ourteam');
function ourteam() {
    $labels = array(
        'name' => _x('Our Team', 'Post Type General Name'),
        'singular_name' => _x('ourteam', 'Post Type Singular Name'),
        'add_new' => _x('Add New', 'l item'),
        'add_new_item' => __('Add New Item'),
        'edit_item' => __('Edit Item'),
        'new_item' => __('New Item'),
        'view_item' => __('View Item'),
        'search_items' => __('Search Testimonial'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        //'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail')
      );
    register_post_type( 'ourteam' , $args );
}


//Display ourteam

add_shortcode( 'shortcode_ourteam', 'ourteam_ourteam' );
function ourteam_ourteam( $atts ){
    global $post;
    $default = array(
        //'type'      => 'post',
        'post_type' => 'ourteam',
        'limit'     => -1,
        'status'    => 'publish',
        'order' => 'DESC',
    );

    $r = shortcode_atts( $default, $atts );
    extract( $r );

    if( empty($post_type) )
    $post_type = $type;

    $post_type_ob = get_post_type_object( $post_type );
    if( !$post_type_ob )
    return '<div class="car_manufacturer"><p>No such post type' . $post_type . ' found.</p></div>';
    //$return = '<h3>' . $post_type_ob->name . '</h3>';

    $args = array(
        'post_type'   => $post_type,
        'numberposts' => $limit,
        'post_status' => $status,
		'order' => $order
	);

    $posts = get_posts( $args );
    if( count($posts) ):
    $return .= '<div class="team-list"><div class="row">';
		foreach( $posts as $post ): setup_postdata( $post );
		$bgImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		$name = get_field('name'); 
		$designation = get_field('designation'); 
		$linkedin_url = get_field('linkedin_url'); 
		//print_r($url);
		//$content = wp_trim_words(the_content, 30,  '...'); 
		$return .= '<div class="col-xl-4 col-lg-4 col-md-6">';
			$return .= '<div class="team-wrapper mb-30">';
			$return .= '<div class="team-thumb">';
			$return .= '<img src="' . $bgImg[0]. '" alt="'. get_the_title() . '" />';
			$return .= '</div>';

			$return .= '<div class="team-social-info text-center">';
				$return .= '<div class="team-social-para">';
					$return .= '<p>'. get_the_content().'</p>';
				$return .= '</div>';

				$return .= '<div class="team-social-icon-list">';
					$return .= '<ul>';
						$return .= '<li><a class="" href="' . $linkedin_url . '"><span class="ti-linkedin"></span> </a></li>';
					$return .= '</ul>';
				$return .= '</div>';

			$return .= '</div>';

			$return .= '<div class="team-teacher-info text-center">';
				$return .= '<p class="name-cls">'. $name . '</p>';
				$return .= '<p class="des-cls">'. $designation . '</p>';
			$return .= '</div>';
			$return .= '</div>';
		$return .= '</div>';
        endforeach; wp_reset_postdata();
    $return .= '</div></div>';
    else :
    $return .= '<p>No Item found.</p>';
    endif;
    return $return;
}
