<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jobview
 */

get_header(); ?>

<style>


.news-bg {
  background-image: linear-gradient(135deg, rgba(40,135,145,0.5) 0%,rgba(15,65,85,0.5) 99%), url("<?php echo esc_url( get_template_directory_uri() ); ?>/image/newsletter-bg.jpg");
}



</style>







<!-- Post Section -->


	<div id="primary" class="content-area container top-offset-50">
		<main id="main" class="site-main row">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<span class="overline"></span>
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' )

				?>

<!-- Henter Custom taxonomy tips-tricks-cat som links -->

<?php
				$terms = get_terms( 'tips-tricks-cat' );

				echo '<div class="cat-link">

				<p>
				Katergorier:
				</p>&nbsp<p>';

				foreach ( $terms as $term ) {

				    // The $term is an object, so we don't need to specify the $taxonomy.
				    $term_link = get_term_link( $term );

				    // If there was an error, continue to the next term.
				    if ( is_wp_error( $term_link ) ) {
				        continue;
				    }

				    // We successfully got a link. Print it out.
				    echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>, &nbsp';
				}

				echo '</p></div>';

				?>

        <div class="row">
        	<?php
        	if ( function_exists('yoast_breadcrumb') ) {
        	yoast_breadcrumb('
        	<p id="breadcrumbs">','</p>
        	');
        	}
        	?>
        </div>

			</header><!-- .page-header -->




			<div class="row row-post">



			<?php


			/* Start the Loop */
			while ( have_posts() ) : the_post();



if(is_archive())
    // write your code here ...

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-post', get_post_format() );



			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );?>
</div> <!-- row -->
<?php 	endif; ?>
</div>
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
get_sidebar();
get_footer();
