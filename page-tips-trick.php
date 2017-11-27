<?php

/**
 * Template Name: Tips & Tricks
 */

 ?>

<?php get_header();?>


<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();



		//
    $terms = get_terms([
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ]);

		//
	} // end while
} // end if
?>




<?php get_footer(); ?>
