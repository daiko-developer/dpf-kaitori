/* version 1.0.0 */
// JavaScript Document

//グローバルナビ固定
$(window).on('load resize', function () {
  if ($('.header').length) {
    var w = window.innerWidth;
    var obj = $('.header').offset().top;
    var h = $('.header .contents').outerHeight();
    var hbtn = $('.btn.-menu').outerHeight();
    $(window).on('load scroll resize', function () {
      if ($(this).scrollTop() > obj) {
        $(".header").addClass("fixed");
        $("#wrapper").css('padding-top', h);
      } else {
        $(".header").removeClass("fixed");
        $(".btn.-menu").removeClass("fixed");
        $("#wrapper").css('padding-top', 0);
      }
    });
  }
});

//ハンバーガーメニュー
$(function () {
  $('.toggle').click(function () {
    $(this).toggleClass('active');
    $(".gnav").toggleClass('action');
    $("header").toggleClass('overlay');
  });

  $('.gnav a').click(function () {
    $(this).toggleClass('active');
    $(".gnav").toggleClass('action');
    $("header").toggleClass('overlay');
  });
});

//トップへ戻る
$(function () {
  var topBtn = $('.totop');
  topBtn.hide();
  //スクロールが100に達したらボタン表示
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      topBtn.fadeIn();
    } else {
      topBtn.fadeOut();
    }
  });
  //スクロールしてトップ
  topBtn.click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 500);
    return false;
  });
});

//トグルメニュー
$(function () {
  $(".js-toggle").on("click", function () {
    $(this).next().slideToggle();
    $(this).toggleClass("is-parent");
    $(this).next().toggleClass("is-active");
  });
});

//スクロール・ページ内リンク
$(function () {
  $(".uk-dotnav a").attr("href", "");
  var urlHash = location.hash;
  if (urlHash) {
    $('body,html').css('opacity', '0');
    setTimeout(function () {
      scrollToAnker(urlHash);
    }, 200);
  }

  $('a[href*="#"]').on('click', function () {
    var href = $(this).attr("href");
    if (href.indexOf("#") === 0) { //ただのハッシュ
      var hash = href == "#" || href == "" ? 'html' : href;
      scrollToAnker(hash);
      return false;
    } else if (href.indexOf("/") == 0 && href.indexOf("#") !== 1) { //ページ内ハッシュ
      var hrefsplit = href.split("#");
      var hash = "#" + hrefsplit[1];
      scrollToAnker(hash);
      return false;
    } else { //トップハッシュ
      var hrefsplit = href.split("/");
      var hash = hrefsplit[1];
      scrollToAnker(hash);
      return false;
    }
  });

  function scrollToAnker(hash) {
    var target = $(hash);
    if (!(target.length)) {
      $('body,html').css('opacity', '1');
      scrollToAnker(hash);
    } else if (target.length) {
      var position = target.offset().top;
      var w = window.innerWidth;
      var gnav = $('.gnav').outerHeight();
      var header = $('#header').outerHeight();
      if (w > 1024) {
        $('body,html').animate({
          scrollTop: position - 10 - header,
          opacity: 1
        }, 600);
      } else if (w < 1025) {
        $('body,html').animate({
          scrollTop: position - 10 - header,
          opacity: 1
        }, 600);
      } else {
        $('body,html').animate({
          scrollTop: position - 10 - header,
          opacity: 1
        }, 600);
      }
    }
  };
});