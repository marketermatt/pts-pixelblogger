<?php
/**
  * @package WordPress
 * @copyright Copyright (C) 2014 pixelthemestudio.ca - All Rights Reserved.
 * @license GPL/GNU
 * @subpackage pixel-blogger
 */
?>

<div id="bottomwrapper">
	<div>
		<div>
			<div class="clearfix">	
				<div id="bwleft"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Left')) : ?><?php endif; ?></div>
				<div id="bwcenter"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Center')) : ?><?php endif; ?></div>
				<div id="bwright"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Right')) : ?><?php endif; ?></div>
            </div>
        </div>
    </div>
</div><!-- end bottomwrapper -->

</div><!-- end wrap940 -->
      </div><!-- end top -->
	  <div id="footerwrap">
<!-- Footer links -->
<div id="flinks">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Links')) : ?><?php endif; ?>
</div>
<div id="copyright">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Info')) : ?><?php endif; ?> 
</div>
</div><!-- end footerwrap -->


<div class="clear"></div>
    </div><!-- end wrap980c -->
  </div><!-- end wrap980b -->
</div><!-- end wrap980a -->

<?php wp_footer(); ?>
</body>
</html>