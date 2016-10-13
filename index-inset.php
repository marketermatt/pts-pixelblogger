<?php
/**
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
	<!-- begin content -->
  <?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" class="posttitle" title="<?php _e('Permanent Link to','pts'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php _e('Posted:','pts'); ?> <?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
				<div class="entry">
					<?php the_content(__('Read the rest of this entry &raquo;','pts')); ?>
				</div>
				<p class="postmetadata"><?php the_tags(_e('Tags:','pts').' ', ', ', '<br />'); ?> <?php _e('Posted in','pts');?> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>
		<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; '.__('Older Entries','pts')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries','pts').' &raquo;') ?></div>
		</div>
	<?php else : ?>
		<h2 class="center"><?php _e('Not Found','pts'); ?></h2>
		<p class="center"><?php _e('Sorry, but you are looking for something that isn\'t here.','pts'); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
    <!-- Bottom banner below content -->
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Banner')) : ?><?php endif; ?>
	</div>
	
<div id="inset"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Inset Column')) : ?><?php endif; ?></div>
  	<div id="right"><?php get_sidebar(); ?></div>
</div>

<?php get_footer(); ?>
