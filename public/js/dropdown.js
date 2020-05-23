$(document).ready(function() {
    var triggerOpen		= $('#input');
    var triggerClose 	= $('#dropdown-menu').find('li');

    triggerOpen.on('mouseover', function(e) {
        e.preventDefault();
        $('#dropdown-menu').add(triggerOpen).toggleClass('open');


        // if($('#icon').hasClass("marka-icon-times")) {
        //     m.set('triangle').size(10);
        // } else {
        //     m.set('times').size(15);
        // }
    // },function (e) {

    });

    $('#dropdown-menu').on('mouseleave', function() {
        // set new placeholder for demo
        // $("#input").html("<a id=\"input\" href=\"#\">مقالات</a>");

        $('#dropdown-menu').add(triggerOpen).toggleClass('open');
        // m.set('triangle').size(10);
    });

});