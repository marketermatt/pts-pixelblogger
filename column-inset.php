<?php
/**
 * Template Name: Inset and Right Column
  * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage pixel-blogger
 */

get_header(); ?>

<div id="content" class="clearfix">
  <div id="mainbody-inset">
<!-- Top banner above content -->
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Banner')) : ?><?php endif; ?>
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content(__('<p class="serif">Read the rest of this page &raquo;</p>','pts')); ?>

				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:','pts').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link(__('Edit this entry.','pts'), '<p>', '</p>'); ?>
	<!-- Bottom banner below content -->
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Banner')) : ?><?php endif; ?>
	
  </div><!--end mainbody-inset-->
  <div id="inset"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Inset Column')) : ?><?php endif; ?></div>
  	<div id="right"><?php get_sidebar(); ?></div>
  	
</div><!--end content-->

		
<?php get_footer(); ?>
