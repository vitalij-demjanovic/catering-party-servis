var swiperBenefits = new Swiper(".swiper.list-benefits", {
  slidesPerView: 1.5,
  spaceBetween: 16,
  loop: false,
  breakpoints: {
    640: {
      slidesPerView: 2.5,
      spaceBetween: 16,
    },
    992: {
      slidesPerView: 3.5,
      spaceBetween: 16,
    },
    1300: {
      slidesPerView: 4,
      spaceBetween: 26,
    }
  },
});
