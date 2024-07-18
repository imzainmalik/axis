$(document).ready(function() {
    switchDiv();

    $("li:first-child").addClass("first");
    $("li:last-child").addClass("last");

    $('[href="#"]').attr("href", "javascript:;");

    $(".menu-Bar").click(function() {
        $(this).toggleClass("open");
        $(".menuWrap").toggleClass("open");
        $("body").toggleClass("ovr-hiddn");
        $(".hdr-logo-area").css("display", "block").insertBefore(".m1");
    });

    $(".loginUp").click(function() {
        $(".LoginPopup").fadeIn();
        $(".overlay").fadeIn();
    });


    $(".dropdown>a").click(function() {
        var $dropdownList = $(this).siblings(".dropdown-list");
        // Close all dropdown-lists except the one that belongs to the clicked dropdown
        $(".dropdown-list").not($dropdownList).slideUp();
        // Toggle the dropdown-list that is a sibling of the clicked anchor tag
        $dropdownList.slideToggle();
    });

    $(".signUp").click(function() {
        $(".signUpPop").fadeIn();
        $(".overlay").fadeIn();
    });

    $(".closePop,.overlay").click(function() {
        $(".popupMain").fadeOut();
        $(".overlay").fadeOut();
    });

    $(".menu .menu-item-has-children").addClass("dropdown-nav ");
    $(".menu .menu-item-has-children ul.sub-menu").addClass("dropdown");

    /* Tabbing Function */
    $("[data-targetit]").on("click", function(e) {
        $(this).addClass("active");
        $(this)
            .siblings()
            .removeClass("active");
        var target = $(this).data("targetit");
        $("." + target)
            .siblings('[class^="box-"]')
            .hide();
        $("." + target).fadeIn();
        $(".tabViewList").slick("setPosition", 0);
    });

    // Accordian
    $(".accordian h4").click(function() {
        $(".accordian li").removeClass("active");
        $(this)
            .parent("li")
            .addClass("active");
        $(".accordian li div").slideUp();
        $(this)
            .parent("li")
            .find("div")
            .slideDown();
    });

    $("li.dropdown-nav").hover(function() {
        $(this)
            .children("ul")
            .stop(true, false, true)
            .slideToggle(300);
    });

    $(".searchBtn").click(function() {
        $(".searchWrap").addClass("active");
        $(".overlay").fadeIn("active");
        $(".searchWrap input").focus();
        $(".searchWrap input").focusout(function(e) {
            $(this)
                .parents()
                .removeClass("active");
            $(".overlay").fadeOut("active");
            $("body").removeClass("ovr-hiddn");
        });
    });

    $(".index-slider").slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1
            // prevArrow: $('.prev'),
            // nextArrow: $('.next')
    });

    //     Slider For
    // $('.slider-for').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     dots: false,
    //     arrows: false,
    //     fade: true,
    //     asNavFor: '.slider-nav'
    // });
    // $('.slider-nav').slick({
    //     slidesToShow: 4,
    //     slidesToScroll: 1,
    //     asNavFor: '.slider-for',
    //     dots: false,
    //     focusOnSelect: true
    // });

    /* Top Scroll */
    // $('body').on('click', '.scrolldown-fl', function() {
    //     goToScroll('awardSec');
    // });
});

// $(window).on("scroll touchmove", function() {
//     $("header").toggleClass("stickyOpen", $(document).scrollTop() > 200);
// });

$(window).on("load", function() {
    var currentUrl = window.location.href.substr(
        window.location.href.lastIndexOf("/") + 1
    );
    $("ul.menu li a,.p-nav li a").each(function() {
        var hrefVal = $(this).attr("href");
        if (hrefVal == currentUrl) {
            $(this).removeClass("active");
            $(this)
                .closest("li")
                .addClass("active");
            $("ul.menu li.first,.p-nav li.first").removeClass("active");
        }
    });
});

/* RESPONSIVE JS */
if ($(window).width() < 824) {}

function switchDiv() {
    var $window = $(window).outerWidth();
    if ($window <= 768) {
        $(".topAppendTxt").each(function() {
            var getdtd = $(this)
                .find(".cloneDiv")
                .clone(true);
            $(this)
                .find(".cloneDiv")
                .remove();
            $(this).append(getdtd);
        });
    }
}

function goToScroll(e) {
    $("html, body").animate({
            scrollTop: $("." + e).offset().top
        },
        1000
    );
}

// For Image zoom In/ zoom out
// document.addEventListener('DOMContentLoaded', function() {
//     var image = document.getElementById('image');
//     var zoomInButton = document.getElementById('zoomIn');
//     var zoomOutButton = document.getElementById('zoomOut');
//     var scale = 1;
//     var scaleStep = 0.1;
//     var maxScale = 3;
//     var minScale = 0.5;

//     // Zoom In functionality
//     zoomInButton.addEventListener('click', function() {
//         if (scale < maxScale) {
//             scale += scaleStep;
//             image.style.transform = 'scale(' + scale + ')';
//         }
//     });

//     // Zoom Out functionality
//     zoomOutButton.addEventListener('click', function() {
//         if (scale > minScale) {
//             scale -= scaleStep;
//             image.style.transform = 'scale(' + scale + ')';
//         }
//     });
// });

// Password checker
function passwordCheck(password) {
    if (password.length >= 8) strength += 1;
    if (password.match(/(?=.*[0-9])/)) strength += 1;
    if (password.match(/(?=.*[!,%,&,@,#,$,^,*,?,_,~,<,>,])/)) strength += 1;
    if (password.match(/(?=.*[a-z])/)) strength += 1;
  
    displayBar(strength);
  }
  
  function displayBar(strength) {
    $(".password-strength-group").attr("data-strength", strength);
  }
  
  $("#signupInputPassword").keyup(function () {
    strength = 0;
    var password = $(this).val();
    passwordCheck(password);
  });

// Show Password
function myFunction() {
    var x = document.getElementById("signupInputPassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  $(document).ready(function() {
    var zoomLevel = 1.0; // Initial zoom level
    var zoomIncrement = 0.1; // Amount to zoom in or out
    var mapInner = $('.map-inner');
    var mainMap = $('.main-map');
    var isDragging = false;
    var dragStartX = 0;
    var dragStartY = 0;
    var dragStartScrollLeft = 0;
    var dragStartScrollTop = 0;
    var pinchStartDistance = 0;
    var lastPinchDistance = 0;

    // Zoom in button click event
    $('#zoom-in').click(function() {
        zoomLevel += zoomIncrement;
        applyZoom();
    });

    // Zoom out button click event
    $('#zoom-out').click(function() {
        zoomLevel -= zoomIncrement;
        if (zoomLevel < 0.1) zoomLevel = 0.1; // Limit zoom out level
        applyZoom();
    });

    // Mouse and touch event handlers for dragging
    mainMap.on('mousedown touchstart', function(event) {
        if (event.type === 'mousedown') {
            isDragging = true;
            dragStartX = event.pageX;
            dragStartY = event.pageY;
        } else if (event.type === 'touchstart' && event.originalEvent.touches.length === 1) {
            isDragging = true;
            var touch = event.originalEvent.touches[0];
            dragStartX = touch.pageX;
            dragStartY = touch.pageY;
        }

        dragStartScrollLeft = mainMap.scrollLeft();
        dragStartScrollTop = mainMap.scrollTop();
    });

    $(document).on('mousemove touchmove', function(event) {
        if (isDragging) {
            var currentX, currentY;

            if (event.type === 'mousemove') {
                currentX = event.pageX;
                currentY = event.pageY;
            } else if (event.type === 'touchmove' && event.originalEvent.touches.length === 1) {
                var touch = event.originalEvent.touches[0];
                currentX = touch.pageX;
                currentY = touch.pageY;
            }

            if (typeof currentX !== 'undefined' && typeof currentY !== 'undefined') {
                var deltaX = dragStartX - currentX;
                var deltaY = dragStartY - currentY;
                mainMap.scrollLeft(dragStartScrollLeft + deltaX);
                mainMap.scrollTop(dragStartScrollTop + deltaY);
            }
        }
    });

    $(document).on('mouseup touchend', function() {
        isDragging = false;
    });

    // Pinch gesture for zooming on touch devices
    mainMap.on('touchstart', function(event) {
        if (event.originalEvent.touches.length >= 2) {
            var touch1 = event.originalEvent.touches[0];
            var touch2 = event.originalEvent.touches[1];
            pinchStartDistance = Math.hypot(touch2.pageX - touch1.pageX, touch2.pageY - touch1.pageY);
            lastPinchDistance = pinchStartDistance;
        }
    });

    mainMap.on('touchmove', function(event) {
        if (event.originalEvent.touches.length >= 2) {
            var touch1 = event.originalEvent.touches[0];
            var touch2 = event.originalEvent.touches[1];
            var currentPinchDistance = Math.hypot(touch2.pageX - touch1.pageX, touch2.pageY - touch1.pageY);
            zoomLevel *= currentPinchDistance / lastPinchDistance;
            lastPinchDistance = currentPinchDistance;
            applyZoom();
        }
    });

    // Function to apply zoom (adjust map-inner scaling)
    function applyZoom() {
        mapInner.css({
            transform: 'scale(' + zoomLevel + ')'
        });

        // Adjust main-map scroll position to show zoomed content
        var scrollLeft = mainMap.scrollLeft();
        var scrollTop = mainMap.scrollTop();
        mainMap.scrollLeft(scrollLeft + 100); // Adjust scroll position as needed
        mainMap.scrollTop(scrollTop + 100); // Adjust scroll position as needed
    }
});
