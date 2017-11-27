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


	the_terms( $post->ID, 'tips&tricks', );
		//
	} // end while
} // end if
?>




<?php get_footer(); ?>
