var g1 = new Mainslider ("#main-slider_1");

function Mainslider (sSelector) {
    var g = this;
    // Data
    g.main           = $(sSelector);
    g.slides         = g.main.find('.main-slider__item');
    g.duration       = 500;
    g.regCssPosition = 0;
    g.regSlidesrafe  = 0;

    g.dotContainer = g.main.find('.main-slider__dots');

    g.dotSlider = g.main.find('.dots-slider');
    g.dotSlidePosition = 0;
    g.dotSlideCount    = 1;
    g.timer;
    // g.dotSlides = g.dotSlider.find('.dots-slider__item');
    // Logic1
    g.screensaverFit = function () {
        // debugger;

        var  imgs = g.main.find('.main-slider__img')
        // ,imgSrc = imgs.attr("src");
            ;
        console.debug(imgs);
        imgs.css("display","none");
        imgs.each(function(key, value) {
            var imgSrc = $(value).attr('src');
            $(value).closest('.main-slider__item').css({
                "background-image"    : "url(" + imgSrc + ")"
                ,"background-position" : "center"
                // ,"background-size"     : "auto 100%"
                ,"background-size"     : "cover"
            });
        });
    }
    g.moveSlider = function (currentSlide, direction){
        var  activeSlide  = g.slides.filter('.active')
            ,slideWidth   = g.slides.width()
            ,slideForAnim = 0
            ;

        if ( direction === "forward" ) {
            g.regCssPosition = +slideWidth; // сдвиг на ширишу слайда (left)
            g.regSlidesrafe = -slideWidth; // смещение (left)
        }
        else if ( direction === "back" ) {
            g.regCssPosition = -slideWidth; // сдвиг на ширишу слайда для будю аним (left)
            g.regSlidesrafe = +slideWidth; // смещение (left)
        }

        currentSlide.css('left', g.regCssPosition).addClass('inslide');

        slideForAnim = g.slides.filter('.inslide');

        activeSlide.css("left", g.regSlidesrafe).stop().animate({
                // "left" : g.regSlidesrafe
                "opacity" : 0
            }
            , g.duration
        );
        slideForAnim.css({"left" : 0, "opacity" : 0}).stop().animate({
                // "left" : 0
                "opacity" : 1
            }
            , g.duration
            , function () {
                g.slides.css("left", 0 ).removeClass('active');
                $(this).toggleClass('inslide active'); // ?
                g.setActiveDot();
            }
        );
    }
    g.sliderPrevNext = function () {
        // e.preventDefault();
        // console.log('ARROWBTN');
        var   currentArrow = $(this)
            , slides       = currentArrow.closest('.main-slider').find('.main-slider__item')
            , activeSlide  = slides.filter('.active')
            , nextSlide    = activeSlide.next()
            , prevSlide    = activeSlide.prev()
            , firstSlide   = g.slides.first()
            , lastSlide    = g.slides.last()
            ;
        if ( currentArrow.hasClass('main-slider__arrow_next') ) {
            // console.log('NextBTN');
            if ( nextSlide.length ) { // кольцевание слайдера по концу
                g.moveSlider(nextSlide , "forward");
            }
            else {
                g.moveSlider(firstSlide, "forward");
            }
        }
        else {
            // console.log('PREVBTN');
            if ( prevSlide.length ) { // кольцевание слайдера по началу
                g.moveSlider(prevSlide , "back");
            }
            else {
                g.moveSlider(lastSlide , "back");
            }
        }
    }

    g.createDots = function () {
        var dotMarkup = '<li class="main-slider__dots-item"> \
       <a href="#" class="main-slider__dots-link"> \
        <span class="main-slider__dot"></span> \
       </a> \
      </li>';
        // var srcImages = [];

        for (var i=0; i < g.slides.length; i++) {
            // srcImages[i] = g.slides.eq(i).find('.main-slider__pic').attr('src');
            g.dotContainer.append(dotMarkup);
            // g.dotContainer.find('.main-slider__dots-pic').eq(i).attr('src', srcImages[i]);
        }
        g.setActiveDot();
    }

    g.deleteDots = function () {
        g.dotContainer.empty();
    }

    g.setActiveDot = function () {
        g.dotContainer.find('.main-slider__dots-item')
            .eq(g.slides.filter('.active').index())
            .addClass('active')
            .siblings()
            .removeClass('active')
        ;
    }

    g.clickDots = function (event) {
        event.preventDefault();
        // console.log("Click-Link-dot");
        g.startTimer();
        var  dots            = g.dotContainer.find('.main-slider__dots-item')
            ,activeDot       = dots.filter('.active')
            ,currentDot      = $(this).closest('.main-slider__dots-item')
            ,currenDotIndex  = currentDot.index()
            ,direction       = (activeDot.index() < currenDotIndex) ? "forward" : "back"
            ,currentSlide    = g.slides.eq(currenDotIndex)
            ;
        g.moveSlider(currentSlide, direction);
    }
    g.sliderAutoPlay = function () {
        var
            activeSlide  = g.slides.filter('.active')
            , nextSlide    = activeSlide.next()
        //  , prevSlide    = activeSlide.prev()
            , firstSlide   = g.slides.first();
        //  , lastSlide    = s.slides.last()
        //  ;
        if ( nextSlide.length ) {
            // s.moveSlider(nextSlide);
            g.moveSlider(nextSlide);
        }
        else {
            // s.moveSlider(firstSlide);
            g.moveSlider(firstSlide);
        }
        // setTimeout(s.moveSlider(nextSlide), duration);
    }
    g.startTimer = function () {
        window.clearInterval(g.timer);
        g.timer = window.setInterval(g.sliderAutoPlay, 3000);
    }

    // Events
    g.createDots(); // вызов ф-и для создания списка ссылок
    // g.getDotSliderItemWidth();
    // g.main.find('.main-slider__arrow').bind('click', g.sliderPrevNext);
    g.screensaverFit();
    g.dotContainer.find('.main-slider__dots-link').bind('click', g.clickDots);
    g.startTimer();
    // g.dotSlider.find('.dots-slider__arrow').bind('click', g.dotSliderPrevNext);
    // $(window).bind('mousedown', g.getDotSliderItemWidth);
    // $(window).bind('mouseup', g.getDotSliderItemWidth);
}