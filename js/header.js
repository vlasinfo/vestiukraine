"use strict";

function headerAutoHeight () {
    var  ywindow    = window.innerHeight
        ,ywindowOut = window.outerHeight;
    document.getElementById('header').style.height = String(ywindow)+'px';
}
function headerAutoHeightScroll (event) {
    var  ywindow = window.innerHeight
        ,nScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (  Number(nScroll) <= Number(ywindow) ) {
        document.getElementById('header').style.height = String( Number(ywindow) ) + 'px';
    }
}


window.setTimeout(headerAutoHeight(),500);
headerAutoHeight();
window.addEventListener('click', headerAutoHeightScroll);
window.addEventListener('scroll', headerAutoHeightScroll);
window.addEventListener('resize', headerAutoHeight);