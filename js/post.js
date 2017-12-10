

jQuery(document).ready(function( $ ) {

var row=$('.row-post');
$.each(row, function() {
    var maxh=0;
    $.each($(this).find('.entry-content'), function() {
        if($(this).height() > maxh)
            maxh=$(this).height();
    });
    $.each($(this).find('.entry-content'), function() {
        $(this).height(maxh);
    });
});


$("#navbar-toggler").click(function(){
      $(" #bs-menu .navbar-collapse, .user-btn").toggle(500);
  });


    $(".feature-single").hover(
      function () {
        $(this).addClass("hovered");
      },
      function () {
        $(this).removeClass("hovered") ;
      }
    );


$('#save-jbag').on('click',function(){ alert("Din Jobagent er nu gemt");});


});



// Kilde https://www.w3schools.com/howto/howto_css_modals.asp 

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
