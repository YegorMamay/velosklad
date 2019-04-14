(function ($) {
  "use strict";

  $(function () {
    console.info('The site developed by BRAIN WORKS digital agency');
    console.info('Сайт разработан маркетинговым агентством BRAIN WORKS');

    $('html').removeClass('no-js').addClass('js');

    scrollTop('.js-scroll-top');

    // stick footer
    var footerHeight = $('.footer').outerHeight() + 20;
    $('.page-wrapper').css('padding-bottom', footerHeight + 'px');
    // end stick footer
  
    // Buy one click
    var oneClick = $('.one-click');
    if (oneClick.length) {
      oneClick.on('click', function () {
        $('[data-field-id="field7"]').val($('h1.product_title').text());
      });
    }
    // end buy one click

    reviews(".js-reviews");

  });

    var reviews = function reviews(container) {
        var element = $(container);
        if (element.children().length > 1 && typeof $.fn.slick === "function") {
            element.slick({
                adaptiveHeight: false,
                autoplay: false,
                autoplaySpeed: 3e3,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev">&laquo;</button>',
                nextArrow: '<button type="button" class="slick-next">&raquo;</button>',
                dots: false,
                dotsClass: "slick-dots",
                draggable: true,
                fade: false,
                infinite: true,
                responsive: [],
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 300,
                swipe: true,
                zIndex: 10
            });
        }
    };

  /**
   * Scroll Top
   *
   * @example
   * scrollTop('.js-scroll-top');
   * @author Fedor Kudinov <brothersrabbits@mail.ru>
   * @param {(string|Object)} element - selected element
   */
  function scrollTop(element) {
    var el = $(element);

    el.on('click touchend', function () {
      $('html, body').animate({scrollTop: 0}, 'slow');
      return false;
    });

    $(window).on('scroll', function () {
      var scrollPosition = $(this).scrollTop();
      if (scrollPosition > 200) {
        if (!el.hasClass('is-visible')) {
          el.addClass('is-visible');
        }
      } else {
        el.removeClass('is-visible');
      }
    });
  }

})(jQuery);
