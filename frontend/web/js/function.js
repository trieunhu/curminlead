jQuery(document).ready(function() {
    jQuery('.navbar-collapse a').click(function() {
        jQuery(".navbar-collapse").collapse('hide');
    });
    jQuery('.content_diachi h3').click(function(){
        jQuery(this).next().slideToggle();
    })
});

jQuery(window).load(function(){
    jQuery('#list_gioithieu').owlCarousel({
        nav: false,
        dots: true,
        loop: true,
        margin: 20,
        responsiveClass: true,
        responsive: {
          0: {
              items: 1,
              dots: true,
          },
          600: {
              items: 2,
              dots: true,
          },
          1000: {
              items: 4,
              dots: true,
          }
        }
    });

    jQuery('#list_nguoidung').owlCarousel({
        nav: false,
        dots: true,
        loop: true,
        margin: 20,
        responsiveClass: true,
        responsive: {
          0: {
              items: 1,
              dots: true,
          },
          600: {
              items: 2,
              dots: true,
          },
          1000: {
              items: 2,
              dots: true,
          }
        }
    });

})