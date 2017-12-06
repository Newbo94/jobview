<?php

/**
* Template Name: FAQ
*/

?>

<?php get_header(); ?>


<div class="container news-bg top-offset-50" id="faq-con">
  <div class="row">

    <div class="heading">
    <span></span>
      <h1>Her er de mest stillede spørgsmål</h1>
</div>
<div class="row">
    <?php
    $args = array( 'post_type' => 'FAQ', 'posts_per_page' => -1 );
    $the_query = new WP_Query( $args );
    ?>
    <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>



        <div class="col-xl-3 col-lg-4 col-md-6 feature-single top-offset-30" >
          <div class="thumbnail text-center">
            <?php the_post_thumbnail( 'medium' ); ?>
            <div class="panel-title caption">
                <h4>
              <?php the_title(); ?>
              </h4>
            </div>
          </div>

        <div class="feature-single-info top-offset-30" >
          <div class="feature-heading">
            <span></span>
            <h5> <?php the_field('q-heading') ?></h5>
            <p class="entry-content">  <?php the_content(); ?></p>
          </div>
        </div>
      </div><!--col-md-4-->


        <?php wp_reset_postdata(); ?>
      <?php endwhile; ?>
    <?php endif; ?>

  </div>
</div>
</div>







<?php get_footer(); ?>
