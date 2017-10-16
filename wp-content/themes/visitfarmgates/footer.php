<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Visit_Farmgates
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if( function_exists('slbd_display_widgets') ) { echo slbd_display_widgets(); } ?>
		<div class="site-info">
			<div class="footer-copyright">Copyright © 2017 Mt. Paul PTY Ltd.</div>
			<div class="footer-links">
				<a class="footer-link" href="#">About</a>
				<a class="footer-link" href="#">Privacy</a>
				<a class="footer-link" href="#">Terms</a>
			</div>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
