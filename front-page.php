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

      #category-list{
        background:/*-moz-linear-gradient(-45deg, rgba(30,87,153,0.4) 0%, rgba(40,135,145,0.4) 0%, rgba(135,205,185,0.4) 50%, rgba(252,177,35,0.4) 100%),
        -webkit-linear-gradient(-45deg, rgba(30,87,153,0.6) 0%, rgba(40,135,145,0.6) 0%, rgba(135,205,185,0.6) 50%, rgba(252,177,35,0.6) 100%),*/
        linear-gradient(-45deg, rgba(30,87,153,0.6) 0%, rgba(40,135,145,0.6) 0%, rgba(135,205,185,0.6) 50%, rgba(252,177,35,0.6) 100%),
        url("<?php echo get_template_directory_uri(); ?>/image/categorylist.png");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        width: 100%;
        height: 100%;
        position: relative;
    }

    .full-wrapper {
      background:/*-moz-linear-gradient(-45deg, rgba(30,87,153,0.4) 0%, rgba(40,135,145,0.4) 0%, rgba(135,205,185,0.4) 50%, rgba(252,177,35,0.4) 100%),
      -webkit-linear-gradient(-45deg, rgba(30,87,153,0.6) 0%, rgba(40,135,145,0.6) 0%, rgba(135,205,185,0.6) 50%, rgba(252,177,35,0.6) 100%),*/
      linear-gradient(-45deg, rgba(30,87,153,0.6) 0%, rgba(40,135,145,0.6) 0%, rgba(135,205,185,0.6) 50%, rgba(252,177,35,0.6) 100%),
      url("<?php echo get_template_directory_uri(); ?>/image/jobagent-bg.png");
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      width: 100%;
      height: 300px;
      position: relative;
    }
    </style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_91mOsG6H_Ec2OwMPfwHF3jFRD1TGasM&callback=initMap"
    async defer></script>

  <!--   <script src="https://maps.googleapis.com/maps/api/js"></script> -->
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/swiper.min.css">
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/markerclusterer.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jobviewmap.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/joblist.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/swiper.min.js"></script>




 </head>
<!--   MAP SECTION  -->
<section id="map-section" class="jw-fp-map container-fluid">

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
  <div class="row top-offset-50">

        <div class="heading">
        <span class="overline"></span>
          <h2>Her er nogle job forslag kun til dig</h2>
      </div>
      </div>
      </div>

      <div class="swiper-container top-offset-50">
         <div class="swiper-wrapper job-post-container">

         </div>
         <!-- Add Pagination -->
         <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
       </div>



 <style>
 }
    .swiper-container {
      width: 100%;
      height: 100%;
      padding-top: 30px;
    }
    .swiper-slide {

      font-size: 18px;
      background: #fff;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
      width: 60%;

 }

      .swiper-slide:first-child {
       margin-left: 10%;
     }



  </style>

  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 'auto',
      speed: 400,
      centeredSlides: true,
      spaceBetween: 30,
      navigation: {
       nextEl: '.swiper-button-next',
       prevEl: '.swiper-button-prev',
     }

    });
  </script>

 <!--   CATEGORY LIST SECTION  -->
 <section id="category-list" class="container-fluid" >
   <div id="category-container" class="container">
     <div class="">
         <div class="heading-white">
         <span class="overline"></span>
           <h1>Mest søgte kategorier</h1>
       </div>
     </div>
     <div  class="row">
       <div class="jb-fp-category-list form-group col-lg-4 col-md-6 col-sm-12 col-xs-12 ">
         <div class="category-content">
           <h4>Informationsteknolgi</h4>
          <ul class="list-group">
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Systemudvikling og programmering</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Økonomi- og virksomhedssystemer</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">IT-ledelse</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">IT-drift og support</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">webudvikling og drift (2)</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">IT-test -kvalitet og -sikkerhed</span></a></li>
          </ul>
         </div>
       </div>
       <div class="jb-fp-category-list form-group col-lg-4 col-md-6 col-sm-12 col-xs-12">
         <div class="category-content">
           <h4>Ledelse organisaiton HR</h4>
          <ul class="list-group">
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Personale og HR</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Topledelse og bestyrelse</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Ledelse</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Projektledelse</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Organisation og strategi</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Rekruttering</span></a></li>
          </ul>
         </div>
       </div>
       <div class="jb-fp-category-list form-group col-lg-4 col-md-6 col-sm-12 col-xs-12">
         <div class="category-content">
           <h4>Landbrug & håndværk</h4>
          <ul class="list-group">
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Bygge og anlæg</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Nærings- og nydelsesmiddel</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Elektriker</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Transport</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Jern og metal</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Træ- og møbelindustri</span></a></li>
          </ul>
         </div>
       </div>
       <div class="jb-fp-category-list form-group col-lg-4 col-md-6 col-sm-12 col-xs-12">
         <div class="category-content">
           <h4>Undervisning vejledning</h4>
          <ul class="list-group">
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Pædagog</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Lærer</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Forskning og undervisning</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Voksenuddannelse</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Fritid og idræt</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Uddannelses- og jobrådgivning</span></a></li>
          </ul>
         </div>
       </div>
       <div class="jb-fp-category-list form-group col-lg-4 col-md-6 col-sm-12 col-xs-12">
         <div class="category-content">
           <h4>Social sundhed</h4>
          <ul class="list-group">
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Læge</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Sygeplejerske og jordemoder</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Terapi og genoptræning</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Pleje og omsorg</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Tandlæge og klinikassistent</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Psykologi og psykiatri</span></a></li>
          </ul>
         </div>
       </div>
       <div class="jb-fp-category-list form-group col-lg-4 col-md-6 col-sm-12 col-xs-12">
         <div class="category-content">
           <h4>Ingeniør natur teknik</h4>

          <ul class="list-group">
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Bygge- og anlægsteknik</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Medico og levnedsmiddel</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Elektroteknik</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Ledelse indenfor ingeniør og teknik</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Produktions- og procesteknik</span></a></li>
            <li class="category-item"><a href="<?php get_page_link(127); ?>"><span class="list1">Miljø energi og klima</span></a></li>
          </ul>
         </div>
       </div>
     </div>
     </div><!--  row end -->
</section>

  <!--   NEWS SECTION  -->
  <section class="container">
    <div class="top-offset-50">
        <div class="heading">
        <span class="overline"></span>
          <h1>De nyeste nyheder i jobview</h1>
      </div>
    </div>
    <div class="container">

      <div class="row  row-post">
        <?php
				$args = array( 'post_type' => 'post', 'posts_per_page' => -3 );
				$the_query = new WP_Query( $args );
				?>
				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


						<?php 			get_template_part( 'template-parts/content-post', get_post_format() );
			?>


						<?php wp_reset_postdata(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
      </div>
    </div><!--  row end -->
  </section><!-- news container END -->





<div class="full-wrapper d-flex align-items-center top-offset-50">
<div class="container ">
  <div class="row">
    <div class="col-lg-4">
      <div class="heading">
      <span class="overline"></span>
        <h2>Opret din job agent
nu og få notifikation direkte på mobilen</h2>
    </div>

      <button class="jw-btn-primary-cta" id="myBtn">Open Modal</button>
    </div>
  </div>
</div>
</div> <!-- fullwrapper -->


  <!-- The Modal -->
  <div id="myModal" class="modal ">
    <!-- Modal content -->
    <div class="container">
    <div class="modal-content row">
      <div class="col-lg-9">
        <div class="heading">
        <span class="overline"></span>
          <h2>Opret din jobagent</h2>
            <span class="close">&times;</span>

          <h3>Bruger</h3>
          <input type="email" placeholder="E-mail" required>
          <h3>Søgeparemetere</h3>
          <input type="text" placeholder="Område">
          <input type="text" placeholder="Jobkategorier">
          <input type="text" placeholder="Søgeord">
          <input type="text" placeholder="Virksomhed">

          <input type="checkbox"> <span><p>
            Aktiver Jobagent for denne søgning
Med Jobagenten får du tilsendt de nye job, der matcher din søgning - hver dag
          </p></span>

          <input type="checkbox"> <span><p>
        Tilmed jobviews nyhedsbrev
          </p></span>

          <button class="jw-btn-primary-cta close">Gem jobagent</button>


      </div>
    </div> <!-- col-lg-9 -->
    </div> <!-- modal-content -->
  </div> <!-- container -->
  </div> <!-- #myModal -->






  <!--   FEATURED PARTNERS SECTION  -->
<section id="content-1-6" class="container content-1-6 content-block">
        <div class="top-offset-50">
            <div class="heading">
            <span class="overline"></span>
              <h1>Partners hos jobview</h1>
          </div>
        </div>

			<div class="row client-row">
				<div class="row">
					<div class="col-md-3 col-sm-4 col-xs-6 d-flex justify-content-center top-offset-30">
            <?php

    $image = get_field('partner_logo_1');

    if( !empty($image) ): ?>

    	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

    <?php endif; ?>

          </div>
          <div class="col-md-3 col-sm-4 col-xs-6 d-flex justify-content-center top-offset-30">
            <?php

    $image = get_field('partner_logo_2');

    if( !empty($image) ): ?>

      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

    <?php endif; ?>

          </div>
          <div class="col-md-3 col-sm-4 col-xs-6 d-flex justify-content-center top-offset-30" >
            <?php

    $image = get_field('partner_logo_3');

    if( !empty($image) ): ?>

      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

    <?php endif; ?>

          </div>
          <div class="col-md-3 col-sm-4 col-xs-6 d-flex justify-content-center top-offset-30">
            <?php

    $image = get_field('partner_logo_4');

    if( !empty($image) ): ?>

      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

    <?php endif; ?>

          </div>
          <div class="col-md-3 col-sm-4 col-xs-6 d-flex justify-content-center top-offset-30">
            <?php

    $image = get_field('partner_logo_5');

    if( !empty($image) ): ?>

      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

    <?php endif; ?>

          </div>
          <div class="col-md-3 col-sm-4 col-xs-6 d-flex justify-content-center top-offset-30">
            <?php

    $image = get_field('partner_logo_6');

    if( !empty($image) ): ?>

      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

    <?php endif; ?>

          </div>
          <div class="col-md-3 col-sm-4 col-xs-6 d-flex justify-content-center top-offset-30">
            <?php

    $image = get_field('partner_logo_7');

    if( !empty($image) ): ?>

      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

    <?php endif; ?>

          </div>
          <div class="col-md-3 col-sm-4 col-xs-6 d-flex justify-content-center top-offset-30">
            <?php

    $image = get_field('partner_logo_8');

    if( !empty($image) ): ?>

      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

    <?php endif; ?>

          </div>




        </div><!--  row end -->
      </div><!-- featured partners container END -->


</section>

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

<script>
var swiper = new Swiper('.swiper-container', {
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

</script>

<?php get_footer(); ?>
