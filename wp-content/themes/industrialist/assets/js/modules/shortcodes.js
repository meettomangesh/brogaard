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