"use strict";

(function() {
    document.addEventListener("DOMContentLoaded", function() {
        (function imgCover() {
            var imgs = document.getElementsByClassName('img-ctn');
            for (var i = 0; i < imgs.length; i++) {
                var img = imgs[i].getElementsByTagName('img');
                var src = img[0].src;
                imgs[i].style.background = "url(" + src + ")";
                imgs[i].style.backgroundSize = 'cover';
                imgs[i].style.backgroundPosition = 'center';
                imgs[i].removeChild(img[0]);
            }
        } ());

        (function imgContain() {
            var imgs = document.getElementsByClassName('img-ctn2');
            for (var i = 0; i < imgs.length; i++) {
                var img = imgs[i].getElementsByTagName('img');
                var src = img[0].src;
                imgs[i].style.background = "url(" + src + ")";
                imgs[i].style.backgroundSize = 'contain';
                imgs[i].style.backgroundPosition = 'center';
                imgs[i].style.backgroundRepeat = 'no-repeat';
                imgs[i].removeChild(img[0]);
            }
        } ());
    });
} ());