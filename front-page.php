<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jobview
 */

get_header(); ?>

    <style>

      #map-container {

        width: 100%;
      }
      #map {
        width: 100%;
        height: 80vh;
        position: absolute;
        z-index: -1;
      }
      #actions {
        list-style: none;
        padding: 0;
      }

      .jw-fp-map{
        padding:0;

      }

      #jw-fp-mapcontent{

        position: absolute;
        z-index: 10;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 60%;
      }

      #overlay {
        position: relative;
        width: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(40,135,145,0.6);
        z-index: 5;

      }

      #jw-fp-maptext p{
        color: #ffffff;


      }

      #jw-fp-maptext h1{
        color: #ffffff
      }
      .jw-search-icon{
        background-image: url("<?php echo get_template_directory_uri(); ?>/icons/search.png");
      }

      #jw-map-search {
        border-radius: 100px;
        border-style: none;
        padding: 12px 15px;
        width: 50%;
        font-size: 12px;
      }


    </style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_91mOsG6H_Ec2OwMPfwHF3jFRD1TGasM&callback=initMap"
    async defer></script>
  <!--   <script src="https://maps.googleapis.com/maps/api/js"></script> -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/markerclusterer.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jobviewmap.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/joblist.js"></script>

 </head>
<!--   MAP SECTION  -->
<section id="MAP-SECTION" class="jw-fp-map container-fluid">

       <div class="row" style="margin-left:0; margin-right:0;">
         <div id="map">
         </div>
          <div id="overlay">
       </div>
       <div id="jw-fp-mapcontent" class="col-lg-12 text-center">


       <div id="jw-fp-maptext">

         <h1>Tryk på kortet eller brug søgefeltet</h1>
         <p>Søg mellem mere end <span>12.535</span> jobs i hele Danmark</p>
         </div>
         <form>
       <input id="jw-map-search" type="search" placeholder="Stillingsbetegnelse, kvalifikation, lokation, postnummer, land eller lign…" name="search">
     </form> <span class="jw-search-icon"></span>

     </div>
     <!--  row end -->
   </div>
 </section>

 <!--   JOB POST SLIDER SECTION  -->
 <div class="container">
   <div class="row">
     <div id="jw-job-post-list" class="col-xs-12 col-sm-10 col-md-10 col-lg-9 top-offset-50">
       <div class="job-list">
         <div class="col-md-12 job-post-container">
         </div>
       </div>
     </div>
     </div><!--  row end -->
 </div><!-- job-list container END -->

 <!--   CATEGORY LIST SECTION  -->
 <div class="container">
   <div class="row">
     <div id="" class="top-offset-50">
       <div class="">
         <div class="">
         </div>
       </div>
     </div>
     </div><!--  row end -->
 </div><!-- category list container END -->

  <!--   NEWS SECTION  -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php
        $args = array( 'post_type' => 'Tips & Tricks', 'posts_per_page' => 3 );
        $the_query = new WP_Query( $args );
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
                <span></span>
                <h5> <?php the_field('q-heading') ?></h5>
                <p class="entry-content">  <?php the_content(); ?></p>
              </div>
            </div>
          </div><!--col-md-4-->


            <?php wp_reset_postdata(); ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div><!--  row end -->
  </div><!-- news container END -->

  <!--   JOB AGENT SECTION  -->
  <div class="container-fluid">
    <div class="row">

    </div><!--  row end -->
  </div><!-- job agent container END -->

  <!--   FEATURED PARTNERS SECTION  -->
  <div class="container">
    <div class="row">

    </div><!--  row end -->
  </div><!-- featured partners container END -->

<script>
var offsetHeight = document.getElementById('map').offsetHeight;
document.getElementById('overlay').style.height = offsetHeight+'px';
</script>

<script>
jQuery('#overlay').on('click', function(){
document.getElementById("overlay").style.display = "none",
document.getElementById("jw-fp-maptext").style.display = "none";
document.getElementById("jw-fp-mapcontent").style.left = "20%";
document.getElementById("jw-fp-mapcontent").style.top ="80%";
document.getElementById("map").style.position ="relative";
document.getElementById("map").style.zIndex ="1";
});
</script>

<?php get_footer(); ?>
