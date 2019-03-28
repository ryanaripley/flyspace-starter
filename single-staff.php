<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flyspace
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

      $bg_default = get_template_directory_uri() . "/svg/background.svg";
      $bg_large = get_the_post_thumbnail_url( 'hero_large' ) ? get_the_post_thumbnail_url( 'hero_large' ) : $bg_default;
      $bg_small = get_the_post_thumbnail_url( 'hero_small' ) ? get_the_post_thumbnail_url( 'hero_small' ) : $bg_default;

      $staff_title = get_field( 'batten_title' );
      $staff_bio = get_field( 'batten_bio' );
      $staff_photo = get_field( 'batten_photo' );
      $staff_phone = get_field( 'batten_phone' );
      $staff_linkedin = get_field( 'batten_linkedin' );
      $staff_twitter = get_field( 'batten_twitter' );
      $staff_facebook = get_field( 'batten_facebook' );

      ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="site-hero entry-header" data-hero-large="<?php echo $bg_large ?>" data-hero-small="<?php echo $bg_small; ?>">
				<div class="hero-mask">
					<div class="hero-text">
						<?php if ( is_front_page() ) :
							echo '<h1 class="hero-headline blog-description">' . get_bloginfo( 'description', 'display' ) . '</h1>';
						else :
							the_title( '<h1 class="hero-headline">', '</h1>' ); 
						endif; ?>
            <?php if ( $staff_title ) { ?>
              <div class="hero-subheading"><?php echo $staff_title; ?></div>
            <?php }; ?>
					</div>
				</div>
			</header><!-- .site-hero -->

        <?php //flyspace_post_thumbnail(); ?>

        <div class="entry-content staff-page-content">
          <?php if ( $staff_photo ) { ?>
            <figure class="staff-photo">
              <img src="<?php echo $staff_photo['url']; ?>" alt="<?php echo $staff_photo['alt']; ?>">
            </figure>
          <?php }; ?>
          <?php if ( $staff_bio ) { ?>
            <div class="staff-bio"><?php echo $staff_bio; ?></div>
          <?php }; ?>
          
          <?php 
          wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'flyspace' ),
            'after'  => '</div>',
          ) );
          ?>
        </div><!-- .entry-content -->

      </article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
