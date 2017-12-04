<?php
/**
* Template part for displaying posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package jobview
*/

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">



		<?php


		// Must be inside a loop.

		if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		}
		else {
			echo '<img src="' . get_bloginfo( 'stylesheet_directory' )
			. '/images/thumbnail-default.jpg" />';
		}
		?>

		<div class="ps-absoult meta-data">
			<div class="meta-data-text">
				<div class="author-meta">
					<p>
						Af:
						<?php the_author_meta( 'display_name' ); ?>, &nbsp; </p>
						<?php the_author_meta( 'description' ); ?>
					</div>

				<p>	<?php the_time('j/m/y g:i ') ?>

				</p>

			<?php

			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;


				if ( 'post' === get_post_type() ) : ?>
			</div> <!-- meta data text -->
		</div>

		
			<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'jobview' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jobview' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<div class="author-meta">
			<?php
$user = wp_get_current_user();

if ( $user ) :
	?>
	<img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
<?php endif; ?>

	<div class="author-meta-text">
			<p>
				Skrevet af: <br />
				<?php the_author_meta( 'display_name' ); ?><p>

				</p> <p>

				<?php the_author_meta( 'description' ); ?></p>
</div>
			</div>
		<footer class="entry-footer">
			<?php jobview_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-<?php the_ID(); ?> -->
