"use strict";
$(window).bind("resize", function () {
        if ($(this).width() < 1024) {
            $('.page-body-wrapper').removeClass('sidebar-icon');
        } else {
            $('.page-body-wrapper').addClass('sidebar-icon')
        }
    }).trigger('resize');