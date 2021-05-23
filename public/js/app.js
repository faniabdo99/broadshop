/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

/* ------------------------------------------------
Theme Name: Flipmarto
Author:  ThemesGround
Description:  Flipmarto HTML Template
Tags: two-columns, left-sidebar, fixed-layout, responsive-layout, custom-background, custom-colors, custom-header, custom-menu
Text Domain:  Flipmarto
------------------------------------------------ */

/* ------------------------
    Table of Contents

  1. Predefined Variables
  2. Preloader  
  3. FullScreen
  4. Counter
  5. Owl carousel
  6. Dropdown
  7. Isotope
  8. Magnific Popup
  9. Fixed Header
  10. Text Color, Background Color And Image
  11. Contact Form
  12. ProgressBar
  13. Parallax
  14. Countdown
  15. Rangeslider
  16. Btnproduct
  17. LightSlider
  18. Wow Animation
  19. Particles
  20. Window load and functions
------------------------ */
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
    verticalHeight: 450,
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
    document.cookie = "Agreedcookies=Yes";
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
        ShowNoto('noto-success', response, 'Success');
      },
      error: function error(response) {
        ShowNoto('noto-danger', response.responseText, 'Error');
      }
    });
  });
})(jQuery);

/***/ }),

/***/ "./resources/scss/app.scss":
/*!*********************************!*\
  !*** ./resources/scss/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					result = fn();
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) var result = runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/scss/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;