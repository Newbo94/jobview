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
	<main id="main" class="site-main ">


		<header class="page-header">
			<span class="overline"></span>

				<h1>Bloggen for jobsøgende</h1>




<div class="row">

	<div class="cat-link">
		<?php
	$categories = get_categories( array(
	    'orderby' => 'name',
	    'order'   => 'ASC'
	) );

	foreach( $categories as $category ) {
	    $category_link = sprintf(
	        '<a href="%1$s" alt="%2$s">%3$s</a>',
	        esc_url( get_category_link( $category->term_id ) ),
	        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
	        esc_html( $category->name )
	    );

	    echo '<p>' . sprintf( esc_html__( 'Kategorier: %s', 'textdomain' ), $category_link ) . '</p> ';

	}
		?>
	</div>

</div>




 <!-- YOAST SEO breadcrumbs -->

		<div class="row">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('
			<p id="breadcrumbs">','</p>
			');
			}
			?>
		</div>


</header>




			<div class="row">





				<?php
				$args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
				$the_query = new WP_Query( $args );
				?>
				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


						<?php 			get_template_part( 'template-parts/content-post', get_post_format() );
			?>


						<?php wp_reset_postdata(); ?>
					<?php endwhile; ?>
				<?php endif; ?>



		</main><!-- #main -->
	</div><!-- #primary -->


<?php
 get_footer();
 get_sidebar();
