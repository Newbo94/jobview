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
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jobview' ); ?></a>

		<header id="masthead" class="site-header">
			<nav class="navbar  navbar-toggleable-md navbar-light bg-faded" role="navigation">
				<button id="navbar-toggler" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
				<div class="container" id="bs-menu">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="logo-con">
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

				<div class="" style="text-align: right;">
					<button id="login" class="btn-type1">LOGIN</button>
					<button id="register-user" class="btn-type2">OPRET BRUGER</button>
				</div>
				</div>
			</nav>

		</header><!-- #masthead -->

		<div id="content" class="site-content">
