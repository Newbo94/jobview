<?php

/**
 * Template Name: Tips & Tricks
 */

 ?>

<?php get_header(); ?>


<!-- Newsletter-->

<style>


.news-bg {
  background-image: linear-gradient(135deg, rgba(40,135,145,0.5) 0%,rgba(15,65,85,0.5) 99%), url("<?php bloginfo('template_directory'); ?>/image/newsletter-bg.jpg");
}



</style>



<div class="container top-offset-50">
<div class="row">
  <div class="heading">
  <span class="overline"></span>
  <h1>Tips og tricks til din jobsøgning</h1>
</div>
</div>

  <div class="row">
    <div class="col-lg-3 cat-link-single">

      <a href="    <?php the_field('link_til_kategori_')?>">

        <div class="pos-rel">
          <?php

  $image = get_field('cat-img_');

  if( !empty($image) ): ?>

  	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

  <?php endif; ?>
          <div class="overlay-col"></div>
          <h3 class="post-ab"><?php the_field('cat-title'); ?></h3>
          </div>
        </a>
    </div> <!-- cat-link-single -->


    <div class="col-lg-3 cat-link-single">

      <a href="    <?php the_field('link_til_kategori_2')?>">

        <div class="pos-rel">
          <?php

  $image = get_field('cat-img_2');

  if( !empty($image) ): ?>

    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

  <?php endif; ?>
          <div class="overlay-col"></div>
          <h3 class="post-ab"><?php the_field('kategori_title_2'); ?></h3>
          </div>
        </a>
    </div> <!-- cat-link-single -->

    <div class="col-lg-3 cat-link-single">

      <a href="    <?php the_field('link_til_kategori_3')?>">

        <div class="pos-rel">
          <?php

  $image = get_field('cat-img_3');

  if( !empty($image) ): ?>

    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

  <?php endif; ?>
          <div class="overlay-col"></div>
          <h3 class="post-ab"><?php the_field('kategori_title_3'); ?></h3>
          </div>
        </a>
    </div> <!-- cat-link-single -->



    <div class="col-lg-3 cat-link-single">

      <a href="    <?php the_field('link_til_kategori_4')?>">

        <div class="pos-rel">
          <?php

  $image = get_field('cat-img_4');

  if( !empty($image) ): ?>

    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

  <?php endif; ?>
          <div class="overlay-col"></div>
          <h3 class="post-ab"><?php the_field('kategori_title_4'); ?></h3>
          </div>
        </a>
    </div> <!-- cat-link-single -->



    <div class="col-lg-3 cat-link-single">

      <a href="    <?php the_field('link_til_kategori_5')?>">

        <div class="pos-rel">
          <?php

  $image = get_field('cat-img_5');

  if( !empty($image) ): ?>

    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

  <?php endif; ?>
          <div class="overlay-col"></div>
          <h3 class="post-ab"><?php the_field('kategori_title_5'); ?></h3>
          </div>
        </a>
    </div> <!-- cat-link-single -->



    <div class="col-lg-3 cat-link-single">

      <a href="    <?php the_field('link_til_kategori_6')?>">

        <div class="pos-rel">
          <?php

  $image = get_field('cat-img_6');

  if( !empty($image) ): ?>

    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

  <?php endif; ?>
          <div class="overlay-col"></div>
          <h3 class="post-ab"><?php the_field('kategori_title_6'); ?></h3>
          </div>
        </a>
    </div> <!-- cat-link-single -->



    <div class="col-lg-3 cat-link-single">

      <a href="    <?php the_field('link_til_kategori_7')?>">

        <div class="pos-rel">
          <?php

  $image = get_field('cat-img_7');

  if( !empty($image) ): ?>

    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

  <?php endif; ?>
          <div class="overlay-col"></div>
          <h3 class="post-ab"><?php the_field('kategori_title_7'); ?></h3>
          </div>
        </a>
    </div> <!-- cat-link-single -->



    <div class="col-lg-3 cat-link-single">

      <a href="    <?php the_field('link_til_kategori_8')?>">

        <div class="pos-rel">
          <?php

  $image = get_field('cat-img_8');

  if( !empty($image) ): ?>

    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

  <?php endif; ?>
          <div class="overlay-col"></div>
          <h3 class="post-ab"><?php the_field('kategori_title_8'); ?></h3>
          </div>
        </a>
    </div> <!-- cat-link-single -->


  </div> <!-- row -->
</div> <!-- container -->


<div class="container-fluid news-bg">
  <div class="row">
    <div class="col-lg-12">
      <?php if ( have_posts() ) : ?>
      	<?php while ( have_posts() ) : the_post(); ?>

          <div class="top-offset-50">
          <?php the_content(); ?>

          </div>
      	<!-- do stuff ... -->
      	<?php endwhile; ?>
      <?php endif; ?>

    </div>
  </div>
</div>



<?php get_footer(); ?>
