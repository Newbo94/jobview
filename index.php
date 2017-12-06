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



		<style>


		.news-bg {
			background-image: linear-gradient(135deg, rgba(40,135,145,0.5) 0%,rgba(15,65,85,0.5) 99%), url("<?php bloginfo('template_directory'); ?>/image/newsletter-bg.jpg");
		}



		</style>






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



	<div class="container-fluid news-bg top-offset-50">
		<div class="row" style="    padding: 50px 0px;">
			<div class="col-lg-12">

						<div class="top-offset-50">
						<script type="text/javascript">(function() {
		if (!window.mc4wp) {
			window.mc4wp = {
				listeners: [],
				forms    : {
					on: function (event, callback) {
						window.mc4wp.listeners.push({
							event   : event,
							callback: callback
						});
					}
				}
			}
		}
	})();
	</script><!-- MailChimp for WordPress v4.1.11 - https://wordpress.org/plugins/mailchimp-for-wp/ --><form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-21" method="post" data-id="21" data-name="Jobview newsletter" ><div class="mc4wp-form-fields"><span></span>

	<h2>
		Nyhedsbrevet med de bedste jobnyheder
	</h2>

	<h5>
		Gør ligesom tusinde andre jobsøgende og tilmeld dig
	</h5>


	<p>
		<div class="input-fi">


		<input class="input-em" type="email" name="EMAIL" placeholder="Indsæt Email" required />


		<input class="input-na" type="name" name="Navn" placeholder="Indsæt navn" required />

		<input class="input-se" type="submit" value="Tilmeld" />
				</div>
	</p>

	<label style="display: none !important;">Leave this field empty if you're human: <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1" autocomplete="off" /></label><input type="hidden" name="_mc4wp_timestamp" value="1511897545" /><input type="hidden" name="_mc4wp_form_id" value="21" /><input type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1" /></div><div class="mc4wp-response"></div></form><!-- / MailChimp for WordPress Plugin -->
						</div>
					<!-- do stuff ... -->

			</div>
		</div>
	</div>



<?php
 get_footer();
 get_sidebar();
