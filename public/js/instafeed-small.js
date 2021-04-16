/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/instafeed-small.js ***!
  \*****************************************/
/**
 * Instafeed script to call instagramm account 12 last images.
 */
var feed = new Instafeed({
  accessToken: "IGQVJXLXB6Q0dmZAWV2NGhnTG1xbmMtUTdzN1FQNGR3MVhlUnk2WHlGVWVmWXJ0dkQ5MGVaaFprelh0MDMtMzJGdF96R1BZASmtFZAmx3ZAXVITV9wdHBSSGJ5YVNyX1NoUnAzT05YUVo1TVR0dDFaRlFRMQZDZD",
  limit: 6,
  after: function after() {
    var container = document.getElementById('instafeed');

    for (var i = 0; i < container.children.length; i++) {
      var parent = container.children;

      for (var j = 0; j < parent.length; j++) {
        var child_img = parent[j].children;
        child_img[0].setAttribute("class", "shadow  bg-white rounded-lg ");
        parent[j].setAttribute('target', '_blank');
      }
    }
  },
  error: function error() {
    document.getElementById('insta_error_msg').style.display = "block";
  }
}); //run the feed

feed.run();
/******/ })()
;