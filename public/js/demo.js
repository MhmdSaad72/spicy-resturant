/* ===============================================================
     FOR DEMO PURPOSE - CAN BE DELETED
  =============================================================== */
var stylesheet = $('link#theme-stylesheet');

$("<link id='new-stylesheet' rel='stylesheet'>").insertAfter(stylesheet);
var alternateColour = $('link#new-stylesheet');

$("<link id='font-stylesheet' rel='stylesheet'>").insertAfter(alternateColour);
var alternateFont = $('link#font-stylesheet');

$("<link id='rounded-stylesheet' rel='stylesheet'>").insertAfter(alternateFont);
var alternateRounded = $('link#rounded-stylesheet');


var iconSrc = new Array();
$('body img[src*="svg"]').each(function (attr) {
    iconSrc.push($(this).attr('src').replace(/default.svg/g, '').replace(/green.svg/g, '').replace(/blue.svg/g, '').replace(/violet.svg/g, '').replace(/sea.svg/g, '').replace(/red.svg/g, '').replace(/pink.svg/g, ''));
});


var fontInputCheck = null;
var roundedInputCheck = null;

/* ===============================================================
     ASSIGNING COOKIES
  =============================================================== */
if ($.cookie("theme_csspath")) {
    alternateColour.attr("href", $.cookie("theme_csspath"));
}
if ($.cookie("theme_fontpath")) {
    alternateFont.attr("href", $.cookie("theme_fontpath"));
}
if ($.cookie("theme_roundedpath")) {
    alternateRounded.attr("href", $.cookie("theme_roundedpath"));
}



if ($.cookie("theme_fontcheck")) {
    $("#demoFont").attr("checked", $.cookie("fontInputCheck"));
}
if ($.cookie("theme_roundedcheck")) {
    $("#demoRounded").attr("checked", $.cookie("roundedInputCheck"));
}



/* ===============================================================
     CHANGE THEME COLOR
  =============================================================== */
$("[name='themecolor']").change(function () {

    if ($(this).val() !== '') {

        var theme_csspath = $(this).attr('data-theme-path');
        alternateColour.attr("href", theme_csspath);
        $.cookie("theme_csspath", theme_csspath, {
            expires: 365,
            path: document.URL.substr(0, document.URL.lastIndexOf('/'))
        });

        var theme_imgpath = iconSrc[i] + $(this).attr('data-theme-color') + '.svg';


        for (var i = 0; i < 15; i++) {
            $('body img[src*=".svg"]').eq(i).attr('src', iconSrc[i] + $(this).attr('data-theme-color') + '.svg');
        }

    }

    return false;
});


/* ===============================================================
     CHANGE THEME FONT
  =============================================================== */
$("#demoFont").on('change', function () {
    if ($(this).is(':checked')) {

        var theme_fontpath = 'css/style.alt.font.css';
        alternateFont.attr('href', theme_fontpath);

        var fontInputCheck = 'checked';

    } else {
        var theme_fontpath = '';
        alternateFont.attr('href', theme_fontpath);

        var fontInputCheck = null;
    }

    $.cookie("theme_fontpath", theme_fontpath, {
        expires: 365,
        path: document.URL.substr(0, document.URL.lastIndexOf('/'))
    });

    $("#demoFont").attr('checked', fontInputCheck);
    $.cookie("theme_fontcheck", fontInputCheck, {
        expires: 365,
        path: document.URL.substr(0, document.URL.lastIndexOf('/'))
    });
});



/* ===============================================================
     CHANGE ROUNDED CORNERS
  =============================================================== */
$("#demoRounded").on('change', function () {
    if ($(this).is(':checked')) {

        var theme_roundedpath = 'css/style.rounded.css';
        alternateRounded.attr('href', theme_roundedpath);

         var roundedInputCheck = 'checked';

    } else {
        var theme_roundedpath = '';
        alternateRounded.attr('href', theme_roundedpath);

         var roundedInputCheck = null;
    }

    $.cookie("theme_roundedpath", theme_roundedpath, {
        expires: 365,
        path: document.URL.substr(0, document.URL.lastIndexOf('/'))
    });

    $("#demoRounded").attr('checked', roundedInputCheck);
    $.cookie("theme_roundedcheck", roundedInputCheck, {
        expires: 365,
        path: document.URL.substr(0, document.URL.lastIndexOf('/'))
    });
});


$(window).on('load', function () {
    if ($.cookie("theme_roundedcheck") == null) {
        $('#demoRounded').removeAttr('checked');
    } else if ($.cookie("theme_roundedcheck") == 'checked') {
        $('#demoRounded').attr('checked', 'checked');
    }

    if ($.cookie("theme_fontcheck") == null) {
        $('#demoFont').removeAttr('checked');
    } else if ($.cookie("theme_fontcheck") == 'checked') {
        $('#demoFont').attr('checked', 'checked');
    }
});










/* ===============================================================
     CHANGE BETWEEN DARK & LIGHT THEME
  =============================================================== */
$("#demoTheme").on('change', function () {
    if ($(this).is(':checked')) {
        window.location.replace('https://italianolight.netlify.com');
    }
});



/* ===============================================================
     SWITCHER OPENING & CLOSING
  =============================================================== */
$(window).on('load', function () {
    $('<div class="switcher-overlay"></div>').appendTo('body');
});

$(function () {
    $('#style-switch-button').on('click', function (e) {
        e.preventDefault();

        $('#style-switch').toggleClass('active');
        $('.switcher-overlay').fadeToggle();
    });
});

$(document).on('click', function (e) {
    if (!$(e.target).closest('#style-switch').length) {
        if ($('#style-switch').hasClass('active')) {
            $('#style-switch').removeClass("active");
            $('.switcher-overlay').fadeOut();
        }
    }
});


var currentThemeColor = alternateColour.attr('href').slice(0, -4);
var currentThemeColorSrc = currentThemeColor.replace('css/style.', '');

$(window).on('load', function () {

    for (var i = 0; i < 15; i++) {
        $('body img[src*=".svg"]').eq(i).attr('src', iconSrc[i] + currentThemeColorSrc + '.svg');
    }

});
