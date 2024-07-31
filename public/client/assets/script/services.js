let viewportWidth = window.innerWidth;
const servicesSection = document.querySelector(".services")

function setContainer() {
    viewportWidth = window.innerWidth;
    setServiceNav();

    if (viewportWidth <= 768) {
        servicesSection.classList.add("container")
    } else {
        servicesSection.classList.remove("container")
    }
}
setContainer();

const serviceTitles = document.querySelector(".servicesNav").dataset.titles;  /* change this with the following */

function setServiceNav() {
    let servicesNav = document.querySelectorAll(".swiper-pagination-bullet");

    servicesNav.forEach((e, i) => {
        e.textContent = viewportWidth <= 768 ? i+1 : `${i+1}. Xidmətlər sahə və sair`  /* will change */ 
    })
}

document.addEventListener("DOMContentLoaded", setServiceNav)
window.addEventListener("resize", setContainer)
