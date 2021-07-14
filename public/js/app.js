/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

function ShowNoto(className, text, header) {
  $('#noto').attr('class', 'notification');
  $('#noto').find('.notification-content b').html(header);
  $('#noto').find('.notification-content p').html(text);

  if (className == 'success-notification') {
    $('.notification-icon').html('<i class="fas fa-check"></i>');
  } else if (className == 'danger-notification') {
    $('.notification-icon').html('<i class="fas fa-times"></i>');
  } else {
    $('.notification-icon').html('<i class="fas fa-times"></i>');
  }

  $('#noto').addClass(className).fadeIn('fast').delay(5000).fadeOut('fast');
}

(function ($) {
  'use strict';
  /*------------------------------------
    HT Predefined Variables
  --------------------------------------*/

  var $window = $(window),
      $document = $(document),
      $body = $('body'),
      $fullScreen = $('.fullscreen-banner') || $('.section-fullscreen'),
      $halfScreen = $('.halfscreen-banner'); //Check if function exists

  $.fn.exists = function () {
    return this.length > 0;
  };
  /*------------------------------------
    HT PreLoader
  --------------------------------------*/


  $('#ht-preloader').fadeOut();
  /*------------------------------------
    HT FullScreen
  --------------------------------------*/

  if ($fullScreen.exists()) {
    $fullScreen.each(function () {
      var $elem = $(this),
          elemHeight = $window.height();
      if ($window.width() < 768) $elem.css('height', elemHeight / 1);else $elem.css('height', elemHeight);
    });
  }

  if ($halfScreen.exists()) {
    $halfScreen.each(function () {
      var $elem = $(this),
          elemHeight = $window.height();
      $elem.css('height', elemHeight / 2);
    });
  }
  /*------------------------------------
    HT Banner Slider
  --------------------------------------*/


  $('.banner-slider').each(function () {
    var $carousel = $(this);
    $carousel.owlCarousel({
      items: 1,
      loop: true,
      dots: $carousel.data("dots"),
      nav: $carousel.data("nav"),
      margin: $carousel.data("margin"),
      animateIn: 'fadeIn',
      animateOut: 'fadeOut',
      autoplay: true,
      autoplayTimeout: 6000,
      navText: ['<span class="las la-arrow-left"><span>', '<span class="las la-arrow-right"></span>']
    });
  });
  /*------------------------------------
    HT Owl Carousel
  --------------------------------------*/

  $('.owl-carousel').each(function () {
    var $carousel = $(this);
    $carousel.owlCarousel({
      items: $carousel.data("items"),
      slideBy: $carousel.data("slideby"),
      center: $carousel.data("center"),
      loop: true,
      margin: $carousel.data("margin"),
      dots: $carousel.data("dots"),
      nav: $carousel.data("nav"),
      autoplay: $carousel.data("autoplay"),
      autoplayTimeout: $carousel.data("autoplay-timeout"),
      navText: ['<span class="la la-angle-left"><span>', '<span class="la la-angle-right"></span>'],
      responsive: {
        0: {
          items: $carousel.data('xs-items') ? $carousel.data('xs-items') : 1
        },
        576: {
          items: $carousel.data('sm-items')
        },
        768: {
          items: $carousel.data('md-items')
        },
        1024: {
          items: $carousel.data('lg-items')
        },
        1200: {
          items: $carousel.data("items")
        }
      }
    });
  });
  /*------------------------------------
  Cloude zoom
  --------------------------------------*/

  var image = $('#product_img'); //var zoomConfig = {};

  var zoomActive = false;
  zoomActive = !zoomActive;

  if (zoomActive) {
    if ($(image).length > 0) {
      $(image).elevateZoom({
        cursor: "crosshair",
        easing: true,
        gallery: 'pr_item_gallery',
        zoomType: "inner",
        galleryActiveClass: "active"
      });
    }
  } else {
    $.removeData(image, 'elevateZoom'); //remove zoom instance from image

    $('.zoomContainer:last-child').remove(); // remove zoom container from DOM
  }

  $.magnificPopup.defaults.callbacks = {
    open: function open() {
      $('body').addClass('zoom_image');
    },
    close: function close() {
      // Wait until overflow:hidden has been removed from the html tag
      setTimeout(function () {
        $('body').removeClass('zoom_image');
        $('body').removeClass('zoom_gallery_image');
        $('.zoomContainer').slice(1).remove();
      }, 100);
    }
  }; // Set up gallery on click

  var galleryZoom = $('#pr_item_gallery');
  galleryZoom.magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery: {
      enabled: true
    },
    callbacks: {
      elementParse: function elementParse(item) {
        item.src = item.el.attr('data-zoom-image');
      }
    }
  }); // Zoom image when click on icon

  $('.product_img_zoom').on('click', function () {
    var atual = $('#pr_item_gallery a').attr('data-zoom-image');
    $('body').addClass('zoom_gallery_image');
    $('#pr_item_gallery .item').each(function () {
      if (atual == $(this).find('.product_gallery_item').attr('data-zoom-image')) {
        return galleryZoom.magnificPopup('open', $(this).index());
      }
    });
  });
  $('.plus').on('click', function () {
    if ($(this).prev().val()) {
      $(this).prev().val(+$(this).prev().val() + 1);
    }
  });
  $('.minus').on('click', function () {
    if ($(this).next().val() > 1) {
      if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
    }
  });
  /*------------------------------------
    HT Countdown
  --------------------------------------*/

  $('.countdown').each(function () {
    var $this = $(this),
        finalDate = $(this).data('countdown');
    $this.countdown(finalDate, function (event) {
      $(this).html(event.strftime('<li><span>%-D</span><p>d</p></li>' + '<li><span>%-H</span><p>h</p></li>' + '<li><span>%-M</span><p>m</p></li>' + '<li><span>%S</span><p>s</p></li>'));
    });
  });
  /*------------------------------------
    HT Dropdown
  --------------------------------------*/

  $('.custome_select').each(function () {
    $('.custome_select').msDropdown();
  });
  /*------------------------------------
    HT Scroll to top
  --------------------------------------*/

  var pxShow = 300,
      goTopButton = $(".scroll-top"); // Show or hide the button

  if ($(window).scrollTop() >= pxShow) goTopButton.addClass('scroll-visible');
  $(window).on('scroll', function () {
    if ($(window).scrollTop() >= pxShow) {
      if (!goTopButton.hasClass('scroll-visible')) goTopButton.addClass('scroll-visible');
    } else {
      goTopButton.removeClass('scroll-visible');
    }
  });
  $('.smoothscroll').on('click', function (e) {
    $('body,html').animate({
      scrollTop: 0
    }, 3000);
    return false;
  });
  /*------------------------------------
    HT Fixed Header
  --------------------------------------*/

  $(window).on('scroll', function () {
    if ($(window).scrollTop() >= 300) {
      $('#header-wrap').addClass('fixed-header');
    } else {
      $('#header-wrap').removeClass('fixed-header');
    }
  });
  /*------------------------------------------
    HT Text Color, Background Color And Image
  ---------------------------------------------*/

  $('[data-bg-color]').each(function (index, el) {
    $(el).css('background-color', $(el).data('bg-color'));
  });
  $('[data-text-color]').each(function (index, el) {
    $(el).css('color', $(el).data('text-color'));
  });
  $('[data-bg-img]').each(function () {
    $(this).css('background-image', 'url(' + $(this).data("bg-img") + ')');
  });
  /*------------------------------------
    HT Contact Form
  --------------------------------------*/

  $('#contact-form').validator(); // when the form is submitted

  $('#contact-form').on('submit', function (e) {
    // if the validator does not prevent form submit
    if (!e.isDefaultPrevented()) {
      var url = "php/contact.php"; // POST values in the background the the script URL

      $.ajax({
        type: "POST",
        url: url,
        data: $(this).serialize(),
        success: function success(data) {
          // data = JSON object that contact.php returns
          // we recieve the type of the message: success x danger and apply it to the 
          var messageAlert = 'alert-' + data.type;
          var messageText = data.message; // let's compose Bootstrap alert box HTML

          var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>'; // If we have messageAlert and messageText

          if (messageAlert && messageText) {
            // inject the alert to .messages div in our form
            $('#contact-form').find('.messages').html(alertBox).show().delay(2000).fadeOut('slow'); // empty the form

            $('#contact-form')[0].reset();
          }
        }
      });
      return false;
    }
  });
  /*------------------------------------
    HT btnproduct
  --------------------------------------*/

  $('.btn-product-up').on('click', function (e) {
    e.preventDefault();
    var numProduct = Number($(this).next().val());
    if (numProduct > 1) $(this).next().val(numProduct - 1);
  });
  $('.btn-product-down').on('click', function (e) {
    e.preventDefault();
    var numProduct = Number($(this).prev().val());
    $(this).prev().val(numProduct + 1);
  });
  /*------------------------------------
    HT LightSlider
  --------------------------------------*/

  $('#imageGallery').lightSlider({
    gallery: true,
    item: 1,
    verticalHeight: 800,
    thumbItem: 4,
    slideMargin: 0,
    speed: 600,
    autoplay: true
  });
  $('[data-toggle="tooltip"]').tooltip();
  /*===================================*
  	06. SEARCH JS
  	*===================================*/

  $(".close-search").on("click", function () {
    $(".search_wrap,.search_overlay").removeClass('open');
    $("body").removeClass('search_open');
  });
  var removeClass = true;
  $(".search_wrap").after('<div class="search_overlay"></div>');
  $(".search_trigger").on('click', function () {
    $(".search_wrap,.search_overlay").toggleClass('open');
    $("body").toggleClass('search_open');
    removeClass = false;

    if ($('.navbar-collapse').hasClass('show')) {
      $(".navbar-collapse").removeClass('show');
      $(".navbar-toggler").addClass('collapsed');
      $(".navbar-toggler").attr("aria-expanded", false);
    }
  });
  $(".search_wrap form").on('click', function () {
    removeClass = false;
  });
  $("html").on('click', function () {
    if (removeClass) {
      $("body").removeClass('open');
      $(".search_wrap,.search_overlay").removeClass('open');
      $("body").removeClass('search_open');
    }

    removeClass = true;
  });
  /*------------------------------------
    HT Window load and functions
  --------------------------------------*/

  $window.resize(function () {});
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    e.target; // newly activated tab

    e.relatedTarget; // previous active tab

    $(".owl-carousel").trigger('refresh.owl.carousel');
  });
  /*------------------------------------
    Newsletter Signup
  --------------------------------------*/

  $('#signup-to-newsletter').click(function (e) {
    e.preventDefault(); //Change the button

    $(this).html('<i class="fas fa-spinner fa-spin"></i>');
    $('#newsletter-output').fadeOut().removeClass('text-danger').removeClass('text-success'); //Prepare Vars

    var ActionLink = $(this).data('target');
    var That = $(this); //Make an Ajax Call

    $.ajax({
      url: ActionLink,
      method: 'POST',
      data: {
        'email': $('#newsletter-email-value').val(),
        'form_location': That.data('location')
      },
      success: function success(response) {
        That.html('Signup');
        $('#newsletter-output').fadeIn().addClass('text-success').html(response);
      },
      error: function error(response) {
        That.html('Signup');
        $('#newsletter-output').fadeIn().addClass('text-danger').html(response.responseText);
      }
    });
  }); //Cookies Disclaimer

  if (document.cookie.includes('Agreedcookies=Yes')) {
    $('#cookies-disclaimer').remove();
  }

  $('#agree-cookies-usage').click(function () {
    //Create a Cookie
    var now = new Date();
    var time = now.getTime();
    var expireTime = time + 1000 * 36000;
    now.setTime(expireTime);
    document.cookie = 'Agreedcookies=Yes;expires=' + now.toUTCString() + ';';
    $('#cookies-disclaimer').fadeOut();
  }); //Wishlist
  //Like Items

  $('.like_item').click(function () {
    $(this).toggleClass('bg-danger').toggleClass('text-white');
    var ProductId = $(this).attr('product-id');
    var UserId = $('meta[name=user_id]').attr("content");
    $.ajax({
      'method': 'post',
      'url': $('meta[name=base_url]').attr('content') + '/api/add-to-wishlist',
      'data': {
        'user_id': UserId,
        'product_id': ProductId
      },
      success: function success(response) {
        ShowNoto('success-notification', response, 'Success');
      },
      error: function error(response) {
        ShowNoto('danger-notification', response.responseText, 'Error');
      }
    });
  });
  $('#add-to-cart-single').click(function () {
    $(this).toggleClass('bg-danger').toggleClass('text-white');
    var ProductId = $(this).data('product');
    var UserId = $(this).data('user');
    var Count = $('input[name="count"]').val();
    var Color = $('input[name="color_code"]:checked').val();
    $.ajax({
      'method': 'post',
      'url': $('meta[name=base_url]').attr('content') + '/api/add-item-to-cart',
      'data': {
        'user_id': UserId,
        'product_id': ProductId,
        'qty': Count,
        'color': Color
      },
      success: function success(response) {
        console.log(response.item);
        ShowNoto('success-notification', response.message + '<a class="btn btn-dark btn-animated mt-3 btn-block" href="/products">Continue Shopping</a> <a class="btn btn-dark btn-animated mt-3 btn-block" href="/checkout">Processed to Checkout</a>', 'Success'); //Update the cart number

        $('.navbar-cart-icon').attr('data-cart-items', response.count);
        $('.user-cart-total').html(response.item.TotalPrice); //Update navbar using dynamic content

        $('.cart_list').append("\n            <li>\n              <a href=\"/product/".concat(response.item.product.slug, "/").concat(response.item.product.id, "\">\n                <img src=\"/storage/app/images/products/").concat(response.item.product.image, "\" alt=\"").concat(response.item.product.title, "\">\n                ").concat(response.item.product.title, "\n              </a>\n              <span class=\"cart_quantity\"> ").concat(response.item.qty, " x <span class=\"cart_amount\">\n              <span class=\"price_symbole\">\u20AC</span></span>").concat(response.item.product.FinalPrice, "</span> \n            </li>\n          "));
      },
      error: function error(response) {
        ShowNoto('danger-notification', response.responseText, 'Error');
      }
    });
  }); //Update Cart

  $('.btn-product').click(function () {
    var ActionRoute = $(this).data('target');
    var ItemId = $(this).data('id');
    var UserId = $(this).data('user');
    var ItemValue = $(this).parent().find('.update-cart-form').val();
    $.ajax({
      'method': 'post',
      'url': ActionRoute,
      'data': {
        'item_id': ItemId,
        'qty': ItemValue,
        'user_id': UserId
      },
      success: function success(response) {
        //Get the refresh icon and show it
        $('#update-cart-button').removeClass('d-none');
        ShowNoto('success-notification', response, 'Success');
        $('.update-cart-btn').html('Update Cart Data <i class="fas fa-circle text-success"></i>');
      },
      error: function error(response) {
        ShowNoto('danger-notification', response.responseText, 'Error');
      }
    });
  });
  $('.update-cart-form').change(function () {
    var ActionRoute = $(this).data('target');
    var ItemId = $(this).data('id');
    var UserId = $(this).data('user');
    var TheItem = $(this);
    var ItemValue = $(this).val();
    $.ajax({
      'method': 'post',
      'url': ActionRoute,
      'data': {
        'item_id': ItemId,
        'qty': ItemValue,
        'user_id': UserId
      },
      success: function success(response) {
        //Get the refresh icon and show it
        $('#update-cart-button').removeClass('d-none');
        ShowNoto('success-notification', response, 'Success');
        $('.update-cart-btn').html('Update Cart Data <i class="fas fa-circle text-success"></i>');
      },
      error: function error(response) {
        ShowNoto('danger-notification', response.responseText, 'Error');
      }
    });
  });
  $('#save-as-pdf').click(function () {
    window.print();
  });
})(jQuery);

/***/ }),

/***/ "./resources/scss/app.scss":
/*!*********************************!*\
  !*** ./resources/scss/app.scss ***!
  \*********************************/
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/mini-css-extract-plugin/dist/loader.js):\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\nSassError: expected \"}\".\n    ╷\n927 │ }\n    │  ^\n    ╵\n  resources/scss/_layout.scss 927:2  @import\n  resources/scss/app.scss 962:9      root stylesheet\n    at processResult (/var/www/html/broadshop/node_modules/webpack/lib/NormalModule.js:676:19)\n    at /var/www/html/broadshop/node_modules/webpack/lib/NormalModule.js:778:5\n    at /var/www/html/broadshop/node_modules/loader-runner/lib/LoaderRunner.js:399:11\n    at /var/www/html/broadshop/node_modules/loader-runner/lib/LoaderRunner.js:251:18\n    at context.callback (/var/www/html/broadshop/node_modules/loader-runner/lib/LoaderRunner.js:124:13)\n    at /var/www/html/broadshop/node_modules/sass-loader/dist/index.js:54:7\n    at Function.call$2 (/var/www/html/broadshop/node_modules/sass/sass.dart.js:92612:16)\n    at _render_closure1.call$2 (/var/www/html/broadshop/node_modules/sass/sass.dart.js:81115:12)\n    at _RootZone.runBinary$3$3 (/var/www/html/broadshop/node_modules/sass/sass.dart.js:27260:18)\n    at _FutureListener.handleError$1 (/var/www/html/broadshop/node_modules/sass/sass.dart.js:25816:19)");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	__webpack_modules__["./resources/js/app.js"]();
/******/ 	// This entry module doesn't tell about it's top-level declarations so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/scss/app.scss"]();
/******/ 	
/******/ })()
;