// const swiper = new Swiper(".services_content", {
//   slidesPerView: "auto",
//   spaceBetween: 80,
//   pagination: {
//     el: ".servicesNav .swiper-pagination",
//     clickable: true,
//     renderBullet: function (index, className) {
//       return '<span class="' + className + '">' + (index + 1) + "</span>";
//     },
//   },
//   navigation: {
//     nextEl: ".servicesNav .swiper-button-next",
//     prevEl: ".servicesNav .swiper-button-prev",
//   },
// });

let testimonialsSwiper = new Swiper(".testimonials_swiper", {
  slidesPerView: 2,
  spaceBetween: 50,
  loop: true,
  navigation: {
    nextEl: ".prev_testimonial",
    prevEl: ".next_testimonial",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    375: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    600: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    992: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 50,
    },
  },
});

let blogPageSwiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  loop: true,
  // autoplay: {
  //   delay: 2500,
  //   disableOnInteraction: true,
  // },
  spaceBetween: 10,
  navigation: {
    nextEl: ".next_btn",
    prevEl: ".prev_btn",
  },
  breakpoints: {
    480: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 60,
    },
  },
});
