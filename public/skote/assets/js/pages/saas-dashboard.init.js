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
/******/ 	return __webpack_require__(__webpack_require__.s = 37);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/saas-dashboard.init.js":
/*!***************************************************!*\
  !*** ./resources/js/pages/saas-dashboard.init.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Skote - Responsive Bootstrap 4 Admin Dashboard
Author: Themesbrand
Version: 1.1.0
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Saas dashboard Init Js File
*/
// Line chart
var options = {
  series: [{
    name: 'series1',
    data: [31, 40, 36, 51, 49, 72, 69, 56, 68, 82, 68, 76]
  }],
  chart: {
    height: 320,
    type: 'line',
    toolbar: 'false',
    dropShadow: {
      enabled: true,
      color: '#000',
      top: 18,
      left: 7,
      blur: 8,
      opacity: 0.2
    }
  },
  dataLabels: {
    enabled: false
  },
  colors: ['#556ee6'],
  stroke: {
    curve: 'smooth',
    width: 3
  }
};
var chart = new ApexCharts(document.querySelector("#line-chart"), options);
chart.render(); // Pie chart

var options = {
  series: [56, 38, 26],
  chart: {
    type: 'donut',
    height: 240
  },
  labels: ['Series A', 'Series B', 'Series C'],
  colors: ['#556ee6', '#34c38f', '#f46a6a'],
  legend: {
    show: false
  },
  plotOptions: {
    pie: {
      donut: {
        size: '70%'
      }
    }
  }
};
var chart = new ApexCharts(document.querySelector("#donut-chart"), options);
chart.render(); // Radialchart 1

var radialoptions1 = {
  series: [37],
  chart: {
    type: 'radialBar',
    width: 60,
    height: 60,
    sparkline: {
      enabled: true
    }
  },
  dataLabels: {
    enabled: false
  },
  colors: ['#556ee6'],
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: '60%'
      },
      track: {
        margin: 0
      },
      dataLabels: {
        show: false
      }
    }
  }
};
var radialchart1 = new ApexCharts(document.querySelector("#radialchart-1"), radialoptions1);
radialchart1.render(); // Radialchart 2

var radialoptions2 = {
  series: [72],
  chart: {
    type: 'radialBar',
    width: 60,
    height: 60,
    sparkline: {
      enabled: true
    }
  },
  dataLabels: {
    enabled: false
  },
  colors: ['#34c38f'],
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: '60%'
      },
      track: {
        margin: 0
      },
      dataLabels: {
        show: false
      }
    }
  }
};
var radialchart2 = new ApexCharts(document.querySelector("#radialchart-2"), radialoptions2);
radialchart2.render(); // Radialchart 3

var radialoptions3 = {
  series: [54],
  chart: {
    type: 'radialBar',
    width: 60,
    height: 60,
    sparkline: {
      enabled: true
    }
  },
  dataLabels: {
    enabled: false
  },
  colors: ['#f46a6a'],
  plotOptions: {
    radialBar: {
      hollow: {
        margin: 0,
        size: '60%'
      },
      track: {
        margin: 0
      },
      dataLabels: {
        show: false
      }
    }
  }
};
var radialchart3 = new ApexCharts(document.querySelector("#radialchart-3"), radialoptions3);
radialchart3.render();

/***/ }),

/***/ 37:
/*!*********************************************************!*\
  !*** multi ./resources/js/pages/saas-dashboard.init.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/thanhnt/Code/Personal-Projects/vertical/resources/js/pages/saas-dashboard.init.js */"./resources/js/pages/saas-dashboard.init.js");


/***/ })

/******/ });