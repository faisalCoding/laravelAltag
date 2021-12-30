/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/formStudentState.js":
/*!******************************************!*\
  !*** ./resources/js/formStudentState.js ***!
  \******************************************/
/***/ (function() {

var _this = this;

window.addEventListener('load', function () {
  //list =>[1= اولشخص يسمع 2= تسميع بدون اخطاء 3= تكرار الحفظ]     click checkbox 
  var list_container = document.getElementById('list_container');
  list_container.querySelectorAll('.chk_js').forEach(function (element) {
    var checkbox = element.querySelector('input[type="checkbox"]');

    element.onclick = function () {
      return checkbox.click();
    };
  });
  var e_list_container = document.querySelector('#e_list_container');
  e_list_container.querySelectorAll('.chk_js').forEach(function (element) {
    var checkbox = element.querySelector('input[type="checkbox"]');

    element.onclick = function () {
      return checkbox.click();
    };
  }); //----------------------------------------------
  // one blue star sticker  click checkbox

  var sticker = document.querySelector('#sticker');
  var sticker_input = document.querySelector('#sticker_input');

  sticker.onclick = function () {
    return sticker_input.click();
  };

  var e_sticker = document.querySelector('#e_sticker');
  var e_sticker_input = document.querySelector('#e_sticker_input');

  e_sticker.onclick = function () {
    return e_sticker_input.click();
  }; //----------------------------------------------
  //three stars chang color on hover and set color on click it and choise radio input


  var startings = [document.querySelector('#staring-1'), document.querySelector('#staring-2'), document.querySelector('#staring-3')];
  var e_startings = [document.querySelector('#e-staring-1'), document.querySelector('#e-staring-2'), document.querySelector('#e-staring-3')];
  var radios = [document.querySelector('#star-1'), document.querySelector('#star-2'), document.querySelector('#star-3')];
  var e_radios = [document.querySelector('#e-star-1'), document.querySelector('#e-star-2'), document.querySelector('#e-star-3')];
  startings.forEach(function (e, i) {
    return e.addEventListener('mouseenter', function (e) {
      return onMouseEnterStar(i, _this);
    });
  });
  startings.forEach(function (e, i) {
    return e.addEventListener('click', function (e) {
      return onMouseClickStar(i, _this);
    });
  });
  e_startings.forEach(function (e, i) {
    return e.addEventListener('mouseenter', function (e) {
      return e_onMouseEnterStar(i, _this);
    });
  });
  e_startings.forEach(function (e, i) {
    return e.addEventListener('click', function (e) {
      return e_onMouseClickStar(i, _this);
    });
  });

  function onMouseEnterStar(snum, ele) {
    startings.forEach(function (e, i) {
      return i <= snum ? e.classList.add('text-indigo-500') : e.classList.remove('text-indigo-500');
    });
  }

  function onMouseClickStar(snum, ele) {
    radios[snum].click();
    startings.forEach(function (e, i) {
      return i <= snum ? e.classList.add('text-indigo-700') : null;
    });
  }

  function e_onMouseEnterStar(snum, ele) {
    e_startings.forEach(function (e, i) {
      return i <= snum ? e.classList.add('text-indigo-500') : e.classList.remove('text-indigo-500');
    });
  }

  function e_onMouseClickStar(snum, ele) {
    e_radios[snum].click();
    e_startings.forEach(function (e, i) {
      return i <= snum ? e.classList.add('text-indigo-700') : null;
    });
  } //----------------------------------------------


  window.addEventListener('copyStates', function (e) {
    //console.log(e.detail.states)
    var text;
    console.log(e.detail.states);
    console.log(e.detail.day);
    e.detail.states.forEach(function (item, i) {
      // console.log(`${item.name} \n ${item.hfrom} ${item.hto}\n ${item.mfrom} ${item.mto}\n\n`)
      text += "".concat(i + 1, ". ").concat(item.name, " \n ").concat(item.hfrom, " ").concat(item.hto, "\n ").concat(item.mfrom, " ").concat(item.mto, "\n-------------\n");
    });
    console.log(text.replace('undefined', ''));
    navigator.clipboard.writeText(" ".concat(e.detail.day.date, "\n\n") + text.replace('undefined', ''));
  });
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