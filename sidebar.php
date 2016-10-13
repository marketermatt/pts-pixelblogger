<?php
/**
  * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage pixel-blogger
 */
?>
	
		
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			<ul><li>
				<?php get_search_form(); ?>
			</li>

			<!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
			<li><h2>Author</h2>
			<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
			</li>
			-->

			<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?> <li>

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p><?php _e('You are currently browsing the archives for the','pts'); ?> <?php single_cat_title(''); ?> <?php _e('category','pts'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p><?php _e('You are currently browsing the','pts'); ?> <a href="<?php echo esc_url( home_url() ); ?>/"><?php echo bloginfo('name'); ?></a> <?php _e('blog archives','pts'); ?>
			<?php _e('for the day','pts'); ?> <?php the_time(get_option( 'date_format' )); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p><?php _e('You are currently browsing the','pts'); ?> <a href="<?php echo esc_url( home_url() ); ?>/"><?php echo bloginfo('name'); ?></a> <?php _e('blog archives for','pts'); ?>
			 <?php the_time('F, Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p><?php _e('You are currently browsing the','pts'); ?> <a href="<?php echo esc_url( home_url() ); ?>/"><?php echo bloginfo('name'); ?></a> <?php _e('blog archives for the year','pts'); ?>
			 <?php the_time('Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p><?php _e('You have searched the','pts'); ?> <a href="<?php echo esc_url( home_url() ); ?>/"><?php echo bloginfo('name'); ?></a> <?php _e('blog archives for','pts'); ?>
			 <strong>'<?php the_search_query(); ?>'</strong>. <?php _e('If you are unable to find anything in these search results, you can try one of these links.','pts'); ?></p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p><?php _e('You are currently browsing the','pts'); ?> <a href="<?php echo esc_url( home_url() ); ?>/"><?php echo bloginfo('name'); ?></a> <?php _e('blog archives','pts'); ?>.</p>

			<?php } ?>

			</li>
		<?php }?>
		</ul>
		<ul role="navigation">
			<?php wp_list_pages('title_li=<h2>'.__('Pages','pts').'</h2>' ); ?>

			<li><h2><?php _e('Archives','pts'); ?></h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>

			<?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
		</ul>
		<ul>
			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
				<?php wp_list_bookmarks(); ?>

				<li><h2><?php __('Meta','pts'); ?></h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
                    <li><?php wp_loginout(); ?></li>
                    <li><a href="<?php echo VALIDATION_URL; ?>" title="This page validates as XHTML 1.0 Transitional"><?php _e('Valid','persistence'); ?> <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
                    <li><a href="<?php echo GMPG; ?>"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
                    <li><a href="<?php echo WP_ORG; ?>" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>
			<?php } ?>

			<?php endif; ?>
		</ul>


