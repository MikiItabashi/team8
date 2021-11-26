/*********************************************************
 * worksページサムネイル付きswiper
 *********************************************************/
/**
 * サムネイル
 **/
 var sliderThumbnail = new Swiper('.js-works-thumbnail', {
  slidesPerView: 2,
  spaceBetween: 24,
  centeredSlides:true,
  freeMode: true,
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
  breakpoints: {
    // 768px以上の場合
    768: {
      slidesPerView: 8,
      spaceBetween: 8,
      centeredSlides:false,
    }
  }
});

/**
 * メイン
 **/
var slidermain = new Swiper('.js-works-slider', {
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  thumbs: {
    swiper: sliderThumbnail
  }
});

/**
 * スライダーをスライドした時にサムネイルを移動させる
 **/
 slidermain.on('slideChange', () => {
  sliderThumbnail.slideToLoop(slidermain.realIndex);
});
