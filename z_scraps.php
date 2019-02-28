<?php // Display three recent stories
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