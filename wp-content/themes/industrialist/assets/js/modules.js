(function($) {
    "use strict";

    window.mkd = {};
    mkd.modules = {};

    mkd.scroll = 0;
    mkd.window = $(window);
    mkd.document = $(document);
    mkd.windowWidth = $(window).width();
    mkd.windowHeight = $(window).height();
    mkd.body = $('body');
    mkd.html = $('html, body');
    mkd.htmlEl = $('html');
    mkd.menuDropdownHeightSet = false;
    mkd.defaultHeaderStyle = '';
    mkd.minVideoWidth = 1500;
    mkd.videoWidthOriginal = 1280;
    mkd.videoHeightOriginal = 720;
    mkd.videoRatio = 1280/720;

    mkd.mkdOnDocumentReady = mkdOnDocumentReady;
    mkd.mkdOnWindowLoad = mkdOnWindowLoad;
    mkd.mkdOnWindowResize = mkdOnWindowResize;
    mkd.mkdOnWindowScroll = mkdOnWindowScroll;

    $(document).ready(mkdOnDocumentReady);
    $(window).load(mkdOnWindowLoad);
    $(window).resize(mkdOnWindowResize);
    $(window).scroll(mkdOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function mkdOnDocumentReady() {
        mkd.scroll = $(window).scrollTop();

        //set global variable for header style which we will use in various functions
        if(mkd.body.hasClass('mkd-dark-header')){ mkd.defaultHeaderStyle = 'mkd-dark-header';}
        if(mkd.body.hasClass('mkd-light-header')){ mkd.defaultHeaderStyle = 'mkd-light-header';}

    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function mkdOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function mkdOnWindowResize() {
        mkd.windowWidth = $(window).width();
        mkd.windowHeight = $(window).height();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function mkdOnWindowScroll() {
        mkd.scroll = $(window).scrollTop();
    }



    //set boxed layout width variable for various calculations

    switch(true){
        case mkd.body.hasClass('mkd-grid-1300'):
            mkd.boxedLayoutWidth = 1350;
            break;
        case mkd.body.hasClass('mkd-grid-1200'):
            mkd.boxedLayoutWidth = 1250;
            break;
        case mkd.body.hasClass('mkd-grid-1000'):
            mkd.boxedLayoutWidth = 1050;
            break;
        case mkd.body.hasClass('mkd-grid-800'):
            mkd.boxedLayoutWidth = 850;
            break;
        default :
            mkd.boxedLayoutWidth = 1150;
            break;
    }

})(jQuery);
(function ($) {
    "use strict";

    var common = {};
    mkd.modules.common = common;

    common.mkdIsTouchDevice = mkdIsTouchDevice;
    common.mkdDisableSmoothScrollForMac = mkdDisableSmoothScrollForMac;
    common.mkdFluidVideo = mkdFluidVideo;
    common.mkdPreloadBackgrounds = mkdPreloadBackgrounds;
    common.mkdPrettyPhoto = mkdPrettyPhoto;
    common.mkdCheckHeaderStyleOnScroll = mkdCheckHeaderStyleOnScroll;
    common.mkdInitParallax = mkdInitParallax;
    common.getLoadMoreData = getLoadMoreData;
    common.setLoadMoreAjaxData = setLoadMoreAjaxData;

    //common.mkdSmoothScroll = mkdSmoothScroll;
    common.mkdEnableScroll = mkdEnableScroll;
    common.mkdDisableScroll = mkdDisableScroll;
    common.mkdWheel = mkdWheel;
    common.mkdKeydown = mkdKeydown;
    common.mkdPreventDefaultValue = mkdPreventDefaultValue;
    common.mkdOwlSlider = mkdOwlSlider;
    common.mkdInitSelfHostedVideoPlayer = mkdInitSelfHostedVideoPlayer;
    common.mkdSelfHostedVideoSize = mkdSelfHostedVideoSize;
    common.mkdInitBackToTop = mkdInitBackToTop;
    common.mkdBackButtonShowHide = mkdBackButtonShowHide;
    common.mkdSmoothTransition = mkdSmoothTransition;

    common.mkdOnDocumentReady = mkdOnDocumentReady;
    common.mkdOnWindowLoad = mkdOnWindowLoad;
    common.mkdOnWindowResize = mkdOnWindowResize;
    common.mkdOnWindowScroll = mkdOnWindowScroll;

    $(document).ready(mkdOnDocumentReady);
    $(window).load(mkdOnWindowLoad);
    $(window).resize(mkdOnWindowResize);
    $(window).scroll(mkdOnWindowScroll);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdOnDocumentReady() {
        mkdIsTouchDevice();
        mkdDisableSmoothScrollForMac();
        mkdFluidVideo();
        mkdPreloadBackgrounds();
        mkdPrettyPhoto();
        mkdInitElementsAnimations();
        mkdInitAnchor().init();
        mkdInitVideoBackground();
        mkdInitVideoBackgroundSize();
        mkdSetContentBottomMargin();
        //mkdSmoothScroll();
        mkdOwlSlider();
        mkdInitSelfHostedVideoPlayer();
        mkdSelfHostedVideoSize();
        mkdInitBackToTop();
        mkdBackButtonShowHide();
    }

    /* 
     All functions to be called on $(window).load() should be in this function
     */
    function mkdOnWindowLoad() {
        mkdCheckHeaderStyleOnScroll(); //called on load since all content needs to be loaded in order to calculate row's position right
        mkdInitParallax();
        mkdSmoothTransition();
    }

    /* 
     All functions to be called on $(window).resize() should be in this function
     */
    function mkdOnWindowResize() {
        mkdInitVideoBackgroundSize();
        mkdSelfHostedVideoSize();
    }

    /* 
     All functions to be called on $(window).scroll() should be in this function
     */
    function mkdOnWindowScroll() {

    }

    /*
     ** Disable shortcodes animation on appear for touch devices
     */
    function mkdIsTouchDevice() {
        if (Modernizr.touch && !mkd.body.hasClass('mkd-no-animations-on-touch')) {
            mkd.body.addClass('mkd-no-animations-on-touch');
        }
    }

    /*
     ** Disable smooth scroll for mac if smooth scroll is enabled
     */
    function mkdDisableSmoothScrollForMac() {
        var os = navigator.appVersion.toLowerCase();

        if (os.indexOf('mac') > -1 && mkd.body.hasClass('mkd-smooth-scroll')) {
            mkd.body.removeClass('mkd-smooth-scroll');
        }
    }

    function mkdFluidVideo() {
        fluidvids.init({
            selector: ['iframe'],
            players: ['www.youtube.com', 'player.vimeo.com']
        });
    }

    /**
     * Init Owl Carousel
     */
    function mkdOwlSlider() {

        var sliders = $('.mkd-owl-slider');

        if (sliders.length) {
            sliders.each(function () {
                var slider = $(this);

                slider.owlCarousel({
                    autoplay: true,
                    autoplayTimeout: 5000,
                    smartSpeed: 300,
                    items: 1,
                    animateOut: 'owlfadeOut',
                    animateIn: 'owlfadeIn',
                    loop: true,
                    dots: false,
                    nav: true,
                    navText: [
                        '<span class="mkd-prev-icon"><i class="fa fa-angle-left"></i></span>',
                        '<span class="mkd-next-icon"><i class="fa fa-angle-right"></i></span>'
                    ]
                });

                slider.css('opacity', '1');
            });
        }
    }


    /*
     *	Preload background images for elements that have 'mkd-preload-background' class
     */
    function mkdPreloadBackgrounds() {

        $(".mkd-preload-background").each(function () {
            var preloadBackground = $(this);
            if (preloadBackground.css("background-image") !== "" && preloadBackground.css("background-image") != "none") {

                var bgUrl = preloadBackground.attr('style');

                bgUrl = bgUrl.match(/url\(["']?([^'")]+)['"]?\)/);
                bgUrl = bgUrl ? bgUrl[1] : "";

                if (bgUrl) {
                    var backImg = new Image();
                    backImg.src = bgUrl;
                    $(backImg).load(function () {
                        preloadBackground.removeClass('mkd-preload-background');
                    });
                }
            } else {
                $(window).load(function () {
                    preloadBackground.removeClass('mkd-preload-background');
                }); //make sure that mkd-preload-background class is removed from elements with forced background none in css
            }
        });
    }

    function mkdPrettyPhoto() {
        /*jshint multistr: true */
        var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><span class="fa fa-angle-right"></span></a> \
                                            <a class="pp_previous" href="#"><span class="fa fa-angle-left"></span></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';

        $("a[data-rel^='prettyPhoto']").prettyPhoto({
            hook: 'data-rel',
            animation_speed: 'normal', /* fast/slow/normal */
            slideshow: false, /* false OR interval time in ms */
            autoplay_slideshow: false, /* true/false */
            opacity: 0.80, /* Value between 0 and 1 */
            show_title: true, /* true/false */
            allow_resize: true, /* Resize the photos bigger than viewport. true/false */
            horizontal_padding: 0,
            default_width: 960,
            default_height: 540,
            counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
            theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
            hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
            wmode: 'opaque', /* Set the flash wmode attribute */
            autoplay: true, /* Automatically start videos: True/False */
            modal: false, /* If set to true, only the close button will close the window */
            overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
            keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
            deeplinking: false,
            custom_markup: '',
            social_tools: false,
            markup: markupWhole
        });
    }

    /*
     *	Check header style on scroll, depending on row settings
     */
    function mkdCheckHeaderStyleOnScroll() {

        if ($('[data-mkd_header_style]').length > 0 && mkd.body.hasClass('mkd-header-style-on-scroll')) {

            var waypointSelectors = $('.wpb_row.mkd-section');
            var changeStyle = function (element) {
                if (element.data("mkd_header_style") !== undefined) {
                    mkd.body.removeClass('mkd-dark-header mkd-light-header').addClass(element.data("mkd_header_style"));
                }
                else {
                    mkd.body.removeClass('mkd-dark-header mkd-light-header').addClass('' + mkd.defaultHeaderStyle);
                }
            };

            waypointSelectors.waypoint(function (direction) {
                if (direction === 'down') {
                    changeStyle($(this.element));
                }
            }, {offset: 0});

            waypointSelectors.waypoint(function (direction) {
                if (direction === 'up') {
                    changeStyle($(this.element));
                }
            }, {
                offset: function () {
                    return -$(this.element).outerHeight();
                }
            });
        }
    }

    /*
     *	Start animations on elements
     */
    function mkdInitElementsAnimations() {

        var touchClass = $('.mkd-no-animations-on-touch'),
            noAnimationsOnTouch = true,
            elements = $('.mkd-grow-in, .mkd-fade-in-down, .mkd-element-from-fade, .mkd-element-from-left, .mkd-element-from-right, .mkd-element-from-top, .mkd-element-from-bottom, .mkd-flip-in, .mkd-x-rotate, .mkd-z-rotate, .mkd-y-translate, .mkd-fade-in, .mkd-fade-in-left-x-rotate'),
            clasess,
            animationClass,
            animationData;

        if (touchClass.length) {
            noAnimationsOnTouch = false;
        }

        if (elements.length > 0 && noAnimationsOnTouch) {
            elements.each(function () {
                $(this).appear(function () {
                    animationData = $(this).data('animation');
                    if (typeof animationData !== 'undefined' && animationData !== '') {
                        animationClass = animationData;
                        $(this).addClass(animationClass + '-on');
                    }
                }, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});
            });
        }

    }


    /*
     ** Sections with parallax background image
     */
    function mkdInitParallax() {

        if (mkd.htmlEl.is('.no-touch') && $('.mkd-parallax-section-holder').length && !$('#mkd-parallax-container').length) {

            $('.mkd-parallax-section-holder').each(function () {

                var parallaxElement = $(this);
                if (parallaxElement.hasClass('mkd-full-screen-height-parallax')) {
                    parallaxElement.height(mkd.windowHeight);
                    parallaxElement.find('.mkd-parallax-content-outer').css('padding', 0);
                }
                var speed = parallaxElement.data('mkd-parallax-speed') * 0.4;

                parallaxElement.parallax("50%", speed);
            });

        }
    }

    /*
     **	Anchor functionality
     */
    var mkdInitAnchor = mkd.modules.common.mkdInitAnchor = function () {

        /**
         * Set active state on clicked anchor
         * @param anchor, clicked anchor
         */
        var setActiveState = function (anchor) {

            $('.mkd-main-menu .mkd-active-item, .mkd-mobile-nav .mkd-active-item, .mkd-vertical-menu .mkd-active-item, .mkd-fullscreen-menu .mkd-active-item').removeClass('mkd-active-item');
            anchor.parent().addClass('mkd-active-item');

            $('.mkd-main-menu a, .mkd-mobile-nav a, .mkd-vertical-menu a, .mkd-fullscreen-menu a').removeClass('current');
            anchor.addClass('current');
        };

        /**
         * Check anchor active state on scroll
         */
        var checkActiveStateOnScroll = function () {

            $('[data-mkd-anchor]').waypoint(function (direction) {
                if (direction === 'down') {
                    setActiveState($("a[href='" + window.location.href.split('#')[0] + "#" + $(this.element).data("mkd-anchor") + "']"));
                }
            }, {offset: '50%'});

            $('[data-mkd-anchor]').waypoint(function (direction) {
                if (direction === 'up') {
                    setActiveState($("a[href='" + window.location.href.split('#')[0] + "#" + $(this.element).data("mkd-anchor") + "']"));
                }
            }, {
                offset: function () {
                    return -($(this.element).outerHeight() - 150);
                }
            });

        };

        /**
         * Check anchor active state on load
         */
        var checkActiveStateOnLoad = function () {
            var hash = window.location.hash.split('#')[1];

            if (hash !== "" && $('[data-mkd-anchor="' + hash + '"]').length > 0) {
                //triggers click which is handled in 'anchorClick' function
                var linkURL = window.location.href.split('#')[0] + "#" + hash;
                if ($("a[href='" + linkURL + "']").length) { //if there is a link on page with such href
                    $("a[href='" + linkURL + "']").trigger("click");
                } else { //than create a fake link and click it
                    var link = $('<a/>').attr({'href': linkURL, 'class': 'mkd-anchor'}).appendTo('body');
                    link.trigger('click');
                }
            }
        };

        /**
         * Calculate header height to be substract from scroll amount
         * @param anchoredElementOffset, anchorded element offest
         */
        var headerHeihtToSubtract = function (anchoredElementOffset, anchoredElementPosition) {

            var headerHeight;
            if (mkd.windowWidth > 1024) {

                if (mkd.modules.header.behaviour == 'mkd-sticky-header-on-scroll-down-up') {
                    if (anchoredElementOffset > mkd.modules.header.stickyAppearAmount) {
                        mkd.modules.header.isStickyVisible = true;
                    }
                    else {
                        mkd.modules.header.isStickyVisible = false;
                    }
                }

                if (mkd.modules.header.behaviour == 'mkd-sticky-header-on-scroll-up') {
                    if (anchoredElementOffset > mkd.scroll) {
                        mkd.modules.header.isStickyVisible = false;
                    }
                }

                headerHeight = mkd.modules.header.isStickyVisible ? mkdGlobalVars.vars.mkdStickyHeaderTransparencyHeight : mkdPerPageVars.vars.mkdHeaderTransparencyHeight;
            }

            else {
                if (anchoredElementPosition === 'down') {
                    headerHeight = anchoredElementOffset > mkd.modules.header.stickyMobileAppearAmount ? 0 : mkd.modules.header.stickyMobileAppearAmount;
                }
                else {
                    headerHeight = mkdGlobalVars.vars.mkdMobileHeaderHeight;
                }
            }
            return headerHeight;
        };

        /**
         * Handle anchor click
         */
        var anchorClick = function () {
            mkd.document.on("click", ".mkd-main-menu a, .mkd-vertical-menu a, .mkd-fullscreen-menu a, .mkd-btn, .mkd-anchor, .mkd-mobile-nav a", function () {
                var scrollAmount;
                var anchor = $(this);
                var hash = anchor.prop("hash").split('#')[1];

                if (hash !== "" && $('[data-mkd-anchor="' + hash + '"]').length > 0 /*&& anchor.attr('href').split('#')[0] == window.location.href.split('#')[0]*/) {

                    var anchoredElementOffset = $('[data-mkd-anchor="' + hash + '"]').offset().top;
                    var anchoredElementPosition = anchoredElementOffset > mkd.scroll ? 'down' : 'up';
                    scrollAmount = $('[data-mkd-anchor="' + hash + '"]').offset().top - headerHeihtToSubtract(anchoredElementOffset, anchoredElementPosition);

                    setActiveState(anchor);

                    mkd.html.stop().animate({
                        scrollTop: Math.round(scrollAmount)
                    }, 1000, function () {
                        //change hash tag in url
                        if (history.pushState) {
                            history.pushState(null, null, '#' + hash);
                        }
                    });
                    return false;
                }
            });
        };

        return {
            init: function () {
                if ($('[data-mkd-anchor]').length) {
                    anchorClick();
                    checkActiveStateOnScroll();
                    $(window).load(function () {
                        checkActiveStateOnLoad();
                    });
                }
            }
        };

    };

    /*
     **	Video background initialization
     */
    function mkdInitVideoBackground() {

        $('.mkd-section .mkd-video-wrap .mkd-video').mediaelementplayer({
            enableKeyboard: false,
            iPadUseNativeControls: false,
            pauseOtherPlayers: false,
            // force iPhone's native controls
            iPhoneUseNativeControls: false,
            // force Android's native controls
            AndroidUseNativeControls: false
        });

        //mobile check
        if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
            mkdInitVideoBackgroundSize();
            $('.mkd-section .mkd-mobile-video-image').show();
            $('.mkd-section .mkd-video-wrap').remove();
        }
    }

    /*
     **	Calculate video background size
     */
    function mkdInitVideoBackgroundSize() {

        $('.mkd-section .mkd-video-wrap').each(function () {

            var element = $(this);
            var sectionWidth = element.closest('.mkd-section').outerWidth();
            element.width(sectionWidth);

            var sectionHeight = element.closest('.mkd-section').outerHeight();
            mkd.minVideoWidth = mkd.videoRatio * (sectionHeight + 20);
            element.height(sectionHeight);

            var scaleH = sectionWidth / mkd.videoWidthOriginal;
            var scaleV = sectionHeight / mkd.videoHeightOriginal;
            var scale = scaleV;
            if (scaleH > scaleV)
                scale = scaleH;
            if (scale * mkd.videoWidthOriginal < mkd.minVideoWidth) {
                scale = mkd.minVideoWidth / mkd.videoWidthOriginal;
            }

            element.find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * mkd.videoWidthOriginal + 2));
            element.find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * mkd.videoHeightOriginal + 2));
            element.scrollLeft((element.find('video').width() - sectionWidth) / 2);
            element.find('.mejs-overlay, .mejs-poster').scrollTop((element.find('video').height() - (sectionHeight)) / 2);
            element.scrollTop((element.find('video').height() - sectionHeight) / 2);
        });

    }

    /**
     * Initializes load more data params
     * @param container with defined data params
     * return array
     */
    function getLoadMoreData(container) {
        var dataList = container.data(),
            returnValue = {};

        for (var property in dataList) {
            if (dataList.hasOwnProperty(property)) {
                if (typeof dataList[property] !== 'undefined' && dataList[property] !== false) {
                    returnValue[property] = dataList[property];
                }
            }
        }

        return returnValue;
    }

    /**
     * Sets load more data params for ajax function
     * @param container with defined data params
     * return array
     */
    function setLoadMoreAjaxData(container, action) {
        var returnValue = {
            action: action
        };

        for (var property in container) {
            if (container.hasOwnProperty(property)) {

                if (typeof container[property] !== 'undefined' && container[property] !== false) {
                    returnValue[property] = container[property];
                }
            }
        }

        return returnValue;
    }

    /*
     **	Set content bottom margin because of the uncovering footer
     */
    function mkdSetContentBottomMargin() {
        var uncoverFooter = $('.mkd-footer-uncover');

        if (uncoverFooter.length) {
            $('.mkd-content').css('margin-bottom', $('.mkd-footer-inner').height());
        }
    }

    /*
     ** Initiate Smooth Scroll
     */
    //function mkdSmoothScroll(){
    //
    //	if(mkd.body.hasClass('mkd-smooth-scroll')){
    //
    //		var scrollTime = 0.4;			//Scroll time
    //		var scrollDistance = 300;		//Distance. Use smaller value for shorter scroll and greater value for longer scroll
    //
    //		var mobile_ie = -1 !== navigator.userAgent.indexOf("IEMobile");
    //
    //		var smoothScrollListener = function(event){
    //			event.preventDefault();
    //
    //			var delta = event.wheelDelta / 120 || -event.detail / 3;
    //			var scrollTop = mkd.window.scrollTop();
    //			var finalScroll = scrollTop - parseInt(delta * scrollDistance);
    //
    //			TweenLite.to(mkd.window, scrollTime, {
    //				scrollTo: {
    //					y: finalScroll, autoKill: !0
    //				},
    //				ease: Power1.easeOut,
    //				autoKill: !0,
    //				overwrite: 5
    //			});
    //		};
    //
    //		if (!$('html').hasClass('touch') && !mobile_ie) {
    //			if (window.addEventListener) {
    //				window.addEventListener('mousewheel', smoothScrollListener, false);
    //				window.addEventListener('DOMMouseScroll', smoothScrollListener, false);
    //			}
    //		}
    //	}
    //}

    function mkdDisableScroll() {

        if (window.addEventListener) {
            window.addEventListener('DOMMouseScroll', mkdWheel, false);
        }
        window.onmousewheel = document.onmousewheel = mkdWheel;
        document.onkeydown = mkdKeydown;

        if (mkd.body.hasClass('mkd-smooth-scroll')) {
            window.removeEventListener('mousewheel', smoothScrollListener, false);
            window.removeEventListener('DOMMouseScroll', smoothScrollListener, false);
        }
    }

    function mkdEnableScroll() {
        if (window.removeEventListener) {
            window.removeEventListener('DOMMouseScroll', mkdWheel, false);
        }
        window.onmousewheel = document.onmousewheel = document.onkeydown = null;

        if (mkd.body.hasClass('mkd-smooth-scroll')) {
            window.addEventListener('mousewheel', smoothScrollListener, false);
            window.addEventListener('DOMMouseScroll', smoothScrollListener, false);
        }
    }

    function mkdWheel(e) {
        mkdPreventDefaultValue(e);
    }

    function mkdKeydown(e) {
        var keys = [37, 38, 39, 40];

        for (var i = keys.length; i--;) {
            if (e.keyCode === keys[i]) {
                mkdPreventDefaultValue(e);
                return;
            }
        }
    }

    function mkdPreventDefaultValue(e) {
        e = e || window.event;
        if (e.preventDefault) {
            e.preventDefault();
        }
        e.returnValue = false;
    }

    function mkdInitSelfHostedVideoPlayer() {

        var players = $('.mkd-self-hosted-video');
        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }

    function mkdSelfHostedVideoSize() {

        $('.mkd-self-hosted-video-holder .mkd-video-wrap').each(function () {
            var thisVideo = $(this);

            var videoWidth = thisVideo.closest('.mkd-self-hosted-video-holder').outerWidth();
            var videoHeight = videoWidth / mkd.videoRatio;

            if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
                thisVideo.parent().width(videoWidth);
                thisVideo.parent().height(videoHeight);
            }

            thisVideo.width(videoWidth);
            thisVideo.height(videoHeight);

            thisVideo.find('video, .mejs-overlay, .mejs-poster').width(videoWidth);
            thisVideo.find('video, .mejs-overlay, .mejs-poster').height(videoHeight);
        });
    }

    function mkdToTopButton(a) {

        var b = $("#mkd-back-to-top");
        b.removeClass('off on');
        if (a === 'on') {
            b.addClass('on');
        } else {
            b.addClass('off');
        }
    }

    function mkdBackButtonShowHide() {
        mkd.window.scroll(function () {
            var b = $(this).scrollTop();
            var c = $(this).height();
            var d;
            if (b > 0) {
                d = b + c / 2;
            } else {
                d = 1;
            }
            if (d < 1e3) {
                mkdToTopButton('off');
            } else {
                mkdToTopButton('on');
            }
        });
    }

    function mkdInitBackToTop() {
        var backToTopButton = $('#mkd-back-to-top');
        backToTopButton.on('click', function (e) {
            e.preventDefault();
            mkd.html.animate({scrollTop: 0}, mkd.window.scrollTop() / 3, 'linear');
        });
    }

    function mkdSmoothTransition() {
        var loader = $('body > .mkd-smooth-transition-loader.mkd-mimic-ajax');
        if (loader.length) {
            loader.fadeOut(500);
            $(window).bind("pageshow", function (event) {
                if (event.originalEvent.persisted) {
                    loader.fadeOut(500);
                }
            });

            $('a').click(function (e) {
                var a = $(this);
                if (
                    e.which == 1 && // check if the left mouse button has been pressed
                    a.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
                    (typeof a.data('rel') === 'undefined') && //Not pretty photo link
                    (typeof a.attr('rel') === 'undefined') && //Not VC pretty photo link
                    !a.hasClass('mkd-like') && //Not like link
                    (typeof a.attr('target') === 'undefined' || a.attr('target') === '_self') && // check if the link opens in the same window
                    (a.attr('href').split('#')[0] !== window.location.href.split('#')[0]) // check if it is an anchor aiming for a different page
                ) {
                    e.preventDefault();
                    loader.addClass('mkd-hide-spinner');
                    loader.fadeIn(500, function () {
                        window.location = a.attr('href');
                    });
                }
            });
        }
    }

})(jQuery);



(function($) {
    'use strict';

    var ajax = {};

    mkd.modules.ajax = ajax;

    var animation = {};
    ajax.animation = animation;

    ajax.mkdFetchPage = mkdFetchPage;
    ajax.mkdInitAjax = mkdInitAjax;
    ajax.mkdHandleLinkClick = mkdHandleLinkClick;
    ajax.mkdInsertFetchedContent = mkdInsertFetchedContent;
    ajax.mkdInitBackBehavior = mkdInitBackBehavior;
    ajax.mkdSetActiveState = mkdSetActiveState;
    ajax.mkdReinitiateAll = mkdReinitiateAll;
    ajax.mkdHandleMeta = mkdHandleMeta;

    ajax.mkdOnDocumentReady = mkdOnDocumentReady;
    ajax.mkdOnWindowLoad = mkdOnWindowLoad;
    ajax.mkdOnWindowResize = mkdOnWindowResize;
    ajax.mkdOnWindowScroll = mkdOnWindowScroll;

    $(document).ready(mkdOnDocumentReady);
    $(window).load(mkdOnWindowLoad);
    $(window).resize(mkdOnWindowResize);
    $(window).scroll(mkdOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function mkdOnDocumentReady() {
        mkdInitAjax();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function mkdOnWindowLoad() {
        mkdHandleAjaxFader();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function mkdOnWindowResize() {
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function mkdOnWindowScroll() {
    }


    var loadedPageFlag = true; // Indicates whether the page is loaded
    var firstLoad = true; // Indicates whether this is the first loaded page, for back button functionality
    animation.type = null;
    animation.time = 500; // Duration of animation for the content to be changed
    animation.simultaneous = true; // False indicates that the new content should wait for the old content to disappear, true means that it appears at the same time as the old content disappears
    animation.loader = null;
    animation.loaderTime = 500;

    /**
     * Fetching the targeted page
     */
    function mkdFetchPage(params, destinationSelector, targetSelector) {

        function setDefaultParam(key,value) {
            params[key] = typeof params[key] !== 'undefined' ? params[key] : value;
        }

        destinationSelector = typeof destinationSelector !== 'undefined' ? destinationSelector : '.mkd-content';
        targetSelector = typeof targetSelector !== 'undefined' ? targetSelector : '.mkd-content';
        
        // setting default ajax parameters
        params = typeof params !== 'undefined' ? params : {};

        setDefaultParam('url', window.location.href);
        setDefaultParam('type', 'POST');
        setDefaultParam('success', function(response) {
            var jResponse = $(response);

            var meta = jResponse.find('.mkd-meta');
            if (meta.length) { mkdHandleMeta(meta); }

            var new_content = jResponse.find(targetSelector);
            if (!new_content.length) {
                loadedPageFlag = true;
                return false;
            }
            else {
                mkdInsertFetchedContent(params.url, new_content, destinationSelector);
            }
        });

        // setting data parameters
        setDefaultParam('ajaxReq', 'yes');
        //setDefaultParam('hasHeader', mkd.body.find('header').length ? true : false);
        //setDefaultParam('hasFooter', mkd.body.find('footer').length ? true : false);

        $.ajax({
            url: params.url,
            type: params.type,
            data: {
                ajaxReq: params.ajaxReq
                //hasHeader: params.hasHeader,
                //hasFooter: params.hasFooter
            },
            success: params.success
        });
    }

    function mkdHandleAjaxFader() {
        if (animation.loader.length) {
            animation.loader.fadeOut(animation.loaderTime);
            $(window).bind("pageshow", function(event) {
                if (event.originalEvent.persisted) {
                    animation.loader.fadeOut(animation.loaderTime);
                }
            });
        }
    }

    function mkdInitAjax() {
        mkd.body.removeClass('page-not-loaded'); // Might be necessary for ajax calls
        animation.loader = $('body > .mkd-smooth-transition-loader.mkd-ajax');
        if (animation.loader.length) {

            if(mkd.body.hasClass('woocommerce') || mkd.body.hasClass('woocommerce-page')) {
                return false;
            }
            else {
                mkdInitBackBehavior();
                $(document).on('click', 'a[target!="_blank"]:not(.no-ajax):not(.no-link)', function(click) {
                    var link = $(this);

                    if(click.ctrlKey == 1) { // Check if CTRL key is held with the click
                        window.open(link.attr('href'), '_blank');
                        return false;
                    }

                    if(link.parents('.mkd-ptf-load-more').length){ return false; } // Don't initiate ajax for portfolio load more link

                    if(link.parents('.mkd-blog-load-more-button').length){ return false; } // Don't initiate ajax for blog load more link

                    if(link.parents('mkd-post-info-comments').length){ // If it's a comment link, don't load any content, just scroll to the comments section
                        var hash = link.attr('href').split("#")[1];  
                        $('html, body').scrollTop( $("#"+hash).offset().top );  
                        return false;  
                    }

                    if(window.location.href.split('#')[0] == link.attr('href').split('#')[0]){ return false; } //  If the link leads to the same page, don't use ajax

                    if(link.closest('.mkd-no-animation').length === 0){ // If no parents are set to no-animation...

                        if(document.location.href.indexOf("?s=") >= 0){ // Don't use ajax if currently on search page
                            return true;
                        }
                        if(link.attr('href').indexOf("wp-admin") >= 0){ // Don't use ajax for wp-admin
                            return true;
                        }
                        if(link.attr('href').indexOf("wp-content") >= 0){ // Don't use ajax for wp-content
                            return true;
                        }

                        if(jQuery.inArray(link.attr('href').split('#')[0], mkdGlobalVars.vars.no_ajax_pages) !== -1){ // If the target page is a no-ajax page, don't use ajax
                            document.location.href = link.attr('href');
                            return false;
                        }

                        if((link.attr('href') !== "http://#") && (link.attr('href') !== "#")){ // Don't use ajax if the link is empty
                            //disableHashChange = true;

                            var url = link.attr('href');
                            var start = url.indexOf(window.location.protocol + '//' + window.location.host); // Check if the link leads to the same domain
                            if(start === 0){
                                if(!loadedPageFlag){ return false; } //if page is not loaded don't load next one
                                click.preventDefault();
                                click.stopImmediatePropagation();
                                click.stopPropagation();
                                if (!link.is('.current')) {
                                    mkdHandleLinkClick(link);
                                }
                            }

                        }else{
                            return false;
                        }
                    }
                });
            }
        }
    }

    function mkdInitBackBehavior() {
        if (window.history.pushState) {
            /* the below code is to override back button to get the ajax content without reload*/
            $(window).bind('popstate', function() {

                var url = location.href;
                if (!firstLoad && loadedPageFlag) {
                    loadedPageFlag = false;
                    mkdFetchPage({
                        url: url
                    });
                }
            });
        }
    }

    function mkdHandleLinkClick(link) {
        loadedPageFlag = false;
        animation.loader.fadeIn(animation.loaderTime);
        mkdFetchPage({
            url: link.attr('href')
        });
    }

    function mkdSetActiveState(url) {
        var me = $("nav a[href='"+url+"'], .widget_nav_menu a[href='"+url+"']");

        $('.mkd-main-menu a, .mkd-mobile-nav a, .mkd-mobile-nav h4, .mkd-vertical-menu a, .popup_menu a, .widget_nav_menu a').removeClass('current').parent().removeClass('mkd-active-item');
        //$('.main_menu a, .mobile_menu a, .mobile_menu h4, .vertical_menu a, .popup_menu a').parent().removeClass('active');
        $('.widget_nav_menu ul.menu > li').removeClass('current-menu-item');

        me.each(function() {
            var me = $(this);

            if(me.closest('.second').length === 0){
                me.parent().addClass('mkd-active-item');
            }else{
                me.closest('.second').parent().addClass('mkd-active-item');
            }

            if(me.closest('.mkd-mobile-nav').length > 0){
                me.closest('.level0').addClass('mkd-active-item');
                me.closest('.level1').addClass('mkd-active-item');
                me.closest('.level2').addClass('mkd-active-item');
            }

            if(me.closest('.widget_nav_menu').length > 0){
                me.closest('.widget_nav_menu').find('.menu-item').addClass('current-menu-item');
            }


            //$('.mkd-main-menu a, .mkd-mobile-nav a, .mkd-vertical-menu a, .popup_menu a').removeClass('current');
            me.addClass('current');
        });
    }

    /**
     * Reinitialize all functions
     *
     * @param modulesToExclude - array of modules to exclude from reinitialization
     */
    function mkdReinitiateAll( modulesToExclude ) {
        $(document).off(); // Remove all event handlers before reinitialization
        $(window).off();
        mkd.body.off().find('*').off(); // Remove all event handlers before reinitialization

        mkd.mkdOnDocumentReady(); // Trigger all functions upon new page load
        mkd.mkdOnWindowLoad(); // Trigger all functions upon new page load
        $(window).resize(mkd.mkdOnWindowResize); // Reassign handles for resize and scroll events
        $(window).scroll(mkd.mkdOnWindowScroll); // Reassign handles for resize and scroll events

        var defaultModules = ['common', 'ajax', 'header', 'title', 'shortcodes', 'woocommerce', 'portfolio', 'blog', 'like'];
        var modules = [];

        if ( typeof modulesToExclude !== 'undefined' && modulesToExclude.length ) {
            defaultModules.forEach(function(key) {
                if (-1 === modulesToExclude.indexOf(key)) {
                    modules.push(key);
                }
            });
        } else {
            modules = defaultModules;
        }

        for (var i=0; i<modules.length; i++) {
            if (typeof mkd.modules[modules[i]] !== 'undefined') {
                mkd.modules[modules[i]].mkdOnDocumentReady(); // Trigger all functions upon new page load
                mkd.modules[modules[i]].mkdOnWindowLoad(); // Trigger all functions upon new page load
                $(window).resize(mkd.modules[modules[i]].mkdOnWindowResize); // Reassign handles for resize and scroll events
                $(window).scroll(mkd.modules[modules[i]].mkdOnWindowScroll); // Reassign handles for resize and scroll events
            }
        }

        $(document).trigger('mkd.ajaxPageLoad');
    }

    function mkdHandleMeta(meta_data) {
        // set up title, meta description and meta keywords
        var newTitle = meta_data.find(".mkd-seo-title").text();
        var pageTransition = meta_data.find(".mkd-page-transition").text();
        var newDescription = meta_data.find(".mkd-seo-description").text();
        var newKeywords = meta_data.find(".mkd-seo-keywords").text();
        if (typeof pageTransition !== 'undefined') {
            animation.type = pageTransition;
        } 
        if ($('head meta[name="description"]').length) {
            $('head meta[name="description"]').attr('content', newDescription);
        } else if (typeof newDescription !== 'undefined') {
            $('<meta name="description" content="'+newDescription+'">').prependTo($('head'));
        } 
        if ($('head meta[name="keywords"]').length) {
            $('head meta[name="keywords"]').attr('content', newKeywords);
        } else if (typeof newKeywords !== 'undefined') {
            $('<meta name="keywords" content="'+newKeywords+'">').prependTo($('head'));
        } 
        document.title = newTitle;

        var newBodyClasses = meta_data.find(".mkd-body-classes").text();
        var myArray = newBodyClasses.split(',');
        mkd.body.removeClass();
        for(var i=0;i<myArray.length;i++){
            if (myArray[i] !== "mkd-page-not-loaded"){
                mkd.body.addClass(myArray[i]);
            }
        }

        if($("#wp-admin-bar-edit").length > 0){
            // set up edit link when wp toolbar is enabled
            var pageId = meta_data.find("#mkd-page-id").text();
            var old_link = $('#wp-admin-bar-edit a').attr("href");
            var new_link = old_link.replace(/(post=).*?(&)/,'$1' + pageId + '$2');
            $('#wp-admin-bar-edit a').attr("href", new_link);
        }
    }

    function mkdInsertFetchedContent(url, new_content, destinationSelector) {
        destinationSelector = typeof destinationSelector !== 'undefined' ? destinationSelector : '.mkd-content';
        var destination = mkd.body.find(destinationSelector);
        
        new_content.height(destination.height()).css({'position': 'absolute', 'opacity': 0, 'overflow': 'hidden'}).insertBefore(destination);
       
        new_content.waitForImages(function() {
            if (url.indexOf('#') !== -1) {
                $('<a class="mkd-temp-anchor mkd-anchor" href="'+url+'" style="display: none"></a>').appendTo('body');
            }
            mkdReinitiateAll();

            if (animation.type == "fade") {
                destination.stop().fadeTo(animation.time, 0, function() {
                    destination.remove();
                    if (window.history.pushState) {
                        if(url!==window.location.href){
                            window.history.pushState({path:url},'',url);
                        }

                        //does Google Analytics code exists on page?
                        if(typeof _gaq !== 'undefined') {
                            //add new url to Google Analytics so it can be tracked
                            _gaq.push(['_trackPageview', url]);
                        }
                    } else {
                        document.location.href = window.location.protocol + '//' + window.location.host + '#' + url.split(window.location.protocol + '//' + window.location.host)[1];
                    }
                    mkdSetActiveState(url);
                    mkd.body.animate({scrollTop: 0}, animation.time, 'swing');
                });
                setTimeout(function() {
                    new_content.css('position','relative').height('').stop().fadeTo(animation.time, 1, function() {
                        loadedPageFlag = true;
                        firstLoad = false;
                        animation.loader.fadeOut(animation.loaderTime, function() {
                            var anch = $('.mkd-temp-anchor');
                            if (anch.length) {
                                anch.trigger('click').remove();
                            }
                        });
                    });
                }, !animation.simultaneous * animation.time);
            }
        });
    }


})(jQuery);
(function($) {
    "use strict";

    var header = {};
    mkd.modules.header = header;

    header.isStickyVisible = false;
    header.stickyAppearAmount = 0;
    header.stickyMobileAppearAmount = 0;
    header.behaviour;
    header.mkdSideArea = mkdSideArea;
    header.mkdSideAreaScroll = mkdSideAreaScroll;
    header.mkdFullscreenMenu = mkdFullscreenMenu;
    header.mkdInitMobileNavigation = mkdInitMobileNavigation;
    header.mkdMobileHeaderBehavior = mkdMobileHeaderBehavior;
    header.mkdSetDropDownMenuPosition = mkdSetDropDownMenuPosition;
    header.mkdDropDownMenu = mkdDropDownMenu;
    header.mkdSearch = mkdSearch;

    header.mkdOnDocumentReady = mkdOnDocumentReady;
    header.mkdOnWindowLoad = mkdOnWindowLoad;
    header.mkdOnWindowResize = mkdOnWindowResize;
    header.mkdOnWindowScroll = mkdOnWindowScroll;

    $(document).ready(mkdOnDocumentReady);
    $(window).load(mkdOnWindowLoad);
    $(window).resize(mkdOnWindowResize);
    $(window).scroll(mkdOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdOnDocumentReady() {
        mkdHeaderBehaviour();
        mkdSideArea();
        mkdSideAreaScroll();
        mkdFullscreenMenu();
        mkdInitMobileNavigation();
        mkdMobileHeaderBehavior();
        mkdSetDropDownMenuPosition();
        mkdDropDownMenu();
        mkdSearch();
        mkdVerticalMenu().init();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function mkdOnWindowLoad() {
        mkdSetDropDownMenuPosition();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function mkdOnWindowResize() {
        mkdDropDownMenu();
        mkdSetDropDownMenuPosition();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function mkdOnWindowScroll() {

    }


    /*
     **	Show/Hide sticky header on window scroll
     */
    function mkdHeaderBehaviour() {

        var header = $('.mkd-page-header');
        var stickyHeader = $('.mkd-sticky-header');
        var fixedHeaderWrapper = $('.mkd-fixed-wrapper');

        var headerMenuAreaOffset = $('.mkd-page-header').find('.mkd-fixed-wrapper').length ? $('.mkd-page-header').find('.mkd-fixed-wrapper').offset().top : null;

        var stickyAppearAmount,
            headerAppear;


        switch(true) {
            // sticky header that will be shown when user scrolls up
            case mkd.body.hasClass('mkd-sticky-header-on-scroll-up'):
                mkd.modules.header.behaviour = 'mkd-sticky-header-on-scroll-up';
                var docYScroll1 = $(document).scrollTop();
                stickyAppearAmount = mkdGlobalVars.vars.mkdTopBarHeight + mkdGlobalVars.vars.mkdLogoAreaHeight + mkdGlobalVars.vars.mkdMenuAreaHeight + mkdGlobalVars.vars.mkdStickyHeaderHeight;

                headerAppear = function(){
                    var docYScroll2 = $(document).scrollTop();

                    if((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
                        mkd.modules.header.isStickyVisible= false;
                        stickyHeader.removeClass('header-appear').find('.mkd-main-menu .second').removeClass('mkd-drop-down-start');
                    }else {
                        mkd.modules.header.isStickyVisible = true;
                        stickyHeader.addClass('header-appear');
                    }

                    docYScroll1 = $(document).scrollTop();
                };
                headerAppear();

                $(window).scroll(function() {
                    headerAppear();
                });

                break;

            // sticky header that will be shown when user scrolls both up and down
            case mkd.body.hasClass('mkd-sticky-header-on-scroll-down-up'):
                var setStickyScrollAmount = function() {
                    var amount;

                    if(isStickyAmountFullScreen()) {
                        amount = mkd.window.height();
                    } else {
                        if(mkdPerPageVars.vars.mkdStickyScrollAmount !== 0) {
                            amount = mkdPerPageVars.vars.mkdStickyScrollAmount;
                        } else {
                            amount = mkdGlobalVars.vars.mkdTopBarHeight + mkdGlobalVars.vars.mkdLogoAreaHeight + mkdGlobalVars.vars.mkdMenuAreaHeight;
                        }
                    }

                    stickyAppearAmount = amount;
                };

                var isStickyAmountFullScreen = function() {
                    var fullScreenStickyAmount = mkdPerPageVars.vars.mkdStickyScrollAmountFullScreen;

                    return typeof fullScreenStickyAmount !== 'undefined' && fullScreenStickyAmount === true;
                };

                mkd.modules.header.behaviour = 'mkd-sticky-header-on-scroll-down-up';
                setStickyScrollAmount();
                mkd.modules.header.stickyAppearAmount = stickyAppearAmount; //used in anchor logic

                headerAppear = function(){
                    if(mkd.scroll < stickyAppearAmount) {
                        mkd.modules.header.isStickyVisible = false;
                        stickyHeader.removeClass('header-appear').find('.mkd-main-menu .second').removeClass('mkd-drop-down-start');
                    }else{
                        mkd.modules.header.isStickyVisible = true;
                        stickyHeader.addClass('header-appear');
                    }
                };

                headerAppear();

                $(window).scroll(function() {
                    headerAppear();
                });

                break;

            // on scroll down, part of header will be sticky
            case mkd.body.hasClass('mkd-fixed-on-scroll'):
                mkd.modules.header.behaviour = 'mkd-fixed-on-scroll';
                var headerFixed = function(){
                    if(mkd.scroll < headerMenuAreaOffset){
                        fixedHeaderWrapper.removeClass('fixed');
                        header.css('margin-bottom',0);}
                    else{
                        fixedHeaderWrapper.addClass('fixed');
                        header.css('margin-bottom',fixedHeaderWrapper.height());
                    }
                };

                headerFixed();

                $(window).scroll(function() {
                    headerFixed();
                });

                break;
        }
    }

    /**
     * Show/hide side area
     */
    function mkdSideArea() {

        var wrapper = $('.mkd-wrapper'),
            sideMenu = $('.mkd-side-menu'),
            sideMenuButtonOpen = $('a.mkd-side-menu-button-opener'),
            cssClass,
            //Flags
            slideFromRight = false,
            slideWithContent = false,
            slideUncovered = false;

        if (mkd.body.hasClass('mkd-side-menu-slide-from-right')) {

            cssClass = 'mkd-right-side-menu-opened';
            wrapper.prepend('<div class="mkd-cover"/>');
            slideFromRight = true;

        } else if (mkd.body.hasClass('mkd-side-menu-slide-with-content')) {

            cssClass = 'mkd-side-menu-open';
            slideWithContent = true;

        } else if (mkd.body.hasClass('mkd-side-area-uncovered-from-content')) {

            cssClass = 'mkd-right-side-menu-opened';
            slideUncovered = true;

        }

        $('a.mkd-side-menu-button-opener, a.mkd-close-side-menu').click( function(e) {
            e.preventDefault();

            if(!sideMenuButtonOpen.hasClass('opened')) {

                sideMenuButtonOpen.addClass('opened');
                mkd.body.addClass(cssClass);

                if (slideFromRight) {
                    $('.mkd-wrapper .mkd-cover').click(function() {
                        mkd.body.removeClass('mkd-right-side-menu-opened');
                        sideMenuButtonOpen.removeClass('opened');
                    });
                }

                if (slideUncovered) {
                    sideMenu.css({
                        'visibility' : 'visible'
                    });
                }

                var currentScroll = $(window).scrollTop();
                $(window).scroll(function() {
                    if(Math.abs(mkd.scroll - currentScroll) > 400){
                        mkd.body.removeClass(cssClass);
                        sideMenuButtonOpen.removeClass('opened');
                        if (slideUncovered) {
                            var hideSideMenu = setTimeout(function(){
                                sideMenu.css({'visibility':'hidden'});
                                clearTimeout(hideSideMenu);
                            },400);
                        }
                    }
                });

            } else {

                sideMenuButtonOpen.removeClass('opened');
                mkd.body.removeClass(cssClass);
                if (slideUncovered) {
                    var hideSideMenu = setTimeout(function(){
                        sideMenu.css({'visibility':'hidden'});
                        clearTimeout(hideSideMenu);
                    },400);
                }

            }

            if (slideWithContent) {

                e.stopPropagation();
                wrapper.click(function() {
                    e.preventDefault();
                    sideMenuButtonOpen.removeClass('opened');
                    mkd.body.removeClass('mkd-side-menu-open');
                });

            }

        });

    }

    /*
     **  Smooth scroll functionality for Side Area
     */
    function mkdSideAreaScroll(){

        var sideMenu = $('.mkd-side-menu');

        if(sideMenu.length){
            sideMenu.niceScroll({
                scrollspeed: 60,
                mousescrollstep: 40,
                cursorwidth: 0,
                cursorborder: 0,
                cursorborderradius: 0,
                cursorcolor: "transparent",
                autohidemode: false,
                horizrailenabled: false
            });
        }
    }

    /**
     * Init Fullscreen Menu
     */
    function mkdFullscreenMenu() {

        if ($('a.mkd-fullscreen-menu-opener').length) {

            var popupMenuOpener = $( 'a.mkd-fullscreen-menu-opener'),
                popupMenuHolderOuter = $(".mkd-fullscreen-menu-holder-outer"),
                cssClass,
                //Flags for type of animation
                fadeRight = false,
                fadeTop = false,
                //Widgets
                widgetAboveNav = $('.mkd-fullscreen-above-menu-widget-holder'),
                widgetBelowNav = $('.mkd-fullscreen-below-menu-widget-holder'),
                //Menu
                menuItems = $('.mkd-fullscreen-menu-holder-outer nav > ul > li > a'),
                menuItemWithChild =  $('.mkd-fullscreen-menu > ul li.has_sub > a'),
                menuItemWithoutChild = $('.mkd-fullscreen-menu ul li:not(.has_sub) a');


            //set height of popup holder and initialize nicescroll
            popupMenuHolderOuter.height(mkd.windowHeight).niceScroll({
                scrollspeed: 30,
                mousescrollstep: 20,
                cursorwidth: 0,
                cursorborder: 0,
                cursorborderradius: 0,
                cursorcolor: "transparent",
                autohidemode: false,
                horizrailenabled: false
            }); //200 is top and bottom padding of holder

            //set height of popup holder on resize
            $(window).resize(function() {
                popupMenuHolderOuter.height(mkd.windowHeight);
            });

            if (mkd.body.hasClass('mkd-fade-push-text-right')) {
                cssClass = 'mkd-push-nav-right';
                fadeRight = true;
            } else if (mkd.body.hasClass('mkd-fade-push-text-top')) {
                cssClass = 'mkd-push-text-top';
                fadeTop = true;
            }

            //Appearing animation
            if (fadeRight || fadeTop) {
                if (widgetAboveNav.length) {
                    widgetAboveNav.children().css({
                        '-webkit-animation-delay' : 0 + 'ms',
                        '-moz-animation-delay' : 0 + 'ms',
                        'animation-delay' : 0 + 'ms'
                    });
                }
                menuItems.each(function(i) {
                    $(this).css({
                        '-webkit-animation-delay': (i+1) * 70 + 'ms',
                        '-moz-animation-delay': (i+1) * 70 + 'ms',
                        'animation-delay': (i+1) * 70 + 'ms'
                    });
                });
                if (widgetBelowNav.length) {
                    widgetBelowNav.children().css({
                        '-webkit-animation-delay' : (menuItems.length + 1)*70 + 'ms',
                        '-moz-animation-delay' : (menuItems.length + 1)*70 + 'ms',
                        'animation-delay' : (menuItems.length + 1)*70 + 'ms'
                    });
                }
            }

            // Open popup menu
            popupMenuOpener.on('click',function(e){
                e.preventDefault();

                if (!popupMenuOpener.hasClass('opened')) {
                    popupMenuOpener.addClass('opened');
                    mkd.body.addClass('mkd-fullscreen-menu-opened');
                    mkd.body.removeClass('mkd-fullscreen-fade-out').addClass('mkd-fullscreen-fade-in');
                    mkd.body.removeClass(cssClass);
                    if(!mkd.body.hasClass('page-template-full_screen-php')){
                        mkd.modules.common.mkdDisableScroll();
                    }
                    $(document).keyup(function(e){
                        if (e.keyCode == 27 ) {
                            popupMenuOpener.removeClass('opened');
                            mkd.body.removeClass('mkd-fullscreen-menu-opened');
                            mkd.body.removeClass('mkd-fullscreen-fade-in').addClass('mkd-fullscreen-fade-out');
                            mkd.body.addClass(cssClass);
                            if(!mkd.body.hasClass('page-template-full_screen-php')){
                                mkd.modules.common.mkdEnableScroll();
                            }
                            $("nav.mkd-fullscreen-menu ul.sub_menu").slideUp(200, function(){
                                $('nav.popup_menu').getNiceScroll().resize();
                            });
                        }
                    });
                } else {
                    popupMenuOpener.removeClass('opened');
                    mkd.body.removeClass('mkd-fullscreen-menu-opened');
                    mkd.body.removeClass('mkd-fullscreen-fade-in').addClass('mkd-fullscreen-fade-out');
                    mkd.body.addClass(cssClass);
                    if(!mkd.body.hasClass('page-template-full_screen-php')){
                        mkd.modules.common.mkdEnableScroll();
                    }
                    $("nav.mkd-fullscreen-menu ul.sub_menu").slideUp(200, function(){
                        $('nav.popup_menu').getNiceScroll().resize();
                    });
                }
            });

            //logic for open sub menus in popup menu
            menuItemWithChild.on('tap click', function(e) {
                e.preventDefault();

                if ($(this).parent().hasClass('has_sub')) {
                    var submenu = $(this).parent().find('> ul.sub_menu');
                    if (submenu.is(':visible')) {
                        submenu.slideUp(200, function() {
                            popupMenuHolderOuter.getNiceScroll().resize();
                        });
                        $(this).parent().removeClass('open_sub');
                    } else {
                        $(this).parent().addClass('open_sub');
                        $(this).parent().siblings().removeClass('open_sub').find('.sub_menu').slideUp(200, function() {
                            popupMenuHolderOuter.getNiceScroll().resize();
                            submenu.slideDown(200, function() {
                                popupMenuHolderOuter.getNiceScroll().resize();
                            });
                        });
                    }
                }
                return false;
            });

            //if link has no submenu and if it's not dead, than open that link
            menuItemWithoutChild.click(function (e) {

                if(($(this).attr('href') !== "http://#") && ($(this).attr('href') !== "#")){

                    if (e.which == 1) {
                        popupMenuOpener.removeClass('opened');
                        mkd.body.removeClass('mkd-fullscreen-menu-opened');
                        mkd.body.removeClass('mkd-fullscreen-fade-in').addClass('mkd-fullscreen-fade-out');
                        mkd.body.addClass(cssClass);
                        $("nav.mkd-fullscreen-menu ul.sub_menu").slideUp(200, function(){
                            $('nav.popup_menu').getNiceScroll().resize();
                        });
                        mkd.modules.common.mkdEnableScroll();
                    }
                }else{
                    return false;
                }

            });

        }



    }

    function mkdInitMobileNavigation() {
        var navigationOpener = $('.mkd-mobile-header .mkd-mobile-menu-opener');
        var navigationHolder = $('.mkd-mobile-header .mkd-mobile-nav');
        var dropdownOpener = $('.mkd-mobile-nav .mobile_arrow, .mkd-mobile-nav h4, .mkd-mobile-nav a[href*="#"]');
        var animationSpeed = 200;

        //whole mobile menu opening / closing
        if(navigationOpener.length && navigationHolder.length) {
            navigationOpener.on('tap click', function(e) {
                e.stopPropagation();
                e.preventDefault();

                if(navigationHolder.is(':visible')) {
                    navigationHolder.slideUp(animationSpeed);
                } else {
                    navigationHolder.slideDown(animationSpeed);
                }
            });
        }

        //dropdown opening / closing
        if(dropdownOpener.length) {
            dropdownOpener.each(function() {
                $(this).on('tap click', function(e) {
                    var dropdownToOpen = $(this).nextAll('ul').first();

                    if(dropdownToOpen.length) {
                        e.preventDefault();
                        e.stopPropagation();

                        var openerParent = $(this).parent('li');
                        if(dropdownToOpen.is(':visible')) {
                            dropdownToOpen.slideUp(animationSpeed);
                            openerParent.removeClass('mkd-opened');
                        } else {
                            dropdownToOpen.slideDown(animationSpeed);
                            openerParent.addClass('mkd-opened');
                        }
                    }

                });
            });
        }

        $('.mkd-mobile-nav a, .mkd-mobile-logo-wrapper a').on('click tap', function(e) {
            if($(this).attr('href') !== 'http://#' && $(this).attr('href') !== '#') {
                navigationHolder.slideUp(animationSpeed);
            }
        });
    }

    function mkdMobileHeaderBehavior() {
        if(mkd.body.hasClass('mkd-sticky-up-mobile-header')) {
            var stickyAppearAmount;
            var mobileHeader = $('.mkd-mobile-header');
            var adminBar     = $('#wpadminbar');
            var mobileHeaderHeight = mobileHeader.length ? mobileHeader.height() : 0;
            var adminBarHeight = adminBar.length ? adminBar.height() : 0;

            var docYScroll1 = $(document).scrollTop();
            stickyAppearAmount = mobileHeaderHeight + adminBarHeight;

            $(window).scroll(function() {
                var docYScroll2 = $(document).scrollTop();

                if(docYScroll2 > stickyAppearAmount) {
                    mobileHeader.addClass('mkd-animate-mobile-header');
                } else {
                    mobileHeader.removeClass('mkd-animate-mobile-header');
                }

                if((docYScroll2 > docYScroll1 && docYScroll2 > stickyAppearAmount) || (docYScroll2 < stickyAppearAmount)) {
                    mobileHeader.removeClass('mobile-header-appear');
                    mobileHeader.css('margin-bottom', 0);

                    if(adminBar.length) {
                        mobileHeader.find('.mkd-mobile-header-inner').css('top', 0);
                    }
                } else {
                    mobileHeader.addClass('mobile-header-appear');
                    mobileHeader.css('margin-bottom', stickyAppearAmount);

                    //if(adminBar.length) {
                    //    mobileHeader.find('.mkd-mobile-header-inner').css('top', adminBarHeight);
                    //}
                }

                docYScroll1 = $(document).scrollTop();
            });
        }

    }


    /**
     * Set dropdown position
     */
    function mkdSetDropDownMenuPosition(){

        var menuItems = $(".mkd-drop-down > ul > li.narrow");
        menuItems.each( function(i) {

            var browserWidth = mkd.windowWidth-16; // 16 is width of scroll bar
            var menuItemPosition = $(this).offset().left;
            var dropdownMenuWidth = $(this).find('.second .inner ul').width();

            var menuItemFromLeft = 0;
            if(mkd.body.hasClass('boxed')){
                menuItemFromLeft = mkd.boxedLayoutWidth  - (menuItemPosition - (browserWidth - mkd.boxedLayoutWidth )/2);
            } else {
                menuItemFromLeft = browserWidth - menuItemPosition;
            }

            var dropDownMenuFromLeft; //has to stay undefined beacuse 'dropDownMenuFromLeft < dropdownMenuWidth' condition will be true

            if($(this).find('li.sub').length > 0){
                dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
            }

            if(menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth){
                $(this).find('.second').addClass('right');
                $(this).find('.second .inner ul').addClass('right');
            }
        });

    }


    function mkdDropDownMenu() {

        var menu_items = $('.mkd-drop-down > ul > li');

        menu_items.each(function(i) {
            if($(menu_items[i]).find('.second').length > 0) {

                var dropDownSecondDiv = $(menu_items[i]).find('.second');

                if($(menu_items[i]).hasClass('wide')) {

                    var dropdown = $(this).find('.inner > ul');
                    var left_position;

                    var dropdownPadding = parseInt(dropdown.css('padding-left').slice(0, -2)) + parseInt(dropdown.css('padding-right').slice(0, -2));
                    var dropdownWidth = dropdown.outerWidth();

                    if(!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
                        dropDownSecondDiv.css('left', 0);
                    }

                    //set columns to be same height - start
                    var tallest = 0;
                    $(this).find('.second > .inner > ul > li').each(function() {
                        var thisHeight = $(this).height();
                        if(thisHeight > tallest) {
                            tallest = thisHeight;
                        }
                    });
                    $(this).find('.second > .inner > ul > li').css("height", ""); // delete old inline css - via resize
                    $(this).find('.second > .inner > ul > li').height(tallest);
                    //set columns to be same height - end

                    if(!mkd.body.hasClass('mkd-full-width-wide-menu')) {
                        if(!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
                            left_position = (mkd.windowWidth - 2 * (mkd.windowWidth - dropdown.offset().left)) / 2 + (dropdownWidth + dropdownPadding) / 2;
                            dropDownSecondDiv.css('left', -left_position);
                        }
                    } else {
                        if(!$(this).hasClass('left_position') && !$(this).hasClass('right_position')) {
                            left_position = dropdown.offset().left;

                            dropDownSecondDiv.css('left', -left_position);
                            dropDownSecondDiv.css('width', mkd.windowWidth);

                        }
                    }
                }

                if(!mkd.menuDropdownHeightSet) {
                    $(menu_items[i]).data('original_height', dropDownSecondDiv.height() + 'px');
                    dropDownSecondDiv.height(0);
                }

                if(navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
                    $(menu_items[i]).on("touchstart mouseenter", function() {
                        dropDownSecondDiv.css({
                            'height': $(menu_items[i]).data('original_height'),
                            'overflow': 'visible',
                            'visibility': 'visible',
                            'opacity': '1'
                        });
                    }).on("mouseleave", function() {
                        dropDownSecondDiv.css({
                            'height': '0px',
                            'overflow': 'hidden',
                            'visibility': 'hidden',
                            'opacity': '0'
                        });
                    });

                } else {
                    if(mkd.body.hasClass('mkd-dropdown-animate-height')) {
                        $(menu_items[i]).mouseenter(function() {
                            dropDownSecondDiv.css({
                                'visibility': 'visible',
                                'height': '0px',
                                'opacity': '0'
                            });
                            dropDownSecondDiv.stop().animate({
                                'height': $(menu_items[i]).data('original_height'),
                                opacity: 1
                            }, 200, function() {
                                dropDownSecondDiv.css('overflow', 'visible');
                            });
                        }).mouseleave(function() {
                            dropDownSecondDiv.stop().animate({
                                'height': '0px'
                            }, 0, function() {
                                dropDownSecondDiv.css({
                                    'overflow': 'hidden',
                                    'visibility': 'hidden'
                                });
                            });
                        });
                    } else {
                        var config = {
                            interval: 0,
                            over: function() {
                                setTimeout(function() {
                                    dropDownSecondDiv.addClass('mkd-drop-down-start');
                                    dropDownSecondDiv.stop().css({'height': $(menu_items[i]).data('original_height')});
                                }, 100);
                            },
                            timeout: 100,
                            out: function() {
                                dropDownSecondDiv.stop().css({'height': '0px'});
                                dropDownSecondDiv.removeClass('mkd-drop-down-start');
                            }
                        };
                        $(menu_items[i]).hoverIntent(config);
                    }
                }
            }
        });
        $('.mkd-drop-down ul li.wide ul li a').on('click', function(e) {
            if (e.which == 1){
                var $this = $(this);
                setTimeout(function() {
                    $this.mouseleave();
                }, 500);
            }
        });

        mkd.menuDropdownHeightSet = true;
    }

    /**
     * Init Search Types
     */
    function mkdSearch() {

        var searchOpener = $('a.mkd-search-opener'),
            searchClose,
            searchForm,
            touch = false;

        if ( $('html').hasClass( 'touch' ) ) {
            touch = true;
        }

        if ( searchOpener.length > 0 ) {
            //Check for type of search
            if ( mkd.body.hasClass( 'mkd-fullscreen-search' ) ) {

                mkdFullscreenSearch();

            } else if ( mkd.body.hasClass( 'mkd-search-slides-from-window-top' ) ) {

                searchForm = $('.mkd-search-slide-window-top');
                searchClose = $('.mkd-search-close');
                mkdSearchWindowTop();

            } else if ( mkd.body.hasClass( 'mkd-search-covers-header' ) ) {

                mkdSearchCoversHeader();

            }

            //Check for hover color of search
            if(typeof searchOpener.data('hover-color') !== 'undefined') {
                var changeSearchColor = function(event) {
                    event.data.searchOpener.css('color', event.data.color);
                };

                var originalColor = searchOpener.css('color');
                var hoverColor = searchOpener.data('hover-color');

                searchOpener.on('mouseenter', { searchOpener: searchOpener, color: hoverColor }, changeSearchColor);
                searchOpener.on('mouseleave', { searchOpener: searchOpener, color: originalColor }, changeSearchColor);
            }

        }

        /**
         * Search slides from window top type of search
         */
        function mkdSearchWindowTop() {

            searchOpener.click( function(e) {
                e.preventDefault();

                var yPos = 0;
                if($('.title').hasClass('has_parallax_background')){
                    yPos = parseInt($('.title.has_parallax_background').css('backgroundPosition').split(" ")[1]);
                }

                if ( searchForm.height() == "0") {
                    $('.mkd-search-slide-window-top input[type="text"]').focus();
                    //Push header bottom
                    mkd.body.addClass('mkd-search-open');
                    $('.title.has_parallax_background').animate({
                        'background-position-y': (yPos + 50)+'px'
                    }, 150);
                } else {
                    mkd.body.removeClass('mkd-search-open');
                    $('.title.has_parallax_background').animate({
                        'background-position-y': (yPos - 50)+'px'
                    }, 150);
                }

                $(window).scroll(function() {
                    if ( searchForm.height() != '0' && mkd.scroll > 50 ) {
                        mkd.body.removeClass('mkd-search-open');
                        $('.title.has_parallax_background').css('backgroundPosition', 'center '+(yPos)+'px');
                    }
                });

                searchClose.click(function(e){
                    e.preventDefault();
                    mkd.body.removeClass('mkd-search-open');
                    $('.title.has_parallax_background').animate({
                        'background-position-y': (yPos)+'px'
                    }, 150);
                });

            });
        }

        /**
         * Search covers header type of search
         */
        function mkdSearchCoversHeader() {

            searchOpener.click( function(e) {
                e.preventDefault();
                var searchFormHeight,
                    searchFormHolder = $('.mkd-search-cover .mkd-form-holder-outer'),
                    searchForm,
                    searchFormLandmark; // there is one more div element if header is in grid

                if($(this).closest('.mkd-grid').length){
                    searchForm = $(this).closest('.mkd-grid').children().first();
                    searchFormLandmark = searchForm.parent();
                }
                else{
                    searchForm = $(this).closest('.mkd-menu-area').children().first();
                    searchFormLandmark = searchForm;
                }

                if ( $(this).closest('.mkd-sticky-header').length > 0 ) {
                    searchForm = $(this).closest('.mkd-sticky-header').children().first();
                }
                if ( $(this).closest('.mkd-mobile-header').length > 0 ) {
                    searchForm = $(this).closest('.mkd-mobile-header').children().children().first();
                }

                //Find search form position in header and height
                if ( searchFormLandmark.parent().hasClass('mkd-logo-area') ) {
                    searchFormHeight = mkdGlobalVars.vars.mkdLogoAreaHeight;
                } else if ( searchFormLandmark.parent().hasClass('mkd-top-bar') ) {
                    searchFormHeight = mkdGlobalVars.vars.mkdTopBarHeight;
                } else if ( searchFormLandmark.parent().hasClass('mkd-menu-area') ) {
                    searchFormHeight = mkdGlobalVars.vars.mkdMenuAreaHeight;
                } else if ( searchFormLandmark.hasClass('mkd-sticky-header') ) {
                    searchFormHeight = mkdGlobalVars.vars.mkdMenuAreaHeight;
                } else if ( searchFormLandmark.parent().hasClass('mkd-mobile-header') ) {
                    searchFormHeight = $('.mkd-mobile-header-inner').height();
                }

                searchFormHolder.height(searchFormHeight);
                searchForm.stop(true).fadeIn(600);
                $('.mkd-search-cover input[type="text"]').focus();
                $('.mkd-search-close, .content, footer').click(function(e){
                    e.preventDefault();
                    searchForm.stop(true).fadeOut(450);
                });
                searchForm.blur(function() {
                    searchForm.stop(true).fadeOut(450);
                });
            });

        }

        /**
         * Fullscreen search (two types: fade and from circle)
         */
        function mkdFullscreenSearch( fade, fromCircle ) {

            var searchHolder = $( '.mkd-fullscreen-search-holder'),
                fieldHolder = searchHolder.find('.mkd-field-holder');

            searchOpener.click( function(e) {
                e.preventDefault();

                //Fullscreen search fade
                if ( searchHolder.hasClass( 'mkd-animate' ) ) {
                    searchClose();
                } else {
                    searchOpen();
                }

                //Close on click away
                $(document).mouseup(function (e) {
                    if (!fieldHolder.is(e.target) && fieldHolder.has(e.target).length === 0)  {
                        e.preventDefault();
                        searchClose();
                    }
                });
                //Close on escape
                $(document).keyup(function(e){
                    if (e.keyCode == 27 ) { //KeyCode for ESC button is 27
                        searchClose();
                    }
                });

                function searchClose() {
                    mkd.body.removeClass('mkd-fullscreen-search-opened');
                    searchHolder.removeClass('mkd-animate');
                    mkd.body.removeClass('mkd-search-fade-in');
                    mkd.body.addClass('mkd-search-fade-out');
                    if(!mkd.body.hasClass('page-template-full_screen-php')){
                        mkd.modules.common.mkdEnableScroll();
                    }
                    fieldHolder.find('.mkd-search-field').blur().val('');
                }

                function searchOpen() {
                    mkd.body.addClass('mkd-fullscreen-search-opened');
                    mkd.body.removeClass('mkd-search-fade-out');
                    mkd.body.addClass('mkd-search-fade-in');
                    searchHolder.addClass('mkd-animate');
                    if(!mkd.body.hasClass('page-template-full_screen-php')){
                        mkd.modules.common.mkdDisableScroll();
                    }
                    setTimeout(function(){
                        fieldHolder.find('.mkd-search-field').focus();
                    },400);
                }

            });

            //Text input focus change
            $('.mkd-fullscreen-search-holder .mkd-search-field').focus(function(){
                $('.mkd-fullscreen-search-holder .mkd-field-holder .mkd-line').css("width","100%");
            });

            $('.mkd-fullscreen-search-holder .mkd-search-field').blur(function(){
                $('.mkd-fullscreen-search-holder .mkd-field-holder .mkd-line').css("width","0");
            });

        }

    }

    /**
     * Function object that represents vertical menu area.
     * @returns {{init: Function}}
     */
    var mkdVerticalMenu = function() {
        /**
         * Main vertical area object that used through out function
         * @type {jQuery object}
         */
        var verticalMenuObject = $('.mkd-vertical-menu-area');

        /**
         * Resizes vertical area. Called whenever height of navigation area changes
         * It first check if vertical area is scrollable, and if it is resizes scrollable area
         */
        var resizeVerticalArea = function() {
            if(verticalAreaScrollable()) {
                verticalMenuObject.getNiceScroll().resize();
            }
        };

        /**
         * Checks if vertical area is scrollable (if it has mkd-with-scroll class)
         *
         * @returns {bool}
         */
        var verticalAreaScrollable = function() {
            return verticalMenuObject.hasClass('mkd-with-scroll');
        };

        /**
         * Initialzes navigation functionality. It checks navigation type data attribute and calls proper functions
         */
        var initNavigation = function() {
            var verticalNavObject = verticalMenuObject;
            var navigationType = typeof verticalNavObject.data('navigation-type') !== 'undefined' ? verticalNavObject.data('navigation-type') : '';

            switch(navigationType) {
                case 'toggle':
                    dropdownHoverToggle();
                    break;
                case 'click':
                    dropdownClickToggle();
                    break;
                case 'float':
                   dropdownFloat();
                   break;
                //case 'slide-in':
                //    dropdownSlideIn();
                //    break;
                default:
                    dropdownFloat();
                    break;
            }

            /**
             * Initializes hover toggle navigation type. It has separate functionalities for touch and no-touch devices
             */
            function dropdownHoverToggle() {
               var menuItems = verticalNavObject.find('ul li.menu-item-has-children');

               menuItems.each(function() {
                   var elementToExpand = $(this).find(' > .second, > ul');
                   var numberOfChildItems = elementToExpand.find(' > .inner > ul > li, > li').length;

                   var animSpeed = numberOfChildItems * 40;
                   var animFunc = 'easeInOutSine';
                   var that = this;

                   //touch devices functionality
                   if(Modernizr.touch) {
                       var dropdownOpener = $(this).find('> a');

                       dropdownOpener.on('click tap', function(e) {
                           e.preventDefault();
                           e.stopPropagation();

                           if(elementToExpand.is(':visible')) {
                               $(that).removeClass('open');
                               elementToExpand.slideUp(animSpeed, animFunc, function() {
                                   resizeVerticalArea();
                               });
                           } else {
                               $(that).addClass('open');
                               elementToExpand.slideDown(animSpeed, animFunc, function() {
                                   resizeVerticalArea();
                               });
                           }
                       });
                   } else {
                       $(this).hover(function() {
                           $(that).addClass('open');
                           elementToExpand.slideDown(animSpeed, animFunc, function() {
                               resizeVerticalArea();
                           });
                       }, function() {
                           setTimeout(function() {
                               $(that).removeClass('open');
                               elementToExpand.slideUp(animSpeed, animFunc, function() {
                                   resizeVerticalArea();
                               });
                           }, 1000);
                       });
                   }
               });
            }

            /**
             * Initializes click toggle navigation type. Works the same for touch and no-touch devices
             */
            function dropdownClickToggle() {
               var menuItems = verticalNavObject.find('ul li.menu-item-has-children');

               menuItems.each(function() {
                   var elementToExpand = $(this).find(' > .second, > ul');
                   var menuItem = this;
                   var dropdownOpener = $(this).find('> a');
                   var slideUpSpeed = 'fast';
                   var slideDownSpeed = 'slow';

                   dropdownOpener.on('click tap', function(e) {
                       e.preventDefault();
                       e.stopPropagation();

                       if(elementToExpand.is(':visible')) {
                           $(menuItem).removeClass('open');
                           elementToExpand.slideUp(slideUpSpeed, function() {
                               resizeVerticalArea();
                           });
                       } else {
                           if(!$(this).parents('li').hasClass('open')) {
                               menuItems.removeClass('open');
                               menuItems.find(' > .second, > ul').slideUp(slideUpSpeed);
                           }

                           $(menuItem).addClass('open');
                           elementToExpand.slideDown(slideDownSpeed, function() {
                               resizeVerticalArea();
                           });
                       }
                   });
               });
            }

            /**
             * Initializes floating navigation type (it comes from the side as a dropdown)
             */
            function dropdownFloat() {
                var menuItems = verticalNavObject.find('ul li.menu-item-has-children');
                var allDropdowns = menuItems.find(' > .second, > ul');

                menuItems.each(function() {
                    var elementToExpand = $(this).find(' > .second, > ul');
                    var menuItem = this;

                    if(Modernizr.touch) {
                        var dropdownOpener = $(this).find('> a');

                        dropdownOpener.on('click tap', function(e) {
                            e.preventDefault();
                            e.stopPropagation();

                            if(elementToExpand.hasClass('mkd-float-open')) {
                                elementToExpand.removeClass('mkd-float-open');
                                $(menuItem).removeClass('open');
                            } else {
                                if(!$(this).parents('li').hasClass('open')) {
                                    menuItems.removeClass('open');
                                    allDropdowns.removeClass('mkd-float-open');
                                }

                                elementToExpand.addClass('mkd-float-open');
                                $(menuItem).addClass('open');
                            }
                        });
                    } else {
                        //must use hoverIntent because basic hover effect doesn't catch dropdown
                        //it doesn't start from menu item's edge
                        $(this).hoverIntent({
                            over: function() {
                                elementToExpand.addClass('mkd-float-open');
                                $(menuItem).addClass('open');
                            },
                            out: function() {
                                elementToExpand.removeClass('mkd-float-open');
                                $(menuItem).removeClass('open');
                            },
                            timeout: 300
                        });
                    }
                });
            }

            /**
             * Initializes slide in navigation type (dropdowns are coming on top of parent element and cover whole navigation area)
             */
            //function dropdownSlideIn() {
            //    var menuItems = verticalNavObject.find('ul li.menu-item-has-children');
            //    var menuItemsLinks = menuItems.find('> a');
            //
            //    menuItemsLinks.each(function() {
            //        var elementToExpand = $(this).next('.second, ul');
            //        appendToExpandableElement(elementToExpand, this);
            //
            //        if($(this).parent('li').is('.current-menu-ancestor', '.current_page_parent', '.current-menu-parent ')) {
            //            elementToExpand.addClass('mkd-vertical-slide-open');
            //        }
            //
            //        $(this).on('click tap', function(e) {
            //            e.preventDefault();
            //            e.stopPropagation();
            //
            //            menuItems.removeClass('open');
            //
            //            $(this).parent('li').addClass('open');
            //            elementToExpand.addClass('mkd-vertical-slide-open');
            //        });
            //    });
            //
            //    var previousLevelItems = menuItems.find('li.mkd-previous-level > a');
            //
            //    previousLevelItems.on('click tap', function(e) {
            //        e.preventDefault();
            //        e.stopPropagation();
            //
            //        menuItems.removeClass('open');
            //        $(this).parents('.mkd-vertical-slide-open').first().removeClass('mkd-vertical-slide-open');
            //    });
            //
            //    /**
            //     * Appends 'li' element as first element in dropdown, which will close current dropdown when clicked
            //     * @param {jQuery object} elementToExpand current dropdown to append element to
            //     * @param currentMenuItem
            //     */
            //    function appendToExpandableElement(elementToExpand, currentMenuItem) {
            //        var itemUrl = $(currentMenuItem).attr('href');
            //        var itemText = $(currentMenuItem).text();
            //
            //        var liItem = $('<li />', {class: 'mkd-previous-level'});
            //
            //        $('<a />', {
            //            'href': itemUrl,
            //            'html': '<i class="mkd-vertical-slide-arrow fa fa-angle-left"></i>' + itemText
            //        }).appendTo(liItem);
            //
            //        if(elementToExpand.hasClass('second')) {
            //            elementToExpand.find('> div > ul').prepend(liItem);
            //        } else {
            //            elementToExpand.prepend(liItem);
            //        }
            //    }
            //}
        };

        /**
         * Initializes scrolling in vertical area. It checks if vertical area is scrollable before doing so
         */
        var initVerticalAreaScroll = function() {
            if(verticalAreaScrollable()) {

                verticalMenuObject.niceScroll({
                    scrollspeed: 60,
                    mousescrollstep: 40,
                    cursorwidth: 0,
                    cursorborder: 0,
                    cursorborderradius: 0,
                    cursorcolor: "transparent",
                    autohidemode: false,
                    horizrailenabled: false
                });
            }
        };

        //var initHiddenVerticalArea = function() {
        //    var verticalLogo = $('.mkd-vertical-area-bottom-logo');
        //    var verticalMenuOpener = verticalMenuObject.find('.mkd-vertical-menu-hidden-button');
        //    var scrollPosition = 0;
        //
        //    verticalMenuOpener.on('click tap', function() {
        //        if(isVerticalAreaOpen()) {
        //            closeVerticalArea();
        //        } else {
        //            openVerticalArea();
        //        }
        //    });
        //
        //    //take click outside vertical left/right area and close it
        //    $j(verticalMenuObject).outclick({
        //        callback: function() {
        //            closeVerticalArea();
        //        }
        //    });
        //
        //    $(window).scroll(function() {
        //        if(Math.abs($(window).scrollTop() - scrollPosition) > 400){
        //            closeVerticalArea();
        //        }
        //    });
        //
        //    /**
        //     * Closes vertical menu area by removing 'active' class on that element
        //     */
        //    function closeVerticalArea() {
        //        verticalMenuObject.removeClass('active');
        //
        //        if(verticalLogo.length) {
        //            verticalLogo.removeClass('active');
        //        }
        //    }
        //
        //    /**
        //     * Opens vertical menu area by adding 'active' class on that element
        //     */
        //    function openVerticalArea() {
        //        verticalMenuObject.addClass('active');
        //
        //        if(verticalLogo.length) {
        //            verticalLogo.addClass('active');
        //        }
        //
        //        scrollPosition = $(window).scrollTop();
        //    }
        //
        //    function isVerticalAreaOpen() {
        //        return verticalMenuObject.hasClass('active');
        //    }
        //};

        return {
            /**
             * Calls all necessary functionality for vertical menu area if vertical area object is valid
             */
            init: function() {
                if(verticalMenuObject.length) {
                    initNavigation();
                    initVerticalAreaScroll();
                    //
                    //if(mkd.body.hasClass('mkd-vertical-header-hidden')) {
                    //    initHiddenVerticalArea();
                    //}
                }
            }
        };
    };

})(jQuery);
(function($) {
    "use strict";

    var title = {};
    mkd.modules.title = title;

    title.mkdParallaxTitle = mkdParallaxTitle;

    title.mkdOnDocumentReady = mkdOnDocumentReady;
    title.mkdOnWindowLoad = mkdOnWindowLoad;
    title.mkdOnWindowResize = mkdOnWindowResize;
    title.mkdOnWindowScroll = mkdOnWindowScroll;

    $(document).ready(mkdOnDocumentReady);
    $(window).load(mkdOnWindowLoad);
    $(window).resize(mkdOnWindowResize);
    $(window).scroll(mkdOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function mkdOnDocumentReady() {
        mkdParallaxTitle();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function mkdOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function mkdOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function mkdOnWindowScroll() {

    }
    

    /*
     **	Title image with parallax effect
     */
    function mkdParallaxTitle(){
        if($('.mkd-title.mkd-has-parallax-background').length > 0 && $('.touch').length === 0){

            var parallaxBackground = $('.mkd-title.mkd-has-parallax-background');
            var parallaxBackgroundWithZoomOut = $('.mkd-title.mkd-has-parallax-background.mkd-zoom-out');

            var backgroundSizeWidth = parseInt(parallaxBackground.data('background-width').match(/\d+/));
            var titleHolderHeight = parallaxBackground.data('height');
            var titleRate = (titleHolderHeight / 10000) * 7;
            var titleYPos = -(mkd.scroll * titleRate);

            //set position of background on doc ready
            parallaxBackground.css({'background-position': 'center '+ (titleYPos+mkdGlobalVars.vars.mkdAddForAdminBar) +'px' });
            parallaxBackgroundWithZoomOut.css({'background-size': backgroundSizeWidth-mkd.scroll + 'px auto'});

            //set position of background on window scroll
            $(window).scroll(function() {
                titleYPos = -(mkd.scroll * titleRate);
                parallaxBackground.css({'background-position': 'center ' + (titleYPos+mkdGlobalVars.vars.mkdAddForAdminBar) + 'px' });
                parallaxBackgroundWithZoomOut.css({'background-size': backgroundSizeWidth-mkd.scroll + 'px auto'});
            });

        }
    }

})(jQuery);

(function ($) {
    'use strict';

    var shortcodes = {};

    mkd.modules.shortcodes = shortcodes;

    shortcodes.mkdInitCounter = mkdInitCounter;
    shortcodes.mkdInitProgressBars = mkdInitProgressBars;
    shortcodes.mkdInitCountdown = mkdInitCountdown;
    shortcodes.mkdInitMessages = mkdInitMessages;
    shortcodes.mkdInitMessageHeight = mkdInitMessageHeight;
    shortcodes.mkdInitTestimonials = mkdInitTestimonials;
    shortcodes.mkdInitClientsCarousel = mkdInitClientsCarousel;
    shortcodes.mkdInitProgressCircle = mkdInitProgressCircle;
    shortcodes.mkdInitTabs = mkdInitTabs;
    shortcodes.mkdInitTabIcons = mkdInitTabIcons;
    shortcodes.mkdInitBlogListMasonry = mkdInitBlogListMasonry;
    shortcodes.mkdCustomFontResize = mkdCustomFontResize;
    shortcodes.mkdInitImageGallery = mkdInitImageGallery;
    shortcodes.mkdInitAccordions = mkdInitAccordions;
    shortcodes.mkdServiceTable = mkdServiceTable;
    shortcodes.mkdShowGoogleMap = mkdShowGoogleMap;
    shortcodes.mkdProcess = mkdProcess;
    shortcodes.mkdCheckSliderForHeaderStyle = mkdCheckSliderForHeaderStyle;
    shortcodes.mkdIconWithText = mkdIconWithText;
    shortcodes.mkdInitInfoBox = mkdInitInfoBox;
    shortcodes.mkdInitTwitterSlider = mkdInitTwitterSlider;
    shortcodes.mkdInitPricingSlider = mkdInitPricingSlider;
    shortcodes.mkdInitContentSlider = mkdInitContentSlider;
    shortcodes.mkdInitWorkflow = mkdInitWorkflow;

    shortcodes.mkdOnDocumentReady = mkdOnDocumentReady;
    shortcodes.mkdOnWindowLoad = mkdOnWindowLoad;
    shortcodes.mkdOnWindowResize = mkdOnWindowResize;
    shortcodes.mkdOnWindowScroll = mkdOnWindowScroll;

    $(document).ready(mkdOnDocumentReady);
    $(window).load(mkdOnWindowLoad);
    $(window).resize(mkdOnWindowResize);
    $(window).scroll(mkdOnWindowScroll);

    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdOnDocumentReady() {
        mkdInitCounter();
        mkdInitProgressBars();
        mkdInitCountdown();
        mkdIcon().init();
        mkdInitMessages();
        mkdInitMessageHeight();
        mkdInitTestimonials();
        mkdInitClientsCarousel();
        mkdInitProgressCircle();
        mkdInitTabs();
        mkdInitTabIcons();
        mkdButton().init();
        mkdInitBlogListMasonry();
        mkdCustomFontResize();
        mkdInitImageGallery();
        mkdInitAccordions();
        mkdServiceTable();
        mkdShowGoogleMap();
        mkdProcess();
        mkdSlider().init();
        mkdSocialIconWidget().init();
        mkdInitList().init();
        mkdInitWorkflow();
        mkdInstagramCarousel();
        mkdIconWithText();
        mkdInitTwitterSlider();
        mkdInitPricingSlider();
        mkdInitContentSlider();
        mkdInitFrameSlider();
    }

    /* 
     All functions to be called on $(window).load() should be in this function
     */
    function mkdOnWindowLoad() {
        mkdInitInfoBox();
        mkdInitCharts();
    }

    /* 
     All functions to be called on $(window).resize() should be in this function
     */
    function mkdOnWindowResize() {
        mkdInitBlogListMasonry();
        mkdCustomFontResize();
    }

    /* 
     All functions to be called on $(window).scroll() should be in this function
     */
    function mkdOnWindowScroll() {

    }


    // init frame slider
    function mkdInitFrameSlider() {
        var sliders = $('.mkd-frame-slider-holder');

        if (sliders.length) {
            sliders.each(function () {
                var sliderHolder = $(this),
                    slider = sliderHolder.find('.mkd-frame-slider'),
                    loop = (sliderHolder.data('loop') == 'yes'),
                    pause = (sliderHolder.data('pause') == 'yes'),
                    pagination = (sliderHolder.data('pagination') == 'yes'),
                    autoplay = (sliderHolder.data('autoplay') != 'disable'),
                    autoplayTimeout = 0;

                if (autoplay === true) {
                    autoplayTimeout = sliderHolder.data('autoplay') * 1000;
                }

                slider.owlCarousel({
                    items: 1,
                    loop: loop,
                    autoplayHoverPause: pause,
                    autoplay: autoplay,
                    autoplayTimeout: autoplayTimeout,
                    dots: pagination,
                    nav: false,
                    margin: 1,
                    onInitialized: function () {
                        slider.css({'opacity': '1'});
                    }
                });
            });
        }
    }

    // content slider
    function mkdInitContentSlider() {
        var contentSlider = $('.mkd-content-slider');

        if (contentSlider.length) {
            contentSlider.each(function () {
                var loop = (contentSlider.data('loop') == 'yes'),
                    pause = (contentSlider.data('pause') == 'yes'),
                    navigation = (contentSlider.data('navigation') == 'yes'),
                    pagination = (contentSlider.data('pagination') == 'yes'),
                    autoplay = (contentSlider.data('autoplay') != 'disable'),
                    autoplayTimeout = 0;

                if (autoplay === true) {
                    autoplayTimeout = contentSlider.data('autoplay') * 1000;
                }

                $(this).owlCarousel({
                    items: 1,
                    loop: loop,
                    autoplayHoverPause: pause,
                    autoplay: autoplay,
                    autoplayTimeout: autoplayTimeout,
                    dots: pagination,
                    nav: navigation,
                    navText: [
                        '<span class="mkd-prev-icon"><i class="arrow_carrot-left"></i></span>',
                        '<span class="mkd-next-icon"><i class="arrow_carrot-right"></i></span>'
                    ],
                    onInitialized: function () {
                        contentSlider.css({'opacity': '1'});
                    }
                });
            });
        }
    }

    // instagram slider
    function mkdInstagramCarousel() {

        var instagramCarousels = $('.mkd-instagram-feed.mkd-instagram-carousel');

        if (instagramCarousels.length) {
            instagramCarousels.each(function () {

                var carousel = $(this),
                    items = 6,
                    loop = true,
                    margin;

                if (typeof carousel.data('items') !== 'undefined' && carousel.data('items') !== false) {
                    items = carousel.data('items');
                }

                // Fix for the issue with the carousels holding only one item - the carousel's core issue
                if (carousel.children().length == 1) {
                    loop = false;
                }

                if (items === 1) {
                    margin = 0;
                } else if ((carousel.data('space-between-items') === 'normal')) {
                    margin = 20;
                } else if ((carousel.data('space-between-items') === 'small')) {
                    margin = 10;
                } else if ((carousel.data('space-between-items') === 'tiny')) {
                    margin = 5;
                } else if ((carousel.data('space-between-items') === 'no')) {
                    margin = 0;
                }

                var responsiveItems1 = items;
                var responsiveItems2 = 4;
                var responsiveItems3 = 3;
                var responsiveItems4 = 2;

                if (items > 5) {
                    responsiveItems1 = 5;
                }

                if (items < 4) {
                    responsiveItems2 = items;
                }

                if (items < 3) {
                    responsiveItems3 = items;
                }

                if (items === 1) {
                    responsiveItems4 = items;
                }

                carousel.owlCarousel({
                    autoplay: true,
                    autoplayHoverPause: true,
                    autoplayTimeout: 5000,
                    smartSpeed: 600,
                    items: items,
                    margin: margin,
                    loop: loop,
                    dots: false,
                    nav: false,
                    responsive: {
                        1200: {
                            items: items
                        },
                        1024: {
                            items: responsiveItems1
                        },
                        769: {
                            items: responsiveItems2
                        },
                        601: {
                            items: responsiveItems3
                        },
                        0: {
                            items: responsiveItems4
                        }
                    },
                    onInitialized: function () {
                        carousel.css({'opacity': 1});
                    }
                });

            });
        }
    }

    // twitter slider
    function mkdInitTwitterSlider() {
        var twitterSlider = $('.mkd-twitter-slider-inner');

        if (twitterSlider.length) {
            twitterSlider.each(function () {
                var currentSlider = $(this),
                    loop = (currentSlider.data('loop') == 'yes'),
                    pause = (currentSlider.data('pause') == 'yes'),
                    navigation = (currentSlider.data('navigation') == 'yes'),
                    pagination = (currentSlider.data('pagination') == 'yes'),
                    autoplay = (currentSlider.data('autoplay') != 'disable'),
                    autoplayTimeout = 0;

                if (autoplay === true) {
                    autoplayTimeout = currentSlider.data('autoplay') * 1000;
                }

                $(this).owlCarousel({
                    items: 1,
                    loop: loop,
                    autoplayHoverPause: pause,
                    autoplay: autoplay,
                    autoplayTimeout: autoplayTimeout,
                    dots: pagination,
                    nav: navigation,
                    navText: [
                        '<span class="mkd-prev-icon"><i class="arrow_carrot-left"></i></span>',
                        '<span class="mkd-next-icon"><i class="arrow_carrot-right"></i></span>'
                    ],
                    onInitialized: function () {
                        currentSlider.css({'opacity': 1});
                    }
                });

            });
        }
    }

    // counter shortcode
    function mkdInitCounter() {

        var counters = $('.mkd-counter');

        if (counters.length) {
            counters.each(function () {
                var counter = $(this);
                counter.appear(function () {
                    counter.parent().addClass('mkd-counter-holder-show');

                    //Counter zero type
                    if (counter.hasClass('zero')) {
                        var max = parseFloat(counter.text());
                        counter.countTo({
                            from: 0,
                            to: max,
                            speed: 1500,
                            refreshInterval: 100
                        });
                    } else {
                        counter.absoluteCounter({
                            speed: 2000,
                            fadeInDelay: 1000
                        });
                    }

                }, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});
            });
        }

    }

    // horizontal progress bars shortcode
    function mkdInitProgressBars() {

        var progressBar = $('.mkd-progress-bar');

        if (progressBar.length) {

            progressBar.each(function () {

                var thisBar = $(this);

                thisBar.appear(function () {
                    mkdInitToCounterProgressBar(thisBar);
                    if (thisBar.find('.mkd-floating.mkd-floating-inside') !== 0) {
                        var floatingInsideMargin = thisBar.find('.mkd-progress-content').height();
                        floatingInsideMargin += parseFloat(thisBar.find('.mkd-progress-title-holder').css('padding-bottom'));
                        floatingInsideMargin += parseFloat(thisBar.find('.mkd-progress-title-holder').css('margin-bottom'));
                        thisBar.find('.mkd-floating-inside').css('margin-bottom', -(floatingInsideMargin) + 'px');
                    }
                    var percentage = thisBar.find('.mkd-progress-content').data('percentage'),
                        progressContent = thisBar.find('.mkd-progress-content'),
                        progressNumber = thisBar.find('.mkd-progress-number');

                    progressContent.css('width', '0%');
                    progressContent.animate({'width': percentage + '%'}, 1500);
                    progressNumber.css('left', '0%');
                    progressNumber.animate({'left': percentage + '%'}, 1500);

                });
            });
        }
    }


    // counter for horizontal progress bars percent from zero to defined percent
    function mkdInitToCounterProgressBar(progressBar) {
        var percentage = parseFloat(progressBar.find('.mkd-progress-content').data('percentage'));
        var percent = progressBar.find('.mkd-progress-number .mkd-percent');
        if (percent.length) {
            percent.each(function () {
                var thisPercent = $(this);
                thisPercent.parents('.mkd-progress-number-wrapper').css('opacity', '1');
                thisPercent.countTo({
                    from: 0,
                    to: percentage,
                    speed: 1500,
                    refreshInterval: 50
                });
            });
        }
    }

    // function to close message shortcode
    function mkdInitMessages() {
        var message = $('.mkd-message');
        if (message.length) {
            message.each(function () {
                var thisMessage = $(this);
                thisMessage.find('.mkd-close').click(function (e) {
                    e.preventDefault();
                    $(this).parent().parent().fadeOut(500);
                });
            });
        }
    }

    // init message height
    function mkdInitMessageHeight() {
        var message = $('.mkd-message.mkd-with-icon');
        if (message.length) {
            message.each(function () {
                var thisMessage = $(this);
                var textHolderHeight = thisMessage.find('.mkd-message-text-holder').height();
                var iconHolderHeight = thisMessage.find('.mkd-message-icon-holder').height();

                if (textHolderHeight > iconHolderHeight) {
                    thisMessage.find('.mkd-message-icon-holder').height(textHolderHeight);
                } else {
                    thisMessage.find('.mkd-message-text-holder').height(iconHolderHeight);
                }
            });
        }
    }

    // countdown shortcode
    function mkdInitCountdown() {

        var countdowns = $('.mkd-countdown'),
            year,
            month,
            day,
            hour,
            minute,
            timezone,
            monthLabel,
            dayLabel,
            hourLabel,
            minuteLabel,
            secondLabel;

        if (countdowns.length) {

            countdowns.each(function () {

                // find countdown elements by id-s
                var countdownId = $(this).attr('id'),
                    countdown = $('#' + countdownId),
                    digitFontSize,
                    labelFontSize;

                // get data for countdown
                year = countdown.data('year');
                month = countdown.data('month');
                day = countdown.data('day');
                hour = countdown.data('hour');
                minute = countdown.data('minute');
                timezone = countdown.data('timezone');
                monthLabel = countdown.data('month-label');
                dayLabel = countdown.data('day-label');
                hourLabel = countdown.data('hour-label');
                minuteLabel = countdown.data('minute-label');
                secondLabel = countdown.data('second-label');
                digitFontSize = countdown.data('digit-size');
                labelFontSize = countdown.data('label-size');

                // initialize countdown
                countdown.countdown({
                    until: new Date(year, month - 1, day, hour, minute, 44),
                    labels: ['Years', monthLabel, 'Weeks', dayLabel, hourLabel, minuteLabel, secondLabel],
                    format: 'ODHMS',
                    timezone: timezone,
                    padZeroes: true,
                    onTick: setCountdownStyle
                });

                function setCountdownStyle() {
                    countdown.find('.countdown-amount').css({
                        'font-size': digitFontSize + 'px',
                        'line-height': digitFontSize + 'px'
                    });
                    countdown.find('.countdown-period').css({
                        'font-size': labelFontSize + 'px'
                    });
                }

            });

        }

    }

    // info box shortcode
    function mkdInitInfoBox() {
        var infoBoxes = $('.mkd-info-box-holder');

        var getBottomHeight = function (bottomHolder) {
            if (bottomHolder.length) {
                return bottomHolder.height();
            }

            return false;
        };

        var infoBoxesHeight = function () {
            if (infoBoxes.length) {
                var maxHeight = 0;
                var heightestBox;

                infoBoxes.each(function () {
                    var bottomHolder = $(this).find('.mkd-ib-bottom-holder');
                    var topHolder = $(this).find('.mkd-ib-top-holder');

                    var currentHeight = getBottomHeight(bottomHolder) + topHolder.height();

                    maxHeight = Math.max(maxHeight, currentHeight);

                    if (maxHeight <= currentHeight) {
                        heightestBox = $(this);
                        maxHeight = currentHeight;
                    }
                });

                infoBoxes.height(maxHeight);
            }
        };

        var initHover = function (infoBox) {
            var timeline = new TimelineLite({paused: true}),
                topHolder = infoBox.find('.mkd-ib-top-holder'),
                bottomHolder = infoBox.find('.mkd-ib-bottom-holder'),
                bottomHeight = getBottomHeight(bottomHolder);

            if (infoBox.hasClass('mkd-hide-icon')) {
                timeline.to(topHolder, 0.6, {y: -(bottomHeight * 2), ease: Back.easeInOut.config(2)});
                timeline.to(bottomHolder, 0.4, {y: -(bottomHeight * 2), ease: Back.easeOut}, '-=0.3');
            }
            else {
                timeline.to(topHolder, 0.6, {y: -(bottomHeight / 2), ease: Back.easeInOut.config(2)});
                timeline.to(bottomHolder, 0.4, {y: -(bottomHeight / 2), ease: Back.easeOut}, '-=0.3');
            }

            infoBox.hover(function () {
                timeline.restart();
            }, function () {
                timeline.reverse();
            });
        };

        if (infoBoxes.length) {
            infoBoxesHeight();

            $(mkd.window).resize(function () {
                infoBoxesHeight();
            });

            infoBoxes.each(function () {
                var thisInfoBox = $(this);
                initHover(thisInfoBox);

                $(mkd.window).resize(function () {
                    initHover(thisInfoBox);
                });
            });
        }
    }

    /**
     * Object that represents icon shortcode
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var mkdIcon = mkd.modules.shortcodes.mkdIcon = function () {
        //get all icons on page
        var icons = $('.mkd-icon-shortcode');

        /**
         * Function that triggers icon animation and icon animation delay
         */
        var iconAnimation = function (icon) {
            if (icon.hasClass('mkd-icon-animation')) {
                icon.appear(function () {
                    icon.parent('.mkd-icon-animation-holder').addClass('mkd-icon-animation-show');
                }, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});
            }
        };

        /**
         * Function that triggers icon hover color functionality
         */
        var iconHoverColor = function (icon) {
            if (typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function (event) {
                    event.data.icon.css('color', event.data.color);
                };

                var iconElement = icon.find('.mkd-icon-element');
                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                if (hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        /**
         * Function that triggers icon holder background color hover functionality
         */
        var iconHolderBackgroundHover = function (icon) {
            if (typeof icon.data('hover-background-color') !== 'undefined') {
                var changeIconBgColor = function (event) {
                    event.data.icon.css('background-color', event.data.color);
                };

                var hoverBackgroundColor = icon.data('hover-background-color');
                var originalBackgroundColor = icon.css('background-color');

                if (hoverBackgroundColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBackgroundColor}, changeIconBgColor);
                    icon.on('mouseleave', {icon: icon, color: originalBackgroundColor}, changeIconBgColor);
                }
            }
        };

        /**
         * Function that initializes icon holder border hover functionality
         */
        var iconHolderBorderHover = function (icon) {
            if (typeof icon.data('hover-border-color') !== 'undefined') {
                var changeIconBorder = function (event) {
                    event.data.icon.css('border-color', event.data.color);
                };

                var hoverBorderColor = icon.data('hover-border-color');
                var originalBorderColor = icon.css('border-color');

                if (hoverBorderColor !== '') {
                    icon.on('mouseenter', {icon: icon, color: hoverBorderColor}, changeIconBorder);
                    icon.on('mouseleave', {icon: icon, color: originalBorderColor}, changeIconBorder);
                }
            }
        };

        return {
            init: function () {
                if (icons.length) {
                    icons.each(function () {
                        iconAnimation($(this));
                        iconHoverColor($(this));
                        iconHolderBackgroundHover($(this));
                        iconHolderBorderHover($(this));
                    });

                }
            }
        };
    };

    /**
     * Object that represents social icon widget
     * @returns {{init: Function}} function that initializes icon's functionality
     */
    var mkdSocialIconWidget = mkd.modules.shortcodes.mkdSocialIconWidget = function () {
        //get all social icons on page
        var icons = $('.mkd-social-icon-widget-holder');

        /**
         * Function that triggers icon hover color functionality
         */
        var socialIconHoverColor = function (icon) {
            if (typeof icon.data('hover-color') !== 'undefined') {
                var changeIconColor = function (event) {
                    event.data.icon.css('color', event.data.color);
                };

                var iconElement = icon;
                var hoverColor = icon.data('hover-color');
                var originalColor = iconElement.css('color');

                if (hoverColor !== '') {
                    icon.on('mouseenter', {icon: iconElement, color: hoverColor}, changeIconColor);
                    icon.on('mouseleave', {icon: iconElement, color: originalColor}, changeIconColor);
                }
            }
        };

        return {
            init: function () {
                if (icons.length) {
                    icons.each(function () {
                        socialIconHoverColor($(this));
                    });

                }
            }
        };
    };


    // pricing slider
    function mkdInitPricingSlider() {

        var pricingSliders = $('.mkd-pricing-slider');

        pricingSliders.each(function () {
            var slider = $(this);
            var dragHolder = slider.find('.mkd-pricing-slider-bar-holder');
            var drag = slider.find('.mkd-pricing-slider-drag');
            var progressBar = slider.find('.mkd-pricing-slider-bar');
            var pricingButtonHolder = slider.find('.mkd-pricing-slider-button-holder');
            var activeFilter = pricingButtonHolder.find('.active');
            var priceElement = slider.find('.mkd-price');
            var sliderTextLabel = slider.find('.mkd-pricing-slider-value');

            var unitName = slider.data('unit-name') ? slider.data('unit-name') : "unit";
            var unitsRange = parseFloat(slider.data('units-range')) ? parseFloat(slider.data('units-range')) : 0;
            var unitsBreakpoints = parseFloat(slider.data('units-breakpoints')) ? parseFloat(slider.data('units-breakpoints')) : 0;
            var price = parseFloat(activeFilter.data('price-per-unit')) ? parseFloat(activeFilter.data('price-per-unit')) : 0;
            var reduceRate = parseFloat(activeFilter.data('price-reduce-per-breakpoint')) ? parseFloat(activeFilter.data('price-reduce-per-breakpoint')) : 0;
            var breakpointValue = unitsBreakpoints;
            var breakPointsIterator = 0;

            var parentXPos = dragHolder.offset().left;
            var parentWidth = dragHolder.outerWidth() - drag.outerWidth();
            var iterator = parentWidth / unitsRange;

            var offset = 0;
            var xPos = 0;
            var units = 0;

            var i;
            if (unitsBreakpoints > 0) {
                var delimiters = unitsRange / unitsBreakpoints;
                for (i = 1; i < delimiters; i++) {
                    progressBar.append('<span class="delimiter" style="left:' + Math.round((100 / delimiters) * i) + '%;"></span>');
                }
            }

            recalculateValues(priceElement, units, price, sliderTextLabel, progressBar, xPos, parentWidth, unitName);

            pricingButtonHolder.find('.mkd-btn').click(function () {
                if (!$(this).parent().hasClass('active')) {
                    activeFilter.removeClass('active');
                    $(this).parent().addClass('active');
                    activeFilter = $(this).parent();
                    price = parseFloat(activeFilter.data('price-per-unit')) ? parseFloat(activeFilter.data('price-per-unit')) : 0;
                    reduceRate = parseFloat(activeFilter.data('price-reduce-per-breakpoint')) ? parseFloat(activeFilter.data('price-reduce-per-breakpoint')) : 0;
                    price = price - breakPointsIterator * reduceRate;
                    recalculateValues(priceElement, units, price, sliderTextLabel, progressBar, xPos, parentWidth, unitName);
                }
            });

            var draggerPosition;
            drag.draggable({
                axis: "x",
                containment: dragHolder.parent(),
                scrollSensitivity: 10,
                start: function (event, ui) {
                    draggerPosition = ui.position.left;
                },
                drag: function (event, ui) {
                    var direction = (ui.position.left > draggerPosition) ? 'right' : 'left';
                    draggerPosition = ui.position.left;
                    offset = $(this).offset();
                    xPos = offset.left - parentXPos;
                    units = Math.floor(xPos / iterator);
                    if (xPos >= 0 && xPos <= parentWidth) {
                        if (direction == 'right') {
                            if (units > breakpointValue) {
                                breakpointValue = breakpointValue + unitsBreakpoints;
                                breakPointsIterator++;
                                price = price - reduceRate;
                            }
                        }
                        else if (direction == 'left') {
                            if (units <= breakpointValue - unitsBreakpoints) {
                                breakpointValue = breakpointValue - unitsBreakpoints;
                                breakPointsIterator--;
                                price = price + reduceRate;
                            }
                        }
                        recalculateValues(priceElement, units, price, sliderTextLabel, progressBar, xPos, parentWidth, unitName);
                    }
                }
            });
        });

        function recalculateValues(priceElement, units, price, sliderTextLabel, progressBar, xPos, parentWidth, unitName) {
            priceElement.text(((Math.round(units * price * 100)) / 100));
            if (units == 1) {
                sliderTextLabel.text(units + " " + unitName);
            } else {
                sliderTextLabel.text(units + " " + unitName + "s");
            }
            progressBar.width(Math.round((xPos / parentWidth) * 100) + "%");
        }
    }


    function mkdInitTestimonials() {

        var testimonial = $('.mkd-testimonials');
        if (testimonial.length) {
            testimonial.each(function () {

                var theseTestimonials = $(this).filter(':not(.mkd-single-testimonial)'),
                    testimonialsHolder = $(this).closest('.mkd-testimonials-holder'),
                    testimonialsHolderID = testimonialsHolder.attr('id'),
                    numberOfItems,
                    numberOfItemsTablet,
                    numberOfItemsMobile,
                    numberOfItemsLaptop,
                    itemMargin,
                    animationSpeed = 400,
                    dragGrab,
                    touchDrag = true,
                    allowFlag = true,
                    loop = (theseTestimonials.data('loop') == 'yes'),
                    pause = (theseTestimonials.data('pause') == 'yes'),
                    navigation = (theseTestimonials.data('navigation') == 'yes'),
                    pagination = (theseTestimonials.data('pagination') == 'yes'),
                    autoplay = (theseTestimonials.data('autoplay') != 'disable'),
                    autoplayTimeout = 0,
                    smartSpeed = 400,
                    navContainer = false;

                if (autoplay === true) {
                    autoplayTimeout = theseTestimonials.data('autoplay') * 1000;
                }

                // slider
                if (theseTestimonials.hasClass('mkd-testimonials-slider')) {
                    numberOfItems = 1;
                    numberOfItemsLaptop = 1;
                    numberOfItemsTablet = 1;
                    numberOfItemsMobile = 1;
                    itemMargin = 0;
                    dragGrab = false;
                    touchDrag = false,
                        navContainer = '.' + theseTestimonials.data('nav-container');
                }

                if (theseTestimonials.hasClass('mkd-testimonials-cards')) {
                    numberOfItems = 3;
                    if ($('body').hasClass('mkd-header-vertical')) {
                        numberOfItemsLaptop = 2;
                    } else {
                        numberOfItemsLaptop = 3;
                    }
                    numberOfItemsTablet = 2;
                    numberOfItemsMobile = 1;
                    itemMargin = 36;
                    dragGrab = true;
                    touchDrag = true;
                }

                // carousel
                if (theseTestimonials.hasClass('mkd-testimonials-carousel')) {
                    if (typeof theseTestimonials.data('visible-items') !== 'undefined' && theseTestimonials.data('visible-items') !== false) {
                        numberOfItems = theseTestimonials.data('visible-items');
                    }
                    else {
                        numberOfItems = 3;
                    }
                    numberOfItemsTablet = 2;
                    numberOfItemsMobile = 1;
                    itemMargin = 34;
                    dragGrab = true;
                }

                // get animation speed
                if (theseTestimonials.hasClass('mkd-testimonials-slider')) {
                    animationSpeed = 850;
                }
                if (typeof theseTestimonials.data('animation-speed') !== 'undefined' && theseTestimonials.data('animation-speed') !== false) {
                    animationSpeed = theseTestimonials.data('animation-speed');
                }

                if (theseTestimonials.hasClass('mkd-testimonials-navigation')) {

                    // Go to the next item
                    theseTestimonials.parent().parent().parent().find('.mkd-tes-nav-next').click(function (e) {
                        e.preventDefault();
                        if (allowFlag) {

                            allowFlag = false;
                            owl.trigger('next.owl.carousel');

                            // only for slider
                            if (theseTestimonials.hasClass('mkd-testimonials-slider')) {
                                owlImageDots.trigger('next.owl.carousel');
                            }

                            setTimeout(function () {
                                allowFlag = true;
                            }, 900);
                        }
                    });
                    // Go to the previous item
                    theseTestimonials.parent().parent().parent().find('.mkd-tes-nav-prev').click(function (e) {
                        e.preventDefault();
                        if (allowFlag) {

                            allowFlag = false;
                            owl.trigger('prev.owl.carousel');

                            // only for slider
                            if (theseTestimonials.hasClass('mkd-testimonials-slider')) {
                                owlImageDots.trigger('prev.owl.carousel');
                            }

                            setTimeout(function () {
                                allowFlag = true;
                            }, 900);
                        }
                    });
                }

                if (theseTestimonials.hasClass('mkd-testimonials-pagination')) {
                    theseTestimonials.parent().parent().parent().find('.mkd-tes-dot').click(function (e) {
                        var bullet = $(this);
                        owl.trigger('to.owl.carousel', [bullet.index(), 0, true]);
                        bullet.siblings().removeClass('active');
                        bullet.addClass('active');


                        if (theseTestimonials.hasClass('mkd-testimonials-slider')) {
                            owlImageDots.trigger('to.owl.carousel', [bullet.index(), 0, true]);
                        }
                    });
                }

                if (theseTestimonials.hasClass('light')) {
                    theseTestimonials.parent().parent().parent().find('.mkd-tes-nav').addClass('light');
                }

                if (theseTestimonials.hasClass('dark')) {
                    theseTestimonials.parent().parent().parent().find('.mkd-tes-nav').addClass('dark');
                }


                var owl = theseTestimonials.owlCarousel({
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: numberOfItemsMobile,
                        },
                        768: {
                            items: numberOfItemsTablet,
                        },
                        1000: {
                            items: numberOfItems,
                        }
                    },
                    navText: [
                        '<span class="mkd-prev-icon"><i class="arrow_carrot-left"></i></span>',
                        '<span class="mkd-next-icon"><i class="arrow_carrot-right"></i></span>'
                    ],
                    margin: itemMargin,
                    autoplay: autoplay,
                    autoplayTimeout: autoplayTimeout,
                    smartSpeed: smartSpeed,
                    loop: loop,
                    info: true,
                    mouseDrag: dragGrab,
                    touchDrag: touchDrag,
                    autoplayHoverPause: pause,
                    dots: pagination,
                    nav: navigation,
                    navContainer: navContainer,
                    linked: '#' + testimonialsHolderID + ' .mkd-tes-image-nav',

                    onInitialized: function () {

                        $('[class^="owl-external-controls"] > div').css('top', function () {
                            return -(testimonialsHolder.height() * 0.5);
                        });

                        mkdAppear();
                    }
                });

                if (theseTestimonials.hasClass('mkd-testimonials-slider')) {
                    owl.on('changed.owl.carousel', function (event) {
                        owlImageDots.trigger('to.owl.carousel', [event.item.index - 2, 0, true]);
                    });
                }

                // callback function to show testimonials
                function mkdAppear() {
                    testimonialsHolder.css('visibility', 'visible');
                    testimonialsHolder.animate({opacity: 1}, 300);
                }


                //carousel additional image slider
                if (theseTestimonials.hasClass('mkd-testimonials-slider')) {
                    var imageDots = $('.mkd-tes-image-nav');

                    var owlImageDots = imageDots.owlCarousel({
                        autoplay: autoplay,
                        autoplayTimeout: autoplayTimeout,
                        smartSpeed: animationSpeed,
                        center: true,
                        loop: loop,
                        mouseDrag: dragGrab,
                        autoplayHoverPause: pause,
                        touchDrag: touchDrag,
                        linked: '#' + testimonialsHolderID + ' .mkd-testimonials-slider',
                        animateIn: 'slideInLeft',
                        animateOut: 'slideOutRight',
                        responsive: {
                            480: {
                                items: 3
                            },
                            0: {
                                items: 1
                            }
                        }
                    });
                }
            });

            mkd.modules.common.mkdInitParallax;
        }
    }

    // init carousel shortcode
    function mkdInitClientsCarousel() {

        var carouselHolders = $('.mkd-clients-carousel-holder');

        if (carouselHolders.length) {
            carouselHolders.each(function () {
                var carousel = $(this).children('.mkd-clients-carousel'),
                    numberOfItems = carousel.data('items'),
                    loop = (carousel.data('loop') == 'yes'),
                    pause = (carousel.data('pause') == 'yes'),
                    navigation = (carousel.data('navigation') == 'yes'),
                    pagination = (carousel.data('pagination') == 'yes'),
                    autoplay = (carousel.data('autoplay') != 'disable'),
                    autoplayTimeout = 0;

                if (autoplay === true) {
                    autoplayTimeout = carousel.data('autoplay') * 1000;
                }

                // Responsive breakpoints
                carousel.owlCarousel({
                    items: numberOfItems,
                    responsive: {
                        // breakpoint from 0 up
                        0: {
                            items: 1
                        },
                        // breakpoint from 480 up
                        480: {
                            items: 2
                        },
                        // breakpoint from 768 up
                        768: {
                            items: 3
                        },
                        // breakpoint from 1024 up
                        1024: {
                            items: numberOfItems
                        }
                    },
                    loop: loop,
                    autoplayHoverPause: pause,
                    autoplay: autoplay,
                    autoplayTimeout: autoplayTimeout,
                    dots: pagination,
                    nav: navigation,
                    navText: [
                        '<span class="mkd-prev-icon"><i class="arrow_carrot-left"></i></span>',
                        '<span class="mkd-next-icon"><i class="arrow_carrot-right"></i></span>'
                    ],
                    onInitialized: function () {
                        carousel.css({'opacity': 1});
                    }
                });

            });
        }

    }

    /**
     * Init Progress Circle shortcode
     */
    function mkdInitProgressCircle() {

        var progresCircles = $('.mkd-progress-circle-holder');

        if (progresCircles.length) {

            progresCircles.each(function () {

                var progressCircle = $(this),
                    percentageHolder = progressCircle.children('.mkd-progress-circle'),
                    barColor = '#fdc94b',
                    trackColor = '#f5f7f7',
                    lineWidth = 20,
                    size = 195;

                if (typeof percentageHolder.data('size') !== 'undefined' && percentageHolder.data('size') !== '') {
                    size = percentageHolder.data('size');
                }

                if (typeof percentageHolder.data('bar-color') !== 'undefined' && percentageHolder.data('bar-color') !== '') {
                    barColor = percentageHolder.data('bar-color');
                }

                if (typeof percentageHolder.data('track-color') !== 'undefined' && percentageHolder.data('track-color') !== '') {
                    trackColor = percentageHolder.data('track-color');
                }

                percentageHolder.appear(function () {
                    initToCounterProgressCircle(progressCircle);
                    percentageHolder.css('opacity', '1');

                    percentageHolder.easyPieChart({
                        barColor: barColor,
                        trackColor: trackColor,
                        scaleColor: false,
                        lineCap: 'butt',
                        lineWidth: lineWidth,
                        animate: 1500,
                        size: size
                    });
                }, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});

            });

        }

    }

    /*
     **	Counter for pie chart number from zero to defined number
     */
    function initToCounterProgressCircle(progressCircle) {

        progressCircle.css('opacity', '1');
        var counter = progressCircle.find('.mkd-to-counter'),
            max = parseFloat(counter.text());
        counter.countTo({
            from: 0,
            to: max,
            speed: 1500,
            refreshInterval: 50
        });

    }

    /*
     **	Init tabs shortcode
     */
    function mkdInitTabs() {

        var tabs = $('.mkd-tabs');
        if (tabs.length) {
            tabs.each(function () {
                var thisTabs = $(this);
                thisTabs.children('.mkd-tab-container').each(function (index) {
                    index = index + 1;
                    var that = $(this),
                        link = that.attr('id'),
                        navItem = that.parent().find('.mkd-tabs-nav li:nth-child(' + index + ') a'),
                        navLink = navItem.attr('href');

                    link = '#' + link;

                    if (link.indexOf(navLink) > -1) {
                        navItem.attr('href', link);
                    }
                });

                if (thisTabs.hasClass('mkd-horizontal-tab')) {
                    thisTabs.tabs();
                } else if (thisTabs.hasClass('mkd-vertical-tab')) {
                    thisTabs.tabs().addClass('ui-tabs-vertical ui-helper-clearfix');
                    thisTabs.find('.mkd-tabs-nav > ul >li').removeClass('ui-corner-top').addClass('ui-corner-left');
                }

                // initially add appear class 
                $(".mkd-tab-container .mkd-elements-holder-item").addClass("mkd-appeared");

                tabs.find(".mkd-tabs-nav > li").click(function () {

                    var tabIndex = $(this).index();

                    thisTabs.children('.mkd-tab-container').removeClass("mkd-tab-container-active");
                    var activeTab = thisTabs.children('.mkd-tab-container').eq(tabIndex).addClass("mkd-tab-container-active");

                    activeTab.find(".mkd-elements-holder-item").removeClass("mkd-appeared");

                    activeTab.find(".mkd-elements-holder-item").each(function (i) {
                        var element = $(this);

                        setTimeout(function () {
                            element.addClass("mkd-appeared");
                        }, 100 * i);
                    });

                    mkdInitInfoBox();
                });

            });
        }
    }

    function mkdIconWithText() {

        var iwt = $(".mkd-iwt");
        if(iwt.length && mkd.html.hasClass("no-touch")) {
            iwt.each(function(i) {

                var thisIwt = $(this);

                thisIwt.appear(function () {
                    setTimeout(function () {
                        thisIwt.addClass("mkd-iwt-appeared");
                    }, 200 * i);
                }, {accX: 0, accY: 0});

            });
        }
    }

    /*
     **	Generate icons in tabs navigation
     */
    function mkdInitTabIcons() {

        var tabContent = $('.mkd-tab-container');
        if (tabContent.length) {

            tabContent.each(function () {
                var thisTabContent = $(this);

                var id = thisTabContent.attr('id');
                var icon = '';
                var tabNav = thisTabContent.parents('.mkd-tabs').find('.mkd-tabs-nav > li a[href="#' + id + '"]');

                if (typeof thisTabContent.data('icon-html') !== 'undefined') {
                    icon = thisTabContent.data('icon-html');
                }
                else {
                    tabNav.children('.mkd-icon-frame').remove();
                }

                if (typeof(tabNav) !== 'undefined') {
                    tabNav.children('.mkd-icon-frame').append(icon);
                }
            });
        }
    }

    /**
     * Button object that initializes whole button functionality
     * @type {Function}
     */
    var mkdButton = mkd.modules.shortcodes.mkdButton = function () {
        //all buttons on the page
        var buttons = $('.mkd-btn');

        /**
         * Initializes button hover color
         * @param button current button
         */
        var buttonHoverColor = function (button) {
            if (typeof button.data('hover-color') !== 'undefined') {
                var changeButtonColor = function (event) {
                    event.data.button.css('color', event.data.color);
                };

                var originalColor = button.css('color');
                var hoverColor = button.data('hover-color');

                button.on('mouseenter', {button: button, color: hoverColor}, changeButtonColor);
                button.on('mouseleave', {button: button, color: originalColor}, changeButtonColor);
            }
        };


        /**
         * Initializes button hover background color
         * @param button current button
         */
        var buttonHoverBgColor = function (button) {
            if (typeof button.data('hover-bg-color') !== 'undefined') {
                var changeButtonBg = function (event) {
                    event.data.button.css('background-color', event.data.color);
                };

                var originalBgColor = button.css('background-color');
                var hoverBgColor = button.data('hover-bg-color');

                button.on('mouseenter', {button: button, color: hoverBgColor}, changeButtonBg);
                button.on('mouseleave', {button: button, color: originalBgColor}, changeButtonBg);
            }
        };

        /**
         * Initializes button border color
         * @param button
         */
        var buttonHoverBorderColor = function (button) {
            if (typeof button.data('hover-border-color') !== 'undefined') {
                var changeBorderColor = function (event) {
                    event.data.button.css('border-color', event.data.color);
                };

                var originalBorderColor = button.css('borderTopColor'); //take one of the four sides
                var hoverBorderColor = button.data('hover-border-color');

                button.on('mouseenter', {button: button, color: hoverBorderColor}, changeBorderColor);
                button.on('mouseleave', {button: button, color: originalBorderColor}, changeBorderColor);
            }
        };

        return {
            init: function () {
                if (buttons.length) {
                    buttons.each(function () {
                        buttonHoverColor($(this));
                        buttonHoverBgColor($(this));
                        buttonHoverBorderColor($(this));
                    });
                }
            }
        };
    };

    /*
     **	Init blog list masonry type
     */
    function mkdInitBlogListMasonry() {
        var blogList = $('.mkd-blog-list-holder.mkd-masonry .mkd-blog-list');
        if (blogList.length) {
            blogList.each(function () {
                var thisBlogList = $(this);
                blogList.waitForImages(function () {
                    thisBlogList.isotope({
                        layoutMode: 'packery',
                        itemSelector: '.mkd-blog-list-masonry-item',
                        packery: {
                            columnWidth: '.mkd-blog-list-masonry-grid-sizer',
                            gutter: '.mkd-blog-list-masonry-grid-gutter'
                        }
                    });
                    thisBlogList.addClass('mkd-appeared');
                });
            });

        }
    }

    /*
     **	Custom Font resizing
     */
    function mkdCustomFontResize() {
        var customFont = $('.mkd-custom-font-holder');
        if (customFont.length) {
            customFont.each(function () {
                var thisCustomFont = $(this);
                var fontSize;
                var lineHeight;
                var coef1 = 1;
                var coef2 = 1;

                if (mkd.windowWidth < 1200) {
                    coef1 = 0.8;
                }

                if (mkd.windowWidth < 1024) {
                    coef1 = 0.7;
                }

                if (mkd.windowWidth < 768) {
                    coef1 = 0.6;
                    coef2 = 0.7;
                }

                if (mkd.windowWidth < 600) {
                    coef1 = 0.5;
                    coef2 = 0.6;
                }

                if (mkd.windowWidth < 480) {
                    coef1 = 0.4;
                    coef2 = 0.5;
                }

                if (typeof thisCustomFont.data('font-size') !== 'undefined' && thisCustomFont.data('font-size') !== false) {
                    fontSize = parseInt(thisCustomFont.data('font-size'));

                    if (fontSize > 70) {
                        fontSize = Math.round(fontSize * coef1);
                    }
                    else if (fontSize > 35) {
                        fontSize = Math.round(fontSize * coef2);
                    }

                    thisCustomFont.css('font-size', fontSize + 'px');
                }

                if (typeof thisCustomFont.data('line-height') !== 'undefined' && thisCustomFont.data('line-height') !== false) {
                    lineHeight = parseInt(thisCustomFont.data('line-height'));

                    if (lineHeight > 70 && mkd.windowWidth < 1200) {
                        lineHeight = '1.2em';
                    }
                    else if (lineHeight > 35 && mkd.windowWidth < 768) {
                        lineHeight = '1.2em';
                    }
                    else {
                        lineHeight += 'px';
                    }

                    thisCustomFont.css('line-height', lineHeight);
                }
            });
        }
    }

    /* Icon appearing */
    function mkdServiceTable() {
        if ($(".mkd-service-table").length) {

            $(".mkd-service-table .mkd-mark").each(function () {

                var serviceTableIcon = $(this);

                serviceTableIcon.appear(function () {
                    setTimeout(function () {
                        serviceTableIcon.addClass("mkd-service-table-icon-appeared");
                    }, 200 * serviceTableIcon.closest("tr").index());
                }, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});
            });
        }
    }

    /*
     **	Show Google Map
     */
    function mkdShowGoogleMap() {

        if ($('.mkd-google-map').length) {
            $('.mkd-google-map').each(function () {

                var element = $(this);

                var customMapStyle;
                if (typeof element.data('custom-map-style') !== 'undefined') {
                    customMapStyle = element.data('custom-map-style');
                }

                var colorOverlay;
                if (typeof element.data('color-overlay') !== 'undefined' && element.data('color-overlay') !== false) {
                    colorOverlay = element.data('color-overlay');
                }

                var saturation;
                if (typeof element.data('saturation') !== 'undefined' && element.data('saturation') !== false) {
                    saturation = element.data('saturation');
                }

                var lightness;
                if (typeof element.data('lightness') !== 'undefined' && element.data('lightness') !== false) {
                    lightness = element.data('lightness');
                }

                var zoom;
                if (typeof element.data('zoom') !== 'undefined' && element.data('zoom') !== false) {
                    zoom = element.data('zoom');
                }

                var pin;
                if (typeof element.data('pin') !== 'undefined' && element.data('pin') !== false) {
                    pin = element.data('pin');
                }

                var mapHeight;
                if (typeof element.data('height') !== 'undefined' && element.data('height') !== false) {
                    mapHeight = element.data('height');
                }

                var uniqueId;
                if (typeof element.data('unique-id') !== 'undefined' && element.data('unique-id') !== false) {
                    uniqueId = element.data('unique-id');
                }

                var scrollWheel;
                if (typeof element.data('scroll-wheel') !== 'undefined') {
                    scrollWheel = element.data('scroll-wheel');
                }
                var addresses;
                if (typeof element.data('addresses') !== 'undefined' && element.data('addresses') !== false) {
                    addresses = element.data('addresses');
                }

                var map = "map_" + uniqueId;
                var geocoder = "geocoder_" + uniqueId;
                var holderId = "mkd-map-" + uniqueId;

                mkdInitializeGoogleMap(customMapStyle, colorOverlay, saturation, lightness, scrollWheel, zoom, holderId, mapHeight, pin, map, geocoder, addresses);
            });
        }

    }

    /*
     ** Process appear animation
     */
    function mkdProcess() {
        if ($(".mkd-process-holder").length) {
            $(".mkd-process-holder").each(function () {

                var process = $(this),
                    processItem = process.find(".mkd-process-item");

                processItem.each(function (i) {
                    var thisItem = $(this);

                    thisItem.appear(function () {
                        setTimeout(function () {
                            thisItem.addClass("mkd-process-holder-appeared");
                        }, 400 * i);
                    }, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});
                });

            });
        }

    }

    /*
     **	Init Google Map
     */
    function mkdInitializeGoogleMap(customMapStyle, color, saturation, lightness, wheel, zoom, holderId, height, pin, map, geocoder, data) {

        var mapStyles = [
            {
                stylers: [
                    {hue: color},
                    {saturation: saturation},
                    {lightness: lightness},
                    {gamma: 1}
                ]
            }
        ];

        var googleMapStyleId;

        if (customMapStyle) {
            googleMapStyleId = 'mkd-style';
        } else {
            googleMapStyleId = google.maps.MapTypeId.ROADMAP;
        }

        var qoogleMapType = new google.maps.StyledMapType(mapStyles,
            {name: "Mikado Google Map"});

        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);

        if (!isNaN(height)) {
            height = height + 'px';
        }

        var myOptions = {

            zoom: zoom,
            scrollwheel: wheel,
            center: latlng,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            scaleControl: false,
            scaleControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            streetViewControl: false,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            panControl: false,
            panControlOptions: {
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeControl: false,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'mkd-style'],
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.LEFT_CENTER
            },
            mapTypeId: googleMapStyleId
        };

        map = new google.maps.Map(document.getElementById(holderId), myOptions);
        map.mapTypes.set('mkd-style', qoogleMapType);

        var index;

        for (index = 0; index < data.length; ++index) {
            mkdInitializeGoogleAddress(data[index], pin, map, geocoder);
        }

        var holderElement = document.getElementById(holderId);
        holderElement.style.height = height;
    }

    /*
     **	Init Google Map Addresses
     */
    function mkdInitializeGoogleAddress(data, pin, map, geocoder) {
        if (data === '')
            return;
        var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<div id="bodyContent">' +
            '<p>' + data + '</p>' +
            '</div>' +
            '</div>';
        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        geocoder.geocode({'address': data}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon: pin,
                    title: data.store_title
                });
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.open(map, marker);
                });

                google.maps.event.addDomListener(window, 'resize', function () {
                    map.setCenter(results[0].geometry.location);
                });

            }
        });
    }

    function mkdInitAccordions() {
        var accordion = $('.mkd-accordion-holder');
        if (accordion.length) {
            accordion.each(function () {

                var thisAccordion = $(this);

                if (thisAccordion.hasClass('mkd-accordion')) {

                    thisAccordion.accordion({
                        animate: "swing",
                        collapsible: true,
                        active: 0,
                        icons: "",
                        heightStyle: "content"
                    });
                }

                if (thisAccordion.hasClass('mkd-toggle')) {

                    var toggleAccordion = $(this);
                    var toggleAccordionTitle = toggleAccordion.find('.mkd-accordion-title-holder');
                    var toggleAccordionContent = toggleAccordionTitle.next();

                    toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
                    toggleAccordionTitle.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom");
                    toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

                    toggleAccordionTitle.each(function () {
                        var thisTitle = $(this);

                        thisTitle.hover(function () {
                            thisTitle.toggleClass("ui-state-hover");
                        });

                        thisTitle.on('click', function () {
                            thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
                            thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
                        });
                    });
                }
            });
        }
    }

    function mkdInitImageGallery() {

        var galleries = $('.mkd-image-gallery');

        if (galleries.length) {
            galleries.each(function () {
                var gallery = $(this).children('.mkd-image-gallery-slider'),
                    loop = (gallery.data('loop') == 'yes'),
                    pause = (gallery.data('pause') == 'yes'),
                    navigation = (gallery.data('navigation') == 'yes'),
                    pagination = (gallery.data('pagination') == 'yes'),
                    autoplay = (gallery.data('autoplay') != 'disable'),
                    autoplayTimeout = 0;

                if (autoplay === true) {
                    autoplayTimeout = gallery.data('autoplay') * 1000;
                }

                gallery.owlCarousel({
                    items: 1,
                    loop: loop,
                    autoplayHoverPause: pause,
                    autoplay: autoplay,
                    autoplayTimeout: autoplayTimeout,
                    dots: pagination,
                    nav: navigation,
                    navText: [
                        '<span class="mkd-prev-icon"><i class="arrow_carrot-left"></i></span>',
                        '<span class="mkd-next-icon"><i class="arrow_carrot-right"></i></span>'
                    ],
                    onInitialized: function () {
                        gallery.css({'opacity': 1});
                    }
                });
            });
        }
    }

    // init charts shortcode
    function mkdInitCharts() {
        var chartHolder = $('.mkd-charts');

        if (chartHolder.length) {
            chartHolder.each(function () {
                var thisChartHolder = $(this);
                var thisChartCanvasId = thisChartHolder.find('canvas').attr('id');

                thisChartHolder.height(thisChartHolder.width() / 2);

                //////////////////////////////////////////////////////////////////////////////
                // prep vars from data atts

                var chartType = thisChartHolder.data('type');
                var noOfDatasets = thisChartHolder.data('no_of_used_datasets');
                var pointGroupLabels = thisChartHolder.data('point_group_labels');
                var colorScheme = '';
                var legendPosition = thisChartHolder.data('legend_position');
                var startAtZero = '';

                if (chartType == 'line' || chartType == 'horizontalBar' || chartType == 'bar') {
                    startAtZero = {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    };
                }

                //////////////////////////////////////////////////////////////////////////////

                var pointGroupColors = '',
                    dataset_1,
                    dataset_1_color,
                    dataset_2,
                    dataset_2_color,
                    dataset_3,
                    dataset_3_color,
                    datasets;

                if (thisChartHolder.data('color_scheme') == 'dataset') {
                    dataset_1_color = thisChartHolder.data('dataset_1_color');
                }
                else {
                    dataset_1_color = thisChartHolder.data('point_group_colors').split(',');
                }

                dataset_1 = {
                    label: thisChartHolder.data('dataset_1_label'),
                    backgroundColor: dataset_1_color,
                    data: thisChartHolder.data('dataset_1').split(','),
                    cubicInterpolationMode: 'monotone'
                };

                datasets = [dataset_1];

                if (noOfDatasets >= 2) {
                    if (thisChartHolder.data('color_scheme') == 'dataset') {
                        dataset_2_color = thisChartHolder.data('dataset_2_color');
                    }
                    else {
                        dataset_2_color = thisChartHolder.data('point_group_colors').split(',');
                    }

                    dataset_2 = {
                        label: thisChartHolder.data('dataset_2_label'),
                        backgroundColor: dataset_2_color,
                        data: thisChartHolder.data('dataset_2').split(','),
                        cubicInterpolationMode: 'monotone'
                    };

                    datasets = [dataset_1, dataset_2];
                }

                if (noOfDatasets >= 3) {
                    if (thisChartHolder.data('color_scheme') == 'dataset') {
                        dataset_3_color = thisChartHolder.data('dataset_3_color');
                    }
                    else {
                        dataset_3_color = thisChartHolder.data('point_group_colors').split(',');
                    }

                    dataset_3 = {
                        label: thisChartHolder.data('dataset_3_label'),
                        backgroundColor: dataset_3_color,
                        data: thisChartHolder.data('dataset_3').split(','),
                        cubicInterpolationMode: 'monotone'
                    };

                    datasets = [dataset_1, dataset_2, dataset_3];
                }

                // there is probably better way of doing init than the following one
                var thisChartParams = {
                    labels: pointGroupLabels.split(','),
                    datasets: datasets
                };

                //////////////////////////////////////////////////////////////////////////////

                var ctx = document.getElementById(thisChartCanvasId).getContext('2d');


                thisChartHolder.appear(function () {
                    thisChartHolder.addClass('mkd-appeared');

                    setTimeout(function () {

                        window.myBar = new Chart(ctx, {
                            type: chartType,
                            data: thisChartParams,
                            options: {
                                responsive: true,
                                legend: {
                                    position: legendPosition,
                                },
                                scales: startAtZero,
                            },
                        });


                    }, 500);
                }, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});


            });
        }
    }


    function mkdResizeMasonry(size, container) {

        var defaultMasonryItem = container.find('.mkd-default-masonry-item');
        var largeWidthMasonryItem = container.find('.mkd-large-width-masonry-item');
        var largeHeightMasonryItem = container.find('.mkd-large-height-masonry-item');
        var largeWidthHeightMasonryItem = container.find('.mkd-large-width-height-masonry-item');

        defaultMasonryItem.css('height', size);
        largeHeightMasonryItem.css('height', Math.round(2 * size));

        if (mkd.windowWidth > 600) {
            largeWidthHeightMasonryItem.css('height', Math.round(2 * size));
            largeWidthMasonryItem.css('height', size);
        } else {
            largeWidthHeightMasonryItem.css('height', size);
            largeWidthMasonryItem.css('height', Math.round(size / 2));

        }
    }

    // animate workflow shortcode
    function mkdInitWorkflow() {
        var workflowShortcodes = $('.mkd-workflow');
        if (workflowShortcodes.length) {
            workflowShortcodes.each(function () {
                var workflowShortcode = $(this);
                if (workflowShortcode.hasClass('mkd-workflow-animate')) {
                    var workflowItems = workflowShortcode.find('.mkd-workflow-item');

                    workflowShortcode.appear(function () {
                        workflowShortcode.addClass('mkd-appeared');
                        setTimeout(function () {
                            workflowItems.each(function (i) {
                                var workflowItem = $(this);
                                setTimeout(function () {
                                    workflowItem.addClass('mkd-appeared');
                                }, 350 * i);
                            });
                        }, 350);
                    }, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});

                }
            });
        }
    }


    function mkdConvertHTML(html) {
        var newHtml = $.trim(html),
            $html = $(newHtml),
            $empty = $();

        $html.each(function (index, value) {
            if (value.nodeType === 1) {
                $empty = $empty.add(this);
            }
        });

        return $empty;
    }

    /**
     * Initializes portfolio load more data params
     * @param portfolio list container with defined data params
     * return array
     */
    function mkdGetPortfolioAjaxData(container) {
        var returnValue = {};

        returnValue.type = '';
        returnValue.columns = '';
        returnValue.gridSize = '';
        returnValue.orderBy = '';
        returnValue.order = '';
        returnValue.number = '';
        returnValue.imageSize = '';
        returnValue.filter = '';
        returnValue.filterOrderBy = '';
        returnValue.category = '';
        returnValue.selectedProjectes = '';
        returnValue.showLoadMore = '';
        returnValue.titleTag = '';
        returnValue.nextPage = '';
        returnValue.maxNumPages = '';

        if (typeof container.data('type') !== 'undefined' && container.data('type') !== false) {
            returnValue.type = container.data('type');
        }
        if (typeof container.data('grid-size') !== 'undefined' && container.data('grid-size') !== false) {
            returnValue.gridSize = container.data('grid-size');
        }
        if (typeof container.data('columns') !== 'undefined' && container.data('columns') !== false) {
            returnValue.columns = container.data('columns');
        }
        if (typeof container.data('order-by') !== 'undefined' && container.data('order-by') !== false) {
            returnValue.orderBy = container.data('order-by');
        }
        if (typeof container.data('order') !== 'undefined' && container.data('order') !== false) {
            returnValue.order = container.data('order');
        }
        if (typeof container.data('number') !== 'undefined' && container.data('number') !== false) {
            returnValue.number = container.data('number');
        }
        if (typeof container.data('image-size') !== 'undefined' && container.data('image-size') !== false) {
            returnValue.imageSize = container.data('image-size');
        }
        if (typeof container.data('filter') !== 'undefined' && container.data('filter') !== false) {
            returnValue.filter = container.data('filter');
        }
        if (typeof container.data('filter-order-by') !== 'undefined' && container.data('filter-order-by') !== false) {
            returnValue.filterOrderBy = container.data('filter-order-by');
        }
        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {
            returnValue.category = container.data('category');
        }
        if (typeof container.data('selected-projects') !== 'undefined' && container.data('selected-projects') !== false) {
            returnValue.selectedProjectes = container.data('selected-projects');
        }
        if (typeof container.data('show-load-more') !== 'undefined' && container.data('show-load-more') !== false) {
            returnValue.showLoadMore = container.data('show-load-more');
        }
        if (typeof container.data('title-tag') !== 'undefined' && container.data('title-tag') !== false) {
            returnValue.titleTag = container.data('title-tag');
        }
        if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {
            returnValue.nextPage = container.data('next-page');
        }
        if (typeof container.data('max-num-pages') !== 'undefined' && container.data('max-num-pages') !== false) {
            returnValue.maxNumPages = container.data('max-num-pages');
        }
        return returnValue;
    }

    /**
     * Sets portfolio load more data params for ajax function
     * @param portfolio list container with defined data params
     * return array
     */
    function mkdSetPortfolioAjaxData(container) {
        var returnValue = {
            action: 'mkd_core_portfolio_ajax_load_more',
            type: container.type,
            columns: container.columns,
            gridSize: container.gridSize,
            orderBy: container.orderBy,
            order: container.order,
            number: container.number,
            imageSize: container.imageSize,
            filter: container.filter,
            filterOrderBy: container.filterOrderBy,
            category: container.category,
            selectedProjectes: container.selectedProjectes,
            showLoadMore: container.showLoadMore,
            titleTag: container.titleTag,
            nextPage: container.nextPage
        };
        return returnValue;
    }

    /**
     * Slider object that initializes whole slider functionality
     * @type {Function}
     */
    var mkdSlider = mkd.modules.shortcodes.mkdSlider = function () {

        //all sliders on the page
        var sliders = $('.mkd-slider .carousel');
        //image regex used to extract img source
        var imageRegex = /url\(["']?([^'")]+)['"]?\)/;

        /*** Functionality for translating image in slide - START ***/

        var matrixArray = {
            zoom_center: '1.2, 0, 0, 1.2, 0, 0',
            zoom_top_left: '1.2, 0, 0, 1.2, -150, -150',
            zoom_top_right: '1.2, 0, 0, 1.2, 150, -150',
            zoom_bottom_left: '1.2, 0, 0, 1.2, -150, 150',
            zoom_bottom_right: '1.2, 0, 0, 1.2, 150, 150'
        };

        // regular expression for parsing out the matrix components from the matrix string
        var matrixRE = /\([0-9epx\.\, \t\-]+/gi;

        // parses a matrix string of the form "matrix(n1,n2,n3,n4,n5,n6)" and
        // returns an array with the matrix components
        var parseMatrix = function (val) {
            return val.match(matrixRE)[0].substr(1).split(",").map(function (s) {
                return parseFloat(s);
            });
        };

        // transform css property names with vendor prefixes;
        // the plugin will check for values in the order the names are listed here and return as soon as there
        // is a value; so listing the W3 std name for the transform results in that being used if its available
        var transformPropNames = [
            "transform",
            "-webkit-transform"
        ];

        var getTransformMatrix = function (el) {
            // iterate through the css3 identifiers till we hit one that yields a value
            var matrix = null;
            transformPropNames.some(function (prop) {
                matrix = el.css(prop);
                return (matrix !== null && matrix !== "");
            });

            // if "none" then we supplant it with an identity matrix so that our parsing code below doesn't break
            matrix = (!matrix || matrix === "none") ?
                "matrix(1,0,0,1,0,0)" : matrix;
            return parseMatrix(matrix);
        };

        // set the given matrix transform on the element; note that we apply the css transforms in reverse order of how its given
        // in "transformPropName" to ensure that the std compliant prop name shows up last
        var setTransformMatrix = function (el, matrix) {
            var m = "matrix(" + matrix.join(",") + ")";
            for (var i = transformPropNames.length - 1; i >= 0; --i) {
                el.css(transformPropNames[i], m + ' rotate(0.01deg)');
            }
        };

        // interpolates a value between a range given a percent
        var interpolate = function (from, to, percent) {
            return from + ((to - from) * (percent / 100));
        };

        $.fn.transformAnimate = function (opt) {
            // extend the options passed in by caller
            var options = {
                transform: "matrix(1,0,0,1,0,0)"
            };
            $.extend(options, opt);

            // initialize our custom property on the element to track animation progress
            this.css("percentAnim", 0);

            // supplant "options.step" if it exists with our own routine
            var sourceTransform = getTransformMatrix(this);
            var targetTransform = parseMatrix(options.transform);
            options.step = function (percentAnim, fx) {
                // compute the interpolated transform matrix for the current animation progress
                var $this = $(this);
                var matrix = sourceTransform.map(function (c, i) {
                    return interpolate(c, targetTransform[i],
                        percentAnim);
                });

                // apply the new matrix
                setTransformMatrix($this, matrix);

                // invoke caller's version of "step" if one was supplied;
                if (opt.step) {
                    opt.step.apply(this, [matrix, fx]);
                }
            };

            // animate!
            return this.stop().animate({percentAnim: 100}, options);
        };

        /*** Functionality for translating image in slide - END ***/


        /**
         * Calculate heights for slider holder and slide item, depending on window width, but only if slider is set to be responsive
         * @param slider, current slider
         * @param defaultHeight, default height of slider, set in shortcode
         * @param responsive_breakpoint_set, breakpoints set for slider responsiveness
         * @param reset, boolean for reseting heights
         */
        var setSliderHeight = function (slider, defaultHeight, responsive_breakpoint_set, reset) {
            var sliderHeight = defaultHeight;
            if (!reset) {
                if (mkd.windowWidth > responsive_breakpoint_set[0]) {
                    sliderHeight = defaultHeight;
                } else if (mkd.windowWidth > responsive_breakpoint_set[1]) {
                    sliderHeight = defaultHeight * 0.75;
                } else if (mkd.windowWidth > responsive_breakpoint_set[2]) {
                    sliderHeight = defaultHeight * 0.6;
                } else if (mkd.windowWidth > responsive_breakpoint_set[3]) {
                    sliderHeight = defaultHeight * 0.55;
                } else if (mkd.windowWidth <= responsive_breakpoint_set[3]) {
                    sliderHeight = defaultHeight * 0.45;
                }
            }

            slider.css({'height': (sliderHeight) + 'px'});
            slider.find('.mkd-slider-preloader').css({'height': (sliderHeight) + 'px'});
            slider.find('.mkd-slider-preloader .mkd-ajax-loader').css({'display': 'block'});
            slider.find('.item').css({'height': (sliderHeight) + 'px'});
            if (mkdPerPageVars.vars.mkdStickyScrollAmount === 0) {
                mkd.modules.header.stickyAppearAmount = sliderHeight; //set sticky header appear amount if slider there is no amount entered on page itself
            }
        };

        /**
         * Calculate heights for slider holder and slide item, depending on window size, but only if slider is set to be full height
         * @param slider, current slider
         */
        var setSliderFullHeight = function (slider) {
            var mobileHeaderHeight = mkd.windowWidth < 1025 ? mkdGlobalVars.vars.mkdMobileHeaderHeight + $('.mkd-top-bar').height() : 0;
            slider.css({'height': (mkd.windowHeight - mobileHeaderHeight) + 'px'});
            slider.find('.mkd-slider-preloader').css({'height': (mkd.windowHeight - mobileHeaderHeight) + 'px'});
            slider.find('.mkd-slider-preloader .mkd-ajax-loader').css({'display': 'block'});
            slider.find('.item').css({'height': (mkd.windowHeight - mobileHeaderHeight) + 'px'});
            if (mkdPerPageVars.vars.mkdStickyScrollAmount === 0) {
                mkd.modules.header.stickyAppearAmount = mkd.windowHeight; //set sticky header appear amount if slider there is no amount entered on page itself
            }
        };

        var setElementsResponsiveness = function (slider) {
            // Basic text styles responsiveness
            slider
                .find('.mkd-slide-element-text-small, .mkd-slide-element-text-normal, .mkd-slide-element-text-large, .mkd-slide-element-text-extra-large')
                .each(function () {
                    var element = $(this);
                    if (typeof element.data('default-font-size') === 'undefined') {
                        element.data('default-font-size', parseInt(element.css('font-size'), 10));
                    }
                    if (typeof element.data('default-line-height') === 'undefined') {
                        element.data('default-line-height', parseInt(element.css('line-height'), 10));
                    }
                    if (typeof element.data('default-letter-spacing') === 'undefined') {
                        element.data('default-letter-spacing', parseInt(element.css('letter-spacing'), 10));
                    }
                });
            // Advanced text styles responsiveness
            slider.find('.mkd-slide-element-responsive-text').each(function () {
                if (typeof $(this).data('default-font-size') === 'undefined') {
                    $(this).data('default-font-size', parseInt($(this).css('font-size'), 10));
                }
                if (typeof $(this).data('default-line-height') === 'undefined') {
                    $(this).data('default-line-height', parseInt($(this).css('line-height'), 10));
                }
                if (typeof $(this).data('default-letter-spacing') === 'undefined') {
                    $(this).data('default-letter-spacing', parseInt($(this).css('letter-spacing'), 10));
                }
            });
            // Button responsiveness
            slider.find('.mkd-slide-element-responsive-button').each(function () {
                if (typeof $(this).data('default-font-size') === 'undefined') {
                    $(this).data('default-font-size', parseInt($(this).find('a').css('font-size'), 10));
                }
                if (typeof $(this).data('default-line-height') === 'undefined') {
                    $(this).data('default-line-height', parseInt($(this).find('a').css('line-height'), 10));
                }
                if (typeof $(this).data('default-letter-spacing') === 'undefined') {
                    $(this).data('default-letter-spacing', parseInt($(this).find('a').css('letter-spacing'), 10));
                }
                if (typeof $(this).data('default-ver-padding') === 'undefined') {
                    $(this).data('default-ver-padding', parseInt($(this).find('a').css('padding-top'), 10));
                }
                if (typeof $(this).data('default-hor-padding') === 'undefined') {
                    $(this).data('default-hor-padding', parseInt($(this).find('a').css('padding-left'), 10));
                }
            });
            // Margins for non-custom layouts
            slider.find('.mkd-slide-element').each(function () {
                var element = $(this);
                if (typeof element.data('default-margin-top') === 'undefined') {
                    element.data('default-margin-top', parseInt(element.css('margin-top'), 10));
                }
                if (typeof element.data('default-margin-bottom') === 'undefined') {
                    element.data('default-margin-bottom', parseInt(element.css('margin-bottom'), 10));
                }
                if (typeof element.data('default-margin-left') === 'undefined') {
                    element.data('default-margin-left', parseInt(element.css('margin-left'), 10));
                }
                if (typeof element.data('default-margin-right') === 'undefined') {
                    element.data('default-margin-right', parseInt(element.css('margin-right'), 10));
                }
            });
            adjustElementsSizes(slider);
        };

        var adjustElementsSizes = function (slider) {
            var boundaries = {
                // These values must match those in map.php (for slider), slider.php and mkd.layout.php
                mobile: 600,
                tabletp: 800,
                tabletl: 1024,
                laptop: 1440
            };
            slider.find('.mkd-slider-elements-container').each(function () {
                var container = $(this);
                var target = container.filter('.mkd-custom-elements').add(container.not('.mkd-custom-elements').find('.mkd-slider-elements-holder-frame')).not('.mkd-grid');
                if (target.length) {
                    if (boundaries.mobile >= mkd.windowWidth && container.attr('data-width-mobile').length) {
                        target.css('width', container.data('width-mobile') + '%');
                    }
                    else if (boundaries.tabletp >= mkd.windowWidth && container.attr('data-width-tablet-p').length) {
                        target.css('width', container.data('width-tablet-p') + '%');
                    }
                    else if (boundaries.tabletl >= mkd.windowWidth && container.attr('data-width-tablet-l').length) {
                        target.css('width', container.data('width-tablet-l') + '%');
                    }
                    else if (boundaries.laptop >= mkd.windowWidth && container.attr('data-width-laptop').length) {
                        target.css('width', container.data('width-laptop') + '%');
                    }
                    else if (container.attr('data-width-desktop').length) {
                        target.css('width', container.data('width-desktop') + '%');
                    }
                }
            });
            slider.find('.item').each(function () {
                var slide = $(this);
                var def_w = slide.find('.mkd-slider-elements-holder-frame').data('default-width');
                var elements = slide.find('.mkd-slide-element');

                // Adjusting margins for all elements
                elements.each(function () {
                    var element = $(this);
                    var def_m_top = element.data('default-margin-top'),
                        def_m_bot = element.data('default-margin-bottom'),
                        def_m_l = element.data('default-margin-left'),
                        def_m_r = element.data('default-margin-right');
                    var scale_data = (typeof element.data('resp-scale') !== 'undefined') ? element.data('resp-scale') : undefined;
                    var factor;

                    if (boundaries.mobile >= mkd.windowWidth) {
                        factor = (typeof scale_data === 'undefined') ? mkd.windowWidth / def_w : parseFloat(scale_data.mobile);
                    }
                    else if (boundaries.tabletp >= mkd.windowWidth) {
                        factor = (typeof scale_data === 'undefined') ? mkd.windowWidth / def_w : parseFloat(scale_data.tabletp);
                    }
                    else if (boundaries.tabletl >= mkd.windowWidth) {
                        factor = (typeof scale_data === 'undefined') ? mkd.windowWidth / def_w : parseFloat(scale_data.tabletl);
                    }
                    else if (boundaries.laptop >= mkd.windowWidth) {
                        factor = (typeof scale_data === 'undefined') ? mkd.windowWidth / def_w : parseFloat(scale_data.laptop);
                    }
                    else {
                        factor = (typeof scale_data === 'undefined') ? mkd.windowWidth / def_w : parseFloat(scale_data.desktop);
                    }

                    element.css({
                        'margin-top': Math.round(factor * def_m_top) + 'px',
                        'margin-bottom': Math.round(factor * def_m_bot) + 'px',
                        'margin-left': Math.round(factor * def_m_l) + 'px',
                        'margin-right': Math.round(factor * def_m_r) + 'px'
                    });
                });

                // Adjusting responsiveness
                elements
                    .filter('.mkd-slide-element-responsive-text, .mkd-slide-element-responsive-button, .mkd-slide-element-responsive-image')
                    .add(elements.find('a.mkd-slide-element-responsive-text, span.mkd-slide-element-responsive-text'))
                    .each(function () {
                        var element = $(this);
                        var scale_data = (typeof element.data('resp-scale') !== 'undefined') ? element.data('resp-scale') : undefined,
                            left_data = (typeof element.data('resp-left') !== 'undefined') ? element.data('resp-left') : undefined,
                            top_data = (typeof element.data('resp-top') !== 'undefined') ? element.data('resp-top') : undefined;
                        var factor, new_left, new_top;

                        if (boundaries.mobile >= mkd.windowWidth) {
                            factor = (typeof scale_data === 'undefined') ? mkd.windowWidth / def_w : parseFloat(scale_data.mobile);
                            new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left') + '%' : '') : (left_data.mobile !== '' ? left_data.mobile + '%' : element.data('left') + '%');
                            new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top') + '%' : '') : (top_data.mobile !== '' ? top_data.mobile + '%' : element.data('top') + '%');
                        }
                        else if (boundaries.tabletp >= mkd.windowWidth) {
                            factor = (typeof scale_data === 'undefined') ? mkd.windowWidth / def_w : parseFloat(scale_data.tabletp);
                            new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left') + '%' : '') : (left_data.tabletp !== '' ? left_data.tabletp + '%' : element.data('left') + '%');
                            new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top') + '%' : '') : (top_data.tabletp !== '' ? top_data.tabletp + '%' : element.data('top') + '%');
                        }
                        else if (boundaries.tabletl >= mkd.windowWidth) {
                            factor = (typeof scale_data === 'undefined') ? mkd.windowWidth / def_w : parseFloat(scale_data.tabletl);
                            new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left') + '%' : '') : (left_data.tabletl !== '' ? left_data.tabletl + '%' : element.data('left') + '%');
                            new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top') + '%' : '') : (top_data.tabletl !== '' ? top_data.tabletl + '%' : element.data('top') + '%');
                        }
                        else if (boundaries.laptop >= mkd.windowWidth) {
                            factor = (typeof scale_data === 'undefined') ? mkd.windowWidth / def_w : parseFloat(scale_data.laptop);
                            new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left') + '%' : '') : (left_data.laptop !== '' ? left_data.laptop + '%' : element.data('left') + '%');
                            new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top') + '%' : '') : (top_data.laptop !== '' ? top_data.laptop + '%' : element.data('top') + '%');
                        }
                        else {
                            factor = (typeof scale_data === 'undefined') ? mkd.windowWidth / def_w : parseFloat(scale_data.desktop);
                            new_left = (typeof left_data === 'undefined') ? (typeof element.data('left') !== 'undefined' ? element.data('left') + '%' : '') : (left_data.desktop !== '' ? left_data.desktop + '%' : element.data('left') + '%');
                            new_top = (typeof top_data === 'undefined') ? (typeof element.data('top') !== 'undefined' ? element.data('top') + '%' : '') : (top_data.desktop !== '' ? top_data.desktop + '%' : element.data('top') + '%');
                        }

                        if (!factor) {
                            element.hide();
                        }
                        else {
                            element.show();
                            var def_font_size,
                                def_line_h,
                                def_let_spac,
                                def_ver_pad,
                                def_hor_pad;

                            if (element.is('.mkd-slide-element-responsive-button')) {
                                def_font_size = element.data('default-font-size');
                                def_line_h = element.data('default-line-height');
                                def_let_spac = element.data('default-letter-spacing');
                                def_ver_pad = element.data('default-ver-padding');
                                def_hor_pad = element.data('default-hor-padding');

                                element.css({
                                        'left': new_left,
                                        'top': new_top
                                    })
                                    .find('.mkd-btn').css({
                                    'font-size': Math.round(factor * def_font_size) + 'px',
                                    'line-height': Math.round(factor * def_line_h) + 'px',
                                    'letter-spacing': Math.round(factor * def_let_spac) + 'px',
                                    'padding-left': Math.round(factor * def_hor_pad) + 'px',
                                    'padding-right': Math.round(factor * def_hor_pad) + 'px',
                                    'padding-top': Math.round(factor * def_ver_pad) + 'px',
                                    'padding-bottom': Math.round(factor * def_ver_pad) + 'px'
                                });
                            }
                            else if (element.is('.mkd-slide-element-responsive-image')) {
                                if (factor != mkd.windowWidth / def_w) { // if custom factor has been set for this screen width
                                    var up_w = element.data('upload-width'),
                                        up_h = element.data('upload-height');

                                    element.filter('.custom-image').css({
                                            'left': new_left,
                                            'top': new_top
                                        })
                                        .add(element.not('.custom-image').find('img'))
                                        .css({
                                            'width': Math.round(factor * up_w) + 'px',
                                            'height': Math.round(factor * up_h) + 'px'
                                        });
                                }
                                else {
                                    var w = element.data('width');

                                    element.filter('.custom-image').css({
                                            'left': new_left,
                                            'top': new_top
                                        })
                                        .add(element.not('.custom-image').find('img'))
                                        .css({
                                            'width': w + '%',
                                            'height': ''
                                        });
                                }
                            }
                            else {
                                def_font_size = element.data('default-font-size');
                                def_line_h = element.data('default-line-height');
                                def_let_spac = element.data('default-letter-spacing');

                                element.css({
                                    'left': new_left,
                                    'top': new_top,
                                    'font-size': Math.round(factor * def_font_size) + 'px',
                                    'line-height': Math.round(factor * def_line_h) + 'px',
                                    'letter-spacing': Math.round(factor * def_let_spac) + 'px'
                                });
                            }
                        }
                    });
            });
            var nav = slider.find('.carousel-indicators');
            slider.find('.mkd-slide-element-section-link').css('bottom', nav.length ? parseInt(nav.css('bottom'), 10) + nav.outerHeight() + 10 + 'px' : '20px');
        };

        var checkButtonsAlignment = function (slider) {
            slider.find('.item').each(function () {
                var inline_buttons = $(this).find('.mkd-slide-element-button-inline');
                inline_buttons.css('display', 'inline-block').wrapAll('<div class="mkd-slide-elements-buttons-wrapper" style="text-align: ' + inline_buttons.eq(0).css('text-align') + ';"/>');
            });
        };

        /**
         * Set heights for slider and elemnts depending on slider settings (full height, responsive height od set height)
         * @param slider, current slider
         */
        var setHeights = function (slider) {

            var responsiveBreakpointSet = [1600, 1200, 900, 650, 500, 320];
            var defaultHeight;

            setElementsResponsiveness(slider);

            if (slider.hasClass('mkd-full-screen')) {

                setSliderFullHeight(slider);

                $(window).resize(function () {
                    setSliderFullHeight(slider);
                    adjustElementsSizes(slider);
                });

            } else if (slider.hasClass('mkd-responsive-height')) {

                defaultHeight = slider.data('height');
                setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);

                $(window).resize(function () {
                    setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
                    adjustElementsSizes(slider);
                });

            } else {
                defaultHeight = slider.data('height');

                slider.find('.mkd-slider-preloader').css({'height': (slider.height()) + 'px'});
                slider.find('.mkd-slider-preloader .mkd-ajax-loader').css({'display': 'block'});

                if (mkd.windowWidth < 1025) {
                    setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
                }
                else {
                    setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, true);
                }


                $(window).resize(function () {
                    if (mkd.windowWidth < 1025) {
                        setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, false);
                    } else {
                        setSliderHeight(slider, defaultHeight, responsiveBreakpointSet, true);
                    }
                    adjustElementsSizes(slider);
                });
            }
        };

        /**
         * Set prev/next numbers on navigation arrows
         * @param slider, current slider
         * @param currentItem, current slide item index
         * @param totalItemCount, total number of slide items
         */
        var setPrevNextNumbers = function (slider, currentItem, totalItemCount) {
            if (currentItem == 1) {
                slider.find('.left.carousel-control .prev').html(totalItemCount);
                slider.find('.right.carousel-control .next').html(currentItem + 1);
            } else if (currentItem == totalItemCount) {
                slider.find('.left.carousel-control .prev').html(currentItem - 1);
                slider.find('.right.carousel-control .next').html(1);
            } else {
                slider.find('.left.carousel-control .prev').html(currentItem - 1);
                slider.find('.right.carousel-control .next').html(currentItem + 1);
            }
        };

        /**
         * Set video background size
         * @param slider, current slider
         */
        var initVideoBackgroundSize = function (slider) {
            var min_w = 1500; // minimum video width allowed
            var video_width_original = 1920;  // original video dimensions
            var video_height_original = 1080;
            var vid_ratio = 1920 / 1080;

            slider.find('.item .mkd-video .mkd-video-wrap').each(function () {

                var slideWidth = mkd.windowWidth;
                var slideHeight = $(this).closest('.carousel').height();

                $(this).width(slideWidth);

                min_w = vid_ratio * (slideHeight + 20);
                $(this).height(slideHeight);

                var scale_h = slideWidth / video_width_original;
                var scale_v = (slideHeight - mkdGlobalVars.vars.mkdMenuAreaHeight) / video_height_original;
                var scale = scale_v;
                if (scale_h > scale_v)
                    scale = scale_h;
                if (scale * video_width_original < min_w) {
                    scale = min_w / video_width_original;
                }

                $(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original + 2));
                $(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original + 2));
                $(this).scrollLeft(($(this).find('video').width() - slideWidth) / 2);
                $(this).find('.mejs-overlay, .mejs-poster').scrollTop(($(this).find('video').height() - slideHeight) / 2);
                $(this).scrollTop(($(this).find('video').height() - slideHeight) / 2);
            });
        };

        /**
         * Init video background
         * @param slider, current slider
         */
        var initVideoBackground = function (slider) {
            $('.item .mkd-video-wrap .mkd-video-element').mediaelementplayer({
                enableKeyboard: false,
                iPadUseNativeControls: false,
                pauseOtherPlayers: false,
                // force iPhone's native controls
                iPhoneUseNativeControls: false,
                // force Android's native controls
                AndroidUseNativeControls: false
            });

            initVideoBackgroundSize(slider);
            $(window).resize(function () {
                initVideoBackgroundSize(slider);
            });

            //mobile check
            if (navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
                $('.mkd-slider .mkd-mobile-video-image').show();
                $('.mkd-slider .mkd-video-wrap').remove();
            }
        };

        var initPeek = function (slider) {
            if (slider.hasClass('mkd-slide-peek')) {

                var navArrowHover = function (arrow, entered) {
                    var dir = arrow.is('.left') ? 'left' : 'right';
                    var targ_peeker = peekers.filter('.' + dir);
                    if (entered) {
                        arrow.addClass('hovered');
                        var targ_item = (items.index(items.filter('.active')) + (dir == 'left' ? -1 : 1) + items.length) % items.length;
                        targ_peeker.find('.mkd-slider-peeker-inner').css({
                            'background-image': items.eq(targ_item).find('.mkd-image, .mkd-mobile-video-image').css('background-image'),
                            'width': itemWidth + 'px'
                        });
                        targ_peeker.addClass('shown');
                    }
                    else {
                        arrow.removeClass('hovered');
                        peekers.removeClass('shown');
                    }
                };

                var navBulletHover = function (bullet, entered) {
                    if (entered) {
                        bullet.addClass('hovered');

                        var targ_item = bullet.data('slide-to');
                        var cur_item = items.index(items.filter('.active'));
                        if (cur_item != targ_item) {
                            var dir = (targ_item < cur_item) ? 'left' : 'right';
                            var targ_peeker = peekers.filter('.' + dir);
                            targ_peeker.find('.mkd-slider-peeker-inner').css({
                                'background-image': items.eq(targ_item).find('.mkd-image, .mkd-mobile-video-image').css('background-image'),
                                'width': itemWidth + 'px'
                            });
                            targ_peeker.addClass('shown');
                        }
                    }
                    else {
                        bullet.removeClass('hovered');
                        peekers.removeClass('shown');
                    }
                };

                var handleResize = function () {
                    itemWidth = items.filter('.active').width();
                    itemWidth += (itemWidth % 2) ? 1 : 0; // To make it even
                    items.children('.mkd-image, .mkd-video').css({
                        'position': 'absolute',
                        'width': itemWidth + 'px',
                        'height': '110%',
                        'left': '50%',
                        'transform': 'translateX(-50%)'
                    });
                };

                var items = slider.find('.item');
                var itemWidth;
                handleResize();
                $(window).resize(handleResize);

                slider.find('.carousel-inner').append('<div class="mkd-slider-peeker left"><div class="mkd-slider-peeker-inner"></div></div><div class="mkd-slider-peeker right"><div class="mkd-slider-peeker-inner"></div></div>');
                var peekers = slider.find('.mkd-slider-peeker');
                var nav_arrows = slider.find('.carousel-control');
                var nav_bullets = slider.find('.carousel-indicators > li');

                nav_arrows
                    .hover(
                        function () {
                            navArrowHover($(this), true);
                        },
                        function () {
                            navArrowHover($(this), false);
                        }
                    );

                nav_bullets
                    .hover(
                        function () {
                            navBulletHover($(this), true);
                        },
                        function () {
                            navBulletHover($(this), false);
                        }
                    );

                slider.on('slide.bs.carousel', function () {
                    setTimeout(function () {
                        peekers.addClass('mkd-slide-peek-in-progress').removeClass('shown');
                    }, 500);
                });

                slider.on('slid.bs.carousel', function () {
                    nav_arrows.filter('.hovered').each(function () {
                        navArrowHover($(this), true);
                    });
                    setTimeout(function () {
                        nav_bullets.filter('.hovered').each(function () {
                            navBulletHover($(this), true);
                        });
                    }, 200);
                    peekers.removeClass('mkd-slide-peek-in-progress');
                });
            }
        };

        var updateNavigationThumbs = function (slider) {
            if (slider.hasClass('mkd-slider-thumbs')) {
                var src, prev_image, next_image;
                var all_items_count = slider.find('.item').length;
                var curr_item = slider.find('.item').index($('.item.active')[0]) + 1;
                setPrevNextNumbers(slider, curr_item, all_items_count);

                // prev thumb
                if (slider.find('.item.active').prev('.item').length) {
                    if (slider.find('.item.active').prev('div').find('.mkd-image').length) {
                        src = imageRegex.exec(slider.find('.active').prev('div').find('.mkd-image').attr('style'));
                        prev_image = new Image();
                        prev_image.src = src[1];
                        //prev_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
                    } else {
                        prev_image = slider.find('.active').prev('div').find('> .mkd-video').clone();
                        prev_image.find('.mkd-video-overlay, .mejs-offscreen').remove();
                        prev_image.find('.mkd-video-wrap').width(150).height(84);
                        prev_image.find('.mejs-container').width(150).height(84);
                        prev_image.find('video').width(150).height(84);
                    }
                    slider.find('.left.carousel-control .img .old').fadeOut(300, function () {
                        $(this).remove();
                    });
                    slider.find('.left.carousel-control .img').append(prev_image).find('div.thumb-image, > img, div.mkd-video').fadeIn(300).addClass('old');

                } else {
                    if (slider.find('.carousel-inner .item:last-child .mkd-image').length) {
                        src = imageRegex.exec(slider.find('.carousel-inner .item:last-child .mkd-image').attr('style'));
                        prev_image = new Image();
                        prev_image.src = src[1];
                        //prev_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
                    } else {
                        prev_image = slider.find('.carousel-inner .item:last-child > .mkd-video').clone();
                        prev_image.find('.mkd-video-overlay, .mejs-offscreen').remove();
                        prev_image.find('.mkd-video-wrap').width(150).height(84);
                        prev_image.find('.mejs-container').width(150).height(84);
                        prev_image.find('video').width(150).height(84);
                    }
                    slider.find('.left.carousel-control .img .old').fadeOut(300, function () {
                        $(this).remove();
                    });
                    slider.find('.left.carousel-control .img').append(prev_image).find('div.thumb-image, > img, div.mkd-video').fadeIn(300).addClass('old');
                }

                // next thumb
                if (slider.find('.active').next('div.item').length) {
                    if (slider.find('.active').next('div').find('.mkd-image').length) {
                        src = imageRegex.exec(slider.find('.active').next('div').find('.mkd-image').attr('style'));
                        next_image = new Image();
                        next_image.src = src[1];
                        //next_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
                    } else {
                        next_image = slider.find('.active').next('div').find('> .mkd-video').clone();
                        next_image.find('.mkd-video-overlay, .mejs-offscreen').remove();
                        next_image.find('.mkd-video-wrap').width(150).height(84);
                        next_image.find('.mejs-container').width(150).height(84);
                        next_image.find('video').width(150).height(84);
                    }

                    slider.find('.right.carousel-control .img .old').fadeOut(300, function () {
                        $(this).remove();
                    });
                    slider.find('.right.carousel-control .img').append(next_image).find('div.thumb-image, > img, div.mkd-video').fadeIn(300).addClass('old');

                } else {
                    if (slider.find('.carousel-inner .item:first-child .mkd-image').length) {
                        src = imageRegex.exec(slider.find('.carousel-inner .item:first-child .mkd-image').attr('style'));
                        next_image = new Image();
                        next_image.src = src[1];
                        //next_image = '<div class="thumb-image" style="background-image: url('+src[1]+')"></div>';
                    } else {
                        next_image = slider.find('.carousel-inner .item:first-child > .mkd-video').clone();
                        next_image.find('.mkd-video-overlay, .mejs-offscreen').remove();
                        next_image.find('.mkd-video-wrap').width(150).height(84);
                        next_image.find('.mejs-container').width(150).height(84);
                        next_image.find('video').width(150).height(84);
                    }
                    slider.find('.right.carousel-control .img .old').fadeOut(300, function () {
                        $(this).remove();
                    });
                    slider.find('.right.carousel-control .img').append(next_image).find('div.thumb-image, > img, div.mkd-video').fadeIn(300).addClass('old');
                }
            }
        };

        /**
         * initiate slider
         * @param slider, current slider
         * @param currentItem, current slide item index
         * @param totalItemCount, total number of slide items
         * @param slideAnimationTimeout, timeout for slide change
         */
        var initiateSlider = function (slider, totalItemCount, slideAnimationTimeout) {

            //set active class on first item
            slider.find('.carousel-inner .item:first-child').addClass('active');
            //check for header style
            mkdCheckSliderForHeaderStyle($('.carousel .active'), slider.hasClass('mkd-header-effect'));
            // setting numbers on carousel controls
            if (slider.hasClass('mkd-slider-numbers')) {
                setPrevNextNumbers(slider, 1, totalItemCount);
            }
            // set video background if there is video slide
            if (slider.find('.item video').length) {
                //initVideoBackgroundSize(slider);
                initVideoBackground(slider);
            }

            // update thumbs
            updateNavigationThumbs(slider);

            // initiate peek
            initPeek(slider);

            // enable link hover color for slide elements with links
            slider.find('.mkd-slide-element-wrapper-link')
                .mouseenter(function () {
                    $(this).removeClass('inheriting');
                })
                .mouseleave(function () {
                    $(this).addClass('inheriting');
                })
            ;

            //init slider
            if (slider.hasClass('mkd-auto-start')) {
                slider.carousel({
                    interval: slideAnimationTimeout,
                    pause: false
                });

                //pause slider when hover slider button
                slider.find('.slide_buttons_holder .qbutton')
                    .mouseenter(function () {
                        slider.carousel('pause');
                    })
                    .mouseleave(function () {
                        slider.carousel('cycle');
                    });
            } else {
                slider.carousel({
                    interval: 0,
                    pause: false
                });
            }

            $(window).scroll(function () {
                if (slider.hasClass('mkd-full-screen') && mkd.scroll > mkd.windowHeight && mkd.windowWidth > 1024) {
                    slider.carousel('pause');
                } else if (!slider.hasClass('mkd-full-screen') && mkd.scroll > slider.height() && mkd.windowWidth > 1024) {
                    slider.carousel('pause');
                } else {
                    slider.carousel('cycle');
                }
            });


            //initiate image animation
            if ($('.carousel-inner .item:first-child').hasClass('mkd-animate-image') && mkd.windowWidth > 1024) {
                slider.find('.carousel-inner .item.mkd-animate-image:first-child .mkd-image').transformAnimate({
                    transform: "matrix(" + matrixArray[$('.carousel-inner .item:first-child').data('mkd_animate_image')] + ")",
                    duration: 30000
                });
            }
        };

        return {
            init: function () {
                if (sliders.length) {
                    sliders.each(function () {
                        var $this = $(this);
                        var slideAnimationTimeout = $this.data('slide_animation_timeout');
                        var totalItemCount = $this.find('.item').length;
                        var src;
                        var backImg;

                        checkButtonsAlignment($this);

                        setHeights($this);

                        /*** wait until first video or image is loaded and than initiate slider - start ***/
                        if (mkd.htmlEl.hasClass('touch')) {
                            if ($this.find('.item:first-child .mkd-mobile-video-image').length > 0) {
                                src = imageRegex.exec($this.find('.item:first-child .mkd-mobile-video-image').attr('style'));
                            } else {
                                src = imageRegex.exec($this.find('.item:first-child .mkd-image').attr('style'));
                            }
                            if (src) {
                                backImg = new Image();
                                backImg.src = src[1];
                                $(backImg).load(function () {
                                    $('.mkd-slider-preloader').fadeOut(500);
                                    initiateSlider($this, totalItemCount, slideAnimationTimeout);
                                });
                            }
                        } else {
                            if ($this.find('.item:first-child video').length > 0) {
                                $this.find('.item:first-child video').eq(0).one('loadeddata', function () {
                                    $('.mkd-slider-preloader').fadeOut(500);
                                    initiateSlider($this, totalItemCount, slideAnimationTimeout);
                                });
                            } else {
                                src = imageRegex.exec($this.find('.item:first-child .mkd-image').attr('style'));
                                if (src) {
                                    backImg = new Image();
                                    backImg.src = src[1];
                                    $(backImg).load(function () {
                                        $('.mkd-slider-preloader').fadeOut(500);
                                        initiateSlider($this, totalItemCount, slideAnimationTimeout);
                                    });
                                }
                            }
                        }
                        /*** wait until first video or image is loaded and than initiate slider - end ***/

                        /* before slide transition - start */
                        $this.on('slide.bs.carousel', function () {
                            $this.addClass('mkd-in-progress');
                            $this.find('.active .mkd-slider-elements-holder-frame, .active .mkd-slide-element-section-link').fadeTo(250, 0);
                        });
                        /* before slide transition - end */

                        /* after slide transition - start */
                        $this.on('slid.bs.carousel', function () {
                            $this.removeClass('mkd-in-progress');
                            $this.find('.active .mkd-slider-elements-holder-frame, .active .mkd-slide-element-section-link').fadeTo(0, 1);

                            // setting numbers on carousel controls
                            if ($this.hasClass('mkd-slider-numbers')) {
                                var currentItem = $('.item').index($('.item.active')[0]) + 1;
                                setPrevNextNumbers($this, currentItem, totalItemCount);
                            }

                            // initiate image animation on active slide and reset all others
                            $('.item.mkd-animate-image .mkd-image').stop().css({
                                'transform': '',
                                '-webkit-transform': ''
                            });
                            if ($('.item.active').hasClass('mkd-animate-image') && mkd.windowWidth > 1025) {
                                $('.item.mkd-animate-image.active .mkd-image').transformAnimate({
                                    transform: "matrix(" + matrixArray[$('.item.mkd-animate-image.active').data('mkd_animate_image')] + ")",
                                    duration: 30000
                                });
                            }

                            // setting thumbnails on navigation controls
                            if ($this.hasClass('mkd-slider-thumbs')) {
                                updateNavigationThumbs($this);
                            }
                        });
                        /* after slide transition - end */

                        /* swipe functionality - start */
                        $this.swipe({
                            swipeLeft: function () {
                                $this.carousel('next');
                            },
                            swipeRight: function () {
                                $this.carousel('prev');
                            },
                            threshold: 20
                        });
                        /* swipe functionality - end */

                    });

                    //adding parallax functionality on slider
                    if ($('.no-touch .carousel').length) {
                        var skrollr_slider = skrollr.init({
                            smoothScrolling: false,
                            forceHeight: false
                        });
                        skrollr_slider.refresh();
                    }

                    $(window).scroll(function () {
                        //set control class for slider in order to change header style
                        if ($('.mkd-slider .carousel').height() < mkd.scroll) {
                            $('.mkd-slider .carousel').addClass('mkd-disable-slider-header-style-changing');
                        } else {
                            $('.mkd-slider .carousel').removeClass('mkd-disable-slider-header-style-changing');
                            mkdCheckSliderForHeaderStyle($('.mkd-slider .carousel .active'), $('.mkd-slider .carousel').hasClass('mkd-header-effect'));
                        }

                        //hide slider when it is out of viewport
                        if ($('.mkd-slider .carousel').hasClass('mkd-full-screen') && mkd.scroll > mkd.windowHeight && mkd.windowWidth > 1025) {
                            $('.mkd-slider .carousel').find('.carousel-inner, .carousel-indicators').hide();
                        } else if (!$('.mkd-slider .carousel').hasClass('mkd-full-screen') && mkd.scroll > $('.mkd-slider .carousel').height() && mkd.windowWidth > 1025) {
                            $('.mkd-slider .carousel').find('.carousel-inner, .carousel-indicators').hide();
                        } else {
                            $('.mkd-slider .carousel').find('.carousel-inner, .carousel-indicators').show();
                        }
                    });
                }
            }
        };
    };

    /**
     * Check if slide effect on header style changing
     * @param slide, current slide
     * @param headerEffect, flag if slide
     */

    function mkdCheckSliderForHeaderStyle(slide, headerEffect) {

        if ($('.mkd-slider .carousel').not('.mkd-disable-slider-header-style-changing').length > 0) {

            var slideHeaderStyle = "";
            if (slide.hasClass('light')) {
                slideHeaderStyle = 'mkd-light-header';
            }
            if (slide.hasClass('dark')) {
                slideHeaderStyle = 'mkd-dark-header';
            }

            if (slideHeaderStyle !== "") {
                if (headerEffect) {
                    mkd.body.removeClass('mkd-dark-header mkd-light-header').addClass(slideHeaderStyle);
                }
            } else {
                if (headerEffect) {
                    mkd.body.removeClass('mkd-dark-header mkd-light-header').addClass(mkd.defaultHeaderStyle);
                }

            }
        }
    }

    /**
     * List object that initializes list with animation
     * @type {Function}
     */
    var mkdInitList = mkd.modules.shortcodes.mkdInitList = function () {
        var list = $('.mkd-animate-list .mkd-list-item');

        /**
         * Initializes icon list animation
         * @param list current list shortcode
         */
        var listInit = function (list) {
            setTimeout(function () {
                list.appear(function () {

                    setTimeout(function () {
                        list.addClass("mkd-appeared");
                    }, 100*list.index());

                }, {accX: 0, accY: mkdGlobalVars.vars.mkdElementAppearAmount});
            }, 30);
        };

        return {
            init: function () {
                if (list.length) {
                    list.each(function () {
                        listInit($(this));
                    });
                }
            }
        };
    };

})(jQuery);
(function($) {
    'use strict';

    var woocommerce = {};
    mkd.modules.woocommerce = woocommerce;

    woocommerce.mkdInitQuantityButtons = mkdInitQuantityButtons;
    woocommerce.mkdInitSelect2 = mkdInitSelect2;

    woocommerce.mkdOnDocumentReady = mkdOnDocumentReady;
    woocommerce.mkdOnWindowLoad = mkdOnWindowLoad;
    woocommerce.mkdOnWindowResize = mkdOnWindowResize;
    woocommerce.mkdOnWindowScroll = mkdOnWindowScroll;

    $(document).ready(mkdOnDocumentReady);
    $(window).load(mkdOnWindowLoad);
    $(window).resize(mkdOnWindowResize);
    $(window).scroll(mkdOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function mkdOnDocumentReady() {
        mkdInitQuantityButtons();
        mkdInitSelect2();
        mkdReInitSelect2CartAjax();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function mkdOnWindowLoad() {
        mkdInitButtonLoading();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function mkdOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function mkdOnWindowScroll() {

    }
    
    /*
    ** Init quantity buttons to increase/decrease products for cart
    */
    function mkdInitQuantityButtons() {
    
        $(document).on( 'click', '.mkd-quantity-minus, .mkd-quantity-plus', function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.siblings('.mkd-quantity-input'),
                step = parseFloat(inputField.attr('step')),
                max = parseFloat(inputField.attr('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('mkd-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(1);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }

            inputField.trigger( 'change' );
        });
    }

    /*  
        Adding to cart text when button is clicked
    */
    function mkdInitButtonLoading() {
        $('.add_to_cart_button').click(function(){
            $(this).text(mkdGlobalVars.vars.mkdAddingToCart);
        });
    }

    /*
    ** Init select2 script for select html dropdowns
    */
    function mkdInitSelect2() {

        if ($('.woocommerce-ordering .orderby').length ||  $('#calc_shipping_country').length ) {

            $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: Infinity
            });

            $('#calc_shipping_country').select2();
        }
    }

    /*
     ** Re Init select2 script for select html dropdowns
     */
    function mkdReInitSelect2CartAjax() {

        $(document).ajaxComplete(function() {
            if ($('#calc_shipping_country').length) {

                $('#calc_shipping_country').select2();
            }
        });
    }

})(jQuery);
(function($) {
    'use strict';

    var portfolio = {};
    mkd.modules.portfolio = portfolio;

    portfolio.mkdOnDocumentReady = mkdOnDocumentReady;
    portfolio.mkdOnWindowLoad = mkdOnWindowLoad;
    portfolio.mkdOnWindowResize = mkdOnWindowResize;
    portfolio.mkdOnWindowScroll = mkdOnWindowScroll;

    $(document).ready(mkdOnDocumentReady);
    $(window).load(mkdOnWindowLoad);
    $(window).resize(mkdOnWindowResize);
    $(window).scroll(mkdOnWindowScroll);
    
    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdOnDocumentReady() {
        mkdInitPortfolioMasonry();
        mkdInitPortfolioFilter();
        mkdInitPortfolioSlider();
	    initPortfolioSingleMasonry();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function mkdOnWindowLoad() {
        mkdInitPortfolioListAnimation();
	    mkdInitPortfolioPagination().init();
        mkdPortfolioSingleFollow().init();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function mkdOnWindowResize() {
        mkdInitPortfolioMasonry();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function mkdOnWindowScroll() {
	    mkdInitPortfolioPagination().scroll();
    }

    /**
     * Initializes portfolio list article animation
     */
    function mkdInitPortfolioListAnimation(){
        var portList = $('.mkd-portfolio-list-holder.mkd-pl-has-animation');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this).children('.mkd-pl-inner');

                thisPortList.children('article').each(function(l) {
                    var thisArticle = $(this);

                    thisArticle.appear(function() {
                        thisArticle.addClass('mkd-item-show');

                        setTimeout(function(){
                            thisArticle.addClass('mkd-item-shown');
                        }, 1000);
                    },{accX: 0, accY: 0});
                });
            });
        }
    }

    /**
     * Initializes portfolio list
     */
    function mkdInitPortfolioMasonry(){
        var portList = $('.mkd-portfolio-list-holder.mkd-pl-masonry');

        if(portList.length){
            portList.each(function(){
                var thisPortList = $(this).children('.mkd-pl-inner');

                thisPortList.waitForImages(function() {
                    thisPortList.isotope({
                        layoutMode: 'packery',
                        itemSelector: 'article',
                        percentPosition: true,
                        packery: {
                            gutter: '.mkd-pl-grid-gutter',
                            columnWidth: '.mkd-pl-grid-sizer'
                        }
                    });

                    thisPortList.css('opacity', '1');
                });
            });
        }
    }

    /**
     * Initializes portfolio masonry filter
     */
    function mkdInitPortfolioFilter(){

        var filterHolder = $('.mkd-portfolio-list-holder .mkd-pl-filter-holder');

        if(filterHolder.length){
            filterHolder.each(function(){
                var thisFilterHolder = $(this),
                    thisPortListHolder = thisFilterHolder.closest('.mkd-portfolio-list-holder'),
                    thisPortListInner = thisPortListHolder.find('.mkd-pl-inner'),
                    portListHasLoadMore = thisPortListHolder.hasClass('mkd-pl-has-load-more') ? true : false;

                thisFilterHolder.find('.mkd-pl-filter:first').addClass('mkd-pl-current');
	            
	            if(thisPortListHolder.hasClass('mkd-pl-gallery')) {
                    thisPortListHolder.waitForImages(function() {
                        thisPortListInner.isotope();
                    });
	            }

                thisFilterHolder.find('.mkd-pl-filter').click(function(){
                    var thisFilter = $(this),
                        filterValue = thisFilter.attr('data-filter'),
                        filterClassName = filterValue.length ? filterValue.substring(1) : '',
                        portListHasArtciles = thisPortListInner.children().hasClass(filterClassName) ? true : false;

                    thisFilter.parent().children('.mkd-pl-filter').removeClass('mkd-pl-current');
                    thisFilter.addClass('mkd-pl-current');

                    if(portListHasLoadMore && !portListHasArtciles) {
                        mkdInitLoadMoreItemsPortfolioFilter(thisPortListHolder, filterValue, filterClassName);
                    } else {
                        thisFilterHolder.parent().children('.mkd-pl-inner').isotope({ filter: filterValue });
                    }
                });
            });
        }
    }

    /**
     * Initializes load more items if portfolio masonry filter item is empty
     */
    function mkdInitLoadMoreItemsPortfolioFilter($portfolioList, $filterValue, $filterClassName) {

        var thisPortList = $portfolioList,
            thisPortListInner = thisPortList.find('.mkd-pl-inner'),
            filterValue = $filterValue,
            filterClassName = $filterClassName,
            maxNumPages = 0;

        if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
            maxNumPages = thisPortList.data('max-num-pages');
        }

        var	loadMoreDatta = mkd.modules.common.getLoadMoreData(thisPortList),
            nextPage = loadMoreDatta.nextPage,
	        ajaxData = mkd.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'mkd_core_portfolio_ajax_load_more'),
            loadingItem = thisPortList.find('.mkd-pl-loading');

        if(nextPage <= maxNumPages) {
            loadingItem.addClass('mkd-showing mkd-filter-trigger');
            thisPortListInner.css('opacity', '0');

            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: MikadoAjaxUrl,
                success: function (data) {
                    nextPage++;
                    thisPortList.data('next-page', nextPage);
                    var response = $.parseJSON(data),
                        responseHtml = response.html;

                    thisPortList.waitForImages(function () {
                        thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        var portListHasArtciles = thisPortListInner.children().hasClass(filterClassName) ? true : false;

                        if(portListHasArtciles) {
                            setTimeout(function() {
                                thisPortListInner.isotope('layout').isotope({filter: filterValue});
                                loadingItem.removeClass('mkd-showing mkd-filter-trigger');

                                setTimeout(function() {
                                    thisPortListInner.css('opacity', '1');
                                }, 150);
                            }, 400);
                        } else {
                            loadingItem.removeClass('mkd-showing mkd-filter-trigger');
                            mkdInitLoadMoreItemsPortfolioFilter(thisPortList, filterValue, filterClassName);
                        }
                    });
                }
            });
        }
    }
	
	/**
	 * Initializes portfolio pagination functions
	 */
	function mkdInitPortfolioPagination(){
		var portList = $('.mkd-portfolio-list-holder');
		
		var initStandardPagination = function(thisPortList) {
			var standardLink = thisPortList.find('.mkd-pl-standard-pagination li');
			
			if(standardLink.length) {
				standardLink.each(function(){
					var thisLink = $(this).children('a'),
						pagedLink = 1;
					
					thisLink.on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						
						if (typeof thisLink.data('paged') !== 'undefined' && thisLink.data('paged') !== false) {
							pagedLink = thisLink.data('paged');
						}
						
						initMainPagFunctionality(thisPortList, pagedLink);
					});
				});
			}
		};
		
		var initLoadMorePagination = function(thisPortList) {
			var loadMoreButton = thisPortList.find('.mkd-pl-load-more a');
			
			loadMoreButton.on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				
				initMainPagFunctionality(thisPortList);
			});
		};
		
		var initInifiteScrollPagination = function(thisPortList) {
			var portListHeight = thisPortList.outerHeight(),
				portListTopOffest = thisPortList.offset().top,
				portListPosition = portListHeight + portListTopOffest - mkdGlobalVars.vars.mkdAddForAdminBar;
			
			if(!thisPortList.hasClass('mkd-pl-infinite-scroll-started') && mkd.scroll + mkd.windowHeight > portListPosition) {
				initMainPagFunctionality(thisPortList);
			}
		};
		
		var initMainPagFunctionality = function(thisPortList, pagedLink) {
			var thisPortListInner = thisPortList.find('.mkd-pl-inner'),
				nextPage,
				maxNumPages;
			
			if (typeof thisPortList.data('max-num-pages') !== 'undefined' && thisPortList.data('max-num-pages') !== false) {
				maxNumPages = thisPortList.data('max-num-pages');
			}
			
			if(thisPortList.hasClass('mkd-pl-pag-standard')) {
				thisPortList.data('next-page', pagedLink);
			}
			
			if(thisPortList.hasClass('mkd-pl-pag-infinite-scroll')) {
				thisPortList.addClass('mkd-pl-infinite-scroll-started');
			}
			
			var loadMoreDatta = mkd.modules.common.getLoadMoreData(thisPortList),
				loadingItem = thisPortList.find('.mkd-pl-loading');
			
			nextPage = loadMoreDatta.nextPage;
			
			thisPortList.find('.mkd-pl-load-more-holder').hide();

			if(nextPage <= maxNumPages){
				if(thisPortList.hasClass('mkd-pl-pag-standard')) {
					loadingItem.addClass('mkd-showing mkd-standard-pag-trigger');
					thisPortList.addClass('mkd-pl-pag-standard-animate');
				} else {
					loadingItem.addClass('mkd-showing');
				}
				
				var ajaxData = mkd.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'mkd_core_portfolio_ajax_load_more');
				
				$.ajax({
					type: 'POST',
					data: ajaxData,
					url: MikadoAjaxUrl,
					success: function (data) {
						if(!thisPortList.hasClass('mkd-pl-pag-standard')) {
							nextPage++;
						}
						
						thisPortList.data('next-page', nextPage);
						
						var response = $.parseJSON(data),
							responseHtml =  response.html;
						
						if(thisPortList.hasClass('mkd-pl-pag-standard')) {
							mkdInitStandardPaginationLinkChanges(thisPortList, maxNumPages, nextPage);

							thisPortList.waitForImages(function(){
								if(thisPortList.hasClass('mkd-pl-masonry')){
									mkdInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else if (thisPortList.hasClass('mkd-pl-gallery') && thisPortList.hasClass('mkd-pl-has-filter')) {
									mkdInitHtmlIsotopeNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								} else {
									mkdInitHtmlGalleryNewContent(thisPortList, thisPortListInner, loadingItem, responseHtml);
								}
							});
						} else {
							thisPortList.waitForImages(function(){
								if(thisPortList.hasClass('mkd-pl-masonry')){
									mkdInitAppendIsotopeNewContent(thisPortListInner, loadingItem, responseHtml);
								} else if (thisPortList.hasClass('mkd-pl-gallery') && thisPortList.hasClass('mkd-pl-has-filter')) {
									mkdInitAppendIsotopeNewContent(thisPortListInner, loadingItem, responseHtml);
								} else {
									mkdInitAppendGalleryNewContent(thisPortListInner, loadingItem, responseHtml);
								}
							});
						}

						if(nextPage !== maxNumPages+1){
							thisPortList.find('.mkd-pl-load-more-holder').show();
						}
						
						if(thisPortList.hasClass('mkd-pl-infinite-scroll-started')) {
							thisPortList.removeClass('mkd-pl-infinite-scroll-started');
						}
					}
				});
			}
		
		};
		
		var mkdInitStandardPaginationLinkChanges = function(thisPortList, maxNumPages, nextPage) {
			var standardPagHolder = thisPortList.find('.mkd-pl-standard-pagination'),
				standardPagNumericItem = standardPagHolder.find('li.mkd-pl-pag-number'),
				standardPagPrevItem = standardPagHolder.find('li.mkd-pl-pag-prev a'),
				standardPagNextItem = standardPagHolder.find('li.mkd-pl-pag-next a');
			
			standardPagNumericItem.removeClass('mkd-pl-pag-active');
			standardPagNumericItem.eq(nextPage-1).addClass('mkd-pl-pag-active');
			
			standardPagPrevItem.data('paged', nextPage-1);
			standardPagNextItem.data('paged', nextPage+1);
			
			if(nextPage > 1) {
				standardPagPrevItem.css({'opacity': '1'});
			} else {
				standardPagPrevItem.css({'opacity': '0'});
			}
			
			if(nextPage === maxNumPages) {
				standardPagNextItem.css({'opacity': '0'});
			} else {
				standardPagNextItem.css({'opacity': '1'});
			}
		};
		
		var mkdInitHtmlIsotopeNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
			thisPortListInner.html(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('mkd-showing mkd-standard-pag-trigger');
			thisPortList.removeClass('mkd-pl-pag-standard-animate');

            thisPortListInner.waitForImages(function () {
                setTimeout(function () {
                    thisPortListInner.isotope('layout');
                    mkdInitPortfolioListAnimation();
                }, 400);
            });
        };
		
		var mkdInitHtmlGalleryNewContent = function(thisPortList, thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('mkd-showing mkd-standard-pag-trigger');
			thisPortList.removeClass('mkd-pl-pag-standard-animate');
			thisPortListInner.html(responseHtml);
			mkdInitPortfolioListAnimation();
		};


		var mkdInitAppendIsotopeNewContent = function(thisPortListInner, loadingItem, responseHtml) {
			thisPortListInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
			loadingItem.removeClass('mkd-showing');

                thisPortListInner.waitForImages(function () {
                    setTimeout(function() {
                        thisPortListInner.isotope('layout');
                        mkdInitPortfolioListAnimation();
                    }, 400);
                });

		};
		
		var mkdInitAppendGalleryNewContent = function(thisPortListInner, loadingItem, responseHtml) {
			loadingItem.removeClass('mkd-showing');
			thisPortListInner.append(responseHtml);
			mkdInitPortfolioListAnimation();
		};
		
		return {
			init: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);
						
						if(thisPortList.hasClass('mkd-pl-pag-standard')) {
							initStandardPagination(thisPortList);
						}
						
						if(thisPortList.hasClass('mkd-pl-pag-load-more')) {
							initLoadMorePagination(thisPortList);
						}
						
						if(thisPortList.hasClass('mkd-pl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisPortList);
						}
					});
				}
			},
			scroll: function() {
				if(portList.length) {
					portList.each(function() {
						var thisPortList = $(this);
						
						if(thisPortList.hasClass('mkd-pl-pag-infinite-scroll')) {
							initInifiteScrollPagination(thisPortList);
						}
					});
				}
			}
		};
	}

    /**
     * Initializes portfolio slider
     */
    function mkdInitPortfolioSlider(){
        var portSlider = $('.mkd-portfolio-slider-holder');
	
	    if(portSlider.length) {
		    portSlider.each(function () {
			    var thisPortSlider = $(this),
				    portHolder = thisPortSlider.children('.mkd-portfolio-list-holder'),
				    portSlider = portHolder.children('.mkd-pl-inner'),
				    numberOfItems = 4,
				    margin = 0,
				    marginLabel,
				    sliderSpeed = 5000,
				    loop = true,
				    autoWidth = false,
				    padding = false,
				    navigation = false,
				    pagination = false,
				    holderPadding = 0;
			
			    if (typeof portHolder.data('number-of-columns') !== 'undefined' && portHolder.data('number-of-columns') !== false) {
				    numberOfItems = portHolder.data('number-of-columns');
			    }
			
			    if (typeof portHolder.data('space-between-items') !== 'undefined' && portHolder.data('space-between-items') !== false) {
				    marginLabel = portHolder.data('space-between-items');
				
				    if (marginLabel === 'normal') {
                        margin = 30;
                    } else if (marginLabel === 'small') {
					    margin = 20;
				    } else if (marginLabel === 'tiny') {
                        margin = 10;
                    } else {
					    margin = 0;
				    }
			    }
			
			    if (typeof portHolder.data('slider-speed') !== 'undefined' && portHolder.data('slider-speed') !== false) {
				    sliderSpeed = portHolder.data('slider-speed');
			    }
			    if (typeof portHolder.data('loop') !== 'undefined' && portHolder.data('loop') !== false && portHolder.data('loop') === 'no') {
				    loop = false;
			    }
			    if (typeof portHolder.data('enable-variable-width') !== 'undefined' && portHolder.data('enable-variable-width') !== false && portHolder.data('enable-variable-width') === 'yes') {
				    autoWidth = true;
			    }
			    if (typeof portHolder.data('padding') !== 'undefined' && portHolder.data('padding') !== false && portHolder.data('padding') === 'yes') {
				    padding = true;
			    }
			
			    if (padding) {
				    holderPadding = thisPortSlider.outerWidth() * 0.1315789473684211;
			    }
			
			    var responsiveNumberOfItems1 = 1,
				    responsiveNumberOfItems2 = 2,
				    responsiveNumberOfItems3 = 3;
			
			    if (numberOfItems < 3) {
				    responsiveNumberOfItems1 = numberOfItems;
				    responsiveNumberOfItems2 = numberOfItems;
				    responsiveNumberOfItems3 = numberOfItems;
			    }
			
			    portSlider.owlCarousel({
				    items: numberOfItems,
				    margin: margin,
				    loop: loop,
				    autoWidth: autoWidth,
				    autoplay: true,
				    autoplayTimeout: sliderSpeed,
				    autoplayHoverPause: true,
				    smartSpeed: 800,
				    stagePadding: holderPadding,
				    nav: navigation,
				    navText: [
					    '<span class="mkd-prev-icon"><span class="icon-arrows-left"></span></span>',
					    '<span class="mkd-next-icon"><span class="icon-arrows-right"></span></span>'
				    ],
				    dots: pagination,
				    responsive: {
					    0: {
						    items: responsiveNumberOfItems1,
						    autoWidth: false,
						    stagePadding: 0
					    },
					    600: {
						    items: responsiveNumberOfItems2
					    },
					    768: {
						    items: responsiveNumberOfItems3,
						    autoWidth: autoWidth,
						    stagePadding: holderPadding
					    },
					    1024: {
						    items: numberOfItems
					    }
				    }
			    });
			
			    thisPortSlider.css('opacity', '1');
		    });
	    }
    }

    var mkdPortfolioSingleFollow = function() {

        var info = $('.mkd-follow-portfolio-info .mkd-portfolio-single-holder .mkd-ps-info-sticky-holder');

        if (info.length) {
            var infoHolderOffset = info.offset().top,
                infoHolderHeight = info.height(),
                mediaHolder = $('.mkd-ps-image-holder'),
                mediaHolderHeight = mediaHolder.height(),
                header = $('.header-appear, .mkd-fixed-wrapper'),
                headerHeight = (header.length) ? header.height() : 0;
        }

        var infoHolderPosition = function() {

            if(info.length) {

                if (mediaHolderHeight > infoHolderHeight) {
                    if(mkd.scroll > infoHolderOffset) {
                        var marginTop = mkd.scroll + headerHeight + mkdGlobalVars.vars.mkdAddForAdminBar - infoHolderOffset;
                        // if scroll is initially positioned below mediaHolderHeight
                        if(marginTop + infoHolderHeight > mediaHolderHeight){
                            marginTop = mediaHolderHeight - infoHolderHeight;
                        }
                        info.animate({
                            marginTop: marginTop
                        });
                    }
                }
            }
        };

        var recalculateInfoHolderPosition = function() {

            if (info.length) {
                if(mediaHolderHeight > infoHolderHeight) {
                    if(mkd.scroll > infoHolderOffset) {
                    	
                        if(mkd.scroll + headerHeight + infoHolderHeight <  mediaHolderHeight) {
                            //Calculate header height if header appears
                            if ($('.header-appear, .mkd-fixed-wrapper').length) {
                                headerHeight = $('.header-appear, .mkd-fixed-wrapper').height();
                            }
                            info.stop().animate({
                                marginTop: (mkd.scroll + headerHeight + mkdGlobalVars.vars.mkdAddForAdminBar - infoHolderOffset)
                            });
                            //Reset header height
                            headerHeight = 0;
                        } else{
                            info.stop().animate({
                            	marginTop: mediaHolderHeight - infoHolderHeight
                            });
                        }
                    } else {
                        info.stop().animate({
                            marginTop: 0
                        });
                    }
                }
            }
        };

        return {
            init : function() {
                infoHolderPosition();
                $(window).scroll(function(){
                    recalculateInfoHolderPosition();
                });
            }
        };
    };
	
	function initPortfolioSingleMasonry(){
		var masonryHolder = $('.mkd-portfolio-single-holder .mkd-ps-masonry-images'),
			masonry = masonryHolder.children();
		
		if(masonry.length){
			masonry.waitForImages(function() {
				masonry.isotope({
					layoutMode: 'packery',
					itemSelector: '.mkd-ps-image',
					percentPosition: true,
					packery: {
						gutter: '.mkd-ps-grid-gutter',
						columnWidth: '.mkd-ps-grid-sizer'
					}
				});
				
				masonry.css('opacity', '1');
			});
		}
	}

})(jQuery);