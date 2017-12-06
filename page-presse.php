<?php

/**
* Template Name: Presse
*/

?>

<?php get_header(); ?>


<div class="container press-section press-page">
    <span class="overline"></span>
    <h1>Presseoplæg</h1>

    <?php $args = array( 'post_type' => 'presse', 'posts_per_page' => -1 );
    $the_query = new WP_Query( $args ); ?>
    <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="row press-single">
                <div class="col-xl-2 col-md-3 col-4">
                    <?php the_post_thumbnail(); ?>
                </div><!--col-md-2-->

                <div class="col-xl-10 col-md-9 col-8 d-flex align-items-center">
                    <h3><a href="<?php the_field('press_links'); ?>"><?php the_title(); ?></a></h3>
                </div><!--col-md-10-->
            </div><!--row-->
            <?php wp_reset_postdata(); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div><!--container-->


<?php get_footer(); ?>
