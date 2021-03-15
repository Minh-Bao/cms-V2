/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/instafeed-main.js ***!
  \****************************************/
var feed = new Instafeed({
  accessToken: "{{ config('myconfig.insta_access_token') }}",
  limit: 12,
  template: '<a class="col-md-3" target="_blank href="{{link}}"><img class="img-thumbnail shadow  bg-white rounded img_insta" title="{{caption}}" src="{{image}}" /></a>',
  error: function error() {
    document.getElementById('insta_error_msg').style.display = "block";
  }
});
feed.run();
/******/ })()
;