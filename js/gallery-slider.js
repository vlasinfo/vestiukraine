"use strict";

var g1 = new Galleryslider ("#gl-slider_1");
// g1.getSliderItemWidth();
function Galleryslider(sSelector) {
    var g = this;

    // Data
    g.main                     = $(sSelector);
    g.slides                   = g.main.find('.gl-slider__item');
    g.sliderList               = g.main.find('.gl-slider__list');
    g.sliderListWrap           = g.main.find('.gl-slider__list-wrap');
    g.slidecount               = g.sliderList.find('.gl-slider__item').length
    g.slideLink                = g.main.find('.gl-slider__link');
    g.PrevContainer            = g.main.find('.gl-slider__preview-container');
    g.PrevContainerBtn         = g.PrevContainer.find('.gl-slider__preview-container__btn');
    g.PrevContainerArrow       = g.PrevContainer.find('.gl-slider__preview-container-arrow');
    g.PrevContainerImg         = g.PrevContainer.find('.gl-slider__photo-preview');
    g.PrevContainerImgCaption  = g.PrevContainer.find('.gl-slider__photo-caption span');
    g.duration                 = 400;
    g.regCssPosition           = 0;
    g.regSlidesrafe            = 0;
    g.prevSlideWidth           = 0;
    g.flag                     = false;
    g.saveCurrentSlide         = null;
    g.countVisibleSlides       = 5;
    // g.tabLink           = g.main.find('.gl-slider__link');
    // g.tabListItem       = g.main.find('.team-tab__content-list-item');
    // g.photoPreview      = g.main.find('.team-gallery__photo-preview');
    // g.resizeWidthSlides = g.debounce(g.getSliderItemWidth, 100);

    // Logic

    g.moveSlider = function(direction) {
        var  activeSlide    = g.sliderList.find('.gl-slider__item').filter('.active')
            ,nextSlide      = activeSlide.next()
            ,prevSlide      = activeSlide.prev()
            ,slideWidth     = activeSlide.width()
            ,slideWidthPrev = prevSlide.width()
            ,firstSlide     = g.sliderList.find('.gl-slider__item:first')
            ,lastSlide      = g.sliderList.find('.gl-slider__item:last')
            ;

        if ( direction === "forward" ) {
            g.flag = true;
            g.regCssPosition = -slideWidth; // сдвиг на ширишу слайда
            // console.debug(g.regCssPosition);
            g.sliderList.animate({
                    "left" : g.regCssPosition
                }
                ,g.duration-100
                ,function () {
                    // nextSlide.css("transition-duration", 0).removeClass('zoom');
                    nextSlide.addClass('active').siblings().removeClass('active');
                    // nextSlide.next().css("transition-duration", 0).addClass('zoom');
                    // console.debug(firstSlide, g.sliderList);
                    g.sliderList.css({'left' : 0});
                    firstSlide.appendTo(g.sliderList);
                    g.flag = false;
                }
            );
            // window.setTimeout(function() {g.flag = false;}, g.duration+200 );
        }
        else if ( direction === "back" ) {
            g.flag = true;
            g.regCssPosition = -lastSlide.width(); // сдвиг на ширишу слайда
            // console.debug(g.regCssPosition);
            lastSlide.prependTo(g.sliderList);
            g.sliderList.css({'left' : g.regCssPosition});
            g.sliderList.animate({
                    "left" : 0
                }
                ,g.duration-100
                ,function () {
                    activeSlide.prev().addClass('active').siblings().removeClass('active');
                    g.flag = false;
                }
            );
            // window.setTimeout(function() {g.flag = false;}, g.duration+200);
        }
    }
    g.sliderPrevNext = function () {
        var currentArrow = $(this);
        // console.log("sdasdasda");
        if (g.flag == false ) {
            if ( currentArrow.hasClass('gl-slider__arrow_next') ) {
                g.moveSlider("forward");
                // console.log("NEXT");
            }
            else {
                // console.log("PREV");
                g.moveSlider("back");
            }
        }
        else return;
    }
    g.changeCountItems = function () {
        var windowWidth = Number($(window).width());
        // console.log("WindowWIdth" + windowWidth);
        if ( windowWidth <= 1920 && windowWidth >= 1800  ) {
            g.countVisibleSlides = 5;
        }
        else if ( windowWidth <= 1800 && windowWidth >= 1600  ) {
            g.countVisibleSlides = 4;
        }
        else if (windowWidth <= 1600 && windowWidth >= 1280) {
            g.countVisibleSlides = 3;
        }
        else if (windowWidth <= 1280 && windowWidth >= 1024) {
            g.countVisibleSlides = 3;
        }
        else if (windowWidth <= 1024) {
            g.countVisibleSlides = 2;
        }
        return g.countVisibleSlides;
    }
    g.getSliderItemWidth = function () {
        var  sliderList = g.main.find('.gl-slider__list')
        // ,SliderWrapWidth = g.sliderListWrap.width()
            ,sliderWrapWidth = g.main.find('.gl-slider__list-wrap').width()
        // ,SliderWrapWidth = $(this).closest('.gl-slider__list-wrap').width()
            ,slide = g.main.find('.gl-slider__item')
            ,slideMaxWidth = 0;
        ;
        // slideMaxWidth = sliderWrapWidth / 6; // Количество видимых слайдов!!!
        slideMaxWidth = sliderWrapWidth / g.changeCountItems(); // Количество видимых слайдов!!!
        slide.css("max-width", slideMaxWidth);
        // console.log("listwrapWIDTH = " + sliderWrapWidth);
        // console.log("slidemaxWidth = " + slideMaxWidth);
        return slideMaxWidth;
    }
    g.debounce = function (func, wait, immediate) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }
    g.resizeWidthSlides = g.debounce(g.getSliderItemWidth, 100);

    g.clickSlideLink = function (event) {
        event.preventDefault();
        console.log("OPen Window");
        var  currentSlideLink = $(this)
            ,currentSlideItem = currentSlideLink.closest('.gl-slider__item')
        // ,currentSlideImg = currentSlideLink.children()
        // ,slideImgSrc = currentSlideImg.attr('src')
        // ,slideImgAlt = currentSlideImg.attr('alt')
            ;
        g.saveCurrentSlide = currentSlideItem;
        g.addPreviewContent(currentSlideItem);
        g.showClosePrevContainer("open");
    }
    g.clickCloseBtn = function () {
        g.showClosePrevContainer("close");
    }
    g.showClosePrevContainer = function (action) {

        if (action == "open") {
            g.PrevContainer.css("display", "block")
                .animate({
                        "opacity" : 1
                    }
                    , 800
                );
        }
        else if (action == "close") {
            g.PrevContainer.animate({
                    "opacity" : 0
                }
                , 800
                ,function () {
                    g.PrevContainer.css("display","none");
                }
            );
        }
    }
    g.addPreviewContent = function (currentSlideItem) {
        var currentSlideImg = currentSlideItem.find('.gl-slider__img')
            ,slideImgSrc    = currentSlideImg.attr('src')
            ,slideImgAlt    = currentSlideImg.attr('alt')
            ,PhotoWrap = g.PrevContainer.find('.gl-slider__photo-preview-wrap')
            ;
        g.PrevContainerImgCaption.removeClass('anim-type-text');
        PhotoWrap.animate({
                "opacity" : 0
            }
            ,250
            ,function () {
                g.PrevContainerImg.attr('src', slideImgSrc);
                g.PrevContainerImgCaption.html(slideImgAlt).addClass('anim-type-text');
                $(this).animate({
                        "opacity" : 1
                    }
                    ,250
                );
            }
        );
        // PhotoWrap.css("opacity", 1);
    }
    g.PrevContainerPrevNext = function () {
        var  currentArrow = $(this)
            ,nextSlide    = g.saveCurrentSlide.next()
            ,prevSlide    = g.saveCurrentSlide.prev()
            ,firstSlide   = g.sliderList.find('.gl-slider__item:first')
            ,lastSlide	  = g.sliderList.find('.gl-slider__item:last')
            ;
        // console.log("sdasdasda");
        // if (g.flag == false ) {
        if ( currentArrow.hasClass('gl-slider__preview-container-arrow_next') ) {
            // g.moveSlider("forward");
            if ( nextSlide.length > 0 ) {
                g.saveCurrentSlide = nextSlide;
                g.addPreviewContent(nextSlide);
            }
            else {
                console.debug(firstSlide);
                g.saveCurrentSlide = firstSlide;
                g.addPreviewContent(firstSlide);
            }
            console.log("NEXTPreview");
        }
        else {
            if ( prevSlide.length > 0 ) {
                g.saveCurrentSlide = prevSlide;
                g.addPreviewContent(prevSlide);
            }
            else {
                console.debug(lastSlide);
                g.saveCurrentSlide = lastSlide;
                g.addPreviewContent(lastSlide);
            }
            console.log("PREV Preview");
            // g.moveSlider("back");
        }
        // }
        // else return;
    }
    // Events
    g.getSliderItemWidth();
    g.main.find('.gl-slider__arrow').bind('click', g.sliderPrevNext);
    g.PrevContainerArrow.bind('click', g.PrevContainerPrevNext);
    g.slideLink.bind('click', g.clickSlideLink);
    g.PrevContainerBtn.bind('click', g.clickCloseBtn);
    $(window).bind('mousedown', g.getSliderItemWidth);
    $(window).bind('resize', g.resizeWidthSlides);
    // $(window).bind('mouseup', g.getSliderItemWidth);
}

// function Galleryslider (sSelector) {
// 	var g = this;
// 	// Data
// 	g.main           = $(sSelector);
// 	g.slides         = g.main.find('.gl-slider__item');
// 	g.duration       = 500;
// 	g.regCssPosition = 0;
// 	g.regSlidesrafe  = 0;

// 	g.dotContainer = g.main.find('.gl-slider__dots');

// 	g.dotSlider = g.main.find('.dots-slider');
// 	g.dotSlidePosition = 0;
// 	g.dotSlideCount    = 1;

// 	g.playButton = g.main.find('.video-container__play-button');
// 	g.closeButton = g.main.find('.video-container__close-button');
// 	// g.VideoFrame = g.main.find('.video-container__frame');
// 	// g.dotSlides = g.dotSlider.find('.dots-slider__item');
// 	// g.player = null;
// 	// Logic1
// 	g.moveSlider = function (currentSlide, direction){
// 			var  activeSlide  = g.slides.filter('.active')
// 				,slideWidth   = g.slides.width()
// 				,slideForAnim = 0
// 				; 

// 			if ( direction === "forward" ) { 
// 				g.regCssPosition = +slideWidth; // сдвиг на ширишу слайда (left)
// 				g.regSlidesrafe = -slideWidth; // смещение (left) 
// 				} 
// 			else if ( direction === "back" ) {
// 				g.regCssPosition = -slideWidth; // сдвиг на ширишу слайда для будю аним (left) 
// 				g.regSlidesrafe = +slideWidth; // смещение (left) 
// 				}

// 			currentSlide.css('left', g.regCssPosition).addClass('inslide');

// 			slideForAnim = g.slides.filter('.inslide'); 

// 			activeSlide.css("left", g.regSlidesrafe).stop().animate({
// 				// "left" : g.regSlidesrafe
// 				"opacity" : 0
// 				}
// 				, g.duration
// 				);
// 			slideForAnim.css({"left" : 0, "opacity" : 0}).stop().animate({
// 				// "left" : 0
// 				"opacity" : 1
// 				}
// 				, g.duration
// 				, function () {
// 					g.slides.css("left", 0 ).removeClass('active');
// 					$(this).toggleClass('inslide active'); // ?
// 					g.setActiveDot();
// 					}
// 				);
// 			g.addSrcLink(slideForAnim);
// 			g.pauseVideo(activeSlide);
// 		}
// 	g.sliderPrevNext = function () {
// 		// e.preventDefault();
// 		// console.log('ARROWBTN');
// 		var   currentArrow = $(this)
// 			, slides       = currentArrow.closest('.gl-slider').find('.gl-slider__item') 
// 			, activeSlide  = slides.filter('.active')
// 			, nextSlide    = activeSlide.next()
// 			, prevSlide    = activeSlide.prev()
// 			, firstSlide   = g.slides.first()
// 			, lastSlide    = g.slides.last()
// 			;
// 		if ( currentArrow.hasClass('gl-slider__arrow_next') ) {
// 				// console.log('NextBTN');
// 				if ( nextSlide.length ) { // кольцевание слайдера по концу
// 					g.moveSlider(nextSlide , "forward");
// 					}
// 				else {
// 					g.moveSlider(firstSlide, "forward");
// 					}
// 			}
// 		else {
// 				// console.log('PREVBTN');
// 				if ( prevSlide.length ) { // кольцевание слайдера по началу
// 					g.moveSlider(prevSlide , "back");
// 					}
// 				else {
// 					g.moveSlider(lastSlide , "back");
// 					}
// 			}
// 		}

// 	g.createDots = function () {
// 		var dotMarkup = '<li class="gl-slider__dots-item dots-slider__item"> \
// 							<a href="#" class="gl-slider__dots-link"> \
// 								<img src="" alt="" class="gl-slider__dots-pic"> \
// 							</a> \
// 						</li>';
// 		var srcImages = [];

// 		for (var i=0; i < g.slides.length; i++) {
// 			srcImages[i] = g.slides.eq(i).find('.video-container__photo').attr('src');
// 			g.dotContainer.append(dotMarkup);
// 			g.dotContainer.find('.gl-slider__dots-pic').eq(i).attr('src', srcImages[i]);
// 			}

// 		g.setActiveDot();
// 		}

// 	g.deleteDots = function () {
// 		g.dotContainer.empty();
// 		}

// 	g.setActiveDot = function () {
// 		g.dotContainer.find('.gl-slider__dots-item')
// 						.eq(g.slides.filter('.active').index())
// 						.addClass('active')
// 						.siblings()
// 						.removeClass('active')
// 						;
// 		}

// 	g.clickDots = function (event) {
// 		event.preventDefault();
// 		// console.log("Click-Link-dot");
// 		var  dots            = g.dotContainer.find('.gl-slider__dots-item')
// 			,activeDot       = dots.filter('.active')
// 			,currentDot      = $(this).closest('.gl-slider__dots-item')
// 			,currenDotIndex  = currentDot.index()
// 			,direction       = (activeDot.index() < currenDotIndex) ? "forward" : "back"
// 			,currentSlide    = g.slides.eq(currenDotIndex) 
// 			;
// 		g.moveSlider(currentSlide, direction);
// 		}

// 	g.getDotSliderItemWidth = function () {
// 		var  dotSliderList = g.dotSlider.find('.dots-slider__list')
// 			,dotSliderWrapWidth = g.dotSlider.children().width()
// 			,dotSlide = g.dotSlider.find('.dots-slider__item')
// 			,dotSlideMaxWidth = 0;
// 			;
// 			dotSlideMaxWidth = dotSliderWrapWidth / 3;
// 		dotSlide.css("max-width", dotSlideMaxWidth);
// 		return dotSlideMaxWidth;
// 		// console.log("listwrapWIDTH = " + dotSliderWrapWidth);
// 		}

// 	g.dotSliderPrevNext = function () {
// 			var currentArrow = $(this);
// 			if (currentArrow.hasClass('dots-slider__arrow_next')) {
// 				g.dotMoveSlide("forward");
// 				// console.log("NEXT");
// 				}
// 			else {
// 				// console.log("PREV");
// 				g.dotMoveSlide("back");	
// 			}
// 		}
// 	g.dotSlideAnimation = function (direction) {
// 		var   dotSliderWrapWidth = g.dotSlider.children().width()
// 			, dotSliderItemWidth = g.getDotSliderItemWidth()
// 			, dotSliderList      = g.dotSlider.find('.dots-slider__list')
// 			, dotSlides          = g.dotSlider.find('.dots-slider__item')
// 			, slidePositionMax   = -dotSliderItemWidth * dotSlides.length + dotSliderItemWidth*3
// 			, step               = 0
// 			, slidePositionBound = 0;
// 			;

// 			if (direction === "forward") {
// 				g.dotSlidePosition = Math.max(g.dotSlidePosition - dotSliderItemWidth * g.dotSlideCount, slidePositionMax);
// 				slidePositionBound = slidePositionMax;
// 				step = g.dotSlidePosition-50; 
// 				}
// 			else if ( direction === "back" ) {
// 				g.dotSlidePosition = Math.min(g.dotSlidePosition + dotSliderItemWidth * g.dotSlideCount, 0);
// 				slidePositionBound = 0;
// 				step = g.dotSlidePosition+50; 
// 				}


// 			if (g.dotSlidePosition == slidePositionBound) {
// 				// console.log("step " + step);
// 				dotSliderList.css({'transform' : "translateX(" + step + 'px' + ")"});
// 				setTimeout(function(){
// 					dotSliderList.css({'transform' : "translateX(" + g.dotSlidePosition + 'px' + ")"}); 
// 					}
// 					, 500
// 					);
// 				}
// 			else {
// 				dotSliderList.css({'transform' : "translateX(" + g.dotSlidePosition + 'px' + ")"}); 
// 				}

// 		}
// 	g.dotMoveSlide = function (direction) {

// 			if (direction === "forward") {

// 				g.dotSlideAnimation("forward");

// 				}
// 			else if (direction === "back") {

// 				g.dotSlideAnimation("back");

// 				}	
// 		}
// 	g.clickPlayButton = function () {

// 		var  screensaver = $(this).parent('.video-container').find(".video-container__photo-wrap")
// 			,videoContainer = $(this).parent('.video-container').find('.video-container__video')
// 			,videoCloseBtn = $(this).parent('.video-container').find('.video-container__close-button')
// 			,bool = true
// 			,autoplay = ";autoplay=1"
// 			,src = null
// 			; 
// 			$(this).hide(600);
// 			screensaver.animate({
// 					"opacity": 0
// 					}
// 					, 800
// 					, function  () {
// 						screensaver.css({
// 							// 'display':'none'
// 							'visibility':'hidden'
// 							})
// 						}
// 			);
// 			src = videoContainer.children().attr('src') + autoplay;
// 			videoContainer.children().attr('src' , src);
// 			videoCloseBtn.css("display","block");
// 		}
// 	g.pauseVideo = function (activeSlide) {
// 		var  screensaver = activeSlide.find(".video-container__photo-wrap")
// 			// ,videoContainer = activeSlide.find('.video-container__video')
// 			,currentButton = activeSlide.find('.video-container__play-button')
// 			; 
// 			currentButton.show(600);
// 			screensaver.animate({
// 					"opacity": 1
// 					}
// 					, 800
// 					, function  () {
// 						screensaver.css({
// 							// 'display':'none'
// 							'visibility':'visible'
// 							})
// 						}
// 			);
// 	}
// 	g.addSrcLink = function (currentSlide) {

// 		var curPlayer = $('#video');

// 		curPlayer.fadeOut(function(){
// 			$(this).empty().remove();
// 		});


// 		var frameMarkup = "<iframe src='' frameborder='0' allowfullscreen='' id='video' class='video-container__frame'></iframe>";
// 		var  src = currentSlide.data('link')
// 			,addToSrc = "?enablejsapi=1&controls=0&rel=0&showinfo=0&wmode=transparent"
// 			,currentVideoContainer = currentSlide.find('.video-container__video')
// 			;
// 			// if (currentVideoContainer.children() == null) {
// 				currentVideoContainer.append(frameMarkup);
// 				currentVideoContainer.children().attr('src', src+addToSrc);
// 			// }
// 			// else {
// 			// 	currentVideoContainer.children().attr('src', src+addToSrc);
// 			// }
// 		}
// 	g.videoClose = function () {
// 		var
// 			currentSlide = $(this).closest('.gl-slider__item')
// 			;
// 		g.pauseVideo(currentSlide);
// 		g.addSrcLink(currentSlide);
// 		$(this).css("display","none");
// 		// console.debug(currentSlide);
// 	}
// 	// Events
// 	g.createDots(); // вызов ф-и для создания списка ссылок 
// 	g.getDotSliderItemWidth();
// 	g.main.find('.gl-slider__arrow').bind('click', g.sliderPrevNext);
// 	g.dotContainer.find('.gl-slider__dots-link').bind('click', g.clickDots);
// 	g.playButton.bind('click' , g.clickPlayButton);
// 	g.closeButton.bind('click' , g.videoClose);
// 	g.dotSlider.find('.dots-slider__arrow').bind('click', g.dotSliderPrevNext);
// 	$(window).bind('mousedown', g.getDotSliderItemWidth);
// 	$(window).bind('mouseup', g.getDotSliderItemWidth);
// 	g.addSrcLink($('.gl-slider__item.active'));
// }