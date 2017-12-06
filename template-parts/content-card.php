<?php
/**
* Template part for displaying posts as card
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package jobview
*/

?>


<article  class="col-lg-4 top-offset-30 " id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="article-card" id="article-card">
    <header class="entry-header">
      <div class="header-img-con">
        <div class="header-img-overlay">

        </div>
      <div class="header-img">
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
      </div>

</div>

      <div class="ps-absoult meta-data">
        <div class="meta-data-text">
          <div class="author-meta">
            <div class="author-meta">
              <?php
              $user = wp_get_current_user();

              if ( $user ) :
                ?>
                <img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" />
              <?php endif; ?>
            </div> <!-- author-meta -->
          </div> <!-- author-meta -->

            <div class="bg-overlay">
          <p>	<?php the_time('j/m/y') ?></p>
        </div> <!-- bg-overlay -->

        </header><!-- .entry-header -->

        <div class="entry-content">
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
      <?php
      the_excerpt()
      ?>
    </div><!-- .entry-content -->
  </div>


</article><!-- #post-<?php the_ID(); ?> -->
