<?php

/**
 * Template Name: Contact
 */

 ?>

<?php get_header(); ?>

<div class="container">
    <!-- KONTAKT SEKTION -->
    <div class="contactsection top-offset-50">
      <span class="overline"></span>
        <h1><?php the_field('contact_heading'); ?></h1>

        <div class="row top-offset-30">
            <div class="col-lg-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2265.5741417671584!2d10.38694701591689!3d55.40033558046054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x464cdfff36caefcb%3A0x4c76560ba9b75ed7!2sN%C3%B8rregade+71%2C+5000+Odense+C!5e0!3m2!1sda!2sdk!4v1512044925384" width="600" height="450" frameborder="0" style="border:0" allowfullscreen class="hr-lokation"></iframe>
            </div><!--col-md-6-->

            <div class="col-lg-6 d-flex align-items-center">
                <div class="contactsupport">
                    <div class="row kundesupport">
                        <div class="col-xl-3 col-lg-4 col-md-3 col-4 d-flex align-items-center">
                            <?php $image = get_field('kundesupport_img');
                            if( !empty($image) ): ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>
                        </div><!--col-md-4-->

                        <div class="col-xl-9 col-lg-8 col-md-9 col-8 support-text">
                            <h3>Kunde support</h3>
                            <p><?php the_field('kundesupport_adress'); ?><br>
                            <?php the_field('kundesupport_city'); ?><br>
                            <?php the_field('kundesupport_number'); ?><br>
                            <?php the_field('kundesupport_mail'); ?></p>
                        </div><!--sol-md-8-->
                    </div><!--kundesupport-->

                    <div class="row tekniksupport top-offset-50">
                        <div class="col-xl-3 col-lg-4 col-md-3 col-4 d-flex align-items-center">
                            <?php $image = get_field('tekniksupport_img');
                            if( !empty($image) ): ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>
                        </div><!--col-md-4-->

                        <div class="col-xl-9 col-lg-8 col-md-9 col-8 support-text">
                            <h3>Teknik support</h3>
                            <p><?php the_field('tekniksupport_adress'); ?><br>
                            <?php the_field('tekniksupport_city'); ?><br>
                            <?php the_field('tekniksupport_number'); ?><br>
                            <?php the_field('tekniksupport_mail'); ?></p>
                        </div><!--col-md-8-->
                    </div><!--tekniksupport-->
                </div><!--contactupport-->
            </div><!--col-md-6-->
        </div><!--row-->
    </div><!--contactsection-->

    <!-- FAQ SEKTION -->
    <div class="faqsection top-offset-50">
        <span class="overline"></span>
        <h2>Mangler du hurtig hjælp, check FAQ</h2>

        <div class="row">

        <?php
        $the_query = new WP_Query( array(
    'post_type' => 'FAQ',
    'tax_query' => array(
        array (
            'taxonomy' => 'FAQ-cat',
            'terms' => 'top-6',
        )
    ),
) );

        ?>
        <?php if ( $the_query->have_posts() ) : ?>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>



            <div class="col-xl-3 col-lg-4 col-md-6 feature-single top-offset-30" >
              <div class="thumbnail text-center">
                <?php the_post_thumbnail( 'medium' ); ?>
                <div class="panel-title caption">
                    <h4>
                  <?php the_title(); ?>
                  </h4>
                </div>
              </div>

            <div class="feature-single-info bg-softblue top-offset-30" >
              <div class="feature-heading">
                <span class="overline"></span>
                <h5> <?php the_field('q-heading') ?></h5>
                <p class="entry-content">  <?php the_content(); ?></p>
              </div>
            </div>
          </div><!--col-md-4-->


            <?php wp_reset_postdata(); ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div> <!-- row -->
    </div><!--faqsection-->
</div><!--container-->


<script type="text/javascript">

jQuery(document).ready(function( $ ) {

  $(".feature-single").toggle(
    function () {
      $(this).addClass("hovered");
    },
    function () {
      $(this).removeClass("hovered");
    }
  );





});



</script>


<?php get_footer(); ?>
