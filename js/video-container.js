"use strict";

// var v1 = new Videocontainer ("#video-container_1");

function Videocontainer (sSelector) {
    var v = this;

    //Data
    v.main = $(sSelector);
    v.closeVideoBtn     = v.main.find('.video-container__close-button');
    v.playBtn           = v.main.find('.video-container__play-button');
    v.staticSrc         = v.main.find('.video-container__frame').attr('src');
    v.screensaverWrap   = v.main.find('.video-container__photo-wrap')
    //Logic
    v.screensaverFit = function () {
        // debugger;

        var  img    = v.screensaverWrap.children()
            ,imgSrc = img.attr("src");
        ;
        img.css("display","none");
        v.screensaverWrap.css({
            "background-image"    : "url(" + imgSrc + ")"
            ,"background-position" : "center"
            ,"background-size"     : "cover"
        });
    }
    v.clickPlayBtn = function () {
        // console.log("PLAYVIDEO");
        var  screensaver    = v.main.find(".video-container__photo-wrap")
            ,videoContainer = v.main.find('.video-container__video')
            ,videoCloseBtn  = v.main.find('.video-container__close-button')
            ,bool           = true
            ,autoplay       = ";autoplay=1"
            ,addToSrc       = "?enablejsapi=1&controls=0&rel=0&showinfo=0&wmode=transparent"
        // ,addToSrc       = "?enablejsapi=1&controls=0&rel=0&showinfo=0&wmode=transparent&output=embed"
            ,src            = null
            ;
        $(this).hide(600);
        screensaver.animate({
                "opacity": 0
            }
            , 800
            , function  () {
                screensaver.css({
                    'display':'none'
                    // 'visibility':'hidden'
                })
            }
        );
        src = v.staticSrc + addToSrc + autoplay;
        videoContainer.children().attr('src' , src);
        videoCloseBtn.css("display","block");
    }
    v.pauseVideo = function () {
        var  screensaver = v.main.find(".video-container__photo-wrap")
        // ,videoContainer = activeSlide.find('.video-container__video')
            ,currentButton = v.main.find('.video-container__play-button')
            ,videoFrame = v.main.find('.video-container__frame')
            ;
        videoFrame.attr('src', v.staticSrc);
        currentButton.show(600);
        screensaver.animate({
                "opacity": 1
            }
            , 800
            , function  () {
                screensaver.css({
                    'display':'block'
                    // 'visibility':'visible'
                })
            }
        );
    }
    v.ClickVideoBtn = function () {
        // console.log("CLOSEVIDEO");
        $(this).css("display","none");
        v.pauseVideo();
        // console.debug(currentSlide);
    }
    //Events
    v.screensaverFit();
    v.closeVideoBtn.bind('click', v.ClickVideoBtn);
    v.playBtn.bind('click', v.clickPlayBtn);
}