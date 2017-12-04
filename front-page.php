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
        height: 100vh;
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

      .jw-fp-maptext{
        position: relative;
        top: 50%;
        left: 50%;
        font-size: 50px;
        color: white;
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);

          margin-top: 350px;
          }

      #overlay {

        width: 100%; /* Full width (cover the whole page) */

        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(40,135,145,0.6); /* Black background with opacity */
        z-index: 5; /* Specify a stack order in case you're using a different order for other elements */
        cursor: pointer; /* Add a pointer on hover */
      }

      #jw-fp-maptext h1, p{
        color: #ffffff;
      }

      .jw-search-icon{
        background-image: url("/icons/jw-search.png");
      }

      #jw-map-search {
        border-radius: 100px;
        border-style: none;
        padding: 12px 15px;
        width: 30%;
        font-size: 12px;
      }


    </style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_91mOsG6H_Ec2OwMPfwHF3jFRD1TGasM&callback=initMap"
    async defer></script>
  <!--   <script src="https://maps.googleapis.com/maps/api/js"></script> -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/markerclusterer.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jobviewmap.js"></script>

 </head>
<!--   MAP SECTION  -->
<section id="" class="jw-fp-map container-fluid">
     <div id="overlay">
       <div class="row" style="margin-left:0; margin-right:0;">
         <div id="map">
         </div>
           <div id="jw-fp-maptext" class="col-lg-12 text-center">
             <h1>Tryk på kortet eller brug søgefeltet</h1>
             <p>Søg mellem mere end <span>12.535</span> jobs i hele Danmark</p>
             <form>
           <input id="jw-map-search" type="search" placeholder="Stillingsbetegnelse, kvalifikation, lokation, postnummer, land eller lign…" name="search">
         </form> <span class="jw-search-icon"></span>
       </div>
     </div>
     <!--  row end -->
   </div>
 </section>

 <!--   JOB POST SLIDER SECTION  -->
 <div class="container">
   <div class="row">

   </div>
   <!--  row end -->
 </div>

  <!--   NEWS SECTION  -->
  <div class="container">
    <div class="row">

    </div>
    <!--  row end -->
  </div>

  <!--   JOB AGENT SECTION  -->
  <div class="container">
    <div class="row">

    </div>
    <!--  row end -->
  </div>

  <!--   FEATURED PARTNERS SECTION  -->
  <div class="container">
    <div class="row">

    </div>
    <!--  row end -->
  </div>

<!-- Replace the value of the key parameter with your own API key. -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_91mOsG6H_Ec2OwMPfwHF3jFRD1TGasM&callback=initMap"> </script>
<script>
var offsetHeight = document.getElementById('map').offsetHeight;
document.getElementById('overlay').style.height = offsetHeight+'px';

var offsetHeight = document.getElementById('map').offsetHeight;
document.getElementById('jw-fp-maptext').style.height = offsetHeight+'px';

</script>
<script>
$("#overlay").on.click(function(){
    $("#overlay").hide();
});
</script>
<?php get_footer(); ?>
