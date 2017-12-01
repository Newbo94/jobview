<?php

/**
* Template Name: FAQ
*/

?>

<?php get_header(); ?>


<div class="container news-bg" id="faq-con">
  <div class="row">

    <div class="heading">
    <span></span>
      <h1>Her er de mest stillede spørgsmål</h1>
</div>
<div class="row">
    <?php
    $args = array( 'post_type' => 'FAQ', 'posts_per_page' => 10 );
    $the_query = new WP_Query( $args );
    ?>
    <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>



        <div class="col-md-3 feature-single" data-feature="1" >
          <div class="thumbnail text-center">
            <?php the_post_thumbnail( 'medium' ); ?>
            <h4 class="panel-title caption">
              <?php the_title(); ?>
            </h4>
          </div>
        </div><!--col-md-4-->



        <div class="feature-single-info bg-softblue" id="205" style="display: block;">
          <div class="feature-heading">
            <h5> Answer</h5>
            <p class="entry-content">  <?php the_content(); ?></p>
          </div>
        </div>

        <?php wp_reset_postdata(); ?>
      <?php endwhile; ?>
    <?php endif; ?>

  </div>
</div>
</div class="row">

<script type="text/javascript">

jQuery(document).ready(function( $ ) {

  $(".feature-single-info ").hide();
  $(".feature-single" ).click(function () {
    $(this).next(".feature-single-info ").slideToggle(500);
    $(this).toggleClass("expanded");
  });


});
</script>


<?php get_footer(); ?>
