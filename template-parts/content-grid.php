<?php
/**
 * Template part for displaying slats
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flyspace
 */

?>

<li class="grid-item">

  <div class="grid-image">
    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
        <?php
      the_post_thumbnail( 'small', array(
        'alt' => the_title_attribute( array(
          'echo' => false,
          ) ),
          ) );
          ?>
    </a>
  </div>

  <div class="grid-info">
    
		<?php
			the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				flyspace_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php
		the_excerpt( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'flyspace' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
    ) ); ?>
  
  </div>

</li><!-- .grid-item; -->
