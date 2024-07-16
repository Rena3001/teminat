const homeBannerSwiper = new Swiper("#homeBanner", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: "#homeBanner .swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: "#homeBanner .swiper-button-next",
      prevEl: "#homeBanner .swiper-button-prev",
    },
    autoplay: {
        delay: 3000,
    },
});


const otherProducts = new Swiper(".other > .swiper", {
  slidesPerView: 'auto',
  spaceBetween: 25,
  loop: false,
});

