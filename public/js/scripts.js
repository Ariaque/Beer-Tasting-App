/*!
 * Start Bootstrap - Creative v7.0.4 (https://startbootstrap.com/theme/creative)
 * Copyright 2013-2021 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-creative/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
    //Tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector("#mainNav");
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove("navbar-shrink");
        } else {
            navbarCollapsible.classList.add("navbar-shrink");
        }
    };

    // Shrink the navbar
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener("scroll", navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector("#mainNav");
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: "#mainNav",
            offset: 74,
        });
    }

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector(".navbar-toggler");
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll("#navbarResponsive .nav-link")
    );

    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener("click", () => {
            if (window.getComputedStyle(navbarToggler).display !== "none") {
                navbarToggler.click();
            }
        });
    });

    // Activate SimpleLightbox plugin for portfolio items
    new SimpleLightbox({
        elements: "#portfolio a.portfolio-box",
    });
});

$.fn.stars = function () {
    return $(this).each(function () {
        var rating = $(this).data("rating");
        var fullStar = new Array(Math.floor(rating + 1)).join(
            '<i class="fas fa-star"></i>'
        );
        var halfStar =
            rating % 1 !== 0 ? '<i class="fas fa-star-half-alt"></i>' : "";
        var noStar = new Array(
            Math.floor($(this).data("numStars") + 1 - rating)
        ).join('<i class="far fa-star"></i>');
        $(this).html(fullStar + halfStar + noStar);
    });
};


$.fn.score = function () {
    return $(this).each(function () {
        var color = "";
        var score = $(this).data("score");
        var type = $(this).data("type");
        $component = "border-";
        if(type == "table"){
            $component = "table-";
        }
        if(score>=8){
            color = $component+'success';
        }
        else if(score>=4){
            color = $component+'warning';
        }
        else{
            color= $component+'danger';
        }
        $(this).addClass(color);
    });
};

$(".pr-password").passwordRequirements({
    numCharacters: 8,
    useLowercase: true,
    useUppercase: true,
    useNumbers: true,
    useSpecial: true
});

