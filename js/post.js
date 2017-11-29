

jQuery(document).ready(function( $ ) {

var row=$('.row');
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
});
