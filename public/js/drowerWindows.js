/******/ (() => { // webpackBootstrap
/*!***************************************!*\
  !*** ./resources/js/drowerWindows.js ***!
  \***************************************/
window.onload = function () {
  var handelDrowerWindos = document.querySelectorAll('div[drower-js]');
  handelDrowerWindos.forEach(function (element) {
    element.querySelector('*[do-drowing-js]').onclick = function (e) {
      content = element.querySelector('*[drower-content-js]');

      if (content.classList.contains('hidden')) {
        e.target.innerHTML = 'keyboard_arrow_up';
        content.classList.remove('hidden');
        element.classList.remove('h-16');
      } else {
        e.target.innerHTML = 'keyboard_arrow_down';
        content.classList.add('hidden');
        element.classList.add('h-16');
      }

      console.log(e.target);
    };
  });
};
/******/ })()
;