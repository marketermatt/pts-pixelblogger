<?php
/**
  * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage pixel-blogger
 *  
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!','pts'));

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','pts'); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
<div class="clearfix"></div>
<?php if ( have_comments() ) :

    $args = array('style'=>'ol','max_depth'=>2);
    wp_list_comments( $args );
	
 else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.','pts'); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) :

    comment_form();

endif; // if you delete this the sky will fall on your head ?>

