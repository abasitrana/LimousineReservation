$(document).ready(function () {
    // Mobile Menu
    $(".hamburger").click(function () {
        $(this).toggleClass("active");
        $(".mobile-navigation").toggleClass("active");
        $("body").toggleClass("over-hidden");
    });

    /* Tabbing Function */
    $("[data-targetit]").on("click", function (e) {
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
        var target = $(this).data("targetit");
        $("." + target)
            .siblings('[class^="box-"]')
            .hide();
        $("." + target).fadeIn();
        $(".process-slider").slick("setPosition", 0);
    });

    // Accordian
    $(".accordian h5").click(function () {
        $(".accordian li").removeClass("active");
        $(this).parent("li").addClass("active");
        $(".accordian li div").slideUp();
        $(this).parent("li").find("div").slideDown();
    });

    // Popup
    $(".popup-default-click").on("click", function () {
        $("#default-popup").addClass("active");
    });

    // Popup Default
    $(".popup-default-click").click(function () {
        $("body").addClass("over-hidden");
        $(".overlay").fadeIn();
        $(".popup-default").fadeIn();
    });
    $(".popup-close").click(function () {
        closePopup();
    });

    $("#datepicker1").datepicker();
    $("#timepicker1").timepicker({});

    // $('.center-mode-slider').slick({
    // 	centerMode: true,
    // 	centerPadding: '60px',
    // 	slidesToShow: 3,
    // 	arrows: false,
    // 	dots: true,
    // 	responsive: [
    // 	  {
    // 		breakpoint: 768,
    // 		settings: {
    // 		  arrows: false,
    // 		  centerMode: true,
    // 		  centerPadding: '40px',
    // 		  slidesToShow: 3
    // 		}
    // 	  },
    // 	  {
    // 		breakpoint: 480,
    // 		settings: {
    // 		  arrows: false,
    // 		  centerMode: true,
    // 		  centerPadding: '40px',
    // 		  slidesToShow: 1
    // 		}
    // 	  }
    // 	]
    //   });

    $(".testimonial-slider").slick({
        dots: false,
        arrows: false,
        autoplay: true,
        infinite: true,
        autoplaySpeed: 4000,
        cssEase: "linear",
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 1440,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                },
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3,
                    infinite: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });
});

// Window Scroll
$(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if ($(window).scrollTop() >= 50) {
        $("header").addClass("sticky-header");
    } else {
        $("header").removeClass("sticky-header");
    }
});

if ($(window).width() < 825) {
    $(".responsive-slider").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
    });
}

$(window).on("load", function () {
    var currentUrl = window.location.href.split("/").reverse()[1];
    $(".menuu li a").each(function () {
        var hrefVal = $(this).attr("href");
        if (hrefVal == currentUrl) {
            $(this).removeClass("active");
            $(this).closest("li").addClass("active");
            $(".menuu li:first-child").removeClass("active");
        }
    });
});

function closePopup() {
    $(".popup-overlay").removeClass("active");
    $("body").removeClass("over-hidden");
}

// Date time pikcer js
jQuery("#datePicker").datetimepicker({
    timepicker: false,
    format: "Y-m-d",
    // formatDate:'Y/m/d',
    theme: "dark",
    defaultValue: new Date(),
});

// Time picker js
jQuery("#timePicker").datetimepicker({
    datepicker: false,
    format: "h:i:a",
    formatTime: "h:i:a",
    theme: "dark",
    // allowTimes:[
    //   '01:00', '1:30',
    //   '02:00', '02:30',
    //   '03:00', '03:30',
    //   '04:00', '04:30',
    //   '05:00', '05:30',
    //   '06:00', '06:30',
    //   '07:00', '07:30',
    //   '08:00', '08:30',
    //   '09:00', '09:30',
    //   '10:00', '10:30',
    //   '11:00', '11:30',
    //   '12:00', '12:30',
    //  ]
});
