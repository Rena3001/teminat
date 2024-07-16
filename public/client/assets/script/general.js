"use strict";

document.addEventListener('DOMContentLoaded', function() {
    const headerGroups = document.querySelector('.header__search--groups');
    const headerGroupDropdown = document.querySelector('.header__groups--dropdown');
    const footerGroups = document.querySelector('.footer__subs--country');
    const footerGroupDropdown = document.querySelector('.footer__subs--dropdown');
    const headerLang = document.querySelector(".header__lang");
    const headerLangMenu = document.querySelector(".header__lang--menu");
    const iconHamburger = document.querySelector(".icon-hamburger");
    const header = document.querySelector(".header");
    const headerSearchInput = document.querySelector('.header__search--input');
    const headerSearchBtn = document.querySelector('.header__search--btn');
    const headerSearchSelect = document.getElementById("headerSearchSelect");
    const headerSearchSelectedGroup = document.getElementById("headerSearchSelectedGroup");
    const headerSearchWelding = document.getElementById("headerSearchWelding");
    const headerSearchValve = document.getElementById("headerSearchValve");

    if (headerGroups) {
        headerGroups.addEventListener("click", () => {
            headerGroupDropdown.classList.toggle("active");
        });
    }

    if (footerGroups) {
        footerGroups.addEventListener("click", () => {
            footerGroupDropdown.classList.toggle("active");
        });
    }

    if (headerLang) {
        headerLang.addEventListener("click", () => {
            headerSearchInput.classList.contains("active") ?
                setTimeout(() => headerLangMenu.classList.toggle("active"), 300) :
                headerLangMenu.classList.toggle("active");
        });
    }

    if (iconHamburger) {
        iconHamburger.addEventListener("click", () => {
            iconHamburger.classList.toggle("active");
            header.classList.toggle("active");
        });
    }

    function handleHeaderSearchBtn() {
        const viewportWidth = window.innerWidth;
        if (viewportWidth <= 768) {
            headerSearchBtn.type = "button";
        } else {
            headerSearchBtn.type = "submit";
        }
    }

    document.addEventListener("DOMContentLoaded", handleHeaderSearchBtn);
    window.addEventListener("resize", handleHeaderSearchBtn);

    if (headerSearchBtn) {
        headerSearchBtn.addEventListener("click", () => {
            headerLangMenu.classList.contains("active") ?
                setTimeout(() => headerSearchInput.classList.add("active"), 300) :
                headerSearchInput.classList.add("active");

            setTimeout(() => headerSearchBtn.type = "submit", 300);
        });
    }

    if (headerSearchWelding) {
        headerSearchWelding.addEventListener("click", () => {
            headerSearchSelect.value = "welding";
            headerSearchSelectedGroup.innerHTML = "Welding";
        });
    }

    if (headerSearchValve) {
        headerSearchValve.addEventListener("click", () => {
            headerSearchSelect.value = "valve";
            headerSearchSelectedGroup.innerHTML = "Valve";
        });
    }

    document.addEventListener("click", (e) => {
        if (headerGroups && !headerGroups.contains(e.target)) {
            headerGroupDropdown.classList.remove("active");
        }

        if (headerLang && !headerLang.contains(e.target)) {
            headerLangMenu.classList.remove("active");
        }

        if (headerSearchBtn && !headerSearchBtn.contains(e.target) && !headerSearchInput.contains(e.target)) {
            headerSearchInput.classList.remove("active");
            headerSearchBtn.type = "button";
        }
    });
});
