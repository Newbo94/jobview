
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
