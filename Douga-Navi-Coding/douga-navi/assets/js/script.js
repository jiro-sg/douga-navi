$(function () {
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

	// 現在のページにクラス付与

	$(".p-faq-category__item a").each(function () {
		var target = $(this).attr("href");
		if (location.href.match(target)) {
			$(this).parent().addClass("is-selected");
		} else {
			$(this).parent().removeClass("is-selected");
		}
	});

	// トップページFVスライド

	const swiper = new Swiper(".p-frntFv__swiper", {
		loop: true,
		// autoplay: {
		// 	delay: 500,
		// },
		// navigation: {
		// 	nextEl: ".swiper-button-next",
		// 	prevEl: ".swiper-button-prev",
		// },
		pagination: {
			el: ".swiper-pagination",
			type: "bullets",
		},
	});

	// スマホ時の検索結果ページの絞り込み条件アコーディオン

	$(".js-srchAccrdin").on("click", function () {
		if ($(this).parents(".p-srchCnditin__prntsTermBox").hasClass("accdinOpen")) {
			$(this).parents(".p-srchCnditin__prntsTermBox").next().slideUp();
			$(this).parents(".p-srchCnditin__prntsTermBox").removeClass("accdinOpen");
		} else {
			$(this).parents(".p-srchCnditin__prntsTermBox").next().slideDown();
			$(this).parents(".p-srchCnditin__prntsTermBox").addClass("accdinOpen");
		}
	});

	// 検索結果ページで親タームをクリックしたら子ターム全選択
	$(".p-srchCnditin__prntsTermBox > label > input[type='checkbox']").on("change", function () {
		if ($(this).prop("checked") == true) {
			$(this).parents(".p-srchCnditin__prntsTermBox").next().find("input[type='checkbox']").prop("checked", true);

			let windowWidth = window.innerWidth;
			if (windowWidth < 768) {
				$(this).parents(".p-srchCnditin__prntsTermBox").next().slideDown();
				$(this).parents(".p-srchCnditin__prntsTermBox").addClass("accdinOpen");
			}
		} else {
			$(this).parents(".p-srchCnditin__prntsTermBox").next().find("input[type='checkbox']").prop("checked", false);
		}
	});

	// 検索結果ページで子タームのチェック外れたら親タームのチェック外す
	$(".p-srchCnditin__termItem > label > input[type='checkbox']").on("change", function () {
		if ($(this).prop("checked") == false) {
			$(this).parents(".p-srchCnditin__termBox").prev().find("input[type='checkbox']").prop("checked", false);
		}
	});

	// ウィンドウ幅を変えた時の処理
	$(window).on("resize", function () {
		let windowWidth = window.innerWidth;
		if (windowWidth < 768) {
			$(".p-srchCnditin__termItem > label > input[type='checkbox']:checked").each(function () {
				$(this).parents(".p-srchCnditin__termBox").slideDown();
				$(this).parents(".p-srchCnditin__termBox").prev().addClass("accdinOpen");
			});
		} else {
			$(".p-srchCnditin__termBox").slideDown();
			$(".p-srchCnditin__prntsTermBox").removeClass("accdinOpen");
		}
	});
});
