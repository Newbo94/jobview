<?php

/**
 * Template Name: FAQ
 */

 ?>

<?php get_header(); ?>




<div class="container-fluid news-bg">
  <div class="row">
    <div class="col-lg-12">

<?php
  $args = array( 'post_type' => 'FAQ', 'posts_per_page' => 10 );
  $the_query = new WP_Query( $args );
  ?>
  <?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


<div class="row all-features">

                <div class="col-md-3 feature-single" data-feature="1" style="height: 123px;">
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="#205">
                              <div class="thumbnail text-center">
                              <?php the_post_thumbnail( 'medium' ); ?>
                              <h4 class="panel-title caption">
                                  <span><?php the_title(); ?></span>
                              </h4>
                              </div>
                            </div><!--col-md-4-->

                        <div class="col-xs-8">
                            <a href="#205">
                        </div><!--col-md-8-->
                    </div><!--row-->
                </div><!--col-md-4-->
            <!-- Single feature sections -->
</div>

<div class="feature-single-info bg-softblue" id="205" style="display: block;">
                        <div class="container">
                            <div class="feature-heading">
                              <h5><span class="label">Answer</span></h5>
                             <p class="entry-content">  <?php the_content(); ?></p>
                          </div>
                        </div><!--container-->
                    </div>


    <!--/panel-group-->
</div>
</div>
</div>
</div>

<script>
$( "#question0" ).toggle(
function() {
  $( this ).addClass( "selected" );
}, function() {
  $( this ).removeClass( "selected" );
}
);
</script>

<?php wp_reset_postdata(); ?>
<?php endwhile; ?>
<?php endif; ?>



<?php get_footer(); ?>
