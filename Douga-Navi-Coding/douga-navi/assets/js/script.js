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

	// 検索結果ページの絞り込みボタンのアコーディオン
	$(".js-searchBtnAccdin").on("click", function () {
		if ($(".p-srchCnditin").hasClass("srchAccdionOpen")) {
			$(this).next().slideUp("300");
			$(".p-srchCnditin").removeClass("srchAccdionOpen");
		} else {
			$(this).next().slideDown("300");
			$(".p-srchCnditin").addClass("srchAccdionOpen");
		}
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

	//タームボタンをクリックして検索ページに飛んできた時の絞り込み条件自動選択
	let urlNatural = new URL(window.location.href);
	// let urlDecode = decodeURI(urlNatural);
	let urlParams = urlNatural.searchParams;
	let termSlug = urlParams.get("termSlug");
	let termSlugInput = $("input[type='checkbox'][value = '" + termSlug + "']");
	termSlugInput.prop("checked", true);
	if (!$(termSlugInput.parents(".p-srchCnditin__prntsTermBox")).length == 0) {
		$(termSlugInput.parents(".p-srchCnditin__prntsTermBox")).next().find('input[type="checkbox"]').prop("checked", true);
	}
	let termLists = urlParams.getAll("termLists[]");
	// let targetInput = $("input[type='checkbox'][value = '" + termSlug + "']");
	// console.log(urlDecode);
	console.log(termLists);
	for (iii = 0; iii < termLists.length; iii++) {
		let termListsInput = $("input[type='checkbox'][value = '" + termLists[iii] + "']");
		termListsInput.prop("checked", true);
	}

	// SP時ドロワーを開く挙動
	$(".js-drawerOpen").on("click", function () {
		$(".p-header__drawerBelow").css({ display: "block" });
		$(".p-header__belowRow").fadeIn();
		$(".p-header").addClass("headerDrawerOpen");
		$("body").css({ overflow: "hidden", height: "100.01vh" });
	});

	// SP時ドロワーを閉じる挙動
	$(".js-drawerClose").on("click", function () {
		$(".p-header__belowRow").fadeOut();
		$(".p-header").removeClass("headerDrawerOpen");
		$("body").css({ overflow: "visible", height: "auto" });
	});

	// SP時ドロワー内のアコーディオン
	$(".js-drawerAccdin").on("click", function () {
		if ($(this).hasClass("drawerAccdinOpen")) {
			$(this).next().slideUp();
			$(this).removeClass("drawerAccdinOpen");
		} else {
			$(this).next().slideDown();
			$(this).addClass("drawerAccdinOpen");
		}
	});

	// ウィンドウ幅を変えた時の処理
	$(window).on("resize", function () {
		let windowWidth = window.innerWidth;
		// console.log(windowWidth);
		if (windowWidth < 768) {
			$("body").css({ overflow: "visible", height: "auto" });
			$(".p-header__drawerBelow").css({ display: "none" });
			$(".p-header__belowRow").css({ display: "none" });
			$(".p-srchCnditin__termItem > label > input[type='checkbox']:checked").each(function () {
				$(this).parents(".p-srchCnditin__termBox").slideDown();
				$(this).parents(".p-srchCnditin__termBox").prev().addClass("accdinOpen");
			});
		} else {
			$("body").css({ overflow: "visible", height: "auto" });
			$(".p-header__drawerBelow").css({ display: "block" });
			$(".p-header__belowRow").css({ display: "block" });
			$(".p-srchCnditin__termBox").slideDown();
			$(".p-srchCnditin__prntsTermBox").removeClass("accdinOpen");
		}
	});
});
