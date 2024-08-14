let viewportWidth = window.innerWidth;
const servicesSection = document.querySelector(".services");

// Backend-dən gələn başlıqların siyahısı (title sahəsini obyektlərdən çıxarırıq)
const serviceTitles = JSON.parse(document.querySelector(".servicesNav").dataset.titles);

function setContainer() {
    viewportWidth = window.innerWidth;
    setServiceNav();

    if (viewportWidth <= 768) {
        servicesSection.classList.add("container");
    } else {
        servicesSection.classList.remove("container");
    }
}
setContainer();

function setServiceNav() {
    let servicesNav = document.querySelectorAll(".swiper-pagination-bullet");

    servicesNav.forEach((e, i) => {
        // Başlıq kimi obyektin title sahəsini istifadə edin
        e.textContent = viewportWidth <= 768 ? i + 1 : `${i + 1}. ${serviceTitles[i]}`;
    });
}

document.addEventListener("DOMContentLoaded", setServiceNav);
window.addEventListener("resize", setContainer);
