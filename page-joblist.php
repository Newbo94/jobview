<?php

/**
 * Template Name: Job list
 */

 ?>

<?php get_header(); ?>



<style>

#map-container {

  width: 100%;
}
#map {
  width: 100%;
  height: 50vh;
  position: absolute;
  z-index: -1;
}
#actions {
  list-style: none;
  padding: 0;
}


</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_91mOsG6H_Ec2OwMPfwHF3jFRD1TGasM&callback=initMap"
async defer></script>


<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/markerclusterer.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jobviewmap.js"></script>


<!--   MAP SECTION  -->
<section id="map-section" class="jw-fp-map container-fluid">

  <div class="row" style="margin-left:0; margin-right:0;">
    <div id="map">
    </div>
    <div id="overlay">
    </div>
    <div id="jw-fp-mapcontent" class="col-lg-12 text-center">
      <div id="jw-fp-maptext">

      </div>


    </div>
    <!--  row end -->
  </div>
</section>

<div class="container" style="margin-top: 50px;">

  <div class="row">
    <!-- filter sidebar -->
    <div id="filter-sidebar" class="col-xs-12 col-sm-12 col-md-10 col-lg-4 visible-xs-block hidden-xs sliding-sidebar">
      <div id="jw-filters" style="background-color:#ffffff;" class="filters">
        <div class="filter-block">
          <h2>
        Filtrer din søgning<span></span></h2>
          <input id="filter-search" placeholder="Søg" type="text">
        </div>
        <div class="filter-block">
          <h4 data-toggle="collapse" data-target="#jw-filter-group-1">
        Job types <span class="toggle-masks"></span></h4>
          <div id="jw-filter-group-1" class="list-group collapse in filter-block">
            <label class="space-btw">Fuldtid<input class="filter-job" value="Fuldtid" type="checkbox">

            </label>
            <label class="space-btw">Deltid<input class="filter-job" value="Deltid" type="checkbox"></label>
            <label class="space-btw">Studiejob<input class="filter-job" value="Studiejob" type="checkbox"></label>
            <label class="space-btw">Fleksjob<input class="filter-job" value="Fleksjob" type="checkbox"></label>
          </div>
        </div>
        <div class="filter-block">
          <h4 data-toggle="collapse" data-target="#jw-filter-group-2">
        Afstand<span class="toggle-masks"></span></h4>
          <div id="jw-filter-group-2" class="list-group collapse in filter-block" style="max-width:200px; padding-left: 10px;">
            <div id="slider-range"></div>
            <p>
              <label for="amount"></label>
              <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold; font-size:14px;">
            </p>
          </div>
        </div>
        <div class="filter-block">
          <h4 data-toggle="collapse" data-target="#jw-filter-group-3">
        Kategorier <span class="toggle-masks"></span></h4>
          <div id="jw-filter-group-3" class="list-group collapse in filter-block">
            <label class="" data-toggle="collapsed" data-target="#sub-group-3-1" aria-expanded="false">Informationteknologi</label>
            <ul data-toggle="collapse" id="sub-group-3-1" aria-expanded="false">
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
            </ul>
            <label class="" data-toggle="collapse" data-target="#jw-filter-sub-group-3-2">Informationteknologi</label>
            <ul data-toggle="collapse" id="jw-filter-sub-group-3-2">
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
            </ul>
            <label class="" data-toggle="collapse" data-target="#jw-filter-sub-group-3-3">Informationteknologi</label>
            <ul data-toggle="collapse" id="jw-filter-sub-group-3-3">
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
            </ul>
            <label class="" data-toggle="collapse" data-target="#jw-filter-sub-group-3-4">Informationteknologi</label>
            <ul data-toggle="collapse" id="jw-filter-sub-group-3-4">
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
              <li class="" id="">Informationteknologi<input class="filter-job" value="" type="checkbox"></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Filter Sidebar END -->




    <!-- job-list container -->
    <div id="jw-job-post-list" class="col-lg-8">
      <div class="job-list">
        <div class="job-post-container">
        </div>
      </div>
    </div>
    <!-- job-list container END -->
  </div>
</div>

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
      <div class="card swiper-slide" style="margin-right:20px; margin-bottom:30px;">\
        <img class="card-img center-image" src="' + image + '" alt="Card image cap" style="padding: 25px; border-radius: 200px; width:300px; height: 300px;">\
        <div class="card-block col-md-6" style="padding: 25px;">\
          <div style="max-height: 175px; overflow: hidden; margin-bottom:10px;">\
            <h4 class="card-title">HR-Skyen</h4>\
            <h4 class="card-sub-title">' + title + '</h4>\
            <p class="card-text"">' + shortdescription + '</p>\
          </div>\
          <div id="jw-label-info" class="">\
            <div id="jw-label-info-text" style="padding: 0;">\
              <p class="card-text" style="padding: 0; margin-bottom:0;"><small class="text-muted">Ansøgningsfrist: ' + deadline + '</small></p>\
              <p class="card-text" style="padding: 0; margin-bottom:0;"><small class="text-muted">Job type: ' + jobTypes[0] + '</small></p>\
            </div>\
            <div id="jw-label-info-button" style="margin-top:10px; width: 130px; line-height: 1.0;>\
              <a href="'+joburl+'" class="btn jw-btn-primary" style="width: 130px; line-height: 1.0;">Se opslag</a>\
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

  // jQuery("#slider-range").slider({
  //   range: true,
  //   min: 0,
  //   max: 500,
  //   values: [0, 500],
  //   slide: function(event, ui) {
  //     jQuery("#amount").val(ui.values[0] + "km" + " - " + ui.values[1] + "km");
  //   }
  // });
  // jQuery("#amount").val(jQuery("#slider-range").slider("values", 0) + "km" + " - " +
  //   jQuery("#slider-range").slider("values", 1) + "km");
});
</script>


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
