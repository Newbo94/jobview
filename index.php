<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sf
 */

get_header(); ?>






<div id="primary" class="content-area container top-offset-50">
	<main id="main" class="site-main row">




		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>




				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<?php 			get_template_part( 'template-parts/content-card', get_post_format() );
 ?>
					<?php endwhile; ?>
				<?php endif; ?>




		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
