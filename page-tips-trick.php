<?php

/**
 * Template Name: Tips & Tricks
 */

 ?>

<?php get_header(); ?>


<!-- Newsletter-->

<style>

.news-bg {
  background-image: url("<?php bloginfo('template_directory'); ?>/image/newsletter-bg.png");
  background-position: center;
  background-repeat: no-repeat;
background-size: cover;
height: 450px;
justify-content: center;
    display: flex;
    align-items: center;
}



</style>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <!-- Henter Custom taxonomy tips-tricks-cat som links -->

      <?php
      				$terms = get_terms( 'tips-tricks-cat' );

      				echo '<div class="cat-link">

      				<h3>';

      				foreach ( $terms as $term ) {

      				    // The $term is an object, so we don't need to specify the $taxonomy.
      				    $term_link = get_term_link( $term );

      				    // If there was an error, continue to the next term.
      				    if ( is_wp_error( $term_link ) ) {
      				        continue;
      				    }

      				    // We successfully got a link. Print it out.
      				    echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
      				}

      				echo '</h3></div>'; ?>


    </div>
  </div>
</div>


<div class="container-fluid news-bg">
  <div class="row">
    <div class="col-lg-12">
      <?php if ( have_posts() ) : ?>
      	<?php while ( have_posts() ) : the_post(); ?>

          <div class="top-offset-50">
          <?php the_content(); ?>
          </div>
      	<!-- do stuff ... -->
      	<?php endwhile; ?>
      <?php endif; ?>

    </div>
  </div>
</div>



<?php get_footer(); ?>
