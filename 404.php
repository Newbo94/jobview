<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<div class="site-content row" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( '404', 'Jobview' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">

					<h4><?php _e( 'Øv! noget gik galt.. Vend tilbage til forrige side eller kontakt support', 'jobview' ); ?></h4>

<div class="top-offset-30 d-flex justify-content-center call-btn">

<button  class="btn-type1 btn-typ3" onclick="goBack()">Tilbage</button>
<script>
function goBack() {
    window.history.back();
}
</script>
<button  class="btn-type1" onclick="window.location.href='http://localhost:8888/jobview/wordpress/kontakt/ '">Kontakt</button>

</div>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- site-content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
