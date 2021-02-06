/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/formStudentState.js":
/*!******************************************!*\
  !*** ./resources/js/formStudentState.js ***!
  \******************************************/
/***/ (function() {

var _this = this;

window.addEventListener('load', function () {
  list_container = document.querySelector('#list_container');
  list_container.querySelectorAll('.chk_js').forEach(function (element) {
    var checkbox = element.querySelector('input[type="checkbox"]');

    element.onclick = function () {
      checkbox.click();
    };
  });
  sticker = document.querySelector('#sticker');
  sticker_input = document.querySelector('#sticker_input');

  sticker.onclick = function () {
    return sticker_input.click();
  };

  startings = [document.querySelector('#staring-1'), document.querySelector('#staring-2'), document.querySelector('#staring-3')];
  radios = [document.querySelector('#star-1'), document.querySelector('#star-2'), document.querySelector('#star-3')];
  startings.forEach(function (e, i) {
    return e.addEventListener('mouseenter', function (e) {
      return onMouseEnterStare(i, _this);
    });
  });
  startings.forEach(function (e, i) {
    return e.addEventListener('mouseleave', function (e) {
      return onMouseleaveStare(i, _this);
    });
  });
  startings.forEach(function (e, i) {
    return e.addEventListener('click', function (e) {
      return onMouseClickStare(i, _this);
    });
  });

  function onMouseEnterStare(snum, ele) {
    startings.forEach(function (e, i) {
      return i <= snum ? e.classList.add('text-indigo-500') : null;
    });
  }

  function onMouseleaveStare(snum, ele) {
    startings.forEach(function (e, i) {
      return i <= snum ? e.classList.remove('text-indigo-500') : null;
    });
  }

  function onMouseClickStare(snum, ele) {
    radios[snum].click();
    startings.forEach(function (e, i) {
      return i <= snum ? e.classList.add('text-indigo-700') : null;
    });
  } // star_1.onclick = ()=>{
  //     star_2.checked = false;
  //     star_3.checked = false;
  //     if (star_2.checked) {
  //        setTimeout(()=>{
  //            star_2.click()
  //        },1000) 
  //     }
  //     if (star_3.checked) {
  //         star_3.click()
  //     }
  // }

});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// startup
/******/ 	// Load entry module
/******/ 	// This entry module is referenced by other modules so it can't be inlined
/******/ 	__webpack_modules__["./resources/js/formStudentState.js"]();
/******/ })()
;