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
  <div class="article-card">
    <header class="entry-header">
      <div class="header-img-overlay">

      </div>
      <div class="header-img">
        <?php
        // Must be inside a loop.

        if ( has_post_thumbnail() ) {
          the_post_thumbnail();
        }
        else {
          echo '<img src="' . get_stylesheet_directory_uri()
          . '/images/thumbnail-default.jpg" />';
        }
        ?>
      </div> <!-- header-img -->
      <div class="ps-absoult meta-data">
        <div class="meta-data-text">
          <div class="author-meta">
            <div class="author-meta">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
            </div> <!-- author-meta -->
          </div> <!-- author-meta -->


          <div class="bg-overlay">
            <p>	<?php the_time('j/m/y') ?></p>
          </div> <!-- bg-overlay -->
        </div>
            </div>
        </header><!-- .entry-header -->

        <div class="entry-content">
          <?php

          if ( is_singular() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
            else :
              the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;


            if ( 'post' === get_post_type() ) : ?>




            <?php
          endif; ?>
          <?php
          the_excerpt()
          ?>
        </div> <!-- entry-content -->
      </div> <!-- meta-data-text -->
    </article><!-- #post-<?php the_ID(); ?> -->
