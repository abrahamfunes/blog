$(document).ready(function(){

  $(".main-header").sticky({topSpacing:0});

  $(function() {
    $('a[href*=#]:not([href=#])').click(function() {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
        if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top - 90
            }, 1000);
            return false;
        }
    });
  });

});

$(document).ready(function(){

/*  $('.is-sticky').each(function() {
      if( $(this).is(':visible') ) {
          $(".main-header").sticky({ topSpacing: 0, getWidthFrom: 'body' });
      } else {
          $(".main-header").sticky({ topSpacing: 0, getWidthFrom: 'body' });
      }
  })*/

  $('.icon-container-menu').click( function(event) {
    event.stopPropagation();
    $(this).toggleClass("menu-active")
    $('.mob-menu-container').toggleClass("menu-active");
    $('.main-header').toggleClass("menu-active");
  });
  $('.main-header').on("click", function (event) {
    event.stopPropagation();
  });

});

$(document).on("click", function () {
  $('.icon-container-menu').removeClass("menu-active")
  $('.mob-menu-container').removeClass("menu-active");
  $('.main-header').removeClass("menu-active");
});

$(document).keyup(function(e) {
  if (e.keyCode == 27) {
     $('.icon-container-menu').removeClass("menu-active")
     $('.mob-menu-container').removeClass("menu-active");
     $('.main-header').removeClass("menu-active");
  }
});

/*
 * Replace all SVG images with inline SVG
 */
jQuery('img.svg').each(function(){
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    jQuery.get(imgURL, function(data) {
        // Get the SVG tag, ignore the rest
        var $svg = jQuery(data).find('svg');

        // Add replaced image's ID to the new SVG
        if(typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
        }
        // Add replaced image's classes to the new SVG
        if(typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass+' replaced-svg');
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr('xmlns:a');

        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
        if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
        }

        // Replace image with new SVG
        $img.replaceWith($svg);

    }, 'xml');

});
