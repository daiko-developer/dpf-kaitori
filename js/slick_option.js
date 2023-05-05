$(function () {
  // ホームビジュアル
  $(".homevisual").slick({
    centerMode: true,
    centerPadding: '0%',
    autoplay: true,
    slidesToShow: 1,
    dots: true,
    autoplaySpeed: 3000,
  });
  // 買取事例
  $(".slick01").slick({
    slidesToShow: 4,
    dots: false,
    prevArrow: '<i class="btn-slick btn-back fas fa-chevron-left"></i>',
    nextArrow: '<i class="btn-slick btn-next fas fa-chevron-right"></i>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 599,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
  });
})
