<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flyspace
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer-widget-area">
			<div class="footer-widget"><?php dynamic_sidebar( 'footer-left'); ?></div>
			<div class="footer-widget"><?php dynamic_sidebar( 'footer-center'); ?></div>
			<div class="footer-widget"><?php dynamic_sidebar( 'footer-right'); ?></div>
		</div>
		<div class="copyright-info">
			&copy;<?php echo date("Y") . ' '; ?>
			<?php bloginfo( 'name' ); ?>
		</div><!-- .site-copyright -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
