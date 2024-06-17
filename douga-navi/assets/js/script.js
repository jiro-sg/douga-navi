// ページトップボタン
var topBtn = $(".js-pagetop");
topBtn.hide();

// ページトップボタンの表示設定
$(window).scroll(function () {
  if ($(this).scrollTop() > 70) {
    // 指定px以上のスクロールでボタンを表示
    topBtn.fadeIn();
  } else {
    // 画面が指定pxより上ならボタンを非表示
    topBtn.fadeOut();
  }
});

// ページトップボタンをクリックしたらスクロールして上に戻る
topBtn.click(function () {
  $("body,html").animate(
    {
      scrollTop: 0,
    },
    300,
    "swing"
  );
  return false;
});

// スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動。ヘッダーの高さ考慮。)
$(document).on("click", 'a[href*="#"]', function () {
  let time = 400;
  let header = $("header").innerHeight();
  let target = $(this.hash);
  if (!target.length) return;
  let targetY = target.offset().top - header;
  $("html,body").animate({ scrollTop: targetY }, time, "swing");
  return false;
});

// =====ハンバーガーメニュー==========================
$(function () {
  var state = false;
  var pos;
  $(".js-hamburger").click(function () {
    $(this).toggleClass("active"); /* ハンバーガーメニューの開閉 */
    // $('.js-header-nav').toggleClass('active'); /* ナビメニューの開閉 */
    if (state == false) {
      $("body").addClass("u-fixed"); /* ナビメニュー開いている時背景固定 */
      state = true;
    } else {
      $("body").removeClass("u-fixed");
      state = false;
    }
  });
});

// リンクに飛ぶ時にクリックしたらハンバーガーメニューが閉じるように
$(".p-header__drawerItem a[href]").on("click", function (event) {
  $(".js-hamburger").trigger("click");
});
// =============================
// 要素のフェードアップ
const fadeUp01 = gsap.utils.toArray(".js-fadeUp01");
fadeUp01.forEach((fade01) => {
  gsap.fromTo(
    fade01,
    { y: 50, autoAlpha: 0 },
    {
      scrollTrigger: {
        trigger: fade01,
        start: "top 70%",
        // markers:true,
      },
      y: 0,
      autoAlpha: 1,
      stagger: 0.3,
      duration: 0.8,
    }
  );
});
//================================================
