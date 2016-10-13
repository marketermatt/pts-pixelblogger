<?php
/**
  * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage pixel-blogger
 */

define('VALIDATION_URL','http://validator.w3.org/check/referer');
define('GMPG','http://gmpg.org/xfn/');
define('WP_ORG','http://wordpress.org/');
add_theme_support( 'automatic-feed-links' );

// Add a text domain
add_action('init', 'pixelblogger_setup');
function pixelblogger_setup()
{
    load_theme_textdomain('pts', get_template_directory() . '/languages');
}

function sidebar_reg(){
	 // Right Column replaces default sidebar
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Right Column', // The sidebar name to register
          'before_widget' => '<div class="module"><div><div><div>',
          'after_widget' => '</div></div><div style="clear: both;"></div> </div></div>',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
	 // Left Column
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Left Column', // The sidebar name to register
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h2>',
          'after_title' => '</h2>',
     ));
	 // Inset Column
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Inset Column', // The sidebar name to register
          'before_widget' => '<div class="widget">',
          'after_widget' => '</div>',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
	  // Logo
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Logo', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h1>',
          'after_title' => '</h1>',
     ));
	 // Top Right Caption
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Top Caption', // The sidebar name to register
          'before_widget' => '<div id="topcaption">',
          'after_widget' => '</div>',
          'before_title' => '<h2>',
          'after_title' => '</h2>',
     ));
	  // Header
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Header', // The sidebar name to register
          'before_widget' => '<div id="header">',
          'after_widget' => '</div>',
          'before_title' => '<h1>',
          'after_title' => '</h1>',
     ));
	  // Top Banner
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Top Banner', // The sidebar name to register
          'before_widget' => '<div id="topbanner">',
          'after_widget' => '</div>',
          'before_title' => '<h2>',
          'after_title' => '</h2>',
     ));
  	// Bottom Banner
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Bottom Banner', // The sidebar name to register
          'before_widget' => '<div id="bottombanner">',
          'after_widget' => '</div>',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
  	// Bottom Widget Left	
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Bottom Left', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
  	// Bottom Widget Center
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Bottom Center', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
  // Bottom Widget Right
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Bottom Right', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h3>',
          'after_title' => '</h3>',
     ));
	 
     // Footer Links
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Footer Links', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h4>',
          'after_title' => '</h4>',
     ));
	 // Footer Info
     if(function_exists('register_sidebar'))
          register_sidebar(array(
          'name' => 'Footer Info', // The sidebar name to register
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h4>',
          'after_title' => '</h4>',
     ));
}
add_action( 'widgets_init', 'sidebar_reg' );

add_action( 'after_setup_theme', 'register_menu' );
function register_menu() {
    register_nav_menu( 'primary', 'Primary Menu' );
    register_nav_menu( 'secondary', 'Secondary Menu' );
}

function pts_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= ' '.get_bloginfo( 'name' );

    //if is normal page or post


    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'persistence' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'pts_wp_title', 10, 2 );

if ( ! isset( $content_width ) ) $content_width = 640;




	 
	 // Below is custom read more link for articles
	add_filter( 'the_content_more_link', 'my_more_link', 10, 2 );

function my_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, 'Read More', $more_link );
} 
	 
	 // This is for the breadcrumbs without the need of a plugin
	 
function the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
		echo home_url();
		echo '">';
		bloginfo('name');
		echo "</a> &raquo; ";
		if (is_category() || is_single()) {
            $category = get_the_category();
            $firstCategory = $category[0]->cat_name;
            $category_link = get_category_link( $category[0]->cat_ID );
			echo '<a href="'.$category_link.'">'.$firstCategory.'</a>';
			if (is_single()) {
				echo " &raquo; ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
}


// Custom Header banner to display on every page

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/defaultfp.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 920);
define('HEADER_IMAGE_HEIGHT', 200);
define( 'NO_HEADER_TEXT', true );

function pixel_blogger_header() {
?>
<style type="text/css">
#headimg {background: url(<?php HEADER_IMAGE() ?>) no-repeat;
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}
#headimg h1, #headimg #desc {
	display: none;
}
</style>
<?php
}

$args = array('width'=>HEADER_IMAGE_WIDTH,'height'=>HEADER_IMAGE_HEIGHT,);
add_theme_support( 'custom-header', $args );
add_theme_support( 'post-thumbnails' );

function my_theme_add_editor_styles()
{
    add_editor_style(get_stylesheet_directory_uri() . '/editor.css');
}
add_action('after_setup_theme', 'my_theme_add_editor_styles');
?>