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

 </head>
<!--   MAP SECTION  -->
<section id="" class="jw-fp-map container-fluid">

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

     <div id="jw-job-post-list" class="col-xs-12 col-sm-10 col-md-10 col-lg-9">
       <div class="job-list">

         <div class="col-md-12 job-post-container">
         </div>
       </div>
     </div>
     <!-- job-list container END -->
     </div>
     </div>

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
</script>

<script>
jQuery('#overlay').on('click', function(){
document.getElementById("overlay").style.display = "none",
document.getElementById("jw-fp-maptext").style.display = "none";
document.getElementById("jw-fp-mapcontent").style.left = "20%";
document.getElementById("jw-fp-mapcontent").style.top ="80%";
document.getElementById("map").style.position ="relative";
});
</script>
<script>
jQuery(function() {
  var url = 'http://hr-skyen.dk/hr/api/jobs/testvirksomhed?locale=da_DK';
  var jobs = [];
  var search = '';
  var filters = [];

  var createJob = function(props) {
    if (!props.active) {
      return '';
    }

    var title = props.title;
    var image = props.image || 'http://via.placeholder.com/250x250';
    var shortdescription = props.shortdescription;
    var deadline = props.deadline || 'Snarest muligt';
    var jobTypes = props.jobTypes;
    var joburl = props.joblisturl;

    return '\
      <div class="card">\
        <img class="card-img center-image" src="' + image + '" alt="Card image cap" style="padding: 35px; border-radius: 200px; width:300px; height: auto;">\
        <div class="card-block col-md-12" style="padding: 35px;">\
          <h4 class="card-title">HR-Skyen</h4>\
          <h4 class="card-sub-title">' + title + '</h4>\
          <p class="card-text" style="min-height: 100px;overflow: hidden;">' + shortdescription + '</p>\
          <div id="jw-label-info" class="">\
            <div id="jw-label-info-text" style="padding: 0;">\
              <p class="card-text"><small class="text-muted">Ansøgningsfrist: ' + deadline + '</small></p>\
              <p class="card-text"><small class="text-muted">Job type: ' + jobTypes[0] + '</small></p>\
            </div>\
            <div id="jw-label-info-button">\
              <a href="'+joburl+'" class="btn jw-btn-primary">Se opslag</a>\
            </div>\
          </div>\
        </div>\
      </div>\
    ';
  }



  // Clears container and re-renders jobs
  var renderJobs = function() {
    jQuery('.job-post-container').html('');

    jobs = jobs.map(function(job) {
      for(var i = 0; i < filters.length; i++) {
        var isActive =
          job.jobTypes.indexOf(filters[i]) !== -1 &&
          (job.shortdescription.indexOf(search) !== -1 || job.title.indexOf(search) !== -1)

        job.active = isActive;

        if(isActive) {
          break;
        }
      }

      return job;
    });

    var activeJobs = jobs.filter(function(job) {
      return job.active;
    })

    if (!activeJobs.length) {
      jQuery('.job-post-container').html('Der er ingen aktive job.');
    }

    activeJobs.forEach(function(job) {
      jQuery('.job-post-container').append(createJob(job));
    });
  }

  // Retrieve jobs and render them
  jQuery.get(url, function(res) {
    jobs = Object.keys(res).map(function(id) {
      return {
        active: true,
        title: res[id].title,
        image: res[id].frontimage,
        shortdescription: res[id].shortdescription,
        jobTypes: res[id].positions,
        deadline: res[id].applybefore,
      };
    });

    renderJobs();
  });

  // Handle search
  jQuery('#filter-search').on('keyup', function(e) {
    search = e.target.value;

    // Search in description and title
    jobs = jobs.map(function(job) {
      job.active = job.shortdescription.indexOf(search) !== -1 || job.title.indexOf(search) !== -1;
      return job;
    });

    renderJobs();
  });

  // Handle job type filtering
  jQuery('.filter-job').on('change', function(e) {
    var filter = e.target.value;

    if (this.checked) {
      filters.push(filter)
    } else {
      filters.splice(filters.indexOf(filter), 1)
    }

    if (!filters.length) {
      jobs = jobs.map(function(job) {
        job.active = job.shortdescription.indexOf(search) !== -1;
        return job;
      });
    }

    renderJobs();
  });

  jQuery("#slider-range").slider({
    range: true,
    min: 0,
    max: 500,
    values: [0, 500],
    slide: function(event, ui) {
      jQuery("#amount").val(ui.values[0] + "km" + " - " + ui.values[1] + "km");
    }
  });
  jQuery("#amount").val(jQuery("#slider-range").slider("values", 0) + "km" + " - " +
    jQuery("#slider-range").slider("values", 1) + "km");
});
</script>

<?php get_footer(); ?>
