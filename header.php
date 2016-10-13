<?php
/**
  * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage pixel-blogger
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('|', true, 'right'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<body <?php body_class(); ?>>
<div id="wrap980a">
  <div id="wrap980b">
    <div id="wrap980c">
      <div id="top">
          <a href="<?php echo home_url(); ?>"><div id="logo"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Logo')) : ?><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/logo.png"><?php endif; ?><h1><?php bloginfo('description'); ?></h1></div></a>
        <div id="topcaption"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Caption')) : ?><?php endif; ?></div>
        <div id="tab-navigation" class="clearfix">
	<div id="tabmenu">

		<!--<ul class="menu sf-menu">
		<div id="page-nav" class="page-nav">
		<li><a href="<?php /*echo home_url(); */?>/">Home</a></li>
		<?php /*wp_list_pages('sort_column=menu_order&title_li=&exclude='); // change the exclude= ID number to the new home page ID */?>
		</li>
		</ul>
		</div>
-->
        <?php
            $args = array('theme_location'=>'primary','container_class'=>'page-nav','container_id'=>'page-nav','menu_class'=>'menu sf-menu');
            wp_nav_menu($args);
        ?>
	</div>
</div><!-- end menu -->
<div id="wrap940">

<?php if ( is_front_page() ) { ?>
<div id="fppromo"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></div> <?php // delete this div line if you don't want to use the custom header on the front ?>
<?php } else { ?>
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Header')) : ?><?php endif; ?>
<?php } ?>

<div id="pathway"><div id="breadcrumbs"><?php get_template_part('breadcrumbs','index'); ?></div>

    <div class="submenu">
        <?php
            $args = array('theme_location'=>'secondary','container_class'=>'sec-menu');
            wp_nav_menu($args);
        ?>
    </div>

</div>
<!-- Begin content columns -->
