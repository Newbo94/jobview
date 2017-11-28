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

      <ul><?php echo get_the_term_list( $post->ID, 'mycategories', '<li class="jobs_item">', ', ', '</li>' ) ?></ul>


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
