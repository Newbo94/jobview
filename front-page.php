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

      .full-wrapper{
        position: absolute;
        width: 100%
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
        width: 60%;
        font-size: 12px;
      }
      .swiper-container {
          width: 100%;

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

      #job-agent{
        background:/*-moz-linear-gradient(-45deg, rgba(30,87,153,0.4) 0%, rgba(40,135,145,0.4) 0%, rgba(135,205,185,0.4) 50%, rgba(252,177,35,0.4) 100%),
        -webkit-linear-gradient(-45deg, rgba(30,87,153,0.6) 0%, rgba(40,135,145,0.6) 0%, rgba(135,205,185,0.6) 50%, rgba(252,177,35,0.6) 100%),*/
        linear-gradient(-45deg, rgba(30,87,153,0.6) 0%, rgba(40,135,145,0.6) 0%, rgba(135,205,185,0.6) 50%, rgba(252,177,35,0.6) 100%),
        url("<?php echo get_template_directory_uri(); ?>/image/categorylist.png");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        width: 100%;
        height: 300px;
        position: relative;
    }

      #overlay-jobagent {
        position: absolute;
        height: 300px;
        background: linear-gradient(120deg, rgba(15,65,85,0.9) 0%,rgba(15,65,85,0.8) 65%,rgba(15,65,85,0) 65%);
        padding-left: -15px;
        margin-left: -15px;
      }



      .jb-fp-category-list{

      }

      .form-group {
        margin-bottom: 1rem;
        margin-top: 1rem;
      }

      .category-content{
        padding:15px;
        background-color: #ffffff;
        border: none;
        border-radius: 0;
        -webkit-box-shadow: 0px 3px 6px rgba(0,0,0,0.2);
        box-shadow: 0px 3px 6px rgba(0,0,0,0.2);

      }

      #category-container{
        padding: 25px 0 25px 0;
      }

      #w-jb-text{
        font-size: 34px;
        color: white;
      }

    </style>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/swiper.css">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_91mOsG6H_Ec2OwMPfwHF3jFRD1TGasM&callback=initMap"
    async defer></script>

  <!--   <script src="https://maps.googleapis.com/maps/api/js"></script> -->
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
<section class="container">
   <div class="row">
     <div id="jw-job-post-list" class="col-xs-12 col-sm-10 col-md-10 col-lg-9 top-offset-50">
       <div class="job-list swiper-container">
         <div class="col-lg-offset-1 col-lg-10 swiper-wrapper job-post-container">
         </div>
         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>
       </div>
     </div>
     </div><!--  row end -->
 </section><!-- job-list container END -->

 <!--   CATEGORY LIST SECTION  -->
 <section id="category-list" class="container-fluid top-offset-50" >
   <div id="category-container" class="container">
     <div class="row top-offset-50">
         <div class="heading">
         <span class="overline"></span>
           <h1>Mest søgte kategorier</h1>
       </div>
     </div>
     <div  class="row">
       <div class="jb-fp-category-list form-group col-md-4 col-sm-6 col-xs-12 ">
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
       <div class="jb-fp-category-list form-group col-md-4 col-sm-6 col-xs-12">
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
       <div class="jb-fp-category-list form-group col-md-4 col-sm-6 col-xs-12">
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
       <div class="jb-fp-category-list form-group col-md-4 col-sm-6 col-xs-12">
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
       <div class="jb-fp-category-list form-group col-md-4 col-sm-6 col-xs-12">
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
       <div class="jb-fp-category-list form-group col-md-4 col-sm-6 col-xs-12">
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
    <div class="row top-offset-50">
        <div class="heading">
        <span class="overline"></span>
          <h1>De nyeste nyheder i jobview</h1>
      </div>
    </div>
    <div class="container top-offset-30">

      <div class="row top-offset-30 col-lg-12">
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

  <!--   JOB AGENT SECTION  -->
  <section id="job-agent"  class="full-wrapper top-offset-50">
    <div id="overlay-jobagent">
      <div class="container">
        <div class="row top-offset-50">
          <div class="offset-md-2 col-md-4">
            <div class="heading">
              <span class="overline"></span>
                <h4 id="jw-jb-text" style="font-size: 34px; font-weight: 600; color: white;">Opret din job agent nu og få notifikation direkte på mobilen</h4>
                <button class="jw-btn-primary-cta top-offset-15">Opret jobagent</button>
            </div>
          </div>
        </div>
      </div>
    </div><!--  row end -->
  </section><!-- job agent container END -->

  <!--   FEATURED PARTNERS SECTION  -->
<section id="content-1-6" class="container content-1-6 content-block">

        <div class="row top-offset-50">
            <div class="heading">
            <span class="overline"></span>
              <h1>De nyeste nyheder i jobview</h1>
          </div>
        </div>

			<div class="row client-row">
				<div class="row-wrapper">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<img alt="client" src="images/partner-logos/logo-bootstrap.png" data-selector="img" style="outline: none; cursor: inherit;">
					</div>

					<div class="col-md-3 col-sm-6 col-xs-12">
						<img alt="client" src="images/partner-logos/logo-less.png" data-selector="img" style="outline: none; cursor: inherit;">
					</div>

					<div class="col-md-3 col-sm-6 col-xs-12">
						<img alt="client" src="images/partner-logos/logo-sass.png" data-selector="img" style="">
					</div>

					<div class="col-md-3 col-sm-6 col-xs-12">
						<img alt="client" src="images/partner-logos/logo-jquery.png" data-selector="img" style="">
					</div>
				</div>
			</div><!-- /.row -->

			<div class="row client-row">
				<div class="row-wrapper">
					<div class="col-md-3 hidden-sm hidden-xs">
						<img alt="client" src="images/partner-logos/logo-grunt.png" data-selector="img" style="outline: none; cursor: inherit;">
					</div>

					<div class="col-md-3 hidden-sm hidden-xs">
						<img alt="client" src="images/partner-logos/logo-bower.png" data-selector="img" style="outline: none; cursor: inherit;">
					</div>

					<div class="col-md-3 hidden-sm hidden-xs">
						<img alt="client" src="images/partner-logos/logo-yeoman.png" data-selector="img" style="outline: none; cursor: inherit;">
					</div>

					<div class="col-md-3 hidden-sm hidden-xs">
						<img alt="client" src="images/partner-logos/logo-angularjs.png" data-selector="img" style="outline: none; cursor: inherit;">
					</div>
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
