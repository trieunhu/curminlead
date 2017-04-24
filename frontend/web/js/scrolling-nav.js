//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    var navHeight = 50;
    if ($(".navbar").offset().top > 0) {
        $("nav").addClass("top-nav-collapse").removeClass("myNav").addClass("fixed");
    } else {
        $("nav").removeClass("top-nav-collapse").addClass("myNav").removeClass("fixed");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top -5
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
