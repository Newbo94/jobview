<?php
/**
 * The template for displaying tips & tricks single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jobview
 */

get_header(); ?>

	<div id="co" class="content-area container top-offset-50">
		<main id="main" class="site-main ">
      <div class="col-lg-8">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('
        <p id="breadcrumbs">','</p>
        ');
        }
        ?>
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-single', get_post_type() );



			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
  </div> <!-- col-lg-8 -->


<?php
get_sidebar(); ?></main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
