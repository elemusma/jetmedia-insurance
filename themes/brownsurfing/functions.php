<?php

function jet_media_insurance_stylesheets() {
wp_enqueue_style('style', get_stylesheet_uri() );

wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.min.css'));
wp_enqueue_style('body', get_theme_file_uri('/css/sections/body.css'));
wp_enqueue_style('nav', get_theme_file_uri('/css/sections/nav.css'));
wp_enqueue_style('popup', get_theme_file_uri('/css/sections/popup.css'));
wp_enqueue_style('hero', get_theme_file_uri('/css/sections/hero.css'));
wp_enqueue_style('contact', get_theme_file_uri('/css/sections/contact.css'));
wp_enqueue_style('img', get_theme_file_uri('/css/elements/img.css'));

if(is_front_page()){
	wp_enqueue_style('home', get_theme_file_uri('/css/sections/home.css'));
}


wp_enqueue_style('photo-gallery', get_theme_file_uri('/css/sections/photo-gallery.css'));
wp_enqueue_style('footer', get_theme_file_uri('/css/sections/footer.css'));
// wp_enqueue_style('sidebar', get_theme_file_uri('/css/sections/sidebar.css'));
// wp_enqueue_style('social-icons', get_theme_file_uri('/css/sections/social-icons.css'));
wp_enqueue_style('btn', get_theme_file_uri('/css/elements/btn.css'));
// fonts
wp_enqueue_style('fonts', get_theme_file_uri('/css/elements/fonts.css'));
wp_enqueue_style('proxima-nova', get_theme_file_uri('/proxima-nova/proxima-nova.css'));
wp_enqueue_style('blair-itc', get_theme_file_uri('/blair-itc/blair-itc.css'));
wp_enqueue_style('aspira', get_theme_file_uri('/aspira-font/aspira-font.css'));

}
add_action('wp_enqueue_scripts', 'jet_media_insurance_stylesheets');
// for footer
function jet_media_insurance_stylesheets_footer() {
	// wp_enqueue_style('style-footer', get_theme_file_uri('/css/style-footer.css'));
	// owl carousel
	wp_enqueue_style('owl.carousel.min', get_theme_file_uri('/owl-carousel/owl.carousel.min.css'));
	wp_enqueue_style('owl.theme.default', get_theme_file_uri('/owl-carousel/owl.theme.default.min.css'));
	// wp_enqueue_style('lightbox-css', get_theme_file_uri('/lightbox/lightbox.min.css'));
	// wp_enqueue_script('font-awesome', '//use.fontawesome.com/fff80caa08.js');

	// owl carousel
	wp_enqueue_script('jquery-min', get_theme_file_uri('/owl-carousel/jquery.min.js'));
	wp_enqueue_script('owl-carousel', get_theme_file_uri('/owl-carousel/owl.carousel.min.js'));
	wp_enqueue_script('owl-carousel-custom', get_theme_file_uri('/owl-carousel/owl-carousels.js'));
	// wp_enqueue_script('lightbox-min-js', get_theme_file_uri('/lightbox/lightbox.min.js'));
	// wp_enqueue_script('lightbox-js', get_theme_file_uri('/lightbox/lightbox.js'));
    // aos
    // wp_enqueue_script('aos-js', get_theme_file_uri('/aos/aos.js'));
    // wp_enqueue_script('aos-custom-js', get_theme_file_uri('/aos/aos-custom.js'));
    // wp_enqueue_style('aos-css', get_theme_file_uri('/aos/aos.css'));

	// jquery fittext
	// wp_enqueue_script('jquery-min-js', get_theme_file_uri('/jquery-fittext/jquery.min.js'));
    // wp_enqueue_script('jquery-fittext', get_theme_file_uri('/jquery-fittext/jquery.fittext.js'));
    // wp_enqueue_script('jquery-fittext-custom', get_theme_file_uri('/jquery-fittext/fittext.js'));
	// jquery modal
	// wp_enqueue_script('jquery-modal-js', get_theme_file_uri('/jquery-modal/jquery.modal.min.js'));
	// wp_enqueue_style('jquery-modal-css', get_theme_file_uri('/jquery-modal/jquery.modal.min.css'));
	// wp_enqueue_style('custom-modal', get_theme_file_uri('/jquery-modal/modal-custom.css'));
    // general
	wp_enqueue_script('nav-js', get_theme_file_uri('/js/nav.js'));
	wp_enqueue_script('popup-js', get_theme_file_uri('/js/popup.js'));
	
	if(is_single()){
		wp_enqueue_script('blog-js', get_theme_file_uri('/js/blog.js'));
		}
	}
	
add_action('get_footer', 'jet_media_insurance_stylesheets_footer');

// loads enqueued javascript files deferred
function mind_defer_scripts( $tag, $handle, $src ) {
	$defer = array( 
	  'jquery-min',
	  'owl-carousel',
	  'owl-carousel-custom',
	  'lightbox-min-js',
	  'lightbox-js',
	  'aos-js',
	  'aos-custom-js',
	  'nav-js',
	  'blog-js',
	  'contact-js'
	);
	if ( in_array( $handle, $defer ) ) {
	   return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	}
	  
	  return $tag;
  } 
  add_filter( 'script_loader_tag', 'mind_defer_scripts', 10, 3 );

function jet_media_insurance_menus() {
 register_nav_menus( array(
   'primary' => __( 'Primary' )));
register_nav_menus( array(
'secondary' => __( 'Secondary' )));
 register_nav_menu('footer',__( 'Footer' ));
 add_theme_support('title-tag');
 add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'jet_media_insurance_menus');

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();
}

// removes gutenberg styles from all pages but the blog posts
function smartwp_remove_wp_block_library_css(){

	if(!is_single()) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
	}
} 
// add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

// add_filter('show_admin_bar', '__return_false');

// add_filter('comment_form_default_fields', 'remove_website_field_from_comment_form');
function remove_website_field_from_comment_form($fields)
{
    if (isset($fields['url'])) {
        unset($fields['url']);
    }
    return $fields;
}

/*Base URL shorcode*/
add_shortcode( 'base_url', 'baseurl_shortcode' );
function baseurl_shortcode( $atts ) {

    return site_url();
	// [base_url]

}

add_action( 'init', 'two_columns_block' );
function two_columns_block() {
    register_block_type( __DIR__ . '/blocks/two-columns' );
}

add_action( 'init', 'columns_repeater_block' );
function columns_repeater_block() {
    register_block_type( __DIR__ . '/blocks/columns-repeater' );
}

function spacer_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(

		'class' => '',

		'style' => ''

	), $atts );

	return '<div class="spacer ' . esc_attr($a['class']) . '" style="' . esc_attr($a['style']) . '"></div>';

	// [spacer class="" style=""]
}

add_shortcode( 'spacer', 'spacer_shortcode' );

function btn_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(
	
	'class' => '',
	
	'href' => '',
	
	'style' => '',
	
	'target' => '',

	'id' => '',

	'aria-label' => ''
	
	), $atts );

	$id = esc_attr($a['id']);

	// Check if the ID contains the word "modal"
	if (strpos($id, 'modal') !== false) {
		return '<span class="btn-main ' . esc_attr($a['class']) . '" aria-label="' . esc_attr($a['aria-label']) . '" style="' . esc_attr($a['style']) . '" target="' . esc_attr($a['target']) . '" id="' . esc_attr($a['id']) . '">' . $content . '</span>';
	} else {
		return '<a class="btn-main ' . esc_attr($a['class']) . '" href="' . esc_attr($a['href']) . '" style="' . esc_attr($a['style']) . '" target="' . esc_attr($a['target']) . '" id="' . esc_attr($a['id']) . '">' . $content . '</a>';
	}
	
	// [button href="#" class="btn-main" style=""]Learn More[/button]
	
	}
	
add_shortcode( 'button', 'btn_shortcode' );

function insurance_table_shortcode( $atts, $content = null ) {

	$a = shortcode_atts( array(
	
	'class' => '',

	'gender' => '',
	'age' => '',
	'coverage' => '',
	'monthly' => '',

	'background' => '',
	
	'href' => '',
	
	'style' => '',
	
	'target' => '',

	'id' => '',

	'aria-label' => ''
	
	), $atts );

	$output = '';
	
	$output .= '<div class="d-flex mb-2">';
	//   <!-- Age and Gender -->
  $output .= '<div class="p-4" style="background:#' . esc_attr($a['background']) . ';color:white;width:145px;">';
    $output .= '<p class="mb-0 h4" style="">' . esc_attr($a['gender']) . '</p>';
    $output .= '<p class="mb-0 h4"><strong>AGE ' . esc_attr($a['age']) . '</strong></p>';
  $output .= '</div>';
//   <!-- Coverage -->
  $output .= '<div class="p-4" style="background:#EFF2F4;">';
    $output .= '<p class="mb-0"><strong>COVERAGE</strong></p>';
    $output .= '<p class="mb-0 h2 thin" style="">$' . esc_attr($a['coverage']) . '</p>';
  $output .= '</div>';
//   <!-- Monthly Charge -->
    $output .= '<div class="p-4" style="background:#EFF2F4;">';
    $output .= '<p class="mb-0"><strong>PER MONTH</strong></p>';
      $output .= '<p class="mb-0 h2"><strong>$' . esc_attr($a['monthly']) . ' *</strong></p>';
  $output .= '</div>';
$output .= '</div>';

return $output;
	
	// [insurance_table gender="" age="" coverage="" monthly=""][/insurance_table]
	
	}
	
add_shortcode( 'insurance_table', 'insurance_table_shortcode' );