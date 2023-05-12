/* version 1.0.0 */
// JavaScript Document

// ヘッダー読み込み
function header(rootDir){
  $.ajax({
      url: rootDir + "_header.html",  // 読み込むHTMLファイル
      cache: false,
      async: false,
      dataType: 'html',
      success: function(html){
          html = html.replace(/\{\$root\}/g, rootDir); //header.htmlの{$root}を置換
          document.write(html);
      }
  });
};

// フッター読み込み
function footer(rootDir){
  $.ajax({
      url: rootDir + "_footer.html",  // 読み込むHTMLファイル
      cache: false,
      async: false,
      dataType: 'html',
      success: function(html){
          html = html.replace(/\{\$root\}/g, rootDir); //header.htmlの{$root}を置換
          document.write(html);
      }
  });
};

// LINE用ヘッダー読み込み
function headerLine(rootDir){
  $.ajax({
      url: rootDir + "_header_line.html",  // 読み込むHTMLファイル
      cache: false,
      async: false,
      dataType: 'html',
      success: function(html){
          html = html.replace(/\{\$root\}/g, rootDir); //header.htmlの{$root}を置換
          document.write(html);
      }
  });
};

// LINE用フッター読み込み
function footerLine(rootDir){
  $.ajax({
      url: rootDir + "_footer_line.html",  // 読み込むHTMLファイル
      cache: false,
      async: false,
      dataType: 'html',
      success: function(html){
          html = html.replace(/\{\$root\}/g, rootDir); //header.htmlの{$root}を置換
          document.write(html);
      }
  });
};

//fead系
$(window).on('load scroll', function () {
  $(".fead-mv, .fead-up, .fead-left, .fead-right").each(function () {
    var ele = $(this);
    var pos = ele.offset().top;
    var scroll = $(window).scrollTop();

    if (scroll > pos) {
      ele.addClass("mv");
    } else if (scroll > pos - window.innerHeight) {
      setTimeout(function () {
        ele.addClass("mv");
      }, 400);
    }
  });
});


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


//hoverで画像差し替え
$(function () {
  $('.js-thumb img').mouseover(function () {
    var selectedSrc = $(this).attr('src').replace(/^(.+)_thumb(\.gif|\.jpg|\.png+)$/, "$1" + "$2");
    $('.js-mainimg img').stop().fadeOut(200,
      function () {
        $('.js-mainimg img').attr('src', selectedSrc);
        $('.js-mainimg img').stop().fadeIn(200);
      }
    );
  });
});


//カテゴリーを分割し、クラスを付与
$(function () {
  $('.js-split-tag').html(function () {
    return $(this).html().replace(/\n/g, '').split(",").filter(function (x) {
      return x.match(/\S/);
    }).map(function (x) {
      return "<span>" + x + "</span>";
    }).join("");
  });
  $('.js-split-tag span').each(function () {
    var tagtext = $(this).text();
    $(this).addClass(tagtext);
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

//テキストトリミング
$(window).load(function () {
  $('.up-reader3').each(function () {
    var $target = $(this);
    var html = $target.html();
    var $clone = $target.clone();
    var fs = $target.css('font-size');
    var lh = $target.css('line-height');
    var lines = '3'; //表示したい行数
    var lhp = Math.round((parseInt(lh) / parseInt(fs)) * 10) / 10;
    var calc = parseInt(fs) * lhp * parseInt(lines);
    $target.css('height', calc);
    $clone
      .css({
        display: 'none',
        position: 'absolute',
        overflow: 'visible'
      })
      .width($target.width())
      .height('auto');
    $target.after($clone);
    while ((html.length > 0) && ($clone.height() > $target.height())) {
      html = html.substr(0, html.length - 1);
      $clone.html(html + '…');
    }
    $target.html($clone.html());
    $clone.remove();
  });
  $('.up-reader2').each(function () {
    var $target = $(this);
    var html = $target.html();
    var $clone = $target.clone();
    var fs = $target.css('font-size');
    var lh = $target.css('line-height');
    var lines = '2'; //表示したい行数
    var lhp = Math.round((parseInt(lh) / parseInt(fs)) * 10) / 10;
    var calc = parseInt(fs) * lhp * parseInt(lines);
    $target.css('height', calc);
    $clone
      .css({
        display: 'none',
        position: 'absolute',
        overflow: 'visible'
      })
      .width($target.width())
      .height('auto');
    $target.after($clone);
    while ((html.length > 0) && ($clone.height() > $target.height())) {
      html = html.substr(0, html.length - 1);
      $clone.html(html + '…');
    }
    $target.html($clone.html());
    $clone.remove();
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