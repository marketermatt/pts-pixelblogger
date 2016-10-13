<?php
/**
  * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage pixel-blogger
 */

get_header(); ?>

<div id="content" class="clearfix">
	<div id="mainbody-left">
              			

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle"><?php _e('Search Results','pts'); ?></h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; '.__('Older Entries','pts')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries','pts').' &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>
<br />
			<div <?php post_class() ?>>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','pts'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>
<?php the_excerpt(); ?>
				<p class="postmetadata"><?php the_tags(__('Tags:','pts').' ', ', ', '<br />'); ?> <?php _e('Posted in','pts');?> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; '.__('Older Entries','pts')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries','pts').' &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center"><?php _e('No posts found. Try a different search?','pts'); ?></h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>
	

<div id="right"><?php get_sidebar(); ?></div>
</div>

<?php get_footer(); ?>