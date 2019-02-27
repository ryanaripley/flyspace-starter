<?php
/**
 * The template for displaying the Front Page
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
	<?php flyspace_hero_image(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; // End of the loop. ?>

    <?php
		$args = array(
			'posts_type' => 'post',
			'posts_per_page' => 3
		);
		$the_query = new WP_Query( $args );
		// The loop
		if ( $the_query->have_posts() ) : ?>

			<div class="front-page-news">
				<h2><?php echo __( 'Recent news', 'flyspace' ); ?></h2> 
				<ul class="grid-container grid-3">
				<?php 
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					get_template_part( 'template-parts/content', 'grid' );
				endwhile; ?>
				</ul>
			</div>
		
		<?php 
		endif;
		// Reset post data
		wp_reset_postdata();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
