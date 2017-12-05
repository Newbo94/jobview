<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package jobview
*/

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<style>


#content {

background-image: url("<?php echo get_template_directory_uri(); ?>/image/bg-element.png");
background-position: center;
background-size: cover;
background-repeat: repeat-y;




}

</style>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jobview' ); ?></a>

		<header id="masthead" class="site-header">
			<nav class="navbar  navbar-toggleable-md navbar-light bg-faded" role="navigation">

				<div class="container" id="bs-menu">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="logo-con">
						<button id="navbar-toggler" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
				<span class="hamburger-icon"></span>
			<span class="hamburger-icon"></span>
			<span class="hamburger-icon"></span>

			</button>
					<a class="navbar-brand" href="#"><?php the_custom_logo( $blog_id = 0 ) ?></a>
					</div>
					<?php
					wp_nav_menu( array(
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-example-navbar-collapse-1',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
						'walker'            => new WP_Bootstrap_Navwalker())
					);
					?>

				<div class="user-btn" style="text-align: left;">
					<button id="login" class="btn-type1" onclick="window.location.href='http://localhost:8888/jobview/wordpress/login/ '" onclick="window.location.href='http://localhost:8888/jobview/wordpress/register/'">LOGIN</button>
					<button id="register-user" class="btn-type2"  onclick="window.location.href='http://localhost:8888/jobview/wordpress/register/'">OPRET BRUGER</button>
				</div>
				</div>
			</nav>

		</header><!-- #masthead -->

		<div id="content" class="site-content">
