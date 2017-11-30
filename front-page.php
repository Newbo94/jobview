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
      }
      #actions {
        list-style: none;
        padding: 0;
      }
    </style>






    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_91mOsG6H_Ec2OwMPfwHF3jFRD1TGasM&callback=initMap"
    async defer></script>
  <!--   <script src="https://maps.googleapis.com/maps/api/js"></script> -->
    <script src="<?php echo get_template_directory_uri(); ?>/data/data.json"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/markerclusterer.js"></script>

      <script src="<?php echo get_template_directory_uri(); ?>/js/speed_test.js"></script>





   <script>
     google.maps.event.addDomListener(window, 'load', Jobview.init);
   </script>

 </head>

 <body>
   <div id="panel">


     <div>
       <input type="checkbox" checked="checked" id="usegmm"/>

     </div>

     <div>

       <select id="nummarkers">
         <option value="10">10</option>
         <option value="50">50</option>
         <option value="100" selected="selected">100</option>
         <option value="500">500</option>
         <option value="1000">1000</option>
       </select>

       <span>Time used: <span id="timetaken"></span> ms</span>
     </div>

     <strong>Marker List</strong>
     <div id="markerlist">

     </div>
   </div>
   <div id="map-container">
     <div id="map"></div>


<?php get_footer(); ?>
