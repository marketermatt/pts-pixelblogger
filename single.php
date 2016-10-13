<?php
/**
  * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage pixel-blogger
 */

get_header();
?>

<div id="content" class="clearfix">
	<div id="mainbody-left">
  
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>

			<div class="entry">
				<?php the_content('<p class="serif">'.__('Read the rest of this entry','pts').' &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:','pts').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p><strong>'.__('Tags:','pts').'</strong> ', ', ', '</p>'); ?>

				<p class="postmetadata alt">
					<small>
						<?php _e('This entry was posted','pts'); ?>
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/wordpress/time-since/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						<?php _e('on','pts'); ?> <?php the_time('l, F jS, Y') ?> <?php _e('at','pts'); ?> <?php the_time() ?>
						<?php _e('and is filed under','pts'); ?> <?php the_category(', ') ?>.
						<?php _e('You can follow any responses to this entry through the','pts'); ?> <?php post_comments_feed_link('RSS 2.0'); ?> <?php _e('feed.','pts'); ?>

						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							<?php _e('You can <a href="#respond">leave a response</a>, or','pts'); ?> <a href="<?php trackback_url(); ?>" rel="trackback"><?php _e('trackback','pts'); ?></a> <?php _e('from your own site.','pts'); ?>

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							<?php _e('Responses are currently closed, but you can','pts'); ?> <a href="<?php trackback_url(); ?> " rel="trackback"><?php _e('trackback','pts'); ?></a> <?php _e('from your own site.','pts'); ?>

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.','pts'); ?>

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Both comments and pings are currently closed.','pts'); ?>

						<?php } edit_post_link(__('Edit this entry','pts'),'','.'); ?>

					</small>
				</p>

			</div>
		</div>
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
	<?php comments_template(); ?>
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.','pts'); ?></p>
<?php endif; ?>
	</div>
	

<div id="right"><?php get_sidebar(); ?></div>
</div>
<?php get_footer(); ?>
