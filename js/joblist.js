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
      <div class="card swiper-slide" style="margin-right:20px;">\
        <img class="card-img center-image" src="' + image + '" alt="Card image cap" style="padding: 25px; border-radius: 200px; width:300px; height: auto;">\
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
