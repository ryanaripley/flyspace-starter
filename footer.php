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
			<div class="footer-widget">
				<?php 
				$facebook_url = get_option('facebook_url');
				$twitter_url = get_option('twitter_url');
				$linkedin_url = get_option('linkedin_url');
				$company_phone = get_option('company_phone');
				$company_email = get_option('company_email');

				if ( $facebook_url || $twitter_url || $linkedin_url || $company_phone || $company_email ) : ?>
					<div class="footer-contact-section">
						<h2 class="widget-title"><?php echo __( 'Contact us', 'flyspace' ); ?></h2>
						<?php if ( $company_phone ) { ?>
							<a href="tel:1-<?php echo $company_phone; ?>">
								<?php echo $company_phone; ?>
							</a><br>
						<?php } ?>
						<?php if ( $company_email ) { ?>
							<a href="mailto:<?php echo $company_email; ?>" target="_blank" >
								<?php echo $company_email; ?>
							</a><br>
						<?php } ?>
						<?php if ( $facebook_url || $twitter_url || $linkedin_url ) : ?>
							<div class="footer-social-media-icons">
								<?php if ( $facebook_url ) { ?>
									<a href="<?php echo $facebook_url; ?>">
										<?php flyspace_icon_facebook(); ?>
									</a>
								<?php } ?>
								<?php if ( $twitter_url ) { ?>
									<a href="<?php echo $twitter_url; ?>">
										<?php flyspace_icon_twitter(); ?>
									</a>
								<?php } ?>
								<?php if ( $linkedin_url ) { ?>
									<a href="<?php echo $linkedin_url; ?>">
										<?php flyspace_icon_linkedin(); ?>
									</a>
								<?php } ?>
							</div>
						<?php endif; ?>

					</div>

				<?php endif; ?>

				<?php dynamic_sidebar( 'footer-right'); ?>
			</div>
		</div>
		<div class="copyright-and-terms">
			&copy;<?php echo date("Y") . ' '; ?>
			<?php bloginfo( 'name' ); 
			
			$privacy_page = get_page_by_title( 'Privacy Policy' ); 
			$terms_page = get_page_by_title( 'Terms of Service' ); 
			if ( $privacy_page ) {
				echo ' | ' . '<a href="' . get_permalink( $privacy_page ) . '">' . __( 'Privacy Policy', "flyspace" ) . '</a>';
			} 
			if ( $terms_page ) {
				echo ' | ' . '<a href="' . get_permalink( $terms_page ) . '">' . __( 'Terms of Service', "flyspace" ) . '</a>';
			}
			?>
		</div><!-- .site-copyright -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
