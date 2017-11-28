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
		<div class="site-branding">


<nav id="main-navigation" class="navigation" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header row">
			<div class="navbar-logo col-lg-3" href="<?php echo home_url(); ?>">
				<?php
				the_custom_logo();
				?>
				</div>
  <!--<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_s' ); ?></a>-->
				<div class="col-lg-6">
				  <?php wp_nav_menu( array(
				  	'theme_location' 	  => 'primary',
				  	'container' 		    => 'div',
				  	'container_class' 	=> 'navbar',
				  	'container_id'    	=> 'main-navbar',
				  	'menu_class'      	=> 'nav navbar-nav',
				  	'menu_id'         	=> '',
				  	'echo'            	=> true,
				  	'fallback_cb'     	=> 'wp_page_menu',
				  	'before'          	=> '',
				  	'after'           	=> '',
				  	'link_before'     	=> '',
				  	'link_after'      	=> '',
				  	'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
				  	'depth'           	=> 0,
				  	'walker'          	=> ''
				    )); ?>
  			</div>
				<div class="col-lg-3">
					<button id="login" class="btn-type" style="width:160px; height:55px; border-radius: 30px;">LOGIN</button>
					<button id="register-user" class="btn-type" style="width:215px; height:55px; border-radius: 30px;">OPRET BRUGER</button>
				</div>
			</div>
		</div>
</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
