/*global $, document, window, lightbox, event*/


        $(document).ready(function () {






            'use strict';


            $(window).on('load', function () {

                $('.menu-nav .nav-link').on('click', function () {
                    var menuTab = $(this).attr('id').replace('-tab', '');
                    if ($(this).hasClass('active')) {
                        menuTab.toggleClass('show active');
                    }

                });


            });






            /* ===============================================================


                 ASSIGNING VARIABLES


              =============================================================== */


            var bgHeroText               =  $('.bg-hero-text'),


                menuItem                 =  $('.menu-item'),


                bgHeadingText            =  $('.bg-heading-text'),


                featuredDishesSlider     =  $('.featured-dishes-slider'),


                chefsSlider              =  $('.chefs-slider'),


                signatureDishesSlider    =  $('.signature-dishes-slider'),


                searchToggler            =  $('#toggleSearch'),


                searchForm               =  $('.search-form'),


                searchInput              =  $('input[type="search"]'),


                enableLiveSearch         =  false,


                dropdownToggler          =  $('.dropdown-toggle'),


                navbar                   =  $('.navbar'),


                body                     =  $('body'),


                preloader                =  $('.preloader'),


                scrollTopBtn             =  $('#scrollTop'),


                pageContent              =  $('.page-content'),


                dateInput                =  $('#date'),


                timeInput                =  $('[name="time"]'),


                pageTransitionHolder     =  $('.m-pagetransition'),


                telInput                 =  $("input[type='tel']"),


                brokenLink               =  $('a[href="#"]'),


                countryInput             =  $('#country'),


                bsSelectLiveSearchInput  =  $(".bs-searchbox input"),


                form                     =  $('form'),


                navbarToggler            =  $('.navbar-toggler'),


                pageFooterHeight         =  $('footer.page-footer').outerHeight(),


                pageNavbarHeight         =  $('header.header').outerHeight(),


                datePickerHolder         =  dateInput.parent('.form-group'),


                pageComponentsHeight     =  pageFooterHeight + pageNavbarHeight;


















            /* ===============================================================


                 ADD TEXT BACKGROUND FOR THEME COMPONENTS


              =============================================================== */


            $(window).on('load', function () {


                bgHeroText.each(function () {


                    var bgHeroTextContent = $(this).attr('data-text');


                    $(this).prepend('<span class="bg-hero-text-content">' + bgHeroTextContent + '</span>');


                });






                menuItem.each(function () {


                    var ribbonText = $(this).attr('data-ribbon');


                    if ($(this).attr('data-ribbon')) {


                        $(this).addClass('ribboned');


                        $(this).prepend('<span class="ribbon">' + ribbonText + '</span>');


                    } else {


                        $(this).removeClass('ribboned');


                        $(this).removeAttr('data-ribbon');


                    }


                });






                bgHeadingText.each(function () {


                    var bgHeadingContent = $(this).attr('data-text');


                    $(this).prepend('<span class="bg-heading-text-content">' + bgHeadingContent + '</span>');


                });


            });










            /* ===============================================================


                 FEATURED DISHES SLIDER


              =============================================================== */


            featuredDishesSlider.owlCarousel({


                items: 1,


                margin: 20,


                center: true,


                loop: true,


                responsive: {


                    768: {


                        items: 2


                    },


                    991: {


                        items: 3


                    }


                }


            });










            /* ===============================================================


                 CHEFS SLIDER


              =============================================================== */


            chefsSlider.owlCarousel({


                items: 1,


                margin: 20,


                responsive: {


                    551: {


                        items: 2


                    },


                    991: {


                        items: 4


                    }


                }


            });






            /* ===============================================================


                 SIGNATURE DISHES SLIDER


              =============================================================== */


            signatureDishesSlider.owlCarousel({


                items: 1,


                margin: 20,


                responsive: {


                    991: {


                        items: 2


                    },


                    1200: {


                        items: 3


                    }


                }


            });










            /* ===============================================================


                 LIGHTBOX INITIALIZATION


              =============================================================== */


            lightbox.option({


                "disableScrolling": true


            });










            /* ===============================================================


                 SEARCH POPUP OPENING & CLOSING


              =============================================================== */


            searchToggler.on('click', function (e) {


                e.preventDefault();


                searchForm.toggleClass('active');


                searchForm.find(searchInput).focus();


                $(this).find('i.d-none').removeClass('d-none').siblings('i').addClass('d-none');


            });






            dropdownToggler.on('click', function () {


                searchForm.removeClass('active');


            });






            $(document).on('click', function (e) {


                if (!$(e.target).closest(navbar).length) {


                    if (searchForm.hasClass('active')) {


                        body.find(searchForm).removeClass("active");


                        $(this).find('i.d-none').removeClass('d-none').siblings('i').addClass('d-none');


                    }


                }


            });










            /* ===============================================================


                 PRELOADER


              =============================================================== */


            $(window).on('load', function () {


                preloader.fadeOut(300, function () {


                    $(this).remove();


                });


            });










            /* ===============================================================


                 SCROLL TOP BUTTON


              =============================================================== */


            scrollTopBtn.on('click', function () {


                $('html, body').animate({ scrollTop: 0}, 1000);


            });






            $(window).on('scroll', function () {


                if ($(window).scrollTop() >= 2000) {


                    scrollTopBtn.addClass('active');


                } else {


                    scrollTopBtn.removeClass('active');


                }


            });










            /* ===============================================================


                 PLACE FOOTER TO PAGE BOTTOM


              =============================================================== */


            $(window).on('load resize', function () {


                pageContent.css('min-height', 'calc(100vh - ' + pageComponentsHeight + 'px)');


            });










            /* ===============================================================


                 DATEPICKER INITIALIZATION


              =============================================================== */


            dateInput.datepicker({


                todayHighlight: true,


                autoclose: true,


                format: 'dd/mm/yyyy',


                container: datePickerHolder


            });










            /* ===============================================================


                 TIMEPICKER INITIALIZATION


              =============================================================== */


            timeInput.timeselector({


                min: '08:30',


                max: '22:00',


                hours12: false


            });






            // $(window).on('load resize', function () {
            //
            //
            //     var obtainInputWidth = timeInput.outerWidth(),
            //
            //
            //         timeSelectorPopup = $('.timeselector');
            //
            //
            //     timeSelectorPopup.css('width', obtainInputWidth + 'px');
            //
            //
            // });










            /* ===============================================================


                 PAGE TRANSITION EFFECT


              =============================================================== */


            pageTransitionHolder.mPageTransition({


                fadeOutTime: 600,


                fadeInTime: 600


            });










            /* ===============================================================


                 PROHIBIT NUMBER INPUT FROM ACCEPTING LETTERS


              =============================================================== */


            function isNumberKey(evt) {


                var charCode = (evt.which) ? evt.which : event.keyCode;


                if ((charCode < 48 || charCode > 57))


                return false;


                return true;


            }






            telInput.on('keypress', function () {


                return isNumberKey(event);


            });





            $('input[id*="Number"]').on('keypress', function () {


                return isNumberKey(event);


            });










            /* ===============================================================


                 DISABLING BROKEN LINKS


              =============================================================== */


            brokenLink.not('[target="_blank"]').on('click', function (event) {


                event.preventDefault();


            });














            /* ===============================================================


                 PARALLAX EFFECT ON MENU PAGE SCROLLING


              =============================================================== */


            $(window).on('scroll', function () {






                var parallaxDivider = $('.parallax-divider'),


                    scroll  =  $(this).scrollTop();










                if ($(window).width() > 1250) {


                    parallaxDivider.css({


                        'background-position': 'left -' + scroll / 5 + 'px'


                    });


                } else {


                    parallaxDivider.css({


                        'background-position': 'center center'


                    });


                }


            });










            /* ===============================================================


                 HUMBERGUR MENU ACTIVATE


              =============================================================== */


            navbarToggler.on('click', function () {


                $(this).toggleClass('active');


            });










            /* ===============================================================


                 BOOTSTRAP-SELECT ENABLE & DISABLE LIVE SEARCH


              =============================================================== */


            if ($(window).width() >= 600) {


                enableLiveSearch = true;


            }


            countryInput.selectpicker({


                liveSearch: enableLiveSearch


            });

            // $('#smokingArea').selectpicker({
            //     title: 'Select smoking area'
            // });










            $(window).on('load resize', function () {


                if ($(window).outerWidth() > 768) {


                    $('input[id*="Number"]').attr('type', 'text');


                } else {


                    $('input[id*="Number"]').attr('type', 'number');


                }


            });










            /* ===============================================================


                 BOOTSTRAP-SELECT CHANGE SEARCH PLACEHOLDER


              =============================================================== */


            form.find(bsSelectLiveSearchInput).each(function () {


                if (!$(this).val()) {


                    $(this).attr("placeholder", "Search");


                }


            });

            $('.selectpicker').on('change', function () {
                $(this).closest('.dropdown').find('.filter-option-inner-inner').addClass('selected');
            });


        });










        /* ===============================================================


             COUNTRY SELECT BOX FILLING


          =============================================================== */


        $.getJSON('https://gist.githubusercontent.com/mhmdhasan/f956110858954269769836e95b9f179d/raw/7f1263633a3349df5f87e80c12fa6ef68610c029/countries.json', function (data) {


            $.each(data, function (key, value) {


                var selectOption = "<option value='" + value.name + "' data-dial-code='" + value.dial_code + "'>" + value.name + "</option>";


                $("select#country").append(selectOption);


            });


        })










        // First we get the viewport height and we multiple it by 1% to get a value for a vh unit


        var vh = window.innerHeight * 0.01;


        // Then we set the value in the --vh custom property to the root of the document


        document.documentElement.style.setProperty('--vh', '${vh}px');
