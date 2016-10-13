<?php
/**
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage pixel-blogger
 */

get_header();
?>
<div id="content" class="clearfix">
	<div id="mainbody-left">
	<!-- Top banner above content -->
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Banner')) : ?><?php endif; ?>
	<!-- begin content -->

		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"><?php _e('Archive for the','pts'); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category','pts'); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle"><?php _e('Posts Tagged','pts'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php _e('Archive for','pts'); ?> <?php the_time(get_option( 'date_format' )); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php _e('Archive for','pts'); ?> <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php _e('Archive for','pts'); ?> <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle"><?php _e('Author Archive','pts'); ?></h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><?php _e('Blog Archives','pts'); ?></h2>
 	  <?php } ?>


		

		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?>>
            <div class="post-sum"><h3 id="post-<?php the_ID(); ?>"><a class="archtitle" href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','pts'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php _e('Posted','pts'); ?>: <?php the_time('l, F jS, Y') ?></small></div>

            <div class="entry">
                <?php if ( has_post_thumbnail() ) { ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="feat-img">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </a>
                <?php } ?>
                <?php //the_content(__('Read the rest of this entry &raquo;','pts')); ?>
                <?php

                if ( ! has_excerpt() ) {
                    the_content(__('Read the rest of this entry &raquo;','pts'));
                } else {
                    the_excerpt();
                    echo '<br/>';
                    ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="more-link">
                        Continue...
                    </a>
                <?php
                }

                ?>
            </div>

				<p class="postmetadata"><?php the_tags(__('Tags:','pts').' ', ', ', '<br />'); ?> <?php _e('Posted in','pts'); ?> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; '.__('Older Entries','pts')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries','pts').' &raquo;') ?></div>
		</div>
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf(__('<h2 class="enter">Sorry, but there aren\'t any posts in the %s category yet.</h2>','pts'), single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			_e('<h2>Sorry, but there aren\'t any posts with this date.</h2>','pts');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf(__('<h2 class="center">Sorry, but there aren\'t any posts by %s yet.</h2>','pts'), $userdata->display_name);
		} else {
			_e('<h2 class="center">No posts found.</h2>','pts');
		}
		get_search_form();

	endif;
?>

<!-- Bottom banner below content -->
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Banner')) : ?><?php endif; ?>
	</div>
	

<div id="right"><?php get_sidebar(); ?></div>
</div>

<?php get_footer(); ?>
