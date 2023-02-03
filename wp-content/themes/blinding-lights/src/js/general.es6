"use strict";

(function ($) {

    $(window).on("load", function (e) {
        $("body").addClass("loaded");
    });


    $(document).ready(function () {
        $(".mobile-toggle-wrapper").on("click", function () {
            $("body").toggleClass("mobile-menu-opened");
        })
    });


    let lastScrollTop = 0;

    $(window).on("load scroll", function (e) {
        const newScrollTop = Math.abs($(this).scrollTop());
        if (newScrollTop > 0) {
            $("header").addClass("sticky");
        } else {
            $("header").removeClass("sticky");
        }
        if (newScrollTop > lastScrollTop && newScrollTop > 200) {
            $("header").addClass("hidden");
        } else {
            $("header").removeClass("hidden");
        }
        lastScrollTop = newScrollTop;
    });

})(jQuery);