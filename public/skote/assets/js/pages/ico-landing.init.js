/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 26);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/ico-landing.init.js":
/*!************************************************!*\
  !*** ./resources/js/pages/ico-landing.init.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Skote - Responsive Bootstrap 4 Admin Dashboard
Author: Themesbrand
Version: 1.1.0
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: ico landing Init Js File
*/
// Sticky nav
$(window).scroll(function () {
  var scroll = $(window).scrollTop();

  if (scroll >= 50) {
    $(".sticky").addClass("nav-sticky");
  } else {
    $(".sticky").removeClass("nav-sticky");
  }
}); // Smoothlink

$('.navbar-nav a').on('click', function (event) {
  var $anchor = $(this);
  $('html, body').stop().animate({
    scrollTop: $($anchor.attr('href')).offset().top - 0
  }, 1500, 'easeInOutExpo');
  event.preventDefault();
}); // Countdown

$('[data-countdown]').each(function () {
  var $this = $(this),
      finalDate = $(this).data('countdown');
  $this.countdown(finalDate, function (event) {
    $(this).html(event.strftime('' + '<div class="coming-box">%D <span>Days</span></div> ' + '<div class="coming-box">%H <span>Hours</span></div> ' + '<div class="coming-box">%M <span>Minutes</span></div> ' + '<div class="coming-box">%S <span>Seconds</span></div> '));
  });
}); // Clients carousel

$('#clients-carousel, #team-carousel').owlCarousel({
  items: 1,
  loop: false,
  margin: 24,
  nav: false,
  dots: false,
  responsive: {
    576: {
      items: 2
    },
    768: {
      items: 3
    },
    992: {
      items: 4
    }
  }
}); // Timeline carousel

$('#timeline-carousel').owlCarousel({
  items: 1,
  loop: false,
  margin: 0,
  nav: true,
  navText: ["<i class='mdi mdi-chevron-left'></i>", "<i class='mdi mdi-chevron-right'></i>"],
  dots: false,
  responsive: {
    576: {
      items: 2
    },
    768: {
      items: 3
    },
    992: {
      items: 4
    }
  }
});

/***/ }),

/***/ 26:
/*!******************************************************!*\
  !*** multi ./resources/js/pages/ico-landing.init.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/thanhnt/Code/Personal-Projects/vertical/resources/js/pages/ico-landing.init.js */"./resources/js/pages/ico-landing.init.js");


/***/ })

/******/ });