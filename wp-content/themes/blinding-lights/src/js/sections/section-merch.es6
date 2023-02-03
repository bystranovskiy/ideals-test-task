import "../../scss/sections/section-merch.scss";

"use strict";

(function ($) {

    $(document).ready(function () {

        const $merchSlider = $(".merch-slider");

        $merchSlider.slick({
            arrows: true,
            dots: true,
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
        });

        $(".menu-item a[rel]").on("click", function () {
            const rel = $(this).attr("rel");
            $merchSlider.slick("slickGoTo", rel);
        })

    })

})(jQuery);