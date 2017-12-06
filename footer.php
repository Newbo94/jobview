<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jobview
 */

?>

	</div><!-- #content -->


<div class="bg-color">
	<footer id="colophon" class="site-footer container">

		<div class="site-info row top-offset-50">


			<div id="footer-sidebar1" class="col-lg-3 col-md-6">

			<?php
if(is_active_sidebar('footer-sidebar-1')){
dynamic_sidebar('footer-sidebar-1');
}
?>
</div>


<div id="footer-sidebar2" class="col-lg-3 col-md-6">
<?php
if(is_active_sidebar('footer-sidebar-2')){
dynamic_sidebar('footer-sidebar-2');
}
?>
</div>



<div id="footer-sidebar3" class="col-lg-3 col-md-6">
<?php
if(is_active_sidebar('footer-sidebar-3')){
dynamic_sidebar('footer-sidebar-3');
}
?>
</div>


<div id="footer-sidebar4" class="col-lg-3 col-md-6">
<?php
if(is_active_sidebar('footer-sidebar-4')){
dynamic_sidebar('footer-sidebar-4');
}
?>
</div>


		</div><!-- .site-info -->
	</footer><!-- #colophon -->
<div class="site-end d-flex justify-content-center">
	<p>
		&copy; <?php echo date('Y'); ?> Jobview.dk 
	</p>
</div>


</div> <!-- bg-color -->
</div><!-- #page -->




<?php wp_footer(); ?>

</body>
</html>
