<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flyspace
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#87a940">
	<meta name="msapplication-TileColor" content="#87a940">
	<meta name="theme-color" content="#87a940">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'flyspace' ); ?></a>
	
	<?php 
	$facebook_url = get_option('facebook_url');
	$twitter_url = get_option('twitter_url');
	$linkedin_url = get_option('linkedin_url');
	$company_phone = get_option('company_phone');

	if ( $facebook_url || $twitter_url || $linkedin_url || $company_phone ) : ?>
		<div class="social-links">

			<?php if ( $facebook_url ) { ?>
				<a href="<?php echo $facebook_url; ?>">
					<?php flyspace_icon_facebook(); 
					esc_html_e('Facebook', 'flyspace') ?>
				</a>
			<?php } ?>
			<?php if ( $twitter_url ) { ?>
				<a href="<?php echo $twitter_url; ?>">
					<?php flyspace_icon_twitter(); 
					esc_html_e('Twitter', 'flyspace') ?>
				</a>
			<?php } ?>
			<?php if ( $linkedin_url ) { ?>
				<a href="<?php echo $linkedin_url; ?>">
					<?php flyspace_icon_linkedin(); 
					esc_html_e('LinkedIn', 'flyspace') ?>
				</a>
			<?php } ?>
			<?php if ( $company_phone ) { ?>
				<a href="tel:+1<?php echo $company_phone; ?>">
					<?php flyspace_icon_phone(); 
					echo $company_phone; ?>
				</a>
			<?php } ?>

		</div>

	<?php endif; ?>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$flyspace_description = get_bloginfo( 'description', 'display' );
			if ( $flyspace_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $flyspace_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php flyspace_icon_menu(); esc_html_e( 'Menu', 'flyspace' ); ?>
			</button>
			<div class="main-nav-drawer">
				<div class="menu-toggle-inside">
					<?php flyspace_icon_x(); 
					esc_html_e( ' Close ', 'flyspace' ); ?>
				</div>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu'
					) );
					?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
